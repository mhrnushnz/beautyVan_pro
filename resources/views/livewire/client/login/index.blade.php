@section('title', 'ثبت نام') {{-- عنوان این صفحه --}}
<div class="relative w-full">

    <!-- باکس فرم -->
    <div class="relative mx-auto form_bg_blur z-10 backdrop-blur-[8px] bg-white/30 border border-gray-200/20 shadow-black/30 shadow-2xl lg:w-1/4 md:w-[40%] sm:w-1/2 w-[80%]  sm:mt-[6%] mt-[30%] rounded-2xl lg:py-8 md:py-5 sm:py-5 py-5 px-4 h-fit space-y-5">
        <!-- عنوان -->
        <p class="font-bold text-[20px] text-center"> ثبت نام</p>

        <!-- جداکننده -->
        <div class="bg-gray-300 h-[2px] w-full"></div>

        <!-- فرم -->
        <form wire:submit.prevent="submit" class="w-full space-y-4 " autocomplete="on">

            <!-- نام و نام خانوادگی -->
            <div class="relative w-full">
                <input wire:model="name" name="name" type="text" class="w-full focus:outline-none focus:ring-0 shadow-lg rounded-2xl bg-gray-100 p-1.5 ps-8 text-[15px]" placeholder="نام و نام خانوادگی">
                <span class="absolute start-2 top-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"></path>
                        </svg>
                    </span>
                @error('name')
                <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>


            <!-- شماره تلفن -->
            <div class="relative w-full">
                <input name="phone" wire:model="phone" type="text" class="w-full shadow-lg focus:outline-none focus:ring-0 rounded-2xl bg-gray-100 p-1.5 ps-8 text-[15px]" placeholder="شماره تلفن">
                <span class="absolute start-2 top-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="gray" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"></path>
                        </svg>
                    </span>
                @error('phone')
                <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>


            <!--  ایمیل  -->
            <div class="relative w-full">
                <input name="email" wire:model="email" type="email" class="w-full focus:outline-none focus:ring-0 shadow-lg rounded-2xl bg-gray-100 p-1.5 ps-8 text-[15px]" placeholder="ایمیل">
                <span class="absolute start-2 top-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </span>
                @error('email')
                <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>


            <!-- رمز عبور -->
            <div class="relative w-full">
                <input name="password" wire:model="password" type="password" class="w-full focus:outline-none focus:ring-0 rounded-2xl shadow-lg bg-gray-100 p-1.5 ps-8 text-[15px]" placeholder="رمزعبور">
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

            <div class="flex items-center gap-2">
                <button  type="submit" class="w-full cursor-pointer transition-all hover:-translate-y-1 bg-[#ff528c] hover:bg-[#7C3AED] rounded-2xl p-1.5 text-white">ثبت نام</button>
                <a href="{{ route('auth_login') }}" class="w-full text-center cursor-pointer transition-all hover:-translate-y-1 bg-[#ff528c] hover:bg-[#7C3AED] rounded-2xl p-1.5 text-white">ورود</a>
            </div>

            </form>
    </div>

    <!-- دایره نارجی -->
    <div class="absolute sm:top-[-11%] lg:end-[34%] md:end-[24%] sm:end-[18%] end-[4%] top-[-5%] orange rounded-full sm:p-12 p-7"></div>

    <!-- دایره سورمه ای -->
    <div class="absolute sm:bottom-[-12%] lg:start-[34%] md:start-[24%] sm:start-[18%] start-[4%]  bottom-[-5%] blue rounded-full sm:p-12 p-7 bg-amber-900"></div>
</div>
