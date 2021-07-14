@extends('layouts.app')

@section('content')
    <main>
      <div class="row text-center">
        <h2>Hot Products</h2>
        <hr>
      </div>

        <div class="row text-center">
          <p class="text-center">Check out our latest products</p>
        </div>

        <!-- Shop Items -->
        <div class="row small-up-1 medium-up-2 large-up-4 text-center">
        @forelse($products as $product)
            <div class="column">
                <img class="thumbnail" width="300" height="400" src="{{url('/images/'.$product->image)}}">
                <h5>{{$product->name}}</h5>
                <p>${{$product->price}}</p>
                <a href="#" class="button button-rounded expanded">Buy</a>
            </div>
        @empty
            <h1>All sold out! Check back soon.</h1>
        @endforelse
        </div>
    </main>
@endsection

    <script>
        jQuery(document).ready(function($){
      $(".show-more-btn").click(function(e){
        $(".show-more-item:hidden").slice(0,4).fadeIn();
        if ($(".show-more-item:hidden").length < 1) $(this).fadeOut();
      })
    })
    </script>
