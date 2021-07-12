@extends('admin.layouts.app')
@section('content')
    <div class="grid-container">
        <div class="grid-x align-middle">
            <table class="hover stack padding-top-3">
                <thead class="thead-dark">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tr>
                    <form method="POST" action="{{route('admin.categories.update', $category)}}">
                        @method('PUT')
                        @csrf
                        <td class="text-center"><input type="text" name="name" value="{{$category->name}}"></td>
                        <td class="text-center">
                            <button class="button button-primary" type="submit">Update</button>
                        </form>
                        <form method="POST" action="{{route('admin.categories.destroy', $category)}}">
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
