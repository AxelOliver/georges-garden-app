@extends('layouts.app')
@section('content')
    <div class="orbit" role="region" aria-label="Georges Plant Pictures" data-orbit>
        <div class="orbit-wrapper">
            <div class="orbit-controls">
                <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
                <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
            </div>
            <ul class="orbit-container">
                <li class="is-active orbit-slide">
                    <figure class="orbit-figure">
                        <img class="orbit-image" src="{{ url('/images/Orbit/orbit1.png') }}" alt="Plants">
                        <figcaption class="orbit-caption text-center">Placeholder</figcaption>
                    </figure>
                </li>
                <li class="orbit-slide">
                    <figure class="orbit-figure">
                        <img class="orbit-image" src="{{ url('/images/Orbit/orbit2.jpg') }}" alt="Plants">
                        <figcaption class="orbit-caption text-center">Placeholder</figcaption>
                    </figure>
                </li>
                <li class="orbit-slide">
                    <figure class="orbit-figure">
                        <img class="orbit-image" src="{{ url('/images/Orbit/orbit3.jpg') }}" alt="Plants">
                        <figcaption class="orbit-caption text-center">Placeholder</figcaption>
                    </figure>
                </li>
                <li class="orbit-slide">
                    <figure class="orbit-figure">
                        <img class="orbit-image" src="{{ url('/images/Orbit/orbit4.jpg') }}" alt="Plants">
                        <figcaption class="orbit-caption text-center">Placeholder</figcaption>
                    </figure>
                </li>
            </ul>
        </div>
        <nav class="orbit-bullets">
            <button class="is-active" data-slide="0">
                <span class="show-for-sr">First slide details.</span>
                <span class="show-for-sr" data-slide-active-label>Current Slide</span>
            </button>
            <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
            <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
            <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
        </nav>
        <hr>
    </div>

        <div class="row text-center">
            <h2>Our Newest Products</h2>
            <hr>
        </div>

        <div class="row text-center">
            <p>Check out our latest products</p>
        </div>

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
    @endsection();

