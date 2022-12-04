<x-classic.layout>
    <main id="content" role="main">
        <!-- Hero -->
        <div class="position-relative">
            <!-- Swiper Main Slider -->
            <div class="js-swiper-shop-classic-hero swiper bg-light">
                <div class="swiper-wrapper">
                    <!-- Slide -->
                    @forelse($products as $product)
                    <div class="swiper-slide">
                        <!-- Container -->
                        <div class="container content-space-t-2 content-space-b-3">
                            <div class="row align-items-lg-center">
                                <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                                    <div class="mb-6">
                                        <h1 class="display-4 mb-4">{{ $product->name }}</h1>
                                        <p>{{ $product->description }}</p>
                                    </div>

                                    <div class="d-flex gap-2">
                                        <a class="btn btn-primary rounded-pill" href="#">{{ $product->discounted_price }}</a>
                                        <a class="btn btn-outline-primary btn-icon rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later">
                                            <i class="bi-heart-fill"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="col-lg-6 order-lg-1">
                                    <div class="w-75 mx-auto">
                                        <img class="img-fluid" src="{{ $product->banner()?->filename }}" alt="{{ $product->name }}">
                                    </div>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                        <!-- End Container -->
                    </div>
                    <!-- End Slide -->
                    @empty
                    <!-- Slide -->
                    <div class="swiper-slide">
                        <!-- Container -->
                        <div class="container content-space-t-2 content-space-b-3">
                            <div class="row align-items-lg-center">
                                <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                                    <div class="mb-6">
                                        <h2 class="display-4 mb-4">Your Store is empty</h2>
                                        <p>Please stock your store with products</p>
                                    </div>

                                    <div class="d-flex gap-2">
                                        <a class="btn btn-primary rounded-pill" href="#">Go Dashboard</a>
                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="col-lg-6 order-lg-1">
                                    <div class="w-75 mx-auto">
                                        <img class="img-fluid" src="#" alt="Dashboard Image">
                                    </div>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                        <!-- End Container -->
                    </div>
                    <!-- End Slide -->
                    @endforelse
                </div>

                <!-- Arrows -->
                <div class="js-swiper-shop-classic-hero-button-next swiper-button-next"></div>
                <div class="js-swiper-shop-classic-hero-button-prev swiper-button-prev"></div>
            </div>
            <!-- End Swiper Main Slider -->

            <!-- Swiper Thumbs Slider -->
            <div class="position-absolute bottom-0 start-0 end-0 mb-3">
                <div class="js-swiper-shop-hero-thumbs swiper" style="max-width: 13rem;">
                    <div class="swiper-wrapper">
                    @forelse($products as $product)
                        <!-- Slide -->
                        <div class="swiper-slide">
                            <a class="js-swiper-thumb-progress swiper-thumb-progress-avatar" href="javascript:;" tabindex="0">
                                <img class="swiper-thumb-progress-avatar-img" src="{{ $product->banner()?->filename }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <!-- End Slide -->
                    @empty
                        <!-- Slide -->
                        <div class="swiper-slide">
                            <a class="js-swiper-thumb-progress swiper-thumb-progress-avatar" href="javascript:;" tabindex="0">
                                <img class="swiper-thumb-progress-avatar-img" src="../assets/img/160x160/img14.jpg" alt="Dashboard">
                            </a>
                        </div>
                    @endforelse
                        <!-- End Slide -->
                    </div>
                </div>
            </div>
            <!-- End Swiper Thumbs Slider -->
        </div>
        <!-- End Hero -->

        <!-- Icon Blocks -->
        <div class="border-bottom">
            <div class="container content-space-2">
                <div class="row">
                    @forelse($home->features as $feature)
                    <div class="col-md-4 mb-7 mb-md-0">
                        <!-- Icon Block -->
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img class="avatar avatar-4x3" src="{{ asset($feature->icon) }}" alt="{{ $feature->name }}">
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <h4 class="mb-1">{{ $feature->name }}</h4>
                                <p class="small mb-0">{{ $feature->description }}</p>
                            </div>
                        </div>
                        <!-- End Icon Block -->
                    </div>
                    <!-- End Col -->
                    @empty
                        " "
                    @endforelse
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Icon Blocks -->


        <!-- Card Grid -->
        <div class="container content-space-2 content-space-lg-3">
            <!-- Heading -->
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <h2>The better way to shop with Front top-products</h2>
            </div>
            <!-- End Heading -->

            <div class="row mb-2">
                @forelse($categories as $cat)
                <div class="col-sm-6 col-md-4 mb-4">
                    <!-- Card -->
                    <div class="card card-bordered shadow-none overflow-hidden">
                        <div class="card-body d-flex align-items-center border-bottom p-0">
                                @if($cat->products[0])
                                <div class="w-65 border-end">
                                    <img class="img-fluid" src="{{ $cat->products[0]->resources->first()?->filename }}"
                                         alt="{{ $cat->products[0]?->name }}">
                                </div>
                                @endif
                            <div class="w-35">
                                @if($cat->products[1])
                                <div class="border-bottom">
                                    <img class="img-fluid" src="{{ $cat->products[1]->resources->first()?->filename }}"
                                         alt="{{ $cat->products[1]?->name }}">
                                </div>
                                @endif

                                @if($cat->products[2])
                                <img class="img-fluid" src="{{ $cat->products[2]->resources->first()?->filename  }}"
                                         alt="{{ $cat->products[2]?->name }}">
                                @endif
                            </div>

                        </div>

                        <div class="card-footer text-center">
                            <h3 class="card-title">{{ $cat->name }}</h3>
                            <p class="card-text text-muted small">{{ $cat->products[0]->discounted_price}}</p>
                            <a class="btn btn-outline-primary btn-sm btn-transition rounded-pill px-6"
                               href="{{ route('products.index', ['category[]' => $cat->id ]) }}">View all</a>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->
                @empty
                    " "
                @endforelse

            </div>
            <!-- End Row -->

            <div class="text-center">
                <p class="small">Limited time only, while stocks last.</p>
            </div>
        </div>
        <!-- End Card Grid -->

        <!-- Card Grid -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <!-- Card -->
                    <div class="card card-lg bg-img-start" style="background-image: url(../assets/img/900x900/img3.jpg); min-height: 30rem;">
                        <div class="card-body">
                            <span class="card-subtitle text-danger">Limited time only</span>
                            <h2 class="card-title display-4">70% OFF</h2>

                            <div class="w-md-65">
                                <!-- Countdown -->
                                <div class="js-countdown row mb-5">
                                    <div class="col-4 text-center">
                                        <div class="border border-dark rounded-2 p-2 mb-1">
                                            <span class="js-cd-days h2"></span>
                                        </div>

                                        <h5 class="card-title">Days</h5>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-4 text-center">
                                        <div class="border border-dark rounded-2 p-2 mb-1">
                                            <span class="js-cd-hours h2"></span>
                                        </div>

                                        <h5 class="card-title">Hours</h5>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-4 text-center">
                                        <div class="border border-dark rounded-2 p-2 mb-1">
                                            <span class="js-cd-minutes h2"></span>
                                        </div>

                                        <h5 class="card-title">Mins</h5>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-4 d-none text-center">
                                        <div class="border border-dark rounded-2 p-2 mb-1">
                                            <span class="js-cd-seconds h2"></span>
                                        </div>

                                        <h5 class="card-title">Sec</h5>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>

                            <a class="btn btn-light btn-sm btn-transition rounded-pill px-6" href="#">Shop</a>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-md-6">
                    <!-- Card -->
                    <div class="card card-lg bg-img-start" style="background-image: url(../assets/img/900x900/img4.jpg); min-height: 30rem;">
                        <div class="card-body">
                            <div class="mb-4">
                                <h2 class="card-title text-white">$109.99</h2>
                                <h3 class="card-title text-white">Nakto 26 Bicycle</h3>
                                <p class="card-text text-white">NAKTO bicycles to save the environment and bring fun to our friends!</p>
                            </div>

                            <a class="btn btn-light btn-sm btn-transition rounded-pill px-6" href="#">Shop</a>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>
        <!-- End Card Grid -->

        <!-- Card Grid -->
        <div class="container content-space-2 content-space-lg-3">
            <!-- Title -->
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <h2>What's trending</h2>
            </div>
            <!-- End Title -->

            <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mb-3">
                <div class="col mb-4">
                    <!-- Card -->
                    <div class="card card-bordered shadow-none text-center h-100">
                        <div class="card-pinned">
                            <img class="card-img-top" src="../assets/img/300x180/img3.jpg" alt="Image Description">

                            <div class="card-pinned-top-start">
                                <span class="badge bg-success rounded-pill">New arrival</span>
                            </div>

                            <div class="card-pinned-top-end">
                                <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later">
                                    <i class="bi-heart"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mb-1">
                                <a class="link-sm link-secondary" href="#">Accessories</a>
                            </div>
                            <a class="text-body" href="product-overview.html">Herschel backpack in dark blue</a>
                            <p class="card-text text-dark">$56.99</p>
                        </div>

                        <div class="card-footer pt-0">
                            <!-- Rating -->
                            <a class="d-inline-flex align-items-center mb-3" href="#">
                                <div class="d-flex gap-1 me-2">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                </div>
                                <span class="small">0</span>
                            </a>
                            <!-- End Rating -->

                            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill">Add to cart</button>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col mb-4">
                    <!-- Card -->
                    <div class="card card-bordered shadow-none text-center h-100">
                        <div class="card-pinned">
                            <img class="card-img-top" src="../assets/img/300x180/img1.jpg" alt="Image Description">

                            <div class="card-pinned-top-end">
                                <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later">
                                    <i class="bi-heart"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mb-1">
                                <a class="link-sm link-secondary" href="#">Clothing</a>
                            </div>
                            <a class="text-body" href="product-overview.html">Front hoodie</a>
                            <p class="card-text text-dark">$91.88</p>
                        </div>

                        <div class="card-footer pt-0">
                            <!-- Rating -->
                            <a class="d-inline-flex align-items-center mb-3" href="#">
                                <div class="d-flex gap-1 me-2">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                </div>
                                <span class="small">40</span>
                            </a>
                            <!-- End Rating -->

                            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill">Add to cart</button>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col mb-4">
                    <!-- Card -->
                    <div class="card card-bordered shadow-none text-center h-100">
                        <div class="card-pinned">
                            <img class="card-img-top" src="../assets/img/300x180/img4.jpg" alt="Image Description">

                            <div class="card-pinned-top-start">
                                <span class="badge bg-danger rounded-pill">Out of stock</span>
                            </div>

                            <div class="card-pinned-top-end">
                                <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later">
                                    <i class="bi-heart"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mb-1">
                                <a class="link-sm link-secondary" href="#">Accessories</a>
                            </div>
                            <a class="text-body" href="product-overview.html">Herschel backpack in gray</a>
                            <p class="card-text text-dark">$29.99 <span class="text-body ms-1"><del>$33.99</del></span></p>
                        </div>

                        <div class="card-footer pt-0">
                            <!-- Rating -->
                            <a class="d-inline-flex align-items-center mb-3" href="#">
                                <div class="d-flex gap-1 me-2">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                </div>
                                <span class="small">125</span>
                            </a>
                            <!-- End Rating -->

                            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill">Add to cart</button>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col mb-4">
                    <!-- Card -->
                    <div class="card card-bordered shadow-none text-center h-100">
                        <div class="card-pinned">
                            <img class="card-img-top" src="../assets/img/300x180/img6.jpg" alt="Image Description">

                            <div class="card-pinned-top-end">
                                <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later">
                                    <i class="bi-heart"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mb-1">
                                <a class="link-sm link-secondary" href="#">Clothing</a>
                            </div>
                            <a class="text-body" href="product-overview.html">Front Originals adicolor t-shirt with trefoil logo</a>
                            <p class="card-text text-dark">$38.00</p>
                        </div>

                        <div class="card-footer pt-0">
                            <!-- Rating -->
                            <a class="d-inline-flex align-items-center mb-3" href="#">
                                <div class="d-flex gap-1 me-2">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                </div>
                                <span class="small">9</span>
                            </a>
                            <!-- End Rating -->

                            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill">Add to cart</button>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col mb-4">
                    <!-- Card -->
                    <div class="card card-bordered shadow-none text-center h-100">
                        <div class="card-pinned">
                            <img class="card-img-top" src="../assets/img/300x180/img7.jpg" alt="Image Description">

                            <div class="card-pinned-top-end">
                                <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later">
                                    <i class="bi-heart"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mb-1">
                                <a class="link-sm link-secondary" href="#">Accessories</a>
                            </div>
                            <a class="text-body" href="product-overview.html">Front mesh baseball cap with signature logo</a>
                            <p class="card-text text-dark">$8.8</p>
                        </div>

                        <div class="card-footer pt-0">
                            <!-- Rating -->
                            <a class="d-inline-flex align-items-center mb-3" href="#">
                                <div class="d-flex gap-1 me-2">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                </div>
                                <span class="small">9</span>
                            </a>
                            <!-- End Rating -->

                            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill">Add to cart</button>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col mb-4">
                    <!-- Card -->
                    <div class="card card-bordered shadow-none text-center h-100">
                        <div class="card-pinned">
                            <img class="card-img-top" src="../assets/img/300x180/img2.jpg" alt="Image Description">

                            <div class="card-pinned-top-end">
                                <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later">
                                    <i class="bi-heart"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mb-1">
                                <a class="link-sm link-secondary" href="#">Clothing</a>
                            </div>
                            <a class="text-body" href="product-overview.html">Front Originals adicolor t-shirt in gray</a>
                            <p class="card-text text-dark">$24</p>
                        </div>

                        <div class="card-footer pt-0">
                            <!-- Rating -->
                            <a class="d-inline-flex align-items-center mb-3" href="#">
                                <div class="d-flex gap-1 me-2">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                </div>
                                <span class="small">0</span>
                            </a>
                            <!-- End Rating -->

                            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill">Add to cart</button>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col mb-4">
                    <!-- Card -->
                    <div class="card card-bordered shadow-none text-center h-100">
                        <div class="card-pinned">
                            <img class="card-img-top" src="../assets/img/300x180/img5.jpg" alt="Image Description">

                            <div class="card-pinned-top-end">
                                <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later">
                                    <i class="bi-heart"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mb-1">
                                <a class="link-sm link-secondary" href="#">Clothing</a>
                            </div>
                            <a class="text-body" href="product-overview.html">COLLUSION Unisex mechanic print t-shirt</a>
                            <p class="card-text text-dark">$43.99</p>
                        </div>

                        <div class="card-footer pt-0">
                            <!-- Rating -->
                            <a class="d-inline-flex align-items-center mb-3" href="#">
                                <div class="d-flex gap-1 me-2">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                </div>
                                <span class="small">35</span>
                            </a>
                            <!-- End Rating -->

                            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill">Add to cart</button>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col mb-4">
                    <!-- Card -->
                    <div class="card card-bordered shadow-none text-center h-100">
                        <div class="card-pinned">
                            <img class="card-img-top" src="../assets/img/300x180/img8.jpg" alt="Image Description">

                            <div class="card-pinned-top-end">
                                <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later">
                                    <i class="bi-heart"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mb-1">
                                <a class="link-sm link-secondary" href="#">Accessories</a>
                            </div>
                            <a class="text-body" href="product-overview.html">Billabong Walled snapback in green</a>
                            <p class="card-text text-dark">$12.00</p>
                        </div>

                        <div class="card-footer pt-0">
                            <!-- Rating -->
                            <a class="d-inline-flex align-items-center mb-3" href="#">
                                <div class="d-flex gap-1 me-2">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                    <img src="https://htmlstream.com/preview/front-v4.2/html/assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                                </div>
                                <span class="small">35</span>
                            </a>
                            <!-- End Rating -->

                            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill">Add to cart</button>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

            <div class="text-center">
                <a class="btn btn-outline-primary btn-transition rounded-pill" href="#">View all products</a>
            </div>
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
</x-classic.layout>


