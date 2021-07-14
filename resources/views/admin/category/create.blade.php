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
                    <form method="POST" action="{{route('admin.categories.store')}}"">
                        @csrf
                        <td class="text-center"><input type="text" name="name" placeholder="Category Name"></td>
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
