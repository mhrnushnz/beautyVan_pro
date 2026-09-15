@section('title', 'تغییر وضعیت نوبت') {{-- عنوان این صفحه --}}
<div class="md:space-y-6 space-y-3">
    <!-- عنوان -->
    <h1 class="font-bold text-shadow-md sm:text-[20px] text-[18px]">مشاهده جزئیات نوبت </h1>


    <form wire:submit.prevent="updateAppointment" class="shadow-lg space-y-5 border border-gray-200 p-4 rounded-2xl" enctype="multipart/form-data">
        <!-- پروفایل -->
        <div class="flex sm:flex-row flex-col gap-2 items-center justify-between">
            <div class="flex sm:flex-row flex-col items-center gap-3">
                <div class="rounded-full overflow-hidden shrink-0 h-12 w-12">
                    <img src="{{ asset('/admin/asset/pic/default-avatar.png') }}" alt="#" class="w-full h-full object-cover">
                </div>
                <div class="sm:text-[20px] text-[16px] font-bold">
                    {{ $appointment->name }} {{ $appointment->lastname }}
                </div>
            </div>

            <div class="">
                <select  wire:model.live="status" @class(['transition-all w-fit md:py-2 py-1 sm:px-6 px-2 text-[14px] sm:text-[16px] rounded-full text-white','bg-blue-500' => $status === 'pending','bg-green-500' => $status === 'accepted','bg-red-500' => $status === 'canceled',])>
                    <option value="pending" class="bg-gray-100 text-gray-500 text-shadow-lg">در صف انتظار</option>
                    <option value="accepted" class="bg-gray-100 text-gray-500 text-shadow-lg">تایید شده</option>
                    <option value="canceled" class="bg-gray-100 text-gray-500 text-shadow-lg">لغو شده</option>
                </select>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 grid-cols-1 gap-5">
            <!-- نوع خدمات -->
            <div class="space-y-2">
                <label for="file" class="block">خدمات مورد نظر:</label>
                <div class="w-full min-h-[42px] border border-gray-100 py-2 px-4 rounded-full bg-gray-50 flex flex-wrap gap-1 items-center truncate">
                    @foreach($appointment->services as $service)
                        <span class="{{ $service->is_active ? 'text-gray-600' : 'text-red-400' }}">
                            {{ $service->name }}
                            {{ !$service->is_active ? '(غیرفعال)' : '' }}
                        </span>

                        @if(!$loop->last)
                            <span>,</span>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- موبایل -->
            <div class="space-y-2">
                <label for="file" class="block">شماره تلفن:</label>
                <div class="w-full border cursor-auto border-gray-100 py-2 px-4 rounded-full bg-gray-50 text-gray-600">
                    {{ $appointment->phone }}
                </div>
            </div>

            <!-- تاریخ -->
            <div class="space-y-2">
                <label for="file" class="block">تاریخ:</label>
                <div class="w-full border border-gray-100 py-2 cursor-auto px-4 rounded-full bg-gray-50 text-gray-600">{{ \Morilog\Jalali\Jalalian::fromDateTime($appointment->date)->format('Y/m/d ')}}</div>
            </div>

            <!-- ساعت -->
            <div class="space-y-2">
                <label for="file" class="block">ساعت:</label>
                <div class="w-full border border-gray-100 cursor-auto py-2 px-4 rounded-full bg-gray-50 text-gray-600">{{ str_replace(['AM','PM'], ['صبح','عصر'], \Carbon\Carbon::parse($appointment->time)->format('h:i A')) }}</div>
            </div>
        </div>

        <!-- آدرس -->
        <div class="space-y-2 block">
            <label for="file" class="block">آدرس:</label>
            <textarea rows="1" readonly class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-2 px-4 rounded-2xl bg-gray-50 cursor-auto text-gray-600">{{ $appointment->city }} , {{ $appointment->district }} , {{ $appointment->address }} </textarea>
        </div>

        <!-- پیام -->
        <div class="space-y-2 block">
            <label for="file" class="block">پیام:</label>
            <textarea rows="6" readonly class="w-full border focus:outline-none focus:ring-0 border-gray-100 py-2 px-4 rounded-2xl bg-gray-50 cursor-auto text-gray-600">{{ $appointment->description ?? 'توضیحی داده نشده ...' }} </textarea>
        </div>

        <button type="submit" class="bg-[#ff528c] sm:text-[16px] text-[14px] text-white rounded-full hover:bg-[#7C3AED] cursor-pointer sm:py-1.5 py-1 px-8">ذخیره تغییرات</button>
    </form>
</div>
