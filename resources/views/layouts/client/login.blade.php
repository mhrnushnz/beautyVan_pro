<!DOCTYPE html>
<html lang="fa" dir="rtl" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ورود|ثبت نام')</title>
    @vite(['resources/css/app.css', 'resources/css/client.css',])
    @livewireStyles
</head>
<body class="font_num bg-[#ededed]">

<div class="relative">{{ $slot }}</div>

@vite(['resources/js/app.js'])
@livewireScripts
</body>
