<aside class="sidebar">

<div class="scrollbar-inner">

	<div class="user">

		<div class="user__info" data-toggle="dropdown">

			<img class="user__img" src="{{asset('admin/demo/img/profile-pics/8.jpg')}}" alt="">

			<div>

				<div class="user__name">{{Auth::user()->name}}</div>

				<div class="user__email">{{Auth::user()->email}}</div>

			</div>

		</div>



		<div class="dropdown-menu">

			<!-- <a class="dropdown-item" href="#">View Profile</a>

			<a class="dropdown-item" href="#">Settings</a> -->

			<a class="dropdown-item" href="{{route('supplier.updatepass')}}">Change Password</a>

			<a class="dropdown-item" href="{{route('supplier.logout')}}">Logout</a>

		</div>

	</div>



	<ul class="navigation">

		<li class="{{Route::currentRouteName()=='supplier.panel'?'navigation__active':''}}"><a href="{{route('supplier.panel')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>

		<li><a target="_blank" href="{{route('home')}}"><i class="zmdi zmdi-globe"></i> Visit Website</a></li>
		@if($user->is_active != 0)
		<li class="{{Route::currentRouteName()=='supplier.products'?'navigation__active':''}}"><a href="{{route('supplier.products')}}"><i class="zmdi zmdi-view-list-alt"></i> Software Listing</a></li>

			{{-- <li class="{{Route::currentRouteName()=='supplier.category.addition'?'navigation__active':''}}"><a href="{{route('supplier.category.addition')}}"><i class="zmdi zmdi-home"></i> Add Category</a></li> --}}

		<li class="{{Route::currentRouteName()=='supplier.product.addition'?'navigation__active':''}}"><a href="{{route('supplier.product.addition')}}"><i class="zmdi zmdi-view-comfy"></i> Add Software</a></li>

		<li class="{{Route::currentRouteName()=='supplier.package'?'navigation__active':''}}"><a href="{{route('supplier.package')}}"><i class="zmdi zmdi-view-list-alt"></i> Package Listing</a></li>

		<li class="{{Route::currentRouteName()=='supplier.package.addition'?'navigation__active':''}}"><a href="{{route('supplier.package.addition')}}"><i class="zmdi zmdi-view-comfy"></i> Add Package</a></li>

		<li class="{{Route::currentRouteName()=='supplier.package.addition'?'navigation__active':''}}"><a href="{{route('supplier.orders')}}"><i class="zmdi zmdi-view-comfy"></i> Orders</a></li>
		@endif

	<!-- 	<li class="{{Route::currentRouteName()=='supplier.size.addition'?'navigation__active':''}}"><a href="{{route('supplier.size.addition')}}"><i class="zmdi zmdi-home"></i> Add Size</a></li>

		<li class="{{Route::currentRouteName()=='supplier.color.addition'?'navigation__active':''}}"><a href="{{route('supplier.color.addition')}}"><i class="zmdi zmdi-home"></i> Add Colors</a></li>

		<li class="{{Route::currentRouteName()=='supplier.orders'?'navigation__active':''}}"><a href="{{route('supplier.orders')}}"><i class="zmdi zmdi-home"></i> Orders </a></li> -->

	</ul>

</div>

</aside>