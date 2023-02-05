<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        //
        $books = Book::latest()->paginate(10);
        return response()->json($books);
    }

    public function view(Request $request)
    {
        $book = Book::where('id', $request->id)->first();
        return response()->json($book);
    }
    public function search(Request $request)
    {
        $keyword = "*$request->keyword*";
        if (strtotime($request->keyword)) {
            $keyword = 'DP-' . str_replace('-', '', $request->keyword);
        }

        $query = [
            'query_string' => [
                'fields' => ['title', 'author', 'isbn', 'genre', 'publisher', 'published'],
                'query' => "$keyword",
            ],

        ];
        $qq = [
            'index' => config('elasticsearch.index'),
            'body' => [
                "_source" => ['id', 'title', 'author', 'isbn', 'genre', 'publisher', 'image'],
                'query' => $query,
            ],
        ];
        $client = \Elasticsearch\ClientBuilder::create()
            ->setHosts([config('elasticsearch.hosts.host')])
            ->build();
        $result = $client->search($qq);

        $items = isset($result['hits']['hits']) ? array_column($result['hits']['hits'], '_source') : array();
        return response()->json([
            'books' => $items,
        ]);
    }
}
