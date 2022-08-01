<?php $categories = \App\Models\Category::with('subCategories')->get()?>

<header class="navigation">
  <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle="main-menu"></button>
    <a href="/" class="title-bar-title">Store</a>
  </div>

  <div class="top-bar" id="main-menu">
    <div class="top-bar-title show-for-medium">
      <a href="/" class="logo">Store</a>
  </div>
    <div class="top-bar-left">
      <ul class="dropdown menu vertical medium-horizontal" data-dropdown-menu>
        <li><a href="/products">Products</a></li>
        @if(count($categories))
          <li>
              <a href="/products/category">Categories</a>
              <ul class="menu vertical dropdown">
                  @foreach($categories as $category)
                      <li>
                          <a href="/products/category/{{ $category->slug }}">{{ $category->name }}</a>
                          @if(count($category->subCategories))
                              <ul class="menu vertical">
                                  @foreach($category->subCategories as $subCategory)
                                      <li>
                                          <a href="/products/category/{{ $category->slug }}/{{ $subCategory->slug }}">
                                              {{ $subCategory->name }}
                                          </a>
                                      </li>
                                  @endforeach
                              </ul>
                          @endif
                      </li>
                  @endforeach
              </ul>
          </li>
      @endif
      </ul>
    </div>
    <div class="top-bar-right">
      <ul class="dropdown menu vertical medium-horizontal">
        @if(isAuthenticated()) 
          <li><a href="/admin">{{user()->username}}  </a></li>
          <li>
            <a href="/cart"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
          </li>
          <li><a href="/logout">Logout</a></li>
        @else
          <li>
            <a href="/login">Sign In</a>
          </li>
          <li>
            <a href="/register">Register</a>
          </li>
          <li>
            <a href="/cart"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
          </li>
        @endif
        </ul>
    </div>
  </div>
</header>