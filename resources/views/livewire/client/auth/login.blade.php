@section('title', 'ورود') {{-- عنوان این صفحه --}}
<div class="relative w-full">

    <!-- باکس فرم -->
    <div class="relative mx-auto form_bg_blur z-10 backdrop-blur-[8px] bg-white/30 border border-gray-200/20 lg:w-1/4 md:w-[40%] sm:w-1/2 w-[80%] lg:mt-[10%] sm:mt-[20%] mt-[40%] rounded-2xl shadow-black/30 shadow-2xl lg:py-8 md:py-5 sm:py-5 py-5 px-4 h-fit space-y-5">
        <!-- عنوان -->
        <p class="font-bold text-[20px] text-center">ورود به حساب کاربری</p>

        <!-- جداکننده -->
        <div class="bg-gray-300 h-[2px] w-full"></div>

        <!-- فرم -->
        <form wire:submit.prevent="AuthLogin" class="w-full space-y-4" autocomplete="on">
            <!--  ایمیل  -->
            <div class="relative w-full">
                <input name="email" wire:model="email" type="email" class="w-full rounded-2xl focus:outline-none focus:ring-0 shadow-lg bg-gray-100 p-1.5 ps-8 text-[15px]" placeholder="ایمیل">
                <span class="absolute start-2 top-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </span>
                @error('email')
                <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>


            <!-- رمز عبور -->
            <div class="relative w-full">
                <input name="password" wire:model="password" type="password" class="w-full focus:outline-none focus:ring-0 shadow-lg rounded-2xl bg-gray-100 p-1.5 ps-8 text-[15px]" placeholder="رمزعبور">
                <span class="absolute start-2 top-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="gray" class="bi bi-lock" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"></path>
                    </svg>
                    </span>
                @error('password')
                <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>


            <!-- بازیابی رمز عبور -->
            <p class="text-gray-500 text-shadow-2xs">
                رمز عبور خودرا فراموش کردید؟
                <a href="#" class="text-[#ff9f42] hover:text-[#7C3AED] hover:font-bold ps-1 text-shadow-none">باز یابی رمز عبور</a>
            </p>

            <button type="submit" class="w-full cursor-pointer transition-all hover:-translate-y-1 bg-[#ff528c] hover:bg-[#7C3AED] rounded-2xl p-1.5 text-white">ورود</button>
        </form>
    </div>

    <!-- دایره نارجی -->
    <div class="absolute sm:top-[-11%] lg:end-[34%] md:end-[24%] sm:end-[18%] end-[4%] top-[-5%] orange rounded-full sm:p-12 p-7"></div>

    <!-- دایره سورمه ای -->
    <div class="absolute sm:bottom-[-12%] lg:start-[34%] md:start-[24%] sm:start-[18%] start-[4%]  bottom-[-5%] blue rounded-full sm:p-12 p-7 bg-amber-900"></div>
</div>
