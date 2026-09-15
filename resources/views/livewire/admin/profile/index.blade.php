@section('title', 'ویرایش پروفایل') {{-- عنوان این صفحه --}}
<div class="md:space-y-6 space-y-3">
    <!-- عنوان -->
    <div class="md:text-[20px] text-[18px] font-bold">ویرایش پروفایل من</div>

    <!-- باکس -->
    <form wire:submit.prevent="editUser" class="shadow-lg space-y-6 border border-gray-200 p-4 rounded-2xl" enctype="multipart/form-data">
        <!-- پروفایل -->
        <div class="flex sm:flex-row flex-col items-center gap-5">
            <div class="rounded-full overflow-hidden lg:w-[8%] md:w-[10%] sm:w-[10%] w-[26%]">
                <img src="{{ asset('/admin/asset/pic/default-avatar.png') }}" alt="#" class="w-full h-full object-cover">
            </div>

            <div class="">
                <p class="font-bold text-[20px]">{{ $user->name }}</p>
            </div>
        </div>

        <!-- اطلاعات -->
        <div class="grid md:grid-cols-2 grid-cols-1 gap-5">
            <div class="space-y-2">
                <label for="name" class="block">نام</label>
                <input id="name" wire:model="name" type="text" placeholder="نام" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-2 px-4 rounded-full bg-gray-50 text-gray-600">
            </div>


            <div class="space-y-2">
                <label for="phone" class="block">شماره تلفن</label>
                <input id="phone" wire:model="phone" type="text" placeholder="شماره تلفن" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-2 px-4 rounded-full bg-gray-50 text-gray-600">
            </div>

            <div class="space-y-2">
                <label for="file" class="block">ایمیل</label>
                <input wire:model="email" type="email" placeholder="ایمیل" class="w-full border focus:outline-none focus:ring-0 border-gray-100 py-2 px-4 rounded-full bg-gray-50 text-gray-600">
            </div>

            @php
                $role = $user->getRoleNames()->first();
            @endphp

            <div class="space-y-2">
                <label for="role" class="block">نقش</label>
                <input readonly id="role" value="@switch($role)
                @case('manager') مدیریت @break
                @case('admin') ادمین @break
                @case('user') کاربر @break
                @default بدون نقش
               @endswitch" type="text" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-2 px-4 rounded-full bg-gray-50 text-gray-600">
            </div>
        </div>

        <button type="submit" class="bg-[#ff528c] sm:text-[16px] text-[14px] text-white rounded-full hover:bg-[#7C3AED] cursor-pointer sm:py-1.5 py-1 px-8">ذخیره تغییرات</button>
    </form>
</div>
