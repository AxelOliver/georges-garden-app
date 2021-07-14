@extends('admin.layouts.app')
@section('content')
    <div class="grid-container">
        @if(@!empty($products))
            <table class="hover stack padding-top-3">
                <thead class="thead-dark">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                @endif
        @forelse($products as $product)
            <tr>
                <td class="text-center">{{$product->name}}</td>
                <td class="text-center">{{$product->description}}</td>
                <td class="text-center">{{$product->price}}</td>
                <td class="text-center">{{$product->category->name}}</td>
                <td class="flex text-center">
                    <form method="GET" action="{{route('admin.products.show', $product)}}">
                        @csrf
                        <button class="button button-primary" type="submit">Edit</button>
                    </form>
                    <form method="POST" action="{{route('admin.products.destroy', $product)}}">
                        @method('DELETE')
                        @csrf
                        <button class="button button-primary" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <p class="text-center">No Products found, <a href="{{route('admin.products.create')}}">Click here to Create</a></p>
        @endforelse
        @if(@!empty($products))
            </table>
            @endif
    </div>
    @endsection
