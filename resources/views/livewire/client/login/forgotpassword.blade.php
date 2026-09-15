<div class="relative place-items-center w-full">
    <!-- باکس فرم -->
    <div class="relative form_bg_blur z-10 backdrop-blur-[20px] bg-white/30 lg:w-1/4 md:w-[40%] sm:w-1/2 w-[80%]  sm:mt-[9%] mt-[22%] rounded-lg shadow-lg lg:py-16 md:py-14 sm:py-10 py-10 px-4 md:h-[20rem] h-[18rem] space-y-5">
        <!-- عنوان -->
        <p class="font-bold text-[20px] text-center"> تغییر رمز عبور</p>

        <!-- جداکننده -->
        <div class="bg-gray-100 h-[2px] w-full"></div>


        @if($step == 1)
            <form wire:submit.prevent="send" class="w-full space-y-6 my-auto" autocomplete="on">
                <!-- شماره تلفن -->
                <div class="relative w-full">
                    <input name="phone" wire:model="phone" type="text" class="w-full focus:outline-none focus:ring-0 rounded-lg bg-gray-100 p-1.5 ps-8 text-[15px]" placeholder="شماره تلفن">
                    <span class="absolute start-2 top-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="gray" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"></path>
                        </svg>
                    </span>
                    @error('phone')
                    <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="w-full cursor-pointer transition-all hover:-translate-y-1 bg-[#ff528c] hover:bg-[#7C3AED] rounded-lg p-1.5 text-white">ارسال کد</button>
            </form>
        @else

            <form wire:submit.prevent="resetPassword" class="w-full space-y-6 ">
                <input wire:model="verifyCode" type="text" placeholder="کد تایید">
                <!-- رمز عبور -->
                <div class="relative w-full">
                    <input name="password" wire:model="password" type="password" class="w-full rounded-lg focus:outline-none focus:ring-0 bg-gray-100 p-1.5 ps-8 text-[15px]" placeholder="رمزعبور">
                    <span class="absolute start-2 top-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="gray" class="bi bi-lock" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"></path>
                    </svg>
                    </span>
                    @error('password')
                    <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="w-full cursor-pointer transition-all hover:-translate-y-1 bg-[#ff528c] hover:bg-[#7C3AED] rounded-lg p-1.5 text-white">تغییر رمز</button>
            </form>
        @endif
    </div>

    <!-- دایره نارجی -->
    <div class="absolute sm:top-[-11%] lg:end-[34%] md:end-[24%] sm:end-[18%] end-[4%] top-[-5%] orange rounded-full sm:p-12 p-7"></div>

    <!-- دایره سورمه ای -->
    <div class="absolute sm:bottom-[-12%] lg:start-[34%] md:start-[24%] sm:start-[18%] start-[4%]  bottom-[-5%] blue rounded-full sm:p-12 p-7 bg-amber-900"></div>
</div>
