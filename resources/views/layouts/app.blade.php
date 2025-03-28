<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Obituary Platform')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="bg-blue-800 text-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold">Obituary Platform</a>
            <div class="space-x-4">
                <a href="{{ route('obituaries.index') }}" 
                   class="hover:bg-blue-700 px-3 py-2 rounded transition">
                    View Obituaries
                </a>
                <a href="{{ route('obituaries.create') }}" 
                   class="bg-white text-blue-800 hover:bg-gray-100 px-4 py-2 rounded font-medium transition">
                    Submit Obituary
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-8">
        <div class="container mx-auto px-4 text-center">
            <p>© {{ date('Y') }} Obituary Platform. All rights reserved.</p>
            <div class="mt-2">
                <a href="/sitemap.xml" class="text-blue-300 hover:text-white">Sitemap</a>
            </div>
        </div>
    </footer>
</body>
</html>