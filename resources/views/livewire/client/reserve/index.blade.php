<div>
    <div class="container mx-auto mt-10">

        <div class="relative overflow-hidden
                bg-white
                border border-gray-100
                rounded-[32px]
                shadow-[0_20px_60px_rgba(20,10,40,.06)]">

            {{-- Decorative Background --}}
            <div class="pointer-events-none absolute -top-28 -end-28
                    size-72 rounded-full bg-[#ff528c]/8 blur-3xl"></div>

            <div class="pointer-events-none absolute -bottom-32 -start-20
                    size-72 rounded-full bg-[#7C3AED]/6 blur-3xl"></div>


            <form wire:submit.prevent="submit"
                  autocomplete="on"
                  class="relative z-10 w-full">


                {{-- =====================================================
                    HEADER
                ====================================================== --}}
                <div class="flex lg:flex-row flex-col
                        lg:items-center justify-between
                        gap-5
                        md:px-8 px-5
                        md:py-7 py-6
                        border-b border-gray-100
                        bg-gradient-to-l from-[#fff8fa] via-white to-[#faf8ff]">

                    <div>

                        <div class="flex items-center gap-2 mb-2">

                        <span class="w-7 h-[2px]
                                     rounded-full
                                     bg-[#ff528c]">
                        </span>

                            <span class="text-[#cf4070]
                                     text-[11px]
                                     font-bold tracking-wide">
                            BEAUTY WAN
                        </span>

                        </div>


                        <h1 class="font_heavy
                               lg:text-[30px]
                               md:text-[26px]
                               text-[22px]
                               text-gray-800">

                            رزرو نوبت خدمات زیبایی

                        </h1>


                        <p class="max-w-2xl
                              text-gray-400
                              sm:text-[13px]
                              text-[12px]
                              leading-7 mt-2">

                            خدمات موردنظر خود را انتخاب کنید و اطلاعات نوبت را وارد نمایید.
                            پس از ثبت درخواست، وضعیت رزرو از طریق حساب کاربری شما قابل پیگیری است.

                        </p>

                    </div>


                    {{-- Header Icon --}}
                    <div class="hidden md:flex
                            size-16 shrink-0
                            items-center justify-center
                            rounded-[22px]
                            bg-white
                            border border-[#ff528c]/10
                            text-[#ff528c]
                            shadow-[0_8px_30px_rgba(255,82,140,.10)]">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor"
                             class="size-7">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M6.75 3v2.25M17.25 3v2.25M3.75 9.75h16.5m-15-4.5h13.5A1.5 1.5 0 0 1 20.25 6.75v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z"/>

                        </svg>

                    </div>

                </div>



                <div class="md:p-8 p-5 space-y-9">


                    {{-- =====================================================
                        SERVICES
                    ====================================================== --}}
                    <section>

                        <div class="flex items-center gap-3 mb-5">

                            <div class="size-10 shrink-0
                                    flex items-center justify-center
                                    rounded-[14px]
                                    bg-[#fff1f6]
                                    text-[#ff528c]">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.7"
                                     stroke="currentColor"
                                     class="size-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 3.75 14.25 9l5.25 2.25-5.25 2.25L12 18.75 9.75 13.5 4.5 11.25 9.75 9 12 3.75Z"/>

                                </svg>

                            </div>


                            <div>

                                <h2 class="text-gray-800
                                       font-bold
                                       sm:text-[15px]
                                       text-[14px]">
                                    انتخاب خدمات
                                </h2>

                                <p class="text-gray-400
                                      text-[11px] mt-0.5">
                                    می‌توانید یک یا چند خدمت را انتخاب کنید.
                                </p>

                            </div>

                        </div>



                        {{-- Service Cards --}}
                        <div class="flex flex-wrap gap-2.5">

                            @foreach($serviceCategories as $serviceCategory)

                                <label class="group relative cursor-pointer">

                                    <input type="checkbox"
                                           wire:model="serviceCategory"
                                           value="{{ $serviceCategory->id }}"
                                           class="peer sr-only">


                                    <div class="flex items-center gap-2.5
                                            px-4 py-2.5
                                            rounded-full
                                            bg-gray-50
                                            border border-gray-200
                                            text-gray-500
                                            text-[12px] sm:text-[13px]
                                            hover:bg-[#fff7fa]
                                            hover:border-[#ff528c]/30
                                            hover:text-[#cf4070]

                                            peer-checked:bg-[#fff0f5]
                                            peer-checked:border-[#ff528c]/40
                                            peer-checked:text-[#cf4070]

                                            transition-all duration-300">




                                        <span class="font-medium">
                                        {{ $serviceCategory->name }}
                                    </span>

                                    </div>

                                </label>

                            @endforeach

                        </div>


                        @error('serviceCategory')

                        <div class="flex items-center gap-2
                                    mt-3
                                    px-3 py-2
                                    rounded-xl
                                    bg-red-50
                                    border border-red-100
                                    text-red-500
                                    text-[11px]">

                            <span>!</span>
                            {{ $message }}

                        </div>

                        @enderror

                    </section>



                    {{-- Divider --}}
                    <div class="h-px bg-gray-100"></div>



                    {{-- =====================================================
                        PERSONAL INFORMATION
                    ====================================================== --}}
                    <section>

                        <div class="flex items-center gap-3 mb-5">

                            <div class="size-10
                                    flex items-center justify-center
                                    rounded-[14px]
                                    bg-purple-50
                                    text-[#7C3AED]">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.7"
                                     stroke="currentColor"
                                     class="size-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.118a7.5 7.5 0 0 1 15 0A17.933 17.933 0 0 1 12 21.75a17.933 17.933 0 0 1-7.5-1.632Z"/>

                                </svg>

                            </div>


                            <div>

                                <h2 class="font-bold
                                       text-gray-800
                                       sm:text-[15px]
                                       text-[14px]">
                                    اطلاعات شخصی
                                </h2>

                                <p class="text-gray-400 text-[11px] mt-0.5">
                                    اطلاعات فرد دریافت‌کننده خدمات
                                </p>

                            </div>

                        </div>



                        <div class="grid md:grid-cols-2 grid-cols-1 gap-4">


                            {{-- Name --}}
                            <div>

                                <label for="reserve-name"
                                       class="block
                                          text-gray-500
                                          text-[11px]
                                          font-medium
                                          mb-2 me-1">
                                    نام
                                </label>

                                <div class="relative">

                                <span class="absolute
                                             top-1/2 -translate-y-1/2
                                             start-4
                                             text-gray-300">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke-width="1.7"
                                         stroke="currentColor"
                                         class="size-[18px]">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.118a7.5 7.5 0 0 1 15 0"/>

                                    </svg>

                                </span>


                                    <input id="reserve-name"
                                           name="name"
                                           wire:model="name"
                                           type="text"
                                           placeholder="نام خود را وارد کنید"
                                           class="w-full
                                              h-12
                                              rounded-2xl
                                              border border-gray-200
                                              bg-gray-50/70
                                              ps-11 pe-4
                                              text-[13px]
                                              text-gray-700
                                              placeholder:text-gray-300
                                              outline-none
                                              focus:bg-white
                                              focus:border-[#ff528c]/50
                                              focus:ring-4
                                              focus:ring-[#ff528c]/5
                                              transition-all duration-300">

                                </div>


                                @error('name')
                                <p class="text-red-500 text-[11px] mt-1.5 me-2">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>



                            {{-- Lastname --}}
                            <div>

                                <label for="reserve-lastname"
                                       class="block text-gray-500
                                          text-[11px]
                                          font-medium mb-2 me-1">
                                    نام خانوادگی
                                </label>

                                <input id="reserve-lastname"
                                       wire:model="lastname"
                                       name="lastname"
                                       type="text"
                                       placeholder="نام خانوادگی خود را وارد کنید"
                                       class="w-full h-12
                                          rounded-2xl
                                          border border-gray-200
                                          bg-gray-50/70
                                          px-4
                                          text-[13px]
                                          text-gray-700
                                          placeholder:text-gray-300
                                          outline-none
                                          focus:bg-white
                                          focus:border-[#ff528c]/50
                                          focus:ring-4
                                          focus:ring-[#ff528c]/5
                                          transition-all duration-300">

                                @error('lastname')
                                <p class="text-red-500 text-[11px] mt-1.5 me-2">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>



                            {{-- Phone --}}
                            <div>

                                <label for="reserve-phone"
                                       class="block text-gray-500
                                          text-[11px]
                                          font-medium mb-2 me-1">
                                    شماره تماس
                                </label>

                                <div class="relative">

                                <span class="absolute
                                             top-1/2 -translate-y-1/2
                                             start-4
                                             text-gray-300">

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

                                </span>


                                    <input id="reserve-phone"
                                           wire:model="phone"
                                           name="phone"
                                           type="text"
                                           inputmode="numeric"
                                           placeholder="مثال: 09123456789"
                                           class="w-full h-12
                                              rounded-2xl
                                              border border-gray-200
                                              bg-gray-50/70
                                              ps-11 pe-4
                                              text-[13px]
                                              text-gray-700
                                              placeholder:text-gray-300
                                              outline-none
                                              focus:bg-white
                                              focus:border-[#ff528c]/50
                                              focus:ring-4
                                              focus:ring-[#ff528c]/5
                                              transition-all duration-300">

                                </div>

                                @error('phone')
                                <p class="text-red-500 text-[11px] mt-1.5 me-2">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>



                            {{-- City --}}
                            <div>

                                <label for="reserve-city"
                                       class="block text-gray-500
                                          text-[11px]
                                          font-medium mb-2 me-1">
                                    شهر
                                </label>

                                <select id="reserve-city"
                                        name="city"
                                        wire:model="city"
                                        class="w-full h-12
                                           rounded-2xl
                                           border border-gray-200
                                           bg-gray-50/70
                                           px-4
                                           text-[13px]
                                           text-gray-600
                                           outline-none
                                           focus:bg-white
                                           focus:border-[#ff528c]/50
                                           focus:ring-4
                                           focus:ring-[#ff528c]/5
                                           transition-all duration-300">

                                    <option value="" selected hidden>
                                        انتخاب شهر
                                    </option>

                                    <option value="تهران">
                                        تهران
                                    </option>

                                </select>

                                @error('city')
                                <p class="text-red-500 text-[11px] mt-1.5 me-2">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>

                        </div>

                    </section>



                    {{-- Divider --}}
                    <div class="h-px bg-gray-100"></div>



                    {{-- =====================================================
                        APPOINTMENT
                    ====================================================== --}}
                    <section>

                        <div class="flex items-center gap-3 mb-5">

                            <div class="size-10
                                    flex items-center justify-center
                                    rounded-[14px]
                                    bg-blue-50
                                    text-blue-500">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.7"
                                     stroke="currentColor"
                                     class="size-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M6.75 3v2.25M17.25 3v2.25M3.75 9.75h16.5m-15-4.5h13.5A1.5 1.5 0 0 1 20.25 6.75v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z"/>

                                </svg>

                            </div>


                            <div>

                                <h2 class="font-bold
                                       text-gray-800
                                       sm:text-[15px]
                                       text-[14px]">
                                    زمان نوبت
                                </h2>

                                <p class="text-gray-400 text-[11px] mt-0.5">
                                    تاریخ و ساعت مناسب را مشخص کنید.
                                </p>

                            </div>

                        </div>


                        <div class="grid md:grid-cols-2 grid-cols-1 gap-4">


                            {{-- Date --}}
                            <div>

                                <label for="reserve-date"
                                       class="block text-gray-500
                                          text-[11px]
                                          font-medium mb-2 me-1">
                                    تاریخ نوبت
                                </label>

                                <input id="reserve-date"
                                       wire:model="date"
                                       name="date"
                                       type="date"
                                       class="w-full h-12
                                          rounded-2xl
                                          border border-gray-200
                                          bg-gray-50/70
                                          px-4
                                          text-[13px]
                                          text-gray-600
                                          outline-none
                                          focus:bg-white
                                          focus:border-[#ff528c]/50
                                          focus:ring-4
                                          focus:ring-[#ff528c]/5
                                          transition-all duration-300">

                                @error('date')
                                <p class="text-red-500 text-[11px] mt-1.5 me-2">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>



                            {{-- Time --}}
                            <div>

                                <label for="reserve-time"
                                       class="block text-gray-500
                                          text-[11px]
                                          font-medium mb-2 me-1">
                                    ساعت موردنظر
                                </label>

                                <input id="reserve-time"
                                       wire:model="time"
                                       name="time"
                                       type="time"
                                       class="w-full h-12
                                          rounded-2xl
                                          border border-gray-200
                                          bg-gray-50/70
                                          px-4
                                          text-[13px]
                                          text-gray-600
                                          outline-none
                                          focus:bg-white
                                          focus:border-[#ff528c]/50
                                          focus:ring-4
                                          focus:ring-[#ff528c]/5
                                          transition-all duration-300">

                                @error('time')
                                <p class="text-red-500 text-[11px] mt-1.5 me-2">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>

                        </div>

                    </section>



                    {{-- Divider --}}
                    <div class="h-px bg-gray-100"></div>



                    {{-- =====================================================
                        ADDRESS
                    ====================================================== --}}
                    <section>

                        <div class="flex items-center gap-3 mb-5">

                            <div class="size-10
                                    flex items-center justify-center
                                    rounded-[14px]
                                    bg-emerald-50
                                    text-emerald-500">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.7"
                                     stroke="currentColor"
                                     class="size-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 21s7.5-4.35 7.5-11.25a7.5 7.5 0 1 0-15 0C4.5 16.65 12 21 12 21Z"/>

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M14.25 9.75a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>

                                </svg>

                            </div>


                            <div>

                                <h2 class="font-bold
                                       text-gray-800
                                       sm:text-[15px]
                                       text-[14px]">
                                    آدرس ارائه خدمات
                                </h2>

                                <p class="text-gray-400 text-[11px] mt-0.5">
                                    آدرس دقیق محل مراجعه را وارد کنید.
                                </p>

                            </div>

                        </div>


                        <div class="grid md:grid-cols-2 grid-cols-1 gap-4">


                            {{-- District --}}
                            <div>

                                <label for="reserve-district"
                                       class="block text-gray-500
                                          text-[11px]
                                          font-medium mb-2 me-1">
                                    محله
                                </label>

                                <input id="reserve-district"
                                       wire:model="district"
                                       name="district"
                                       type="text"
                                       placeholder="مثال: سعادت آباد"
                                       class="w-full h-12
                                          rounded-2xl
                                          border border-gray-200
                                          bg-gray-50/70
                                          px-4
                                          text-[13px]
                                          text-gray-700
                                          placeholder:text-gray-300
                                          outline-none
                                          focus:bg-white
                                          focus:border-[#ff528c]/50
                                          focus:ring-4
                                          focus:ring-[#ff528c]/5
                                          transition-all duration-300">

                                @error('district')
                                <p class="text-red-500 text-[11px] mt-1.5 me-2">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>



                            {{-- Address --}}
                            <div>

                                <label for="reserve-address"
                                       class="block text-gray-500
                                          text-[11px]
                                          font-medium mb-2 me-1">
                                    آدرس کامل
                                </label>

                                <input id="reserve-address"
                                       wire:model="address"
                                       name="address"
                                       type="text"
                                       placeholder="خیابان، کوچه، پلاک، طبقه و واحد"
                                       class="w-full h-12
                                          rounded-2xl
                                          border border-gray-200
                                          bg-gray-50/70
                                          px-4
                                          text-[13px]
                                          text-gray-700
                                          placeholder:text-gray-300
                                          outline-none
                                          focus:bg-white
                                          focus:border-[#ff528c]/50
                                          focus:ring-4
                                          focus:ring-[#ff528c]/5
                                          transition-all duration-300">

                                @error('address')
                                <p class="text-red-500 text-[11px] mt-1.5 me-2">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>

                        </div>

                    </section>



                    {{-- =====================================================
                        DESCRIPTION
                    ====================================================== --}}
                    <section>

                        <label for="reserve-description"
                               class="flex items-center justify-between
                                  text-gray-500
                                  text-[11px]
                                  font-medium
                                  mb-2 me-1">

                        <span>
                            توضیحات تکمیلی
                        </span>

                            <span class="text-gray-300 font-normal">
                            اختیاری
                        </span>

                        </label>


                        <textarea id="reserve-description"
                                  name="description"
                                  wire:model="description"
                                  rows="5"
                                  placeholder="اگر توضیح خاصی درباره خدمات یا زمان مراجعه دارید اینجا بنویسید..."
                                  class="w-full
                                     resize-none
                                     rounded-[20px]
                                     border border-gray-200
                                     bg-gray-50/70
                                     p-4
                                     text-[13px]
                                     leading-7
                                     text-gray-700
                                     placeholder:text-gray-300
                                     outline-none
                                     focus:bg-white
                                     focus:border-[#ff528c]/50
                                     focus:ring-4
                                     focus:ring-[#ff528c]/5
                                     transition-all duration-300">
                    </textarea>


                        @error('description')
                        <p class="text-red-500 text-[11px] mt-1.5 me-2">
                            {{ $message }}
                        </p>
                        @enderror

                    </section>

                </div>



                {{-- =====================================================
                    FOOTER / SUBMIT
                ====================================================== --}}
                <div class="flex sm:flex-row flex-col
                        sm:items-center
                        justify-between
                        gap-4
                        md:px-8 px-5
                        md:py-5 py-4
                        border-t border-gray-100
                        bg-gray-50/50">


                    <div class="flex items-center gap-2
                            text-gray-400
                            text-[10px] sm:text-[11px]">

                        <div class="size-7
                                flex items-center justify-center
                                rounded-full
                                bg-emerald-50
                                text-emerald-500">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="2"
                                 stroke="currentColor"
                                 class="size-3.5">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M11.25 9.75 12 10.5l3-3m6 4.5c0 5.25-3.75 9.75-9 10.5C6.75 21.75 3 17.25 3 12V5.25L12 1.5l9 3.75V12Z"/>

                            </svg>

                        </div>

                        اطلاعات شما فقط برای ثبت و هماهنگی نوبت استفاده می‌شود.

                    </div>



                    <button type="submit"
                            wire:loading.attr="disabled"
                            wire:target="submit"
                            class="group
                               min-w-[180px]
                               inline-flex
                               items-center justify-center gap-2
                               px-7 py-3
                               rounded-full
                               bg-[#ff528c]
                               hover:bg-[#7C3AED]
                               disabled:opacity-60
                               disabled:cursor-not-allowed
                               text-white
                               text-[12px] sm:text-[13px]
                               font-medium
                               cursor-pointer
                               shadow-[0_10px_30px_rgba(255,82,140,.20)]
                               hover:shadow-[0_12px_35px_rgba(124,58,237,.20)]
                               hover:-translate-y-0.5
                               transition-all duration-300">


                        {{-- Normal --}}
                        <span wire:loading.remove
                              wire:target="submit"
                              class="flex items-center gap-2">

                        ثبت درخواست نوبت

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

                    </span>


                        {{-- Loading --}}
                        <span wire:loading
                              wire:target="submit"
                              class="items-center gap-2">

                        <svg class="size-4 animate-spin"
                             xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24">

                            <circle class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4">
                            </circle>

                            <path class="opacity-75"
                                  fill="currentColor"
                                  d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                            </path>

                        </svg>

                        در حال ثبت نوبت...

                    </span>

                    </button>

                </div>

            </form>

        </div>

    </div>
</div>
