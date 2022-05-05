<header class="ltn__header-area ltn__header-5 ltn__header-transparent--- gradient-color-4---">
    <!-- ltn__header-top-area start -->
    <div class="ltn__header-top-area section-bg-6 top-area-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <li>
                                <a href="mailto:admin@ryoland.com?Subject=Flower%20greetings%20to%20you">
                                    <i class="fa-regular fa-envelope-open"></i></i> admin@ryoland.com</a>
                            </li>
                            <li>
                                <a href="locations.html">
                                    <i class="fa-regular fa-address-card"></i> 15/A, Nest Tower, NYC
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-end">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li>
                                    <div class="ltn__drop-menu ltn__currency-menu">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="dropdown-toggle">
                                                    <em class="currency-flag currency-flag-{{ \Illuminate\Support\Str::lower(currency()->getUserCurrency()) }}"></em>
                                                    <span class="active-currency"> {{ currency()->getUserCurrency() }}</span>
                                                </a>
                                                <ul>
                                                    @if(currency()->hasCurrency('USD'))
                                                        <li>
                                                            <a href="{{ url()->current() . '?currency=USD' }}">
                                                                <i class="currency-flag currency-flag-usd"></i> USD
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if(currency()->hasCurrency('EUR'))
                                                        <li>
                                                            <a href="{{ url()->current() . '?currency=EUR' }}">
                                                                <i class="currency-flag currency-flag-eur"></i> EUR
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if(currency()->hasCurrency('VND'))
                                                        <li>
                                                            <a href="{{ url()->current() . '?currency=VND' }}">
                                                                <i class="currency-flag currency-flag-vnd"></i> VND
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>

                                            <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <!-- header-top-btn -->
                                    <div class="header-top-btn">
                                        <a href="javascript:void(0)">Add Listing</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->

    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/logo-vertical-blue/fulllogo_transparent_nobuffer.png') }}" alt="logo"
                                     style="height: 60px">
                            </a>
                        </div>
                        <div class="get-support clearfix d-none">
                            <div class="get-support-icon">
                                <i class="fa-regular fa-phone"></i>
                            </div>
                            <div class="get-support-info">
                                <h6>Get Support</h6>
                                <h4><a href="tel:+84963639070">+84963639070</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li>
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('real-estate.projects.index') }}">Projects</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('real-estate.properties.index') }}">Properties</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('agents.index') }}">Agents</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('news.index') }}">News</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col ltn__header-options ltn__header-options-2 mb-sm-20">
                    <!-- header-search-1 -->
                    <div class="header-search-wrap">
                        <div class="header-search-1">
                            <div class="search-icon">
                                <em class="fa-solid fa-magnifying-glass for-search-show"></em>
                                <em class="icon-cancel fa-x for-search-close"></em>
                            </div>
                        </div>
                        <div class="header-search-1-form">
                            <form id="#" method="get"  action="#">
                                <input type="text" name="search" value="" placeholder="Search here..."/>
                                <button type="submit">
                                    <span><em class="fa-solid fa-magnifying-glass"></em></span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>
