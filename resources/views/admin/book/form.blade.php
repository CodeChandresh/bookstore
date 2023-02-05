@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(session()->get('message'))
            <div class="alert alert-success">
            {{ session()->get('message') }}
            </div>
        @endif
        <book-form :book = "{{$data}}" token="{{csrf_token()}}"></book-form>
    </div>
</div>
@endsection
