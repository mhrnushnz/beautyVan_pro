<div>
    <footer class="relative mt-16 overflow-hidden bg-[#24143f] text-white">

        {{-- نورهای دکوراتیو پس‌زمینه --}}
        <div class="pointer-events-none absolute -top-32 -end-24 size-[26rem] rounded-full bg-[#ff528c]/15 blur-[100px]"></div>
        <div class="pointer-events-none absolute -bottom-40 -start-24 size-[28rem] rounded-full bg-[#7C3AED]/25 blur-[110px]"></div>

        {{-- خط رنگی بالای فوتر --}}
        <div class="h-[3px] w-full bg-gradient-to-r from-[#7C3AED] via-[#ff528c] to-[#7C3AED]"></div>


        <div class="container relative z-10 mx-auto px-4 py-12 lg:py-14">

            {{-- =========================
                 بخش اصلی فوتر
            ========================== --}}
            <div class="grid gap-10 lg:grid-cols-12 lg:gap-14">


                {{-- لوگو و معرفی --}}
                <div class="lg:col-span-7">

                    {{-- لوگو --}}
                    <div class="mb-5 flex items-center justify-center gap-4 md:justify-start">

                        <div class="flex h-16 w-16 items-center justify-center overflow-hidden rounded-2xl
                                border border-white/10 bg-white/10 p-2
                                shadow-[0_10px_30px_rgba(0,0,0,.15)]
                                backdrop-blur-md">
                            <img
                                src="{{ asset('/client/asset/pic/logo.png') }}"
                                alt="بیوتی ون"
                                class="h-full w-full object-contain"
                            >
                        </div>

                        <div>
                            <div class="font_heavy text-[24px] text-white lg:text-[28px]">
                                بیوتی ون
                            </div>

                            <div class="mt-0.5 text-[11px] tracking-[3px] text-white/40">
                                BEAUTY ONE
                            </div>
                        </div>

                    </div>


                    {{-- عنوان کوچک --}}
                    <div class="mb-3 flex items-center justify-center gap-2 md:justify-start">

                        <span class="h-[2px] w-6 rounded-full bg-[#ff528c]"></span>

                        <span class="text-[12px] font-bold text-[#ff9dbc]">
                        زیبایی حرفه‌ای، در آرامش خانه شما
                    </span>

                    </div>


                    {{-- توضیحات --}}
                    <p class="mx-auto max-w-[700px]
                          text-center text-[14px] leading-8 text-white/65
                          sm:text-[15px]
                          md:mx-0 md:text-start
                          lg:text-[16px]">

                        شرکت بیوتی ون در زمینه ارائه خدمات آرایشی و بهداشتی در
                        درب منزل فعالیت می‌کند. ما با استفاده از تکنیک‌های تخصصی،
                        محصولات باکیفیت و تیم حرفه‌ای تلاش می‌کنیم تجربه‌ای
                        مطمئن، راحت و لذت‌بخش از خدمات زیبایی را برای شما فراهم کنیم.

                    </p>


                    {{-- مزیت‌های کوتاه --}}
                    <div class="mt-6 flex flex-wrap justify-center gap-2 md:justify-start">

                        <div class="flex items-center gap-2 rounded-full
                                border border-white/10 bg-white/[0.06]
                                px-3 py-2 text-[12px] text-white/70
                                backdrop-blur-sm">

                            <span class="size-1.5 rounded-full bg-[#ff528c]"></span>

                            خدمات در منزل
                        </div>

                        <div class="flex items-center gap-2 rounded-full
                                border border-white/10 bg-white/[0.06]
                                px-3 py-2 text-[12px] text-white/70
                                backdrop-blur-sm">

                            <span class="size-1.5 rounded-full bg-[#ff528c]"></span>

                            متخصصان حرفه‌ای
                        </div>

                        <div class="flex items-center gap-2 rounded-full
                                border border-white/10 bg-white/[0.06]
                                px-3 py-2 text-[12px] text-white/70
                                backdrop-blur-sm">

                            <span class="size-1.5 rounded-full bg-[#ff528c]"></span>

                            محصولات باکیفیت
                        </div>

                    </div>

                </div>



                {{-- نمادها و شبکه‌های اجتماعی --}}
                <div class="lg:col-span-5">

                    <div class="h-full rounded-[26px]
                            border border-white/10
                            bg-white/[0.06]
                            p-5 sm:p-6
                            backdrop-blur-md
                            shadow-[0_20px_50px_rgba(0,0,0,.12)]">


                        {{-- عنوان --}}
                        <div class="mb-5 flex items-center justify-between">

                            <div>
                                <div class="font-bold text-[16px] text-white">
                                    اعتماد و ارتباط با ما
                                </div>

                                <div class="mt-1 text-[11px] text-white/40">
                                    نمادهای اعتماد و شبکه‌های اجتماعی
                                </div>
                            </div>


                            {{-- تزئین --}}
                            <div class="hidden items-center gap-1 sm:flex">
                                <span class="size-1.5 rounded-full bg-[#ff528c]"></span>
                                <span class="size-1.5 rounded-full bg-[#ff528c]/60"></span>
                                <span class="size-1.5 rounded-full bg-[#ff528c]/30"></span>
                            </div>

                        </div>



                        {{-- نمادهای اعتماد --}}
                        <ul class="grid grid-cols-3 gap-3">

                            <li class="group flex h-[90px] items-center justify-center
                                   rounded-2xl bg-white p-2
                                   shadow-[0_8px_25px_rgba(0,0,0,.10)]
                                   transition-all duration-300
                                   hover:-translate-y-1
                                   hover:shadow-[0_12px_30px_rgba(0,0,0,.18)]">

                                <img
                                    src="{{ asset('/client/asset/pic/namad 2.png') }}"
                                    alt="نماد اعتماد بیوتی ون"
                                    class="max-h-full max-w-full object-contain
                                       transition-transform duration-300
                                       group-hover:scale-105"
                                >

                            </li>


                            <li class="group flex h-[90px] items-center justify-center
                                   rounded-2xl bg-white p-2
                                   shadow-[0_8px_25px_rgba(0,0,0,.10)]
                                   transition-all duration-300
                                   hover:-translate-y-1
                                   hover:shadow-[0_12px_30px_rgba(0,0,0,.18)]">

                                <img
                                    src="{{ asset('/client/asset/pic/namad1 1.png') }}"
                                    alt="نماد اعتماد بیوتی ون"
                                    class="max-h-full max-w-full object-contain
                                       transition-transform duration-300
                                       group-hover:scale-105"
                                >

                            </li>


                            <li class="group flex h-[90px] items-center justify-center
                                   rounded-2xl bg-white p-2
                                   shadow-[0_8px_25px_rgba(0,0,0,.10)]
                                   transition-all duration-300
                                   hover:-translate-y-1
                                   hover:shadow-[0_12px_30px_rgba(0,0,0,.18)]">

                                <img
                                    src="{{ asset('/client/asset/pic/namadddd 1.png') }}"
                                    alt="نماد اعتماد بیوتی ون"
                                    class="max-h-full max-w-full object-contain
                                       transition-transform duration-300
                                       group-hover:scale-105"
                                >

                            </li>

                        </ul>



                        {{-- جداکننده --}}
                        <div class="my-5 h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>



                        {{-- شبکه‌های اجتماعی --}}
                        <div class="flex flex-col items-center justify-between gap-5 sm:flex-row">

                            {{-- عنوان --}}
                            <div>
                                <div class="text-center text-[14px] font-bold text-white sm:text-start">
                                    بیوتی ون را دنبال کنید
                                </div>

                                <div class="mt-1 text-center text-[11px] text-white/50 sm:text-start">
                                    همراه ما در شبکه‌های اجتماعی
                                </div>
                            </div>


                            {{-- شبکه‌های اجتماعی --}}
                            <ul class="flex items-center gap-3">

                                {{-- Telegram --}}
                                <li>
                                    <a href="#"
                                       aria-label="تلگرام"
                                       class="group flex size-11 items-center justify-center
                      rounded-2xl
                      bg-[#229ED9]
                      border border-white/15
                      shadow-[0_8px_22px_rgba(34,158,217,.25)]
                      transition-all duration-300
                      hover:-translate-y-1.5
                      hover:scale-105
                      hover:shadow-[0_12px_28px_rgba(34,158,217,.4)]">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 24 24"
                                             fill="currentColor"
                                             class="size-[21px] text-white
                            transition-transform duration-300
                            group-hover:scale-110">

                                            <path d="M21.944 2.506a1.5 1.5 0 0 0-1.54-.217L2.94 9.063c-1.191.463-1.175 2.155.027 2.596l4.432 1.626 1.72 5.466c.348 1.105 1.76 1.42 2.548.57l2.477-2.674 4.502 3.313c.947.697 2.302.17 2.52-.986L23.47 4.047a1.5 1.5 0 0 0-1.526-1.541ZM9.52 12.88l8.946-6.158-7.262 7.427-.566 3.21-1.118-4.479Z"/>
                                        </svg>

                                    </a>
                                </li>


                                {{-- Instagram --}}
                                <li>
                                    <a href="#"
                                       aria-label="اینستاگرام"
                                       class="group flex size-11 items-center justify-center
                      rounded-2xl
                      bg-gradient-to-br
                      from-[#833AB4]
                      via-[#FD1D1D]
                      to-[#FCAF45]
                      border border-white/15
                      shadow-[0_8px_22px_rgba(253,29,29,.22)]
                      transition-all duration-300
                      hover:-translate-y-1.5
                      hover:scale-105
                      hover:shadow-[0_12px_28px_rgba(253,29,29,.38)]">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="2"
                                             class="size-[21px] text-white
                            transition-transform duration-300
                            group-hover:scale-110">

                                            <rect
                                                x="3"
                                                y="3"
                                                width="18"
                                                height="18"
                                                rx="5"
                                                ry="5"
                                            />

                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="4"
                                            />

                                            <circle
                                                cx="17.5"
                                                cy="6.5"
                                                r="1"
                                                fill="currentColor"
                                                stroke="none"
                                            />

                                        </svg>

                                    </a>
                                </li>


                                {{-- WhatsApp --}}
                                <li>
                                    <a href="#"
                                       aria-label="واتساپ"
                                       class="group flex size-11 items-center justify-center
                      rounded-2xl
                      bg-[#25D366]
                      border border-white/15
                      shadow-[0_8px_22px_rgba(37,211,102,.22)]
                      transition-all duration-300
                      hover:-translate-y-1.5
                      hover:scale-105
                      hover:shadow-[0_12px_28px_rgba(37,211,102,.38)]">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 24 24"
                                             fill="currentColor"
                                             class="size-[22px] text-white
                            transition-transform duration-300
                            group-hover:scale-110">

                                            <path d="M12.04 2a9.84 9.84 0 0 0-8.48 14.8L2 22l5.34-1.52A9.96 9.96 0 1 0 12.04 2Zm0 17.98a8.04 8.04 0 0 1-4.1-1.12l-.3-.18-3.17.9.91-3.08-.2-.32A7.98 7.98 0 1 1 12.04 19.98Zm4.4-5.98c-.24-.12-1.43-.7-1.65-.78-.22-.08-.38-.12-.54.12-.16.24-.62.78-.76.94-.14.16-.28.18-.52.06-.24-.12-1.01-.37-1.93-1.19-.71-.64-1.19-1.42-1.33-1.66-.14-.24-.01-.37.11-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.47-.4-.4-.54-.41h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.69 2.58 4.1 3.62.57.25 1.02.39 1.37.5.58.18 1.1.16 1.51.1.46-.07 1.43-.58 1.63-1.15.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28Z"/>
                                        </svg>

                                    </a>
                                </li>


                                {{-- X / Twitter --}}
                                <li>
                                    <a href="#"
                                       aria-label="ایکس"
                                       class="group flex size-11 items-center justify-center
                      rounded-2xl
                      bg-[#111111]
                      border border-white/20
                      shadow-[0_8px_22px_rgba(0,0,0,.25)]
                      transition-all duration-300
                      hover:-translate-y-1.5
                      hover:scale-105
                      hover:bg-black
                      hover:shadow-[0_12px_28px_rgba(0,0,0,.4)]">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 24 24"
                                             fill="currentColor"
                                             class="size-[19px] text-white
                            transition-transform duration-300
                            group-hover:scale-110">

                                            <path d="M18.244 2H21.552L14.325 10.26L22.827 22H16.17L10.956 15.183L4.99 22H1.68L9.412 13.165L1.254 2H8.08L12.793 8.231L18.244 2Zm-1.161 17.932H18.916L7.084 3.964H5.117L17.083 19.932Z"/>

                                        </svg>

                                    </a>
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =========================
                 خط جداکننده
            ========================== --}}
            <div class="my-9 h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>



            {{-- =========================
                 کپی‌رایت
            ========================== --}}
            <div class="flex flex-col items-center justify-between gap-3
                    rounded-2xl border border-white/[0.07]
                    bg-white/[0.04]
                    px-5 py-3.5
                    text-[12px] text-white/45
                    sm:flex-row sm:text-[13px]">

            <span>
                تمام حقوق برای شرکت
                <strong class="font-bold text-white/80">بیوتی ون</strong>
                محفوظ است.
            </span>

                <span class="hidden sm:block">
                © {{ date('Y') }} Beauty One
            </span>

            </div>

        </div>

    </footer>
</div>
