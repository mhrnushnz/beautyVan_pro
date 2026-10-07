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
    <!-- باکس تماس با ما -->
    <div class="container mx-auto mt-10">

        <div class="relative overflow-hidden
                bg-white
                border border-gray-100
                rounded-[30px]
                shadow-[0_18px_55px_rgba(20,10,40,0.06)]
                p-4 sm:p-5 lg:p-6">

            {{-- المان‌های تزئینی --}}
            <div class="pointer-events-none absolute -top-24 -end-24
                    size-64 rounded-full bg-[#ff528c]/10 blur-3xl">
            </div>

            <div class="pointer-events-none absolute -bottom-28 start-1/3
                    size-64 rounded-full bg-[#7C3AED]/10 blur-3xl">
            </div>


            <div class="relative z-10
                    flex md:flex-row flex-col-reverse
                    items-stretch
                    justify-between
                    lg:gap-10 md:gap-7 gap-6">


                {{-- =====================================================
                    FORM
                ====================================================== --}}
                <form wire:submit.prevent="submit"
                      class="md:w-[56%] w-full
                         flex flex-col justify-center">


                    {{-- Header --}}
                    <div class="mb-6">

                        <div class="flex items-center gap-2 mb-2">

                        <span class="w-7 h-[2px]
                                     rounded-full
                                     bg-[#ff528c]">
                        </span>

                            <span class="text-[#cf4070]
                                     text-[11px]
                                     font-bold">
                            CONTACT US
                        </span>

                        </div>


                        <div class="flex items-end
                                justify-between
                                gap-3">

                            <div class="hidden sm:block
                                    font_heavy
                                    lg:text-[30px]
                                    md:text-[25px]
                                    sm:text-[24px]
                                    text-[20px]
                                    text-gray-800">

                                تماس با ما

                            </div>


                            <span class="hidden lg:block
                                     text-[25px]
                                     text-gray-100
                                     font-black
                                     tracking-wider">

                            CONTACT US

                        </span>

                        </div>


                        {{-- ساعات کاری --}}
                        <h1 class="lg:text-[17px]
                               md:text-[15px]
                               sm:text-[16px]
                               text-[15px]
                               font-bold
                               text-gray-700
                               leading-7
                               mt-3">

                            روزهای شنبه تا پنجشنبه، از ساعت 9 الی 21 پاسخگوی سوالات شما هستیم.

                        </h1>


                        {{-- توضیحات --}}
                        <p class="text-gray-400
                              lg:text-[14px]
                              md:text-[13px]
                              sm:text-[14px]
                              text-[13px]
                              leading-7
                              mt-2">

                            در صورتی که خارج از ساعات اداری تماس گرفتید، می‌توانید از طریق فرم زیر پیام خود را بگذارید. کارشناسان ما پس از بررسی با شما تماس خواهند گرفت.

                        </p>

                    </div>



                    {{-- =====================================================
                        INPUTS
                    ====================================================== --}}
                    <div class="space-y-3">


                        {{-- نام + شماره --}}
                        <div class="grid md:grid-cols-2 grid-cols-1 gap-3">


                            {{-- نام --}}
                            <div>

                                <div class="relative">

                                <span class="absolute
                                             start-4 top-1/2
                                             -translate-y-1/2
                                             text-gray-300">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke-width="1.7"
                                         stroke="currentColor"
                                         class="size-[17px]">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.118a7.5 7.5 0 0 1 15 0"/>

                                    </svg>

                                </span>


                                    <input wire:model="name"
                                           type="text"
                                           class="w-full
                                              h-12
                                              ps-11 pe-4
                                              rounded-2xl
                                              border border-gray-200
                                              bg-gray-50/70
                                              text-gray-700
                                              text-[13px]
                                              placeholder:text-gray-300
                                              outline-none
                                              focus:bg-white
                                              focus:border-[#ff528c]/50
                                              focus:ring-4
                                              focus:ring-[#ff528c]/5
                                              transition-all duration-300"
                                           placeholder="نام و نام خانوادگی">

                                </div>


                                @error('name')

                                <div class="mt-1.5
                                            px-2
                                            text-[11px]
                                            text-red-500">

                                    {{ $message }}

                                </div>

                                @enderror

                            </div>



                            {{-- شماره تماس --}}
                            <div>

                                <div class="relative">

                                <span class="absolute
                                             start-4 top-1/2
                                             -translate-y-1/2
                                             text-gray-300">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke-width="1.7"
                                         stroke="currentColor"
                                         class="size-[17px]">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.362-.271.527-.734.417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>

                                    </svg>

                                </span>


                                    <input wire:model="phone"
                                           type="text"
                                           class="w-full
                                              h-12
                                              ps-11 pe-4
                                              rounded-2xl
                                              border border-gray-200
                                              bg-gray-50/70
                                              text-gray-700
                                              text-[13px]
                                              placeholder:text-gray-300
                                              outline-none
                                              focus:bg-white
                                              focus:border-[#ff528c]/50
                                              focus:ring-4
                                              focus:ring-[#ff528c]/5
                                              transition-all duration-300"
                                           placeholder="شماره تماس">

                                </div>


                                @error('phone')

                                <div class="mt-1.5
                                            px-2
                                            text-[11px]
                                            text-red-500">

                                    {{ $message }}

                                </div>

                                @enderror

                            </div>

                        </div>



                        {{-- ایمیل --}}
                        <div>

                            <div class="relative">

                            <span class="absolute
                                         start-4 top-1/2
                                         -translate-y-1/2
                                         text-gray-300">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.7"
                                     stroke="currentColor"
                                     class="size-[17px]">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0-8.659 5.492a2.25 2.25 0 0 1-2.182 0L2.25 6.75"/>

                                </svg>

                            </span>


                                <input wire:model="email"
                                       type="email"
                                       class="w-full
                                          h-12
                                          ps-11 pe-4
                                          rounded-2xl
                                          border border-gray-200
                                          bg-gray-50/70
                                          text-gray-700
                                          text-[13px]
                                          placeholder:text-gray-300
                                          outline-none
                                          focus:bg-white
                                          focus:border-[#ff528c]/50
                                          focus:ring-4
                                          focus:ring-[#ff528c]/5
                                          transition-all duration-300"
                                       placeholder="ایمیل">

                            </div>


                            @error('email')

                            <div class="mt-1.5
                                        px-2
                                        text-[11px]
                                        text-red-500">

                                {{ $message }}

                            </div>

                            @enderror

                        </div>



                        {{-- پیام --}}
                        <div>

                        <textarea wire:model="message"
                                  rows="5"
                                  class="w-full
                                         resize-none
                                         rounded-[20px]
                                         border border-gray-200
                                         bg-gray-50/70
                                         px-4 py-3
                                         text-gray-700
                                         text-[13px]
                                         leading-7
                                         placeholder:text-gray-300
                                         outline-none
                                         focus:bg-white
                                         focus:border-[#ff528c]/50
                                         focus:ring-4
                                         focus:ring-[#ff528c]/5
                                         transition-all duration-300"
                                  placeholder="متن پیام"></textarea>


                            @error('message')

                            <div class="mt-1.5
                                        px-2
                                        text-[11px]
                                        text-red-500">

                                {{ $message }}

                            </div>

                            @enderror

                        </div>

                    </div>



                    {{-- =====================================================
                        CONTACT INFO
                    ====================================================== --}}
                    <div class="grid sm:grid-cols-2 grid-cols-1
                            gap-3
                            mt-4">


                        {{-- آدرس --}}
                        <div class="group
                                flex items-center gap-3
                                p-3
                                rounded-2xl
                                bg-gray-50/70
                                border border-gray-100
                                hover:bg-white
                                hover:border-[#ff528c]/20
                                hover:shadow-sm
                                transition-all duration-300">


                            <div class="size-10 shrink-0
                                    flex items-center justify-center
                                    rounded-[13px]
                                    bg-[#fff0f5]
                                    text-[#ff528c]">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.7"
                                     stroke="currentColor"
                                     class="size-[18px]">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 21s7.5-4.35 7.5-11.25a7.5 7.5 0 1 0-15 0C4.5 16.65 12 21 12 21Z"/>

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M14.25 9.75a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>

                                </svg>

                            </div>


                            <div>

                            <span class="block
                                         text-gray-400
                                         text-[10px]
                                         mb-0.5">
                                آدرس
                            </span>

                                <span class="text-gray-600
                                         text-[11px] sm:text-[12px]
                                         leading-6">

                                تهران سه راه جمهوری پلاک 856

                            </span>

                            </div>

                        </div>



                        {{-- تلفن --}}
                        <div class="group
                                flex items-center gap-3
                                p-3
                                rounded-2xl
                                bg-gray-50/70
                                border border-gray-100
                                hover:bg-white
                                hover:border-[#7C3AED]/20
                                hover:shadow-sm
                                transition-all duration-300">


                            <div class="size-10 shrink-0
                                    flex items-center justify-center
                                    rounded-[13px]
                                    bg-purple-50
                                    text-[#7C3AED]">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.7"
                                     stroke="currentColor"
                                     class="size-[18px]">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.362-.271.527-.734.417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>

                                </svg>

                            </div>


                            <div>

                            <span class="block
                                         text-gray-400
                                         text-[10px]
                                         mb-0.5">
                                شماره تماس
                            </span>

                                <span class="text-gray-600
                                         text-[12px] sm:text-[13px]">

                                ۴۴۴۴۴۵۹۷
                                ۰۹۰

                            </span>

                            </div>

                        </div>

                    </div>



                    {{-- =====================================================
                        SUBMIT
                    ====================================================== --}}
                    <div class="mt-5">

                        <button type="submit"
                                class="group
                                   cursor-pointer
                                   inline-flex items-center
                                   justify-center gap-2
                                   sm:min-w-[170px]
                                   w-full sm:w-auto
                                   px-7 py-2.5
                                   rounded-full
                                   bg-[#ff528c]
                                   hover:bg-[#7C3AED]
                                   text-white
                                   text-[12px] sm:text-[13px]
                                   shadow-[0_8px_25px_rgba(255,82,140,.20)]
                                   hover:shadow-[0_10px_30px_rgba(124,58,237,.20)]
                                   hover:-translate-y-0.5
                                   transition-all duration-300">

                            ارسال پیام

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

                        </button>

                    </div>

                </form>



                {{-- =====================================================
                    IMAGE
                ====================================================== --}}
                <div class="relative
                        group
                        md:w-[42%] w-full
                        lg:min-h-[34rem]
                        md:min-h-[31rem]
                        sm:h-[24rem]
                        h-[18rem]
                        overflow-hidden
                        rounded-[26px]">


                    <img class="w-full h-full
                            absolute inset-0
                            object-cover
                            transition-transform
                            duration-700
                            ease-out
                            group-hover:scale-105"
                         src="{{ asset('/client/asset/pic/4161598b052a4a1599f32c4aa48361f0.jpeg') }}"
                         alt="#">


                    {{-- Gradient --}}
                    <div class="absolute inset-0
                            bg-gradient-to-t
                            from-[#160b28]/55
                            via-[#160b28]/5
                            to-transparent">
                    </div>



                    {{-- Image Content --}}
                    <div class="absolute
                            bottom-5
                            start-5 end-5
                            z-10">


                        <div class="inline-flex
                                items-center gap-2
                                px-3 py-1.5
                                mb-3
                                rounded-full
                                bg-white/15
                                backdrop-blur-md
                                border border-white/20
                                text-white
                                text-[10px]">

                        <span class="relative flex size-2">

                            <span class="absolute
                                         inline-flex
                                         size-full
                                         rounded-full
                                         bg-[#ff528c]
                                         opacity-50
                                         animate-ping">
                            </span>

                            <span class="relative
                                         inline-flex
                                         size-2
                                         rounded-full
                                         bg-[#ff528c]">
                            </span>

                        </span>

                            پاسخگوی شما هستیم

                        </div>


                        <div class="text-white
                                font-bold
                                lg:text-[22px]
                                md:text-[18px]
                                text-[17px]">

                            با ما در ارتباط باشید

                        </div>


                        <p class="max-w-sm
                              text-white/70
                              text-[11px] sm:text-[12px]
                              leading-6
                              mt-1">

                            سوال، پیشنهاد یا درخواست خود را برای ما ارسال کنید.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- پایان فرم و تصویر -->
</div>
