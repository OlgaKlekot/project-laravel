@extends('template')

@section('content')

<div class="definite">
@foreach ($posts as $post)
    <div class="post">
        <span class="date">{{$post['created_at']}}</span>
        <h3 class="title">{{$post['title']}}</h3>
        <p>
            category: <span>{{$post['type']['category']}}</span>
            authored by <span class="author">{{$post['author']['name']}}</span>
        </p>
        @if (isset($post['price']))
            price: <span>{{sprintf ("$%01.2f", $post['price'])}}</span>
        @endif
        <div class="image"></div>
        <p class="art">{{$post['main']}}</p>
    </div>
@endforeach
</div>
@endsection