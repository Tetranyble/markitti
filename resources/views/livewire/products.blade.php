<main id="content" role="main">
    <!-- Breadcrumb -->
    <div class="bg-light">
        <div class="container py-4">
            <div class="row">
                <div class="col-sm">
                    <h4 class="mb-0">Products Grid</h4>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <!-- Breadcrumb -->
{{--                    <nav aria-label="breadcrumb">--}}
{{--                        <ol class="breadcrumb mb-0">--}}
{{--                            <li class="breadcrumb-item">--}}
{{--                                <a href="index.html">Shop</a>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb-item">--}}
{{--                                <a href="products-grid.html">Products</a>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">Grid</li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}
                    <!-- End Breadcrumb -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Card Grid -->
    <div class="container content-space-t-1 content-space-t-md-2 content-space-b-2 content-space-b-lg-3">
        <div class="row">
            <div class="col-lg-3">
                <!-- Navbar -->
                <div class="navbar-expand-lg mb-5">
                    <!-- Navbar Toggle -->
                    <div class="d-grid">
                        <button type="button" class="navbar-toggler btn btn-white mb-3" data-bs-toggle="collapse" data-bs-target="#navbarVerticalNavMenu" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarVerticalNavMenu">
                <span class="d-flex justify-content-between align-items-center">
                  <span class="text-dark">Filter</span>

                  <span class="navbar-toggler-default">
                    <i class="bi-list"></i>
                  </span>

                  <span class="navbar-toggler-toggled">
                    <i class="bi-x"></i>
                  </span>
                </span>
                        </button>
                    </div>
                    <!-- End Navbar Toggle -->

                    <!-- Navbar Collapse -->
                    <div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
                        <div class="w-100">
                            <!-- Form -->
                            <form>
                                <div class="border-bottom pb-4 mb-4">
                                    <h5>Category</h5>

                                    <div class="d-grid gap-2">
                                        <!-- Checkboxes -->
                                        @forelse($categories->take(2) as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" wire:model="category" type="checkbox" value="{{ $category->id }}" id="{{ $category->id }}"

                                            >
                                            <label class="form-check-label d-flex" for="{{ $category->id }}">{{ $category->name }}<span class="ms-auto"></span></label>
                                        </div>
                                        @empty
                                          <div>No records yet</div>
                                        @endforelse
                                        <!-- End Checkboxes -->
                                    </div>

                                    <!-- View More - Collapse -->
                                    <div class="collapse" id="collapseCategory">
                                        <div class="d-grid gap-2">
                                            <!-- Checkboxes -->
                                            @forelse($categories->slice(2) as $category)
                                                <div class="form-check">
                                                    <input class="form-check-input" wire:model="category" type="checkbox" value="{{ $category->id }}" id="{{ $category->id }}"

                                                    >
                                                    <label class="form-check-label d-flex" for="{{ $category->id }}">{{ $category->name }}<span class="ms-auto"></span></label>
                                                </div>
                                            @empty
                                                <div></div>
                                        @endforelse
                                            <!-- End Checkboxes -->
                                        </div>
                                    </div>
                                    <!-- End View More - Collapse -->

                                    <!-- Link -->
                                    <a class="link-sm link-collapse" href="#collapseCategory" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseCategory">
                                        <span class="link-collapse-default">View more</span>
                                        <span class="link-collapse-active">View less</span>
                                    </a>
                                    <!-- End Link -->
                                </div>

{{--                                <div class="border-bottom pb-4 mb-4">--}}
{{--                                    <h5>Rating</h5>--}}

{{--                                    <div class="d-grid gap-2">--}}
{{--                                        <!-- Checkboxes -->--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" value="" id="1starCheckbox">--}}
{{--                                            <label class="form-check-label" for="1starCheckbox">--}}
{{--                          <span class="d-flex gap-1">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">--}}
{{--                            (3)--}}
{{--                          </span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <!-- End Checkboxes -->--}}

{{--                                        <!-- Checkboxes -->--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" value="" id="2starCheckbox">--}}
{{--                                            <label class="form-check-label" for="2starCheckbox">--}}
{{--                          <span class="d-flex gap-1">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">--}}
{{--                            (10)--}}
{{--                          </span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <!-- End Checkboxes -->--}}

{{--                                        <!-- Checkboxes -->--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" value="" id="3starCheckbox">--}}
{{--                                            <label class="form-check-label" for="3starCheckbox">--}}
{{--                          <span class="d-flex gap-1">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">--}}
{{--                            (3)--}}
{{--                          </span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <!-- End Checkboxes -->--}}

{{--                                        <!-- Checkboxes -->--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" value="" id="4starCheckbox">--}}
{{--                                            <label class="form-check-label" for="4starCheckbox">--}}
{{--                          <span class="d-flex gap-1">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">--}}
{{--                            (34)--}}
{{--                          </span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <!-- End Checkboxes -->--}}

{{--                                        <!-- Checkboxes -->--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" value="" id="5starCheckbox">--}}
{{--                                            <label class="form-check-label" for="5starCheckbox">--}}
{{--                          <span class="d-flex gap-1">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">--}}
{{--                            (120)--}}
{{--                          </span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <!-- End Checkboxes -->--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="d-grid">
                                    <button type="button" wire:click="clearAll()" class="btn btn-white btn-transition">Clear all</button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
                <!-- End Navbar -->
            </div>
            <!-- End Col -->

            <div class="col-lg-9">
                <div class="row align-items-center mb-5">
                    <div class="col-sm mb-3 mb-sm-0">
                        <h6 class="mb-0">{{ $productCount }} products</h6>
                    </div>

                    <div class="col-sm-auto">
                        <div class="d-sm-flex justify-content-sm-end align-items-center">
                            <!-- Select -->
                            <div class="mb-2 mb-sm-0 me-sm-2">
                                <input wire:model.debounce.300ms="search" class="form-control input-sm" placeholder="search products" />
                            </div>
                            <!-- End Select -->

                            <!-- Select -->
                            <div class="mb-2 mb-sm-0 me-sm-2">
                                <select wire:model="sortAsc" class="form-select form-select-sm">
                                    <option value="true" selected>A-to-Z</option>
                                    <option  value="false">Z-to-A</option>
                                </select>
                            </div>
                            <!-- End Select -->

                            <!-- Nav -->
{{--                            <ul class="nav nav-segment">--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link active" href="products-grid.html">--}}
{{--                                        <i class="bi-grid-fill"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="products-list.html">--}}
{{--                                        <i class="bi-list"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                            <!-- End Nav -->
                        </div>
                    </div>
                </div>
                <!-- End Row -->

                <div class="row row-cols-sm-2 row-cols-md-3 mb-10">
                    @forelse($products as $product)
                    <div class="col mb-4">
                        <!-- Card -->
                        <div class="card card-bordered shadow-none text-center h-100">
                            <div class="card-pinned">
                                <img class="card-img-top" src="{{ $product->resource?->filename }}" alt="{{ $product->name }}">
                                @if(!$product->isInStock())
                                    <div class="card-pinned-top-start">
                                        <span class="badge bg-danger rounded-pill">Out of stock</span>
                                    </div>
                                @endif

                                @if($product->isNew() && $product->isInStock())
                                <div class="card-pinned-top-start">
                                    <span class="badge bg-success rounded-pill">New arrival</span>
                                </div>
                                @endif



                                <div class="card-pinned-top-end">
                                    <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later">
                                        <i class="bi-heart"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="mb-2">
                                    <a class="link-sm link-secondary" href="{{ route('products.index', ['category' => $product->category->id ]) }}">{{ $product->category->name }}</a>
                                </div>

                                <h4 class="card-title">
                                    <a class="text-dark" href="{{ route('products.show') }}">{{ $product->name }}</a>
                                </h4>
                                <p class="card-text text-dark">{{ $product->discounted_price }}</p>
                            </div>

                            <div class="card-footer pt-0">
                                <!-- Rating -->
                                <livewire:rating :product="$product" :key="$product->id"/>
                                <!-- End Rating -->

                                <button type="button" class="btn btn-outline-primary btn-sm rounded-pill">Add to cart</button>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    @empty
                        <div></div>
                    @endforelse
                    <!-- End Col -->

                </div>
                <!-- End Row -->

                <!-- Pagination -->
               {{ $products->links('admin.paginations.classic') }}
                <!-- End Pagination -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Card Grid -->

    <!-- Subscribe -->
    <div class="bg-light">
        <div class="container content-space-2">
            <div class="w-md-75 w-lg-50 text-center mx-md-auto">
                <div class="row justify-content-lg-between">
                    <!-- Heading -->
                    <div class="mb-5">
                        <span class="text-cap">Subscribe</span>
                        <h2>Get the latest from Front</h2>
                    </div>
                    <!-- End Heading -->

                    <form>
                        <!-- Input Card -->
                        <div class="input-card input-card-pill input-card-sm border mb-3">
                            <div class="input-card-form">
                                <label for="subscribeForm" class="form-label visually-hidden">Enter email</label>
                                <input type="text" class="form-control form-control-lg" id="subscribeForm" placeholder="Enter email" aria-label="Enter email">
                            </div>
                            <button type="button" class="btn btn-primary btn-lg rounded-pill">Subscribe</button>
                        </div>
                        <!-- End Input Card -->
                    </form>

                    <p class="small">You can unsubscribe at any time. Read our <a href="#">privacy policy</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe -->

    <!-- Clients -->
    <div class="container content-space-2">
        <div class="row">
            <div class="col text-center py-3">
                <img class="avatar avatar-lg avatar-4x3" src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/brands/hollister-dark.svg" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col text-center py-3">
                <img class="avatar avatar-lg avatar-4x3" src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/brands/levis-dark.svg" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col text-center py-3">
                <img class="avatar avatar-lg avatar-4x3" src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/brands/new-balance-dark.svg" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col text-center py-3">
                <img class="avatar avatar-lg avatar-4x3" src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/brands/puma-dark.svg" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col text-center py-3">
                <img class="avatar avatar-lg avatar-4x3" src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/brands/nike-dark.svg" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col text-center py-3">
                <img class="avatar avatar-lg avatar-4x3" src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/brands/tnf-dark.svg" alt="Logo">
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Clients -->
</main>
