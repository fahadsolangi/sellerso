    <nav class="navbar st-navbar navbar-fixed-top">
      <div class="container-fluid">
              <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#st-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="st-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <i class="fa fa-angle-down"></i></a>
                                  <ul class="dropdown-menu">
                                   <?php
                                      $category = Helper::getImageWithData('category','id','',"is_active=1",0,'order by id asc limit 20');
                                    ?>
                                    @foreach ($category as $cat)
                                      <li><a href="{{ url('product-listing/'.$cat->slug) }}">{{ $cat->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pricing <i class="fa fa-angle-down"></i></a>
                                  <ul class="dropdown-menu">
                                    <li><a href="{{ route('freetrail') }}">Free Trial</a></li>
                                    <li><a href="{{ route('subscription') }}">Subscription</a></li>
                                    <li><a href="{{ route('otp') }}">One Time Purchase</a></li>
                                  </ul>
                                </li>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                                <li><a href="{{ route('contactus') }}">Contact Us</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('listapp') }}">List your App</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
      </div>
        </nav>