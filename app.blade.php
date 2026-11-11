<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CashFlow')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#458393] min-h-screen flex flex-col font-sans text-slate-800">

    @include('components.navbar')

    <main class="container mx-auto px-4 py-8 flex-grow">
        @yield('content')
    </main>

    @include('components.footer')

</body>
</html>