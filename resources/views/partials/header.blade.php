<header class="section-header">
    <section class="header-main shadow-sm bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <a href="/index" class="brand-wrap mb-0">
                        <img src="{{ asset('img/rapidodo-logo.png') }}" class="img-fluid p-1" alt="Rapidodo Logo">
                    </a>
                </div>
                <div class="col-8">
                    <div class="d-flex align-items-center justify-content-end pe-5">
                        <a href="/offers" class="widget-header me-4 text-white btn bg-primary m-none">
                            <div class="icon d-flex align-items-center">
                                <i class="feather-disc h6 me-2 mb-0"></i> <span>Offers</span>
                            </div>
                        </a>
                        <div class="dropdown me-4 m-none">
                            <a href="#" class="dropdown-toggle text-dark py-3 d-block" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img alt="#" src="https://ui-avatars.com/api/?name={{ $user->name }}" class="img-fluid rounded-circle header-user me-2 header-user"> {{ $user->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/profile">Profile</a>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                                <!-- Hidden Logout Form -->
                                <form id="logout-form" action="{{ route('signout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <a href="checkout.html" class="widget-header me-4 text-dark">
                            <div class="icon d-flex align-items-center">
                                <i class="feather-shopping-cart h6 me-2 mb-0"></i> <span>Cart</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>