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
                    <form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
                        @csrf
                        <td class="text-center"><input type="text" name="name" placeholder="Product Name"></td>
                        <td class="text-center"><textarea name="description" rows="5" cols="50" placeholder="Product Description"></textarea></td>
                        <td class="text-center"><input type="number" name="price" placeholder="Product Price"></td>
                        <td>
                            <div class="form-group">
                                <label for="image">Upload Image File</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                        </td>
                        <td class="text-center">
                            <select name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="flex justify-center align-self-middle">

                            <button class="button button-primary" type="submit">Add</button>
                        </td>
                    </form>

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
@endsection()
