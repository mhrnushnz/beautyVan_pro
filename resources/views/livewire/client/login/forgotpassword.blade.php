<div
    dir="rtl"
    class="relative isolate flex min-h-[90vh] w-full items-center justify-center overflow-hidden bg-[#ededed] px-4 py-12 sm:px-6 sm:py-16"
>

    {{-- نورهای ملایم پس‌زمینه --}}
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute -right-32 -top-32 h-[400px] w-[400px] rounded-full bg-[#ff528c]/10 blur-[110px]"></div>
        <div class="absolute -bottom-32 -left-32 h-[420px] w-[420px] rounded-full bg-[#7C3AED]/10 blur-[110px]"></div>
    </div>

    {{-- دایره اصلی --}}
    <div
        class="relative flex aspect-square w-full max-w-[540px] items-center justify-center rounded-full
               bg-[#ededed]
               shadow-[22px_22px_45px_#c9c9c9,-22px_-22px_45px_#ffffff]"
    >

        {{-- حلقه برجسته --}}
        <div
            class="pointer-events-none absolute inset-[9px] rounded-full
                   border-[7px] border-[#f1f1f1]
                   shadow-[inset_7px_7px_12px_#d0d0d0,inset_-7px_-7px_12px_#ffffff]
                   sm:inset-[16px] sm:border-[10px]"
        ></div>

        {{-- حلقه داخلی --}}
        <div
            class="pointer-events-none absolute inset-[24px] rounded-full
                   border border-white/60 sm:inset-[38px]"
        ></div>

        {{-- محتوای فرم --}}
        <div class="relative z-10 w-[78%] max-w-[330px] py-8 sm:w-[70%]">

            {{-- عنوان --}}
            <div class="mb-7 text-center">

                <h1 class="text-[25px] font-black text-[#333333] sm:text-[32px]">
                    تغییر رمز عبور
                </h1>

                <p class="mt-2 text-[11px] leading-6 text-[#888888] sm:text-[12px]">
                    @if($step == 1)
                        برای بازیابی رمز عبور، شماره موبایل خود را وارد کنید
                    @else
                        کد تأیید و رمز عبور جدید خود را وارد کنید
                    @endif
                </p>

                <div class="mx-auto mt-3 h-[3px] w-12 rounded-full bg-gradient-to-l from-[#ff528c] to-[#7C3AED]"></div>
            </div>

            @if($step == 1)

                {{-- مرحله اول: ارسال کد --}}
                <form
                    wire:submit.prevent="send"
                    class="w-full space-y-5"
                    autocomplete="on"
                >

                    {{-- شماره موبایل --}}
                    <div>
                        <div class="relative">

                            <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-[#999999]">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="19"
                                    height="19"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <rect x="5" y="2" width="14" height="20" rx="2"/>
                                    <path d="M12 18h.01"/>
                                </svg>
                            </span>

                            <input
                                name="phone"
                                wire:model="phone"
                                type="text"
                                inputmode="numeric"
                                autocomplete="tel"
                                placeholder="شماره موبایل"
                                class="h-[48px] w-full rounded-xl border-0 bg-[#ededed]
                                       pr-11 pl-4 text-[13px] text-[#444444]
                                       shadow-[inset_5px_5px_9px_#d0d0d0,inset_-5px_-5px_9px_#ffffff]
                                       outline-none transition-all duration-300
                                       placeholder:text-[#999999]
                                       focus:ring-1 focus:ring-[#ff528c]/40"
                            />
                        </div>

                        @error('phone')
                        <p class="mt-2 pr-2 text-[11px] text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- دکمه ارسال کد --}}

                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        wire:target="submit"
                        class="group relative mt-2 flex h-[48px] w-full
           cursor-pointer items-center justify-center
           overflow-hidden rounded-xl
           bg-gradient-to-b from-[#ff74a4] to-[#ff528c]
           text-[14px] font-bold text-white
           shadow-[5px_7px_12px_#c9c1c6,-3px_-3px_8px_#ffffff]
           transition-all duration-500 ease-in-out
           hover:-translate-y-1
           hover:shadow-[0_8px_20px_rgba(255,82,140,0.3)]
           active:translate-y-0
           disabled:cursor-wait disabled:opacity-70"
                    >
                        {{-- گرادینت دوم --}}
                        <span
                            class="absolute inset-0 bg-gradient-to-b
               from-[#ff528c] to-[#7C3AED]
               opacity-0 transition-opacity duration-500 ease-in-out
               group-hover:opacity-100"
                        ></span>

                        {{-- متن دکمه --}}
                        <span class="relative z-10" wire:loading.remove wire:target="submit">ارسال کد</span>

                        <span class="relative z-10" wire:loading wire:target="submit"> در حال ثبت نام...</span>
                    </button>


                </form>

            @else

                {{-- مرحله دوم: تأیید کد و تغییر رمز --}}
                <form
                    wire:submit.prevent="resetPassword"
                    class="w-full space-y-4"
                >

                    {{-- کد تأیید --}}
                    <div>
                        <div class="relative">

                            <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-[#999999]">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="19"
                                    height="19"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <rect x="3" y="11" width="18" height="11" rx="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                    <path d="M12 15v3"/>
                                </svg>
                            </span>

                            <input
                                wire:model="verifyCode"
                                type="text"
                                inputmode="numeric"
                                autocomplete="one-time-code"
                                placeholder="کد تأیید پیامک شده"
                                class="h-[48px] w-full rounded-xl border-0 bg-[#ededed]
                                       pr-11 pl-4 text-[13px] text-[#444444]
                                       shadow-[inset_5px_5px_9px_#d0d0d0,inset_-5px_-5px_9px_#ffffff]
                                       outline-none transition-all duration-300
                                       placeholder:text-[#999999]
                                       focus:ring-1 focus:ring-[#ff528c]/40"
                            />
                        </div>

                        @error('verifyCode')
                        <p class="mt-2 pr-2 text-[11px] text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- رمز عبور جدید --}}
                    <div>
                        <div class="relative">

                            <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-[#999999]">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="19"
                                    height="19"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <rect x="4" y="11" width="16" height="10" rx="2"/>
                                    <path d="M8 11V7a4 4 0 0 1 8 0v4"/>
                                </svg>
                            </span>

                            <input
                                name="password"
                                wire:model="password"
                                type="password"
                                autocomplete="new-password"
                                placeholder="رمز عبور جدید"
                                class="h-[48px] w-full rounded-xl border-0 bg-[#ededed]
                                       pr-11 pl-4 text-[13px] text-[#444444]
                                       shadow-[inset_5px_5px_9px_#d0d0d0,inset_-5px_-5px_9px_#ffffff]
                                       outline-none transition-all duration-300
                                       placeholder:text-[#999999]
                                       focus:ring-1 focus:ring-[#ff528c]/40"
                            />
                        </div>

                        @error('password')
                        <p class="mt-2 pr-2 text-[11px] text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- دکمه تغییر رمز --}}
                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        wire:target="resetPassword"
                        class="flex h-[48px] w-full cursor-pointer items-center justify-center
                               rounded-xl bg-gradient-to-b from-[#ff74a4] to-[#ff528c]
                               text-[14px] font-bold text-white
                               shadow-[5px_7px_12px_#c9c1c6,-3px_-3px_8px_#ffffff]
                               transition-all duration-300
                               hover:from-[#ff528c] hover:to-[#7C3AED]
                               hover:shadow-[0_8px_20px_rgba(255,82,140,0.3)]
                               active:translate-y-[2px]
                               disabled:cursor-wait disabled:opacity-70"
                    >
                        <span wire:loading.remove wire:target="resetPassword">
                            تغییر رمز عبور
                        </span>

                        <span wire:loading wire:target="resetPassword">
                            در حال تغییر رمز...
                        </span>
                    </button>

                </form>

            @endif

        </div>
    </div>
</div>
