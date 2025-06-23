<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap 4 & FontAwesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <!-- Your app scripts and styles -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
</head>
<body class="font-sans antialiased">
    <div class="d-flex" style="min-height: 100vh;">
        <!-- Sidebar -->
        <nav class="bg-dark text-white p-3" style="width: 260px;">
            <h4 class="text-white mb-4">📦 Inventory</h4>
            <ul class="nav flex-column">

                <li class="nav-item mb-2">
                    <a href="{{ route('dashboard') }}" class="nav-link text-white">
                        <i class="fas fa-home mr-2"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="#productsSubmenu" 
                       class="nav-link text-white d-flex justify-content-between align-items-center" 
                       data-toggle="collapse" 
                       aria-expanded="false" 
                       aria-controls="productsSubmenu"
                       href="#productsSubmenu"
                    >
                        <span><i class="fas fa-box mr-2"></i> Products</span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="collapse list-unstyled pl-4" id="productsSubmenu">
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link text-white">
                                <i class="fas fa-list mr-2"></i> Product List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.create') }}" class="nav-link text-white">
                                <i class="fas fa-plus mr-2"></i> Add Product
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item mb-2">
                    <a href="#salesSubmenu" 
                       class="nav-link text-white d-flex justify-content-between align-items-center" 
                       data-toggle="collapse" 
                       aria-expanded="false" 
                       aria-controls="salesSubmenu"
                       href="#salesSubmenu"
                    >
                        <span><i class="fas fa-cart-plus mr-2"></i> Sales</span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="collapse list-unstyled pl-4" id="salesSubmenu">
                        <li class="nav-item">
                            <a href="{{ route('sales.create') }}" class="nav-link text-white">
                                <i class="fas fa-plus mr-2"></i> Create Sale
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sales.index') }}" class="nav-link text-white">
                                <i class="fas fa-list mr-2"></i> Sales List
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item mb-2">
                    <a href="{{ route('reports.index') }}" class="nav-link text-white">
                        <i class="fas fa-chart-line mr-2"></i> Reports
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('journals.index') }}" class="nav-link text-white">
                        <i class="fas fa-chart-line mr-2"></i> Journals
                    </a>
                </li>

                <li class="nav-item mt-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm w-100">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1 bg-light p-4">
            <!-- Page Header -->
            @isset($header)
                <div class="bg-white p-3 mb-4 shadow-sm rounded">
                    <h2 class="mb-0">{{ $header }}</h2>
                </div>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
            <!-- Scripts -->
             <!-- jQuery -->
             <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
             <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
         
             <!-- Bootstrap 4 JS Bundle (includes Popper.js) -->
             <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
            @stack('scripts')
        </div>
    </div>
</body>
</html>
