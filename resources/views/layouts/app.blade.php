<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>@yield('title')</title>
    @include('includes.head')

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    @inject('categoryService', 'App\Services\CategoryService')
    @php
        $root_categories = $categoryService->rootCategories();
    @endphp
    <nav class="navbar navbar-default navbar-fixed-top">
        @include('includes.header')
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="fixed-bottom text-center">
        @include('includes.footer')
    </footer>
</body>
</html>
</head>
</html>
