@if($sliders->isNotEmpty())
<div class="slider relative overflow-hidden">
    <ul class="relative w-full xl:h-[52rem] lg:h-[46rem] md:h-[40rem] sm:h-[36rem] h-[30rem]">

        @foreach($sliders as $index => $slider)

            <li
                class="slide absolute inset-0
                {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}
                transition-all duration-[1200ms] ease-in-out"
            >

                {{-- تصویر --}}
                <img
                    src="{{ asset('storage/' . $slider->path) }}"
                    alt="{{ $slider->title }}"
                    class="slide-image w-full h-full object-cover transition-transform duration-[6000ms] ease-out scale-100"
                >

                {{-- سایه گرادینت --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent z-10"></div>


                {{-- متن اسلایدر --}}
                <div
                    class="slide-content absolute sm:w-[50%] w-[70%]
                    sm:start-12 start-4
                    md:bottom-1/4 sm:bottom-1/6 bottom-1/4
                    z-20
                    sm:space-y-3 space-y-1
                    transition-all duration-1000
                    opacity-0 translate-y-8"
                >

                    {{-- عنوان --}}
                    <div
                        class="font-bold w-fit
                        lg:text-[56px]
                        md:text-[36px]
                        sm:text-[30px]
                        text-[24px]
                        leading-tight
                        line-clamp-2
                        text-[#d3245e]
                        text-shadow-md"
                    >
                        {{ $slider->title }}
                    </div>


                    {{-- توضیحات --}}
                    <div
                        class="lg:text-[26px]
                        md:text-[20px]
                        sm:text-[20px]
                        text-[16px]
                        font-bold
                        line-clamp-2
                        w-11/12
                        text-white"
                    >
                        {{ $slider->description }}
                    </div>


                    {{-- توضیحات کوتاه --}}
                    <div
                        class="lg:text-[20px]
                        md:text-[18px]
                        sm:text-[16px]
                        text-[14px]
                        text-gray-200
                        line-clamp-3"
                    >
                        {{ $slider->short_description }}
                    </div>

                </div>

            </li>

        @endforeach

    </ul>
    {{-- دکمه قبلی --}}
    <button
        type="button"
        class="slider-prev absolute start-5 top-1/2 -translate-y-1/2 z-30
        w-11 h-11
        rounded-full
        bg-white/20 backdrop-blur-md
        border border-white/30
        text-white text-2xl
        flex items-center justify-center
        hover:bg-white hover:text-gray-900
        transition-all duration-300
        cursor-pointer"
    >
        ‹
    </button>
    {{-- دکمه بعدی --}}
    <button
        type="button"
        class="slider-next absolute end-5 top-1/2 -translate-y-1/2 z-30
        w-11 h-11
        rounded-full
        bg-white/20 backdrop-blur-md
        border border-white/30
        text-white text-2xl
        flex items-center justify-center
        hover:bg-white hover:text-gray-900
        transition-all duration-300
        cursor-pointer"
    >
        ›
    </button>
    {{-- نقاط پایین --}}
    <div
        class="slider-dots absolute
        bottom-6
        left-1/2 -translate-x-1/2
        z-30
        flex items-center gap-2"
    >
        @foreach($sliders as $index => $slider)

            <button
                type="button"
                data-slide="{{ $index }}"
                class="slider-dot
                h-2 rounded-full
                transition-all duration-500
                cursor-pointer
                {{ $index === 0 ? 'w-8 bg-white' : 'w-2 bg-white/50' }}"
            ></button>

        @endforeach
    </div>
</div>
@endif
