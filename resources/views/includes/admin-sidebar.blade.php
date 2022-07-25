<div class="off-canvas position-left reveal-for-large nav" id="offCanvas" data-off-canvas>
  <h3>Admin Panel</h3>
    
  <div class="image-holder text-center">
    <img src="#" alt="Admin photo">
    <p>{{user()->fullname}}</p>
  </div>
  <ul class="vertical menu">
      <li><a href="/public/admin"><i class="fa-solid fa-gauge-high"></i>Dashboard</a></li>
      <li><a href="/public/admin/users"><i class="fa-solid fa-users"></i>Users</a></li>
      <li><a href="/public/admin/product/create"><i class="fa-solid fa-plus"></i>Add Product</a></li>
      <li><a href="/public/admin/products"><i class="fa-solid fa-pen-to-square"></i>Manage Products</a></li>
      <li><a href="/public/admin/product/categories"><i class="fa-solid fa-down-left-and-up-right-to-center"></i>Categories</a></li>
      <li><a href="/public/admin/users/orders"><i class="fa-solid fa-cart-shopping"></i>View Orders</a></li>
      <li><a href="/public/admin/users/payments"><i class="fa-solid fa-money-bill-1"></i>Payments</a></li>
      <li><a href="/public/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a></li>
    </ul>
</div>