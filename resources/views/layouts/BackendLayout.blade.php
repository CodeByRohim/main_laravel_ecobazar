<!DOCTYPE html>

<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>@yield('title','Page')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('Backend/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('Backend/assets/vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{asset('Backend/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('Backend/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('Backend/assets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{asset('Backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('Backend/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
    @stack('css')
    {{-- @notifycss --}}
   <style>
    #laravel-notify {
      position: absolute;
      right: 0;
      height: 100px;
      width: 300px;
      z-index: 99999999;
    }
   </style>
    <script src="{{asset('Backend/assets/vendor/js/helpers.js')}}"></script>
    <script src="{{asset('Backend/assets/js/config.js')}}"></script>
  </head>

  <body>
    
      @include('notify::components.notify')
    
     <!-- Layout wrapper -->
     <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{route('dashboard')}}" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="{{asset('Frontend/assets/images/logo.svg')}}" alt="">
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{request()->routeIs('dashboard') ? 'active' : ''}}">
                <a href="{{route('dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
          
           
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li>
            {{-- {{ dd(auth()->user()->getAllPermissions()->pluck('name')) }} --}}
{{-- {{ dd() }} --}}

            {{-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Authentications</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="auth-login-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Login</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="auth-register-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Register</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Forgot Password</div>
                  </a>
                </li>
              </ul>
            </li>     --}}
             <!-- customer message -->
              <li class="menu-item {{request()->routeIs('customerMessage.*') ? 'active' : ''}}">
                <a href="{{route('customerMessage.index')}}" class="menu-link">
                <i class='menu-icon bx  bx-notification'  ></i> 
                <div data-i18n="Analytics">Customer Message</div>
              </a>
            </li>
             <!-- Banner -->
             @can('banner-manage')
              <li class="menu-item {{request()->routeIs('banner.*') ? 'active' : ''}}">
              <a href="{{route('banner.index')}}" class="menu-link">
                <i class='menu-icon bx  bx-square'  ></i> 
                <div data-i18n="Authentications">Manage Banner</div>
              </a>
            </li> 
            @endcan


            {{-- stock manegment --}}

           <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
               
              <i class=' menu-icon bx  bxs-store-alt' ></i>  
            
                <div data-i18n="Authentications" class="position-relative">Stock <span class="{{ $product->qty <= $product->alert_qty ? 'blinking-dot' : '' }}"></span></div>
              </a>
             <ul class="menu-sub">
            
          
              <li class="menu-item {{ request()->routeIs('low.stock.index') ? 'active' : '' }}">
                <a href="{{ route('low.stock.index') }}" class="menu-link" target="_blank">
                  <div data-i18n="Basic">Low Stock </div>
                </a>
              </li>
             
             </ul>
            </li> 
           
            {{-- category manegment --}}
            @can('show-category')
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon bx bxs-category-alt'></i>
                <div data-i18n="Authentications">Manage Category</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{request()->routeIs('category.*') ? 'active' : ''}}">
                  <a href="{{route('category.index')}}" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Category Title</div>
                  </a>
                </li>              
              </ul>
            </li>
            @endcan
             
           
            {{-- brand manage --}}
            @can('show-brand')
           <li class="menu-item {{request()->routeIs('brand.*') ? 'active' : ''}}">
              <a href="{{route('brand.index')}}" class="menu-link">
                <i class='menu-icon bx bx-store'></i>
                <div data-i18n="Authentications">Manage Brands</div>
              </a>
            </li> 
            @endcan
         

       {{-- @canany(['show-product','create-product']) --}}
         
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon bx  bx-shopping-bag'></i>  
                <div data-i18n="Authentications">Products</div>
              </a>
             <ul class="menu-sub">
              @can('create-product')
              <li class="menu-item {{ request()->routeIs('products.create') ? 'active' : '' }}">
                <a href="{{ route('products.create') }}" class="menu-link" target="">
                  <div data-i18n="Basic">Add Product</div>
                </a>
              </li>
           @endcan
           @can('show-product')
              <li class="menu-item {{ request()->routeIs('products.index') ? 'active' : '' }}">
                <a href="{{ route('products.index') }}" class="menu-link" target="_blank">
                  <div data-i18n="Basic">All Products</div>
                </a>
              </li>
              @endcan
             </ul>
            </li> 
 {{-- @endcanany --}}
 


 
          {{-- user manage --}}
          @can('users-manage')
             <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon bx  bx-user-check'  ></i> 
                <div data-i18n="Authentication">User Mangement</div>
              </a>
             <ul class="menu-sub">
              <li class="menu-item {{ request()->routeIs('roleAndPermission.users') ? 'active' : '' }}">
                <a href="{{ route('roleAndPermission.users') }}" class="menu-link" target="">
                  <div data-i18n="Basic">Users</div>
                </a>
              </li>

             <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <div data-i18n="Authentication">Role & Permissions</div>
              </a>
             <ul class="menu-sub">
              <li class="menu-item {{ request()->routeIs('roleAndPermission.role') ? 'active' : '' }}">
                <a href="{{ route('roleAndPermission.role') }}" class="menu-link" target="">
                  <div data-i18n="Basic">Role</div>
                </a>
              </li>

              <li class="menu-item {{request()->routeIs('permission') ? 'active' : ''}}">
                      <a href="{{route('permission')}}" class="menu-link">
                        <div data-i18n="Authentications">Permissions</div>
                      </a>
                </li> 
             </ul>
            </li> 
           
            </ul>
            </li> 
          @endcan
            {{-- user manage end --}}


          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->


              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <div class="mx-2">
                  <button class="btn shadow w-25 d-flex justify-content-center" id="toggleDark">
                <i class='bx  bx-moon bg-amber-200 text-danger'></i> 
                </button></div>
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                 <p class="my-0">{{auth()->user()->name ?? ''}}</p>
                 <p class="mb-0 text-end">{{auth()->user()->getRoleNames()->implode(', ')}}</p>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{getProfileImage()}}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{getProfileImage()}}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ auth()->user()->name}}</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                      <form id="logoutForm" method="POST" action="{{route('logout')}}">
                        @csrf
                        <input type="hidden" name="_method" value="POST">
                      </form>
                    </li>
                    
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
    <main>
      @yield('backend_dashboard')
      @yield('Categories')
      @yield('AllProducts')
      @yield('AddProduct')  
      @yield('CustomerMessage')
      @yield('Banner')
      @yield('users')

      @yield('backend')
      @yield('page403')
    </main>
 <!-- Footer -->
 <footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0">
      
      <script>
        document.write(new Date().getFullYear());
      </script>
      <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
    </div>
    <div>
      <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
      <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

      <a
        href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
        target="_blank"
        class="footer-link me-4"
        >Documentation</a
      >

      <a
        href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
        target="_blank"
        class="footer-link me-4"
        >Support</a
      >
    </div>
  </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('Backend/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('Backend/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('Backend/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('Backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('Backend/assets/vendor/js/menu.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('Backend/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src="{{asset('Backend/assets/js/main.js')}}"></script>
    <script src="{{asset('Backend/assets/js/dashboards-analytics.js')}}"></script>
    {{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    @notifyJs
    @stack('scripts')
    <script>
     // Load dark mode preference on page load
if (localStorage.getItem("theme") === "dark") {
  document.body.classList.add("dark-mode");
}

// Toggle dark mode and save preference
document.getElementById("toggleDark").addEventListener("click", function () {
  document.body.classList.toggle("dark-mode");

  if (document.body.classList.contains("dark-mode")) {
    localStorage.setItem("theme", "dark");
  } else {
    localStorage.setItem("theme", "light");
  }
});

    </script>
  </body>
</html>
