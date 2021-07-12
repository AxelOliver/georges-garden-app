@extends('admin.layouts.app')
@section('content')
    <div class="grid-container">
        <div class="grid-x align-middle">
            <table class="hover stack padding-top-3">
                <thead class="thead-dark">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tr>
                    <form method="POST" action="{{route('admin.products.update', $product)}}">
                        @method('PUT')
                        @csrf
                        <td class="text-center"><input type="text" name="name" value="{{$product->name}}"></td>
                        <td class="text-center"><textarea name="description" rows="5" cols="50">{{$product->description}}</textarea></td>
                        <td class="text-center"><input type="number" name="price" value="{{$product->price}}"></td>
                        <td>
                            <div class="form-group text-center">
                                <span> <a href="{{route('admin.products.showImage', $product)}}">Click to edit image </a></span>
                            </div>
                        </td>
                        <td class="text-center">
                            <select name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"@if($category == $product->category) selected="selected" @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <td class="text-center">
                                <button class="button button-primary" type="submit">Update</button>
                        </form>
                        <form method="POST" action="{{route('admin.products.destroy', $product)}}">
                            @method('DELETE')
                            @csrf
                            <button class="button button-primary" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            </table>
            @if($errors->any())
                <div class="callout alert">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection();
