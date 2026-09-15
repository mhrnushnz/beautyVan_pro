<!DOCTYPE html>
<html lang="fa" dir="rtl" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/css/admin.css'])
    <title>@yield('title', 'پیشخوان')</title>
</head>
<body>
<div>
    <!--  شروع هدر   -->
    <livewire:admin.layout.navbar/>


    <div class="flex relative">
        <!-- نوار داشبورد -->
        <livewire:admin.layout.sidebar/>

        <!-- کانتینر صفحات -->
        <div class="lg:w-[80%] md:w-[75%] w-full py-8 lg:px-8 md:px-4 px-8 absolute sm:top-14 top-8 end-0">
            {{ $slot }}
        </div>
    </div>
</div>

{{--اسکریپت الرت وقتی صفحه عوض شد مدال الرت همچنان نماش داده بشه--}}
@if(session('toast'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.dispatchEvent(
                new CustomEvent('toast', {
                    detail: @json(session('toast'))
                })
            );
        });
    </script>
@endif
@if(session('modal_alert'))
    <script>
        requestAnimationFrame(() => {
            window.dispatchEvent(new CustomEvent('modal-alert', {
                detail: @json(session('modal_alert'))
            }));
        });
    </script>
@endif

@vite(['resources/js/app.js'])
@include('layouts.admin.scripts')
@stack('scripts')

{{--فراخوانی الرت ها--}}
<x-toast></x-toast>
<x-alert></x-alert>

</body>
</html>
