<?php $categories = \App\Models\Category::with('subCategories')->get()?>
<header class="navigation">
    <div class="title-bar toggle" data-responsive-toggle="main-menu" data-hide-for="medium">
        <button class="menu-icon float-right" type="button" data-toggle="main-menu"></button>
        <a href="/public" class="float-left small-logo">Store</a>
      </div>
      
      <div class="top-bar" id="main-menu">
        <div class="menu medium-horizontal expanded medium-text-center"
         data-responsive-menu="drilldown medium-dropdown" data-click-open="true"
         >
            <div class="top-bar-title show-for-medium">
                <a href="/public/" class="logo">Store</a>
            </div>
            <div class="top-bar-left">
                <ul class="dropdown menu vertical medium-horizontal" data-dropdown-menu>
                  <li><a href="#">Products</a></li>
                  @if(count($categories))
                    <li>
                        <a href="#">Categories</a>
                        <ul class="menu vertical sub dropdown">
                            @foreach($categories as $category)
                                <li>
                                    <a href="#">{{$category->name}}</a>
                                    @if(count($category->subCategories))
                                        <ul class="menu sub vertical">
                                           @foreach($category->subCategories as $subCategory)
                                                <li>
                                                    <a href="#">{{$subCategory->name}}</a>
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
                    <li><a href="#">{{user()->username}}  </a></li>
                    <li>
                      <a href="/public/cart"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
                    </li>
                    <li><a href="/public/logout">Logout</a></li>
                  @else
                    <li>
                      <a href="/public/login">Sign In</a>
                    </li>
                    <li>
                      <a href="/public/register">Register</a>
                    </li>
                    <li>
                      <a href="/public/cart"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
                    </li>
                  @endif
                  </ul>
              </div>
        </div>
      </div>
</header>