<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/main.js')
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark:text-white">
    @component('components.header', ['type' => 'guest'])
    @endcomponent

    <div class="content">
        @yield('content')
    </div>

    @include('components.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js" defer></script>
</body>
</html>
