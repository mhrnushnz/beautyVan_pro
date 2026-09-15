<div>
    <!-- بدنه سایت -->
    <div class="place-items-center md:mt-5 mt-4">
        <section class="container mx-auto md:mt-10 mt-6">

            {{-- Header --}}
            <div class="flex md:flex-row flex-col md:items-end items-start
                justify-between gap-5 mb-7">

                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-7 h-[2px] rounded-full bg-[#ff528c]"></span>
                        <span class="text-[#ff528c] text-[12px] font-bold">
                    پنل کاربری
                </span>
                    </div>

                    <h1 class="font_heavy
                       lg:text-[32px] md:text-[28px] text-[24px]
                       text-gray-800">
                        نوبت‌های من
                    </h1>

                    <p class="text-gray-400 text-[13px] mt-2">
                        وضعیت رزروها، زمان مراجعه و جزئیات خدمات خود را مدیریت کنید.
                    </p>
                </div>


                <a href="{{ route('reserve') }}"
                   class="group
                  inline-flex items-center gap-2
                  px-5 py-2.5
                  rounded-full
                  bg-[#ff528c]
                  hover:bg-[#7C3AED]
                  text-white
                  text-[13px]
                  shadow-[0_8px_25px_rgba(255,82,140,.20)]
                  hover:shadow-[0_10px_30px_rgba(124,58,237,.20)]
                  hover:-translate-y-0.5
                  transition-all duration-300">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="2"
                         stroke="currentColor"
                         class="size-4">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>

                    رزرو نوبت جدید
                </a>

            </div>


            @if($appointments->count() == 0)

                {{-- Empty State --}}
                <div class="relative overflow-hidden
                    bg-white
                    border border-gray-100
                    rounded-[28px]
                    min-h-[25rem]
                    flex items-center justify-center
                    shadow-[0_15px_50px_rgba(0,0,0,.04)]">

                    {{-- Decorations --}}
                    <div class="absolute -top-24 -end-24
                        size-72
                        bg-[#ff528c]/10
                        rounded-full blur-3xl">
                    </div>

                    <div class="absolute -bottom-24 -start-24
                        size-72
                        bg-[#7C3AED]/10
                        rounded-full blur-3xl">
                    </div>


                    <div class="relative z-10
                        flex flex-col items-center
                        text-center
                        px-5">

                        <div class="size-20
                            flex items-center justify-center
                            rounded-[24px]
                            bg-gradient-to-br
                            from-[#ff528c]/10
                            to-[#7C3AED]/10
                            border border-[#ff528c]/10
                            mb-5">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.4"
                                 stroke="currentColor"
                                 class="size-9 text-[#ff528c]">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M6.75 3v2.25M17.25 3v2.25M3.75 9.75h16.5m-15-4.5h13.5A1.5 1.5 0 0 1 20.25 6.75v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z"/>

                            </svg>

                        </div>

                        <h2 class="font-bold text-gray-800
                           md:text-[21px] text-[18px]">
                            هنوز نوبتی ندارید
                        </h2>

                        <p class="max-w-md
                          text-gray-400
                          text-[13px]
                          leading-7
                          mt-2">
                            اولین نوبت خود را رزرو کنید. پس از ثبت رزرو،
                            وضعیت و تمام جزئیات آن از همین صفحه قابل پیگیری خواهد بود.
                        </p>

                        <a href="{{ route('reserve') }}"
                           class="mt-6
                          inline-flex items-center gap-2
                          px-6 py-2.5
                          rounded-full
                          bg-[#ff528c]
                          hover:bg-[#7C3AED]
                          text-white text-[13px]
                          transition-all duration-300
                          hover:-translate-y-1">

                            رزرو اولین نوبت

                            <span>←</span>

                        </a>

                    </div>

                </div>


            @else

                <div class="space-y-5">

                    @foreach($appointments as $appointment)

                        <article class="group relative
                                bg-white
                                border border-gray-100
                                rounded-[26px]
                                overflow-hidden
                                shadow-[0_8px_35px_rgba(0,0,0,.045)]
                                hover:shadow-[0_15px_45px_rgba(0,0,0,.075)]
                                transition-all duration-500">


                            {{-- Status Accent --}}
                            <div @class([
                        'absolute start-0 top-0 bottom-0 w-[4px]',
                        'bg-amber-400' => $appointment->status === 'pending',
                        'bg-emerald-500' => $appointment->status === 'accepted',
                        'bg-red-400' => $appointment->status === 'canceled',
                    ])></div>


                            {{-- Top --}}
                            <div class="flex lg:flex-row flex-col
                                lg:items-center
                                justify-between
                                gap-5
                                md:p-6 p-4
                                border-b border-gray-100">


                                {{-- User --}}
                                <div class="flex items-center gap-3.5">

                                    <div class="relative">

                                        <div class="size-14
                                            rounded-2xl
                                            overflow-hidden
                                            bg-gray-50">

                                            <img src="{{ asset('/admin/asset/pic/default-avatar.png') }}"
                                                 alt="{{ $appointment->name }} {{ $appointment->lastname }}"
                                                 class="w-full h-full object-cover">

                                        </div>

                                        <span @class([
                                    'absolute -bottom-1 -end-1 size-3.5 rounded-full border-[3px] border-white',
                                    'bg-amber-400' => $appointment->status === 'pending',
                                    'bg-emerald-500' => $appointment->status === 'accepted',
                                    'bg-red-400' => $appointment->status === 'canceled',
                                ])></span>

                                    </div>


                                    <div>

                                        <h2 class="font-bold
                                           text-gray-800
                                           md:text-[18px] text-[16px]">

                                            {{ $appointment->name }}
                                            {{ $appointment->lastname }}

                                        </h2>

                                        <div class="flex flex-wrap
                                            items-center gap-2
                                            mt-1">

                                    <span class="text-gray-400 text-[11px]">
                                        شماره نوبت
                                    </span>

                                            <span class="text-gray-600
                                                 text-[11px]
                                                 font-medium">
                                        #{{ str_pad($appointment->id, 5, '0', STR_PAD_LEFT) }}
                                    </span>

                                        </div>

                                    </div>

                                </div>


                                {{-- Status --}}
                                <div class="flex flex-wrap items-center gap-2">

                                    <div @class([
                                'inline-flex items-center gap-2 px-3.5 py-2 rounded-full text-[12px] font-medium border',
                                'bg-amber-50 text-amber-600 border-amber-100'
                                    => $appointment->status === 'pending',

                                'bg-emerald-50 text-emerald-600 border-emerald-100'
                                    => $appointment->status === 'accepted',

                                'bg-red-50 text-red-500 border-red-100'
                                    => $appointment->status === 'canceled',
                            ])>

                                <span @class([
                                    'size-2 rounded-full',
                                    'bg-amber-400' => $appointment->status === 'pending',
                                    'bg-emerald-500' => $appointment->status === 'accepted',
                                    'bg-red-400' => $appointment->status === 'canceled',
                                ])></span>


                                        @switch($appointment->status)

                                            @case('pending')
                                                در انتظار تأیید
                                                @break

                                            @case('accepted')
                                                نوبت تأیید شده
                                                @break

                                            @case('canceled')
                                                نوبت لغو شده
                                                @break

                                        @endswitch

                                    </div>


                                    @if($appointment->status !== 'canceled')

                                        <button type="button"
                                                wire:click="cancelAppointment({{ $appointment->id }})"
                                                wire:confirm="آیا از لغو کردن نوبت خود مطمئن هستید؟"
                                                class="px-3.5 py-2
                                               rounded-full
                                               border border-gray-200
                                               text-gray-400
                                               hover:border-red-200
                                               hover:bg-red-50
                                               hover:text-red-500
                                               text-[12px]
                                               cursor-pointer
                                               transition-all duration-300">

                                            لغو نوبت

                                        </button>

                                    @endif

                                </div>

                            </div>


                            {{-- Main Content --}}
                            <div class="md:p-6 p-4">

                                <div class="grid
                                    xl:grid-cols-4
                                    md:grid-cols-2
                                    grid-cols-1
                                    gap-3">


                                    {{-- Date --}}
                                    <div class="group/info
                                        flex items-center gap-3
                                        p-3.5
                                        rounded-2xl
                                        bg-gray-50/70
                                        border border-gray-100
                                        hover:bg-white
                                        hover:shadow-sm
                                        transition-all duration-300">

                                        <div class="size-10 shrink-0
                                            flex items-center justify-center
                                            rounded-xl
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
                                                      d="M6.75 3v2.25M17.25 3v2.25M3.75 9.75h16.5m-15-4.5h13.5A1.5 1.5 0 0 1 20.25 6.75v12A1.5 1.5 0 0 1 18.75 20.25H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z"/>
                                            </svg>

                                        </div>

                                        <div>
                                            <div class="text-[10px] text-gray-400">
                                                تاریخ نوبت
                                            </div>

                                            <div class="text-[13px]
                                                font-medium
                                                text-gray-700 mt-1">
                                                {{ \Morilog\Jalali\Jalalian::fromDateTime($appointment->date)->format('Y/m/d') }}
                                            </div>
                                        </div>

                                    </div>


                                    {{-- Time --}}
                                    <div class="flex items-center gap-3
                                        p-3.5 rounded-2xl
                                        bg-gray-50/70
                                        border border-gray-100
                                        hover:bg-white hover:shadow-sm
                                        transition-all duration-300">

                                        <div class="size-10 shrink-0
                                            flex items-center justify-center
                                            rounded-xl
                                            bg-blue-50
                                            text-blue-500">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke-width="1.7"
                                                 stroke="currentColor"
                                                 class="size-[18px]">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>

                                        </div>

                                        <div>
                                            <div class="text-[10px] text-gray-400">
                                                ساعت
                                            </div>

                                            <div class="text-[13px]
                                                font-medium
                                                text-gray-700 mt-1">

                                                {{ str_replace(
                                                    ['AM','PM'],
                                                    ['صبح','عصر'],
                                                    \Carbon\Carbon::parse($appointment->time)->format('h:i A')
                                                ) }}

                                            </div>
                                        </div>

                                    </div>


                                    {{-- Services --}}
                                    <div class="flex items-center gap-3
                                        p-3.5 rounded-2xl
                                        bg-gray-50/70
                                        border border-gray-100
                                        hover:bg-white hover:shadow-sm
                                        transition-all duration-300">

                                        <div class="size-10 shrink-0
                                            flex items-center justify-center
                                            rounded-xl
                                            bg-pink-50
                                            text-[#ff528c]">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke-width="1.7"
                                                 stroke="currentColor"
                                                 class="size-[18px]">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M12 3.75 14.25 9l5.25 2.25-5.25 2.25L12 18.75 9.75 13.5 4.5 11.25 9.75 9 12 3.75Z"/>
                                            </svg>

                                        </div>

                                        <div class="min-w-0">

                                            <div class="text-[10px] text-gray-400">
                                                خدمات
                                            </div>

                                            <div class="text-[13px]
                                                font-medium
                                                text-gray-700
                                                mt-1 truncate">

                                                @foreach($appointment->services as $service)
                                                    @if($service->is_active == 1)
                                                        {{ $service->name }}@if(!$loop->last)،@endif
                                                    @endif
                                                @endforeach

                                            </div>

                                        </div>

                                    </div>


                                    {{-- Location --}}
                                    <div class="flex items-center gap-3
                                        p-3.5 rounded-2xl
                                        bg-gray-50/70
                                        border border-gray-100
                                        hover:bg-white hover:shadow-sm
                                        transition-all duration-300">

                                        <div class="size-10 shrink-0
                                            flex items-center justify-center
                                            rounded-xl
                                            bg-emerald-50
                                            text-emerald-500">

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

                                        <div class="min-w-0">

                                            <div class="text-[10px] text-gray-400">
                                                محل ارائه خدمات
                                            </div>

                                            <div class="text-[13px]
                                                font-medium
                                                text-gray-700
                                                mt-1 truncate">

                                                {{ $appointment->city }}،
                                                {{ $appointment->district }}

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                {{-- Full Address --}}
                                <div class="mt-4
                                    flex md:flex-row flex-col
                                    md:items-center
                                    justify-between
                                    gap-3
                                    px-4 py-3.5
                                    rounded-2xl
                                    bg-[#fafafa]
                                    border border-gray-100">

                                    <div class="min-w-0">

                                <span class="text-gray-400 text-[11px]">
                                    آدرس کامل
                                </span>

                                        <p class="text-gray-600
                                          text-[13px]
                                          leading-6
                                          mt-0.5">

                                            {{ $appointment->city }}،
                                            {{ $appointment->district }}،
                                            {{ $appointment->address }}

                                        </p>

                                    </div>

                                </div>


                                {{-- User Message --}}
                                @if($appointment->description)

                                    <div class="mt-3
                                        relative
                                        overflow-hidden
                                        bg-[#ff528c]/5
                                        border border-[#ff528c]/10
                                        rounded-2xl
                                        px-4 py-3.5">

                                        <div class="absolute
                                            top-0 start-0
                                            w-[3px] h-full
                                            bg-[#ff528c]">
                                        </div>

                                        <span class="text-[#cf4070] text-[11px]">
                                    یادداشت شما
                                </span>

                                        <p class="text-gray-600
                                          text-[13px]
                                          leading-7
                                          mt-1">
                                            {{ $appointment->description }}
                                        </p>

                                    </div>

                                @endif


                                {{-- Inactive services --}}
                                @php
                                    $inactiveServices = $appointment->services->where('is_active', 0);
                                @endphp

                                @if($inactiveServices->count())

                                    <div class="mt-3
                                        flex items-start gap-3
                                        p-4
                                        rounded-2xl
                                        bg-red-50/70
                                        border border-red-100">

                                        <div class="size-8 shrink-0
                                            flex items-center justify-center
                                            rounded-full
                                            bg-red-100
                                            text-red-500
                                            font-bold">
                                            !
                                        </div>

                                        <div>
                                            <div class="text-red-500
                                                font-bold
                                                text-[12px]">
                                                تغییر در خدمات
                                            </div>

                                            <p class="text-red-400
                                              text-[12px]
                                              leading-6
                                              mt-1">

                                                @foreach($inactiveServices as $service)
                                                    {{ $service->name }}
                                                    @if(!$loop->last)،@endif
                                                @endforeach

                                                در حال حاضر ارائه نمی‌شود.
                                                بابت این تغییر از شما پوزش می‌خواهیم.

                                            </p>
                                        </div>

                                    </div>

                                @endif

                            </div>

                        </article>

                    @endforeach

                </div>

            @endif

        </section>
    </div>
</div>
