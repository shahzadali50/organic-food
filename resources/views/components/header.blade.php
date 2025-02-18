 <!-- Navbar Start -->
 <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
     <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
         <div class="col-lg-6 px-5 text-start">

             {{-- address --}}
             <small><i class="fa fa-map-marker-alt me-2"></i>103 Street, TBZ, Sahiwal</small>
             <small class="ms-4"><i class="fa fa-envelope me-2"></i>Email@example.com</small>
         </div>
         <div class="col-lg-6 px-5 text-end">
             <small>Follow us:</small>
             <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
             <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
             <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
             <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
         </div>
     </div>

     <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
         <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0">
             <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">OO</span>D</h1>
         </a>
         <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
             <div class="navbar-nav ms-auto p-4 p-lg-0">
                 <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                 <a href="{{ route('about.us') }}" class="nav-item nav-link">About Us</a>
                 <a href="{{ route('products') }}" class="nav-item nav-link">Products</a>
                 <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                     <div class="dropdown-menu m-0">

                         <a href="{{ route('features') }}" class="dropdown-item">Our Features</a>
                         <a href="{{ route('testimonial') }}" class="dropdown-item">Testimonial</a>
                         {{-- <a href="{{ route('404') }}" class="dropdown-item">404 Page</a> --}}
                         {{-- <a href="{{ route('cart') }}" class="dropdown-item">Cart</a> --}}
                     </div>
                 </div>
                 <a href="{{ route('contact.us') }}" class="nav-item nav-link">Contact Us</a>
                 @if (Route::has('login'))
                 @auth

                 <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                         {{ Auth::user()->name }}</a>
                     <div class="dropdown-menu m-0">
                         {{-- <a href="{{ route('profile.show') }}" class="dropdown-item">Profile</a> --}}
                         <form method="POST" action="{{ route('logout') }}">
                             @csrf
                             <a href="{{ route('logout') }}" class="dropdown-item"
                                 onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                         </form>
                     </div>
                 </div>
                 {{-- <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                 </button>
                 <div class="dropdown-menu">
                     <a href="{{ route('profile.show') }}" class="dropdown-item">Profile</a>
                     <form method="POST" action="{{ route('logout') }}">
                         @csrf
                         <a href="{{ route('logout') }}" class="dropdown-item"
                             onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                     </form>
                 </div>
             </div> --}}

             @else
             <a href="{{ route('login') }}" class="nav-item nav-link">Log in</a>

             @if (Route::has('register'))
             <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
             @endif
             @endauth
             {{-- </div> --}}
             @endif

         </div>
         <div class="d-none d-lg-flex ms-2">

             <a class="btn-sm-square bg-white rounded-circle ms-3" href="{{ route('cart') }}">

                 <small> <i class="fa fa-shopping-cart text-dark" aria-hidden="true"></i></small>

             </a>
         </div>
 </div>
 </nav>
 </div>
 <!-- Navbar End -->
