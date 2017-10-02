@extends('template')

@section('content')

    <div class="addPage">
    <form action="{{route('new_post')}}" id="artToAdd" method="post" class="addForm">
        {{ csrf_field() }}
        <input class="field" placeholder="title" name="title" required>
        <select name="category" id="cat" class="field">
            @foreach ($categories as $category)
            <option value="{{$category['id']}}">{{$category['category']}}</option>
            @endforeach
        </select>
        <input class="field" placeholder="price $00.00" name="price">
        <textarea class="field" name="text" id="" cols="70" rows="10" required></textarea>
        <input type="submit" name="adding" class="button" value="Send" form="artToAdd">
    </form>
</div>
@endsection