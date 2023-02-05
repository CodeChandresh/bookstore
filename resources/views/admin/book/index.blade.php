@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @if(session()->get('message'))
            <div class="alert alert-success">
            {{ session()->get('message') }}
            </div>
        @endif
        <admin-book-list></admin-book-list>
    </div>
</div>
@endsection
