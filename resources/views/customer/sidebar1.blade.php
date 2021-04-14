<div class="col-sm-3 sidenav1">
 <div class="list-group">
 
  <a href="{{route('customer.panel')}}" class="list-group-item {{ isset($panelMenu) ? 'active' : '' }}">Account information</a>
  <a href="{{route('customer.updatepass')}}" class="list-group-item {{ isset($updateMenu) ? 'active' : '' }}">Update Password</a>
  <!--<a href="{{route('customer.wishlist')}}" class="list-group-item {{ isset($wishlistMenu) ? 'active' : '' }}">My Wishlist</a>-->
  @if($user->is_active != 0)
  <a href="{{route('customer.orders')}}" class="list-group-item {{ isset($ordersMenu) ? 'active' : '' }}">Order Management</a>
  @endif	
  <a href="{{route('customer.logout')}}" class="list-group-item">Logout</a>
</div>
</div>