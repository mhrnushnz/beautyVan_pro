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
        <section class="mx-auto">
            <div class="grid {{ $centerSliders->count() > 1 ? 'md:grid-cols-2' : 'grid-cols-1' }} gap-3 grid-cols-1gap-4">
                @foreach($centerSliders as $slider)
                    <div class=" relative overflow-hidden rounded-2xl xl:h-[28rem] lg:h-[22rem] sm:h-[18rem] h-[16rem] group">
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
        <div class="relative overflow-hidden rounded-2xl xl:h-[28rem] lg:h-[22rem] sm:h-[18rem] h-[16rem]">
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

        <section class="container mx-auto px-3">

            <div class="
            grid
            lg:grid-cols-4
            sm:grid-cols-2
            grid-cols-1
            gap-4
        ">

                @foreach($bottomSliders as $slider)

                    <div class="
                    relative
                    overflow-hidden
                    rounded-2xl
                    lg:h-[220px]
                    sm:h-[200px]
                    h-[180px]
                    group
                ">

                        <img
                            src="{{ asset('storage/' . $slider->path) }}"
                            alt="{{ $slider->title }}"
                            class="
                            w-full
                            h-full
                            object-cover
                            transition-transform
                            duration-500
                            group-hover:scale-105
                        "
                        >


                        {{-- اطلاعات تبلیغ --}}
                        <div class="
                        absolute
                        inset-x-0
                        bottom-0
                        p-4
                        bg-gradient-to-t
                        from-black/60
                        to-transparent
                    ">

                            @if($slider->title)

                                <h3 class="
                                text-white
                                font-bold
                                text-[15px]
                            ">
                                    {{ $slider->title }}
                                </h3>

                            @endif


                            @if($slider->short_description)

                                <p class="
                                text-white/80
                                mt-1
                                text-[12px]
                            ">
                                    {{ $slider->short_description }}
                                </p>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        </section>

    @endif


    <!-- وبلاگ -->
    <livewire:client.home.blog.index lazy />
</div>


