<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function index()
    {
        return view('admin.book.index');
    }
    public function create(){
        $data ='{}';
        return view('admin.book.form',array('data'=>$data));
    }
    public function edit(Request $request){
        $book = Book::where('id', $request->id)->first();
        return view('admin.book.form', ['data' => $book]);
    }
    public function delete(Request $request){
        try {
            $deletebook = Book::find($request->id);
        if(!empty($deletebook->image))
        {
            $bookimagePath =$deletebook->image;
            $path = public_path().$bookimagePath;
            @unlink($path);
        }
        $deletebook->delete();

        $client = \Elasticsearch\ClientBuilder::create()
        ->setHosts([config('elasticsearch.hosts.host')])
        ->build();
         
        $client->delete([
            'index'=>config('elasticsearch.index'),
            'type' => config('elasticsearch.index_type'),
            'id' =>$request->id,
        ]);
        
        return back()->with('message', 'Your Book is Deleted Successfully.');

        } catch (\Throwable $th) {
            return back()->with('message','Sorry! Your Book is not Deleted.');

        }
        
    }



      /**
     * Store the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only('title','author','genre','description','isbn','published','publisher');
        if($request->hasFile('image')){
           $bookimage = $request->image;
           $fileName = time().'-'.$bookimage->getClientOriginalName();
           $extension = $bookimage->getClientOriginalExtension(); // you can also use file name

           $fileName = time().'.'.$extension;
           $bookimagePath = '/banner/images';

           $path = public_path().$bookimagePath;
           $bookimage->move($path,$fileName);
           $bookimagePath = '/banner/images/'.$fileName;
           $inputs['image']=  $bookimagePath;
       }

       $id = $request->id;
       $book = Book::updateOrCreate(array('id'=>$id),$inputs);
       $message = 'Book Updated Successfully.';

       $client = \Elasticsearch\ClientBuilder::create()
       ->setHosts([config('elasticsearch.hosts.host')])
       ->build();
       
       $body = $book->toArray();
       $body['published'] = 'DP-'.str_replace('-','',$body['published']);
       $params = array();
        $params['body']  = $body;
        $params['index'] = config('elasticsearch.index');
        $params['id'] = $book->id;
        $params['type']  =config('elasticsearch.index_type');
        $client->index($params);	



       if($book->wasRecentlyCreated) {
        $message = 'Book Created Successfully.';
       }
       
        return redirect('admin/dashboard')->with('message',$message);
    }

    //fetchBooks
    public function fetchBooks(){
        $json = Http::get('https://fakerapi.it/api/v1/books?_quantity=100');
        $books = json_decode($json->body());

        $client = \Elasticsearch\ClientBuilder::create()
        ->setHosts([config('elasticsearch.hosts.host')])
        ->build();
        foreach($books->data as $book){
            $bookArray = [
                'title' => $book->title, 
                'author' => $book->author,
                'genre' => $book->genre,
                'description' => $book->description,
                'isbn' => $book->isbn,
                'image' => $book->image,
                'published' => $book->published,
                'publisher' => $book->publisher
            ];
            // \DB::table('books')->insert($bookArray);
            $bookObj = Book::create($bookArray);



            $body = $bookObj->toArray();
            $body['published'] = 'DP-'.str_replace('-','',$body['published']);
             $params = array();
             $params['body']  = $body;
             $params['index'] = config('elasticsearch.index');
             $params['id'] = $bookObj->id;
             $params['type']  =config('elasticsearch.index_type');
             $client->index($params);	
        }
        $message = 'Books Fetched Successfully.';

        return redirect('admin/dashboard')->with('message',$message);

    }

}
