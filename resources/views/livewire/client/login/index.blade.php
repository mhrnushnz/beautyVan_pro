@section('title', 'ثبت نام')
<div dir="rtl" class="relative isolate flex min-h-[90vh] w-full items-center justify-center overflow-hidden bg-[#ededed] px-3 py-12 sm:px-6 sm:py-16">

    {{-- نورهای ملایم پس‌زمینه با رنگ‌های بیوتی ون --}}
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute -right-32 -top-32 h-[400px] w-[400px] rounded-full bg-[#ff528c]/10 blur-[110px]"></div>
        <div class="absolute -bottom-32 -left-32 h-[420px] w-[420px] rounded-full bg-[#7C3AED]/10 blur-[110px]"></div>
    </div>

    {{-- دایره اصلی برجسته --}}
    <div
        class="relative flex aspect-square w-full max-w-[620px] items-center justify-center rounded-full
               bg-[#ededed]
               shadow-[22px_22px_45px_#c9c9c9,-22px_-22px_45px_#ffffff]"
    >

        {{-- حلقه برجسته دایره --}}
        <div
            class="pointer-events-none absolute inset-[9px] rounded-full
                   border-[7px] border-[#f1f1f1]
                   shadow-[inset_7px_7px_12px_#d0d0d0,inset_-7px_-7px_12px_#ffffff]
                   sm:inset-[16px] sm:border-[10px]"
        ></div>

        {{-- حلقه ظریف داخلی --}}
        <div
            class="pointer-events-none absolute inset-[24px] rounded-full
                   border border-white/60
                   sm:inset-[38px]"
        ></div>

        {{-- محتوای فرم --}}
        <div class="relative z-10 w-[80%] max-w-[345px] py-10 sm:w-[70%]">

            {{-- عنوان --}}
            <div class="mb-6 text-center sm:mb-7">

                <h1 class="text-[25px] font-black text-[#333333] sm:text-[34px]">
                    ثبت نام
                </h1>

                <p class="mt-2 text-[11px] leading-6 text-[#888888] sm:text-[12px]">
                    به دنیای زیبایی بیوتی ون خوش آمدید
                </p>

                {{-- خط تزئینی --}}
                <div class="mx-auto mt-3 h-[3px] w-12 rounded-full bg-gradient-to-l from-[#ff528c] to-[#7C3AED]"></div>
            </div>

            {{-- فرم ثبت نام --}}
            <form
                wire:submit.prevent="submit"
                autocomplete="on"
                class="space-y-4"
            >

                {{-- نام و نام خانوادگی --}}
                <div>
                    <div class="relative">

                        <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-[#999999]">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="18" height="18" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                        </span>

                        <input
                            wire:model="name"
                            name="name"
                            type="text"
                            autocomplete="name"
                            placeholder="نام و نام خانوادگی"
                            class="h-[46px] w-full rounded-xl border-0 bg-[#ededed]
                                   pr-11 pl-4 text-[12px] text-[#444444]
                                   shadow-[inset_5px_5px_9px_#d0d0d0,inset_-5px_-5px_9px_#ffffff]
                                   outline-none transition-all duration-300
                                   placeholder:text-[#999999]
                                   focus:ring-1 focus:ring-[#ff528c]/40"
                        />
                    </div>

                    @error('name')
                    <p class="mt-2 pr-2 text-[11px] text-red-500">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- شماره موبایل --}}
                <div>
                    <div class="relative">

                        <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-[#999999]">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="18" height="18" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="5" y="2" width="14" height="20" rx="2"/>
                                <path d="M12 18h.01"/>
                            </svg>
                        </span>

                        <input
                            wire:model="phone"
                            name="phone"
                            type="text"
                            inputmode="numeric"
                            autocomplete="tel"
                            placeholder="شماره موبایل"
                            class="h-[46px] w-full rounded-xl border-0 bg-[#ededed]
                                   pr-11 pl-4 text-[12px] text-[#444444]
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

                {{-- ایمیل --}}
                <div>
                    <div class="relative">

                        <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-[#999999]">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="18" height="18" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="4" width="20" height="16" rx="2"/>
                                <path d="m22 7-10 6L2 7"/>
                            </svg>
                        </span>

                        <input
                            wire:model="email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            placeholder="آدرس ایمیل"
                            class="h-[46px] w-full rounded-xl border-0 bg-[#ededed]
                                   pr-11 pl-4 text-[12px] text-[#444444]
                                   shadow-[inset_5px_5px_9px_#d0d0d0,inset_-5px_-5px_9px_#ffffff]
                                   outline-none transition-all duration-300
                                   placeholder:text-[#999999]
                                   focus:ring-1 focus:ring-[#ff528c]/40"
                        />
                    </div>

                    @error('email')
                    <p class="mt-2 pr-2 text-[11px] text-red-500">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- رمز عبور --}}
                <div>
                    <div class="relative">

                        <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-[#999999]">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="18" height="18" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="11" width="16" height="10" rx="2"/>
                                <path d="M8 11V7a4 4 0 0 1 8 0v4"/>
                            </svg>
                        </span>

                        <input
                            wire:model="password"
                            name="password"
                            type="password"
                            autocomplete="new-password"
                            placeholder="رمز عبور"
                            class="h-[46px] w-full rounded-xl border-0 bg-[#ededed]
                                   pr-11 pl-4 text-[12px] text-[#444444]
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

                {{-- بازیابی رمز عبور --}}
                <div class="flex flex-wrap items-center justify-center gap-1 text-[11px] text-[#888888]">
                    <span>رمز عبور خود را فراموش کردید؟</span>

                    <a href="{{ route('forgot_password') }}" class="font-bold text-[#ff528c] transition-all duration-300 hover:text-[#7C3AED]">
                        بازیابی رمز عبور
                    </a>
                </div>

                {{-- دکمه ثبت نام --}}

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
                    <span class="relative z-10" wire:loading.remove wire:target="submit">
        ثبت نام
    </span>

                    <span class="relative z-10" wire:loading wire:target="submit">
        در حال ثبت نام...
    </span>
                </button>


                {{-- لینک ورود --}}
                <p class="pt-1 text-center text-[11px] text-[#888888]">
                    قبلاً ثبت نام کرده‌اید؟

                    <a
                        href="{{ route('auth_login') }}"
                        class="font-extrabold text-[#ff528c] transition-colors hover:text-[#7C3AED]"
                    >
                        ورود به حساب
                    </a>
                </p>

            </form>
        </div>
    </div>
</div>
