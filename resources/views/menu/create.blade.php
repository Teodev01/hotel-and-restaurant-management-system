@extends('layouts.app')
@section('title', 'Add Menu Item')

@section('content')
    <h1>Add Menu Item</h1>

    @if($errors->any())
        <div style="color:red">
            @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
        </div>
    @endif

    <form method="POST" action="/menu">
        @csrf

        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br>

        <label>Category</label><br>
        <select name="category">
            <option>Food</option>
            <option>Drinks</option>
            <option>Dessert</option>
        </select><br>

        <label>Price</label><br>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}"><br>

        <label><input type="checkbox" name="is_available" checked style="width:auto"> Available</label><br><br>

        <button type="submit" class="btn">Save</button>
    </form>
@endsection