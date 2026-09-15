<!DOCTYPE html>
<html lang="fa" dir="rtl" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('/logo.png') }}">

    {!! \Artesaos\SEOTools\Facades\SEOMeta::generate() !!}
    {!! \Artesaos\SEOTools\Facades\OpenGraph::generate() !!}
    {!! \Artesaos\SEOTools\Facades\TwitterCard::generate() !!}
    @stack('schemas')

    @vite(['resources/css/app.css', 'resources/css/client.css',])
    @livewireStyles
</head>
<body class="font_num">
<div>
    <!-- هدر -->
    <livewire:client.header.index/>

    <!-- بدنه سایت -->
    <div>{{ $slot }}</div>

    <!-- فوتر -->
    <livewire:client.footer.index/>
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
        document.addEventListener('DOMContentLoaded', () => {
            window.dispatchEvent(
                new CustomEvent('modal-alert', {
                    detail: [@json(session('modal_alert'))]
                })
            );
        });
    </script>
@endif
@vite(['resources/js/app.js'])
@include('layouts.client.scripts')
@livewireScripts

{{--الرت ها--}}
<x-toast></x-toast>
<x-alert></x-alert>

</body>
</html>
