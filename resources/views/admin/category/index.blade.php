@extends('admin.layouts.app')
@section('content')
    <div class="grid-container">
        @if(@!empty($categories))
            <table class="hover stack padding-top-3">
                <thead class="thead-dark">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                @endif
        @forelse($categories as $category)
            <tr>
                <td class="text-center">{{$category->name}}</td>
                <td class="flex justify-center">
                    <form method="GET" action="{{route('admin.categories.show', $category)}}">
                        @csrf
                        <button class="button button-primary" type="submit">Edit</button>
                    </form>
                    <form method="POST" action="{{route('admin.categories.destroy', $category)}}">
                        @method('DELETE')
                        @csrf
                        <button class="button button-primary" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <p class="text-center">No Products found, <a href="{{route('admin.categories.create')}}">Click here to Create</a></p>
        @endforelse
        @if(@!empty($categories))
            </table>
            @endif
    </div>
    @endsection
