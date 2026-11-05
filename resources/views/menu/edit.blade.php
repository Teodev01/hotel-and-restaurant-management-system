@extends('layouts.app')
@section('title', 'Edit Menu Item')

@section('content')
    <h1>Edit Menu Item</h1>

    @if($errors->any())
        <div style="color:red">
            @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
        </div>
    @endif

    <form method="POST" action="/menu/{{ $menu_item->id }}">
        @csrf
        @method('PUT')

        <label>Name</label><br>
        <input type="text" name="name" value="{{ $menu_item->name }}"><br>

        <label>Category</label><br>
        <select name="category">
            @foreach(['Food', 'Drinks', 'Dessert'] as $c)
                <option {{ $menu_item->category == $c ? 'selected' : '' }}>{{ $c }}</option>
            @endforeach
        </select><br>

        <label>Price</label><br>
        <input type="number" step="0.01" name="price" value="{{ $menu_item->price }}"><br>

        <label><input type="checkbox" name="is_available" {{ $menu_item->is_available ? 'checked' : '' }} style="width:auto"> Available</label><br><br>

        <button type="submit" class="btn">Update</button>
    </form>
@endsection