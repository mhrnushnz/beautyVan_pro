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
<div>
    <!-- درباره ما -->
    <section class="container mx-auto mt-14">
        <div class="relative overflow-hidden
                bg-white
                border border-gray-100
                rounded-[28px]
                shadow-[0_10px_40px_rgba(0,0,0,0.06)]
                lg:p-6 md:p-5 p-4">

            {{-- المان تزئینی پس‌زمینه --}}
            <div class="absolute -top-24 -end-24
                    w-56 h-56
                    bg-[#ff528c]/10
                    rounded-full
                    blur-3xl
                    pointer-events-none">
            </div>

            <div class="absolute -bottom-28 start-1/3
                    w-52 h-52
                    bg-[#7C3AED]/10
                    rounded-full
                    blur-3xl
                    pointer-events-none">
            </div>


            <div class="relative z-10
                    flex md:flex-row flex-col
                    items-center
                    lg:gap-14 md:gap-8 gap-7">


                {{-- تصویر --}}
                <div class="group
                        relative
                        lg:w-[43%] md:w-[45%] w-full
                        lg:h-[24rem] md:h-[21rem] sm:h-[22rem] h-[17rem]
                        overflow-hidden
                        rounded-[24px]">

                    <img
                        src="{{ asset('/client/asset/pic/255a9eadbdcaa3173e17c18b15b737d6.jpeg') }}"
                        alt="درباره بیوتی ون"
                        loading="lazy"
                        class="w-full h-full
                           object-cover
                           transition-transform
                           duration-700
                           ease-out
                           group-hover:scale-105"
                    >


                    {{-- گرادینت روی تصویر --}}
                    <div class="absolute inset-0
                            bg-gradient-to-t
                            from-[#150a29]/35
                            via-transparent
                            to-transparent">
                    </div>


                    {{-- برچسب روی تصویر --}}
                    <div class="absolute bottom-4 start-4">

                        <div class="flex items-center gap-2
                                bg-white/90
                                backdrop-blur-md
                                border border-white/40
                                shadow-sm
                                rounded-full
                                px-4 py-2">

                        <span class="relative flex size-2">
                            <span class="absolute inline-flex
                                         h-full w-full
                                         rounded-full
                                         bg-[#ff528c]
                                         opacity-40
                                         animate-ping">
                            </span>

                            <span class="relative inline-flex
                                         size-2
                                         rounded-full
                                         bg-[#ff528c]">
                            </span>
                        </span>

                            <span class="text-gray-700
                                     sm:text-[13px]
                                     text-[11px]
                                     font-medium">
                            زیبایی، در آرامش خانه شما
                        </span>

                        </div>

                    </div>

                </div>


                {{-- محتوا --}}
                <div class="lg:w-[57%] md:w-[55%] w-full">


                    {{-- عنوان کوچک --}}
                    <div class="flex md:justify-start justify-center
                            items-center gap-2 mb-2">

                    <span class="w-6 h-[2px]
                                 rounded-full
                                 bg-[#ff528c]">
                    </span>

                        <span class="text-[#ff528c]
                                 sm:text-[13px]
                                 text-[12px]
                                 font-bold">
                        درباره بیوتی ون
                    </span>

                    </div>


                    {{-- عنوان اصلی --}}
                    <h2 class="md:text-start text-center
                           font_heavy
                           lg:text-[34px]
                           md:text-[29px]
                           sm:text-[26px]
                           text-[23px]
                           leading-relaxed
                           text-gray-800">

                        زیبایی و مراقبت حرفه‌ای،
                        <span class="text-[#cf4070]">
                        در خانه شما
                    </span>

                    </h2>


                    {{-- ABOUT US --}}
                    <div class="md:text-start text-center
                            lg:text-[36px]
                            md:text-[30px]
                            text-[25px]
                            font-black
                            text-gray-100
                            leading-none
                            mt-1 mb-5
                            tracking-wider">

                        ABOUT US

                    </div>


                    {{-- توضیحات --}}
                    <p class="text-gray-600
                          lg:text-[17px]
                          md:text-[15px]
                          sm:text-[15px]
                          text-[14px]
                          leading-[2]
                          text-justify">

                        شرکت بیوتی ون در زمینه ارائه خدمات آرایشی و
                        بهداشتی در منزل فعالیت می‌کند. ما با بهره‌گیری
                        از تکنیک‌های به‌روز زیبایی و محصولات باکیفیت،
                        تلاش می‌کنیم خدماتی حرفه‌ای، مطمئن و متناسب با
                        نیاز شما ارائه دهیم. هدف ما ایجاد تجربه‌ای
                        متفاوت از زیبایی و مراقبت است؛ تجربه‌ای که
                        راحتی، کیفیت و آرامش را در کنار یکدیگر قرار
                        می‌دهد.

                    </p>


                    {{-- ویژگی‌ها --}}
                    <div class="flex flex-wrap
                            md:justify-start justify-center
                            gap-2.5
                            mt-5">

                        <div class="flex items-center gap-1.5
                                px-3 py-1.5
                                rounded-full
                                bg-gray-50
                                border border-gray-100
                                text-gray-600
                                text-[12px]">

                            <span class="text-[#ff528c]">✓</span>
                            خدمات در منزل

                        </div>

                        <div class="flex items-center gap-1.5
                                px-3 py-1.5
                                rounded-full
                                bg-gray-50
                                border border-gray-100
                                text-gray-600
                                text-[12px]">

                            <span class="text-[#ff528c]">✓</span>
                            محصولات باکیفیت

                        </div>

                        <div class="flex items-center gap-1.5
                                px-3 py-1.5
                                rounded-full
                                bg-gray-50
                                border border-gray-100
                                text-gray-600
                                text-[12px]">

                            <span class="text-[#ff528c]">✓</span>
                            خدمات حرفه‌ای

                        </div>

                    </div>


                    {{-- دکمه‌ها --}}
                    <div class="flex flex-wrap
                            md:justify-start justify-center
                            items-center
                            gap-3
                            mt-7">

                        @auth()
                            <a href="{{ route('reserve') }}"
                               class="group
                                  inline-flex items-center
                                  gap-2
                                  sm:px-7 px-5
                                  sm:py-2.5 py-2
                                  rounded-full
                                  bg-[#ff528c]
                                  hover:bg-[#7C3AED]
                                  text-white
                                  sm:text-[14px]
                                  text-[12px]
                                  shadow-[0_6px_20px_rgba(255,82,140,0.25)]
                                  hover:shadow-[0_8px_25px_rgba(124,58,237,0.25)]
                                  hover:-translate-y-1
                                  transition-all duration-300">

                                <span>رزرو نوبت</span>

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="2"
                                     stroke="currentColor"
                                     class="size-4
                                        transition-transform duration-300
                                        group-hover:-translate-x-1">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M15.75 19.5 8.25 12l7.5-7.5"/>

                                </svg>

                            </a>
                        @endauth
                    </div>

                </div>

            </div>

        </div>

    </section>
</div>
