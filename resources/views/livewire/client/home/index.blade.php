@push('schemas')
    <script type="application/ld+json">
        {!! json_encode(
            $schema,
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES |
            JSON_PRETTY_PRINT
        ) !!}
    </script>
@endpush
<div class="lg:-mt-24 sm:-mt-22 -mt-20 lg:space-y-20 md:space-y-10 space-y-10">
    <!-- اسلایدر -->
    <livewire:client.home.slider.index/>

    <!-- خدمات -->
    <livewire:client.home.service.index/>

    <!-- تخصص ها -->
    <livewire:client.home.specialty.index lazy />


    {{-- پوسترهای وسط صفحه --}}
    @if($centerSliders->isNotEmpty())
        <section class="mx-auto {{ $centerSliders->count() == 2 ? 'px-3' : 'px-0' }}">
            <div class="grid {{ $centerSliders->count() > 1 ? 'md:grid-cols-2' : 'grid-cols-1' }} gap-3 grid-cols-1gap-4">
                @foreach($centerSliders as $slider)
                    <div class=" relative overflow-hidden xl:h-[28rem] lg:h-[22rem] sm:h-[18rem] h-[16rem] group">
                        <img src="{{ asset('storage/' . $slider->path) }}" alt="{{ $slider->title }}" class=" w-full h-full object-cover">
                        {{-- محتوای روی پوستر --}}
                        <div class="absolute inset-0 flex flex-col justify-end p-6 bg-gradient-to-t from-black/50 via-black/10 to-transparent">
                            @if($slider->title)
                                <h2 class="text-white font-bold sm:text-[22px] text-[18px]">{{ $slider->title }}</h2>
                            @endif

                            @if($slider->short_description)
                                <p class="text-white/90 mt-2 sm:text-[14px] text-[12px]"> {{ $slider->short_description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @else
        {{-- پوستر پیش‌فرض --}}
        <div class="relative overflow-hidden xl:h-[28rem] lg:h-[22rem] sm:h-[18rem] h-[16rem]">
            <img src="{{ asset('client/asset/pic/7ca0d2c6-43b5-4394-b79d-cf7ab8da2780.png') }}" alt="بیوتی ون" class="w-full h-full object-cover">
        </div>
    @endif





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


    {{-- تبلیغات پایین صفحه --}}
    @if($bottomSliders->isNotEmpty())
        <section class="mx-auto px-3">
            <div class="w-full h-[18rem] bg-gradient-to-t from-white to-white/0 relative -z-10" style=" background-image: url({{ asset('/client/asset/pic/Group-344902.png')}}); background-position: top;">
                <svg class="lg:size-30 md:size-30 sm:size-24 size-20 absolute md:-top-10.5 sm:-top-7.5 -top-5.5 xl:start-[47%] lg:start-[45%] md:start-[43%] sm:start-[43%] start-[39%]" xmlns="http://www.w3.org/2000/svg" width="166" height="78" viewBox="0 0 166 78" fill="none"><path d="M44.0908 39C44.0908 60.5391 61.5806 78 83.1553 78C104.73 78 122.22 60.5391 122.22 39C122.22 17.4609 104.73 0 83.1553 0C61.5806 0 44.0908 17.4609 44.0908 39Z" fill="white"></path><path d="M47.2373 55.5859C47.2373 55.5859 43.9739 39.8795 23.7826 39.1465C3.59127 38.4135 42.8218 29.626 42.8218 29.626L47.2373 55.5859Z" fill="white"></path><path d="M110.813 65.6534C120.836 56.2534 131.719 39.6136 158.83 39.2276C185.941 38.8416 118.964 22.6856 118.964 22.6856C118.964 22.6856 100.791 75.0554 110.813 65.6534Z" fill="white"></path><path d="M54.669 65.6535C46.1079 55.4685 33.7635 39.6135 6.65176 39.2275C-20.46 38.8415 46.5175 22.6855 46.5175 22.6855C46.5175 22.6855 63.2301 75.8375 54.669 65.6535Z" fill="white"></path><path d="M74.7413 47.4584L81.8163 52.8917C82.6519 53.5334 84.0191 53.5334 84.8547 52.8917L91.9297 47.4584" fill="#202020"></path><path d="M74.7413 47.4584L81.8163 52.8917C82.6519 53.5334 84.0191 53.5334 84.8547 52.8917L91.9297 47.4584" stroke="#202020" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <h2 class="text-center font_heavy md:text-[30px] sm:text-[26px] text-[24px] text-shadow-md w-full absolute top-18">تبلیغات</h2>
            </div>
            <div class="container md:-mt-26 -mt-36 relative z-10">
                <div class="swiper beauty-ads-swiper">
                    <div class="swiper-wrapper">
                        @foreach($bottomSliders as $slider)
                            <div class="swiper-slide">
                                <a @if(filled($slider->link))
                                       href="{{ $slider->link }}"
                                    @endif
                                    class="{{ blank($slider->link) ? 'cursor-default' : 'cursor-pointer' }} relative block overflow-hidden rounded-2xl xl:h-70 lg:h-50 md:h-50 sm:h-60 h-50 group">
                                    <img src="{{ asset('storage/' . $slider->path) }}" alt="{{ $slider->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">


                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif


    <!-- وبلاگ -->
    <livewire:client.home.blog.index lazy />
</div>


