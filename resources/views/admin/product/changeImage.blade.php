@extends('admin.layouts.app')
@section('content')
    <div class="grid-container">
        <div class="grid-x align-middle">
            <table class="hover stack padding-top-3">
                <thead class="thead-dark">
                <tr>
                    <th class="text-center">Old Image</th>
                    <th>New Image</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tr>
                    <td class="text-center"><img src="{{url('/images/'.$product->image)}}"></td>
                    <form method="POST" action="{{route('admin.products.updateImage', $product)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <td>
                            <div class="form-group">
                                <label for="image">Upload Image File</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                        </td>
                        <td class="text-center">
                            <button class="button button-primary" type="submit">Update</button>
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
