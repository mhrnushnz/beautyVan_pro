@section('title', 'ویرایش کاربر') {{-- عنوان این صفحه --}}
<div class="md:space-y-6 space-y-3">
    <!-- عنوان -->
    <h1 class="font-bold text-shadow-md sm:text-[20px] text-[18px]">ویرایش کاربر</h1>


    <form wire:submit.prevent="edit" class="shadow-lg space-y-10 border border-gray-200 p-4 rounded-2xl" enctype="multipart/form-data">
        <!-- پروفایل -->
        <div class="flex items-center gap-5">
            <div class="rounded-full overflow-hidden lg:w-[8%] md:w-[8%] sm:w-[11%] w-[16%]">
                <img src="{{ asset('admin/asset/pic/default-avatar.png')}}" alt="#" class="w-full h-full object-cover">
            </div>

            <div class="space-y-2">
                <div class="sm:text-[22px] text-[18px] font-bold">
                    {{$user->name}}
                </div>
            </div>
        </div>


        <div class="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-5">
            <!--  نام -->
            <div class="space-y-2">
                <label for="name" class="block">نام</label>
                <input readonly id="name" value="{{$user->name}}" placeholder="نام" type="text" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-2 px-4 rounded-full bg-gray-50 text-gray-600">
            </div>

            <!-- موبایل -->
            <div class="space-y-2">
                <label for="phone" class="block">شماره تلفن</label>
                <input readonly id="phone" value="{{$user->phone}}" type="text" placeholder="موبایل" class="w-full text-start focus:outline-none focus:ring-0 border border-gray-100 py-2 px-4 rounded-full bg-gray-50 text-gray-600">
            </div>

            <!-- ایمیل -->
            <div class="space-y-2">
                <label for="mail" class="block">ایمیل</label>
                <input readonly id="mail" value="{{$user->email}}" type="email" class="w-full border border-gray-100 py-2 px-4 focus:outline-none focus:ring-0 rounded-full bg-gray-50 text-gray-600">
            </div>

            <!-- نقش -->
            <div class="space-y-2">
                <label for="role" class="block">نقش</label>
                <select wire:model="role" id="role" class="border w-full border-gray-100 focus:outline-none focus:ring-0 py-2 px-4 rounded-full bg-gray-50 text-gray-600">
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">
                            @switch($role->name)
                                @case('manager')
                                    مدیریت
                                @break
                                @case('admin')
                                    ادمین
                                @break
                                @case('user')
                                    کاربر
                                @break
                                @default
                                    {{$role->name}}
                            @endswitch
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="bg-[#ff528c] sm:text-[16px] text-[14px] text-white rounded-full hover:bg-[#7C3AED] cursor-pointer sm:py-1.5 py-1 px-8">ذخیره تغییرات</button>
    </form>
</div>
