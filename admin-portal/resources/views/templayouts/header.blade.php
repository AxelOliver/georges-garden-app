<div id="offcanvas-full-screen" class="offcanvas-full-screen" data-off-canvas data-transition="overlap">
    <div class="offcanvas-full-screen-inner">
        <button class="offcanvas-full-screen-close" aria-label="Close menu" type="button" data-close>
            <span aria-hidden="true">&times;</span>
        </button>

        <ul class="offcanvas-full-screen-menu">
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="{{route('shop')}}">Shop</a></li>
            <li><a href="{{route('about')}}">About us</a></li>
            <li><a href="{{route('contact')}}">Contact us</a></li>
        </ul>
    </div>
</div>
<!-- Start Top Bar -->
<div class="title-bar" data-responsive-toggle="top-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle="offcanvas-full-screen"></button>
    <div class="title-bar-title">Menu</div>
</div>
<div class="top-bar" id="top-menu">
    <div class="top-bar-left">
        <ul class="dropdown vertical medium-horizontal menu" data-dropdown-menu>
            <li class="menu-text">Georges Plant Shop</li>
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="{{route('shop')}}">Shop</a></li>
            <li><a href="{{route('about')}}">About us</a></li>
            <li><a href="{{route('contact')}}">Contact us</a></li>
        </ul>
    </div>
</div>
