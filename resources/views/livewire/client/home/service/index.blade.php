<div>
    <div class="relative xl:mt-1 lg:-mt-14 -mt-5 z-20">
        <div class="mx-auto lg:w-[75%] md:w-[90%] sm:w-[92%] w-[95%]">

            <ul class="grid grid-cols-4 lg:gap-6 md:gap-4 sm:gap-3 gap-2">

                @foreach($servicesCategories->take(4) as $serviceCategory)

                    <li class="group text-center">

                        <a href="{{ route('our_service', [$serviceCategory->slug]) }}"
                           class="inline-flex flex-col items-center lg:gap-3 gap-2">

                            {{-- تصویر --}}
                            <div class="relative
                                    lg:w-36 lg:h-36
                                    md:w-28 md:h-28
                                    sm:w-24 sm:h-24
                                    w-[76px] h-[76px]
                                    rounded-[20px]
                                    overflow-hidden
                                    bg-white
                                    shadow-[0_8px_25px_rgba(20,10,40,.08)]
                                    group-hover:shadow-[0_12px_30px_rgba(211,36,94,.15)]
                                    group-hover:-translate-y-1
                                    transition-all duration-300">

                                <img
                                    src="{{ asset('storage/' . $serviceCategory->path) }}"
                                    alt="{{ $serviceCategory->name }}"
                                    class="w-full h-full
                                       object-cover
                                       transition-transform duration-500
                                       group-hover:scale-105"
                                >

                                {{-- لایه بسیار ظریف --}}
                                <div class="absolute inset-0
                                        bg-gradient-to-t
                                        from-[#150a29]/15
                                        to-transparent
                                        opacity-0
                                        group-hover:opacity-100
                                        transition-opacity duration-300">
                                </div>

                                {{-- خط پایین --}}
                                <div class="absolute bottom-0 start-1/2
                                        -translate-x-1/2
                                        w-0 h-[3px]
                                        rounded-full
                                        bg-[#ff528c]
                                        group-hover:w-1/2
                                        transition-all duration-300">
                                </div>

                            </div>


                            {{-- عنوان --}}
                            <div class="relative">

                                <h3 class="font-bold
                                       lg:text-[17px]
                                       md:text-[15px]
                                       sm:text-[13px]
                                       text-[11px]
                                       text-gray-700
                                       group-hover:text-[#cf4070]
                                       transition-colors duration-300">

                                    {{ $serviceCategory->name }}

                                </h3>

                                {{-- خط کوچک زیر عنوان --}}
                                <span class="block
                                         mx-auto mt-1
                                         w-0 h-[2px]
                                         rounded-full
                                         bg-[#ff528c]
                                         group-hover:w-5
                                         transition-all duration-300">
                            </span>

                            </div>

                        </a>

                    </li>

                @endforeach

            </ul>

        </div>
    </div>
</div>
