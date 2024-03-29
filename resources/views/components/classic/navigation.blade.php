<header id="header" class="navbar navbar-expand-lg navbar-end navbar-light">
    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="{{route('store.index')}}" aria-label="{{$store->name}}">
                <img class="navbar-brand-logo" src="{{asset($store->logo)}}" alt="Logo">
            </a>
            <!-- End Default Logo -->

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>
                <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
          </span>
            </button>
            <!-- End Toggler -->

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('store.index')}}">Home</a>
                    </li>

                    <!-- Dropdown -->
                    <li class="hs-has-sub-menu nav-item">
                        <a id="listingsDropdown" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Listings</a>
                        <div class="hs-sub-menu dropdown-menu" aria-labelledby="listingsDropdown" style="min-width: 14rem;">
                            <a class="dropdown-item " href="products-list.html">Listing</a>
                            <a class="dropdown-item " href="products-grid.html">Listing (Grid)</a>
                        </div>
                    </li>
                    <!-- End Dropdown -->

                    <li class="nav-item">
                        <a class="nav-link " href="product-overview.html">Product Overview</a>
                    </li>

                    <!-- Pages -->
                    <li class="hs-has-mega-menu nav-item" data-hs-mega-menu-item-options='{
                  "desktop": {
                    "position": "right",
                    "maxWidth": "27rem"
                  }
                }'>
                        <a id="pagesMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                        <!-- Mega Menu -->
                        <div class="hs-mega-menu dropdown-menu" aria-labelledby="pagesMegaMenu" style="min-width: 27rem;">
                            <div class="navbar-dropdown-menu-inner">
                                <span class="dropdown-header">Elements</span>

                                <div class="row">
                                    <div class="col-sm mb-3 mb-sm-0">
                                        <a class="dropdown-item " href="categories.html">Categories</a>
                                        <a class="dropdown-item " href="categories-sidebar.html">Categories Sidebar</a>
                                        <a class="dropdown-item " href="empty-cart.html">Empty Cart</a>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-sm">
                                        <a class="dropdown-item " href="cart.html">Cart</a>
                                        <a class="dropdown-item " href="checkout.html">Checkout</a>
                                        <a class="dropdown-item " href="order-completed.html">Order Completed</a>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>

                            <!-- Mega Menu Banner -->
                            <div class="navbar-dropdown-menu-shop-banner">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img class="navbar-dropdown-menu-shop-banner-img" src="../assets/img/mockups/img4.png" alt="Image Description">
                                    </div>

                                    <div class="flex-grow-1 p-4">
                                        <span class="h4 d-block text-primary">Win T-Shirt</span>
                                        <p>Win one of our Front brand T-shirts.</p>
                                        <a class="btn btn-sm btn-soft-primary btn-transition" href="https://htmlstream.com/preview/front-v4.2/html/index.html">Learn more <i class="bi-chevron-right small"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Mega Menu Banner -->
                        </div>
                        <!-- End Mega Menu -->
                    </li>
                    <!-- End Pages -->

                    <li class="nav-item">
                        <!-- Search -->
                        <button class="btn btn-ghost-secondary btn-sm btn-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarSearch" aria-controls="offcanvasNavbarSearch">
                            <i class="bi-search"></i>
                        </button>
                        <!-- End Search -->

                        <!-- Shopping Cart -->
                        <button type="button" class="btn btn-ghost-secondary btn-sm btn-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarEmptyShoppingCart" aria-controls="offcanvasNavbarEmptyShoppingCart">
                            <i class="bi-basket"></i>
                        </button>
                        <!-- End Shopping Cart -->

                        <button class="btn btn-primary btn-transition" type="button" data-bs-toggle="modal" data-bs-target="#signupModal">Login</button>
                    </li>
                </ul>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>
