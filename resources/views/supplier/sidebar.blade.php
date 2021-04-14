<div class="col-md-3 col-xs-12 col-sm-3">
	<div class="people-img list-group">
	  <a href="{{route('supplier.products')}}"s class="list-group-item {{ isset($productsMenu) ? 'active' : '' }}">Products</a>
	  <a href="{{route('supplier.product.addition')}}" class="list-group-item {{ isset($productAdditionMenu) ? 'active' : '' }}">Add Products</a>
	  <a href="{{route('supplier.panel')}}" class="list-group-item {{ isset($panelMenu) ? 'active' : '' }}">Account information</a>
	  <a href="{{route('supplier.updatepass')}}" class="list-group-item {{ isset($updateMenu) ? 'active' : '' }}">Update Password</a>
	  <a href="{{route('supplier.orders')}}" class="list-group-item {{ isset($ordersMenu) ? 'active' : '' }}">Orders Management</a>
	  <a href="{{route('supplier.logout')}}" class="list-group-item">Logout</a>
	</div>
</div>