@push('schemas')
    @foreach($schemas as $schema)
        <x-schema :data="$schema" />
    @endforeach
@endpush


<div class="lg:-mt-24 sm:-mt-22 -mt-20 lg:space-y-20 md:space-y-10 space-y-10">
    <!-- اسلایدر -->
    <livewire:client.home.slider.index/>

    <!-- خدمات -->
    <livewire:client.home.service.index/>

    <!-- تخصص ها -->
    <livewire:client.home.specialty.index lazy />

    <!-- بنر تصویر -->
    <div class="place-items-center">
        <div class="rounded-sm overflow-hidden xl:h-[28rem] lg:h-[22rem] sm:h-[18rem] h-[16rem] w-full">
            <img src="{{ asset('/client/asset/pic/7ca0d2c6-43b5-4394-b79d-cf7ab8da2780.png')}}"  alt="#" class="w-full h-full object-cover">
        </div>
    </div>

    <!-- نظرات مشتریان -->
    <livewire:client.home.comment.index lazy />

    <!-- بنر گل -->
    <div class="hidden md:block place-items-center h-[18rem] -mt-25 relative -z-10" style=" background-image: url({{ asset('/client/asset/pic/footer-bg-1.png')}}); background-size: cover;">
        <div class="absolute top-0 start-0">
            <img src="{{ asset('/client/asset/pic/testmonial-right-shape0-1.png')}}" alt="#" class="w-full h-full object-cover">
        </div>

        <div class="absolute bottom-0 end-0">
            <img src="{{ asset('/client/asset/pic/testmonial-right-shape0-2.png')}}" alt="#" class="w-full h-full object-cover">
        </div>
    </div>

    <!-- وبلاگ -->
    <livewire:client.home.blog.index lazy />
</div>


