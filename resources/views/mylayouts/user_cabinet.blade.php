@extends('template')

@section('content')


<div class="posts">
    @if (isset($_GET['category']))
        <h1>{{strtoupper($_GET['category'])}}</h1>
    @endif
    @foreach ($posts as $post)
    <div class="post">
        <span class="date">{{$post['created_at']}}</span>
        <a href="{{route('definite_post', ['postN' => $post['title']])}}"><h3 class="title">{{$post['title']}}</h3></a>
        <p>
            category: <span>{{$post['type']['category']}}</span>
            authored by <span class="author">{{$post['author']['name']}}</span>
        </p>
        @if (isset($post['price']) && $post['price'] != 0)
            price: <span>{{sprintf ("$%01.2f", $post['price'])}}</span>
        @endif
        <div class="image"></div>
        <?php if (strlen($post['main']) > 150) {
            $post['main'] = substr($post['main'],0,150) . "...";
        } ?>
        <p class="post_text">{{$post['main']}}</p>
        <div class="changes">
            <a href="{{route('edit_post')}}?edit={{$post['id']}}"><input type="button" class="button" value="Edit"></a>
            <a href="{{route('delete_post', ['delete_id' => $post['id']])}}?delete={{$post['title']}}"><input type="button" class="button" value="Delete"></a>
        </div>
    </div>
@endforeach
</div>
<aside>
    @include('mylayouts.categories')
</aside>
    @endsection