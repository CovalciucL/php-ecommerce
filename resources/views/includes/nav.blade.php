<?php $categories = \App\Models\Category::with('subCategories')->get()?>

<nav class="navbar navbar-expand-lg sticky-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="text-white">Menu</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="/products">Products</a>
        </li>
        @if(count($categories))
        <li class="nav-item">
          <div class="dropdown show">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </a>
            <span></span>
            <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
              @foreach($categories as $category)
              <li class="dropdown-submenu">
                <a class="dropdown-item nav-link" href="/products/category/{{ $category->slug }}">{{ $category->name }}</a>
                <span class="dropdown-toggle"></span>
                @if(count($category->subCategories))
                  <ul class="dropdown-menu bg-dark">
                    @foreach($category->subCategories as $subCategory)
                        <li class="dropdown-item">
                            <a class="nav-link" href="/products/category/{{ $category->slug }}/{{ $subCategory->slug }}">
                                {{ $subCategory->name }}
                            </a>
                        </li>
                    @endforeach
                  </ul>
                @else
                <ul class="dropdown-menu bg-dark">
                  <li class="nav-link">
                    No Subcategory Yet
                  </li>
                </ul>
                @endif
              </li>
              @endforeach
            </ul>
          </div>
        </li>
        @endif
      </ul>
      <ul class="navbar-nav">
        @if(isAuthenticated()) 
        <li class="nav-item">
          <a class="nav-link" href="/admin">{{user()->username}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/cart">Cart<i class="fa-solid fa-cart-shopping"></i> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="/login">Sign In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/cart">Cart<i class="fa-solid fa-cart-shopping"></i></a>
        </li>
      @endif
      </ul>
    </div>
  </div>
</nav>