<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Job Portal')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <header class="bg-orange-600 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center p-4">
            <h1 class="text-xl font-bold"><a href="{{ url('/') }}">Job Portal</a></h1>
            <nav>
                <ul class="flex space-x-4">
                    {{-- <li><a href="{{ route('employees.index') }}" class="hover:underline">Employees</a></li>
                    <li><a href="{{ route('job_posts.index') }}" class="hover:underline">Jobs</a></li>
                    <li><a href="{{ route('employers.index') }}" class="hover:underline">Employers</a></li> --}}
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>


</body>
</html>
