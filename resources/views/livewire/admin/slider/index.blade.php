@section('title', 'اسلایدر ها') {{-- عنوان این صفحه --}}
<div class="md:space-y-6 space-y-3">
    <!-- عنوان و دکمه افزودن -->
    <div class="flex items-center justify-between">
        <!-- عنوان -->
        <h1 class="font-bold text-shadow-md sm:text-[20px] text-[18px]">اسلایدر ها</h1>
        <!-- افزودن -->

        <a href="{{ route('adminSliderCreat') }}" class="bg-[#ff528c] text-white rounded-full px-6 py-1.5 sm:text-[16px] text-[12px]">ایجاد اسلایدر</a>
    </div>

    <!-- باکس سرچ -->
    <form class="relative">
        <svg class="text-secondary absolute top-2.5 start-3" width="18" height="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="gray"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"></path></svg>
        <input wire:model.live="search" type="text" class="focus:outline-none focus:ring-0 sm:text-[16px] text-[14px] py-2 px-4 ps-9 rounded-full bg-gray-50 w-full" placeholder="بر اساس عنوان, اسلایدر مورد نظر را جست و جو کنید...">
    </form>


    <!-- فیلترینگ -->
    <ul class="flex flex-wrap items-center sm:gap-6 gap-3 sm:text-[16px] text-[12px]">
        <li class="text-gray-600"> مرتب‌سازی بر اساس:</li>
        <li>
            <button type="button" wire:click="$set('status', 'all')" class="transition-all hover:-translate-y-0.5 p-2 rounded-md cursor-pointer {{ $status === 'all' ? 'bg-purple-100 text-[#7C3AED] font-bold' : 'hover:text-[#7C3AED]' }}">همه</button>
        </li>
        <li>
            <button type="button" wire:click="$set('status', 'top')" class="transition-all hover:-translate-y-0.5 p-2 rounded-md cursor-pointer {{ $status === 'top' ? 'bg-purple-100 text-[#7C3AED] font-bold' : 'hover:text-[#7C3AED]' }}">
                اسلایدر
            </button>
        </li>

        <li>
            <button type="button" wire:click="$set('status', 'center')" class="transition-all hover:-translate-y-0.5 p-2 rounded-md cursor-pointer {{ $status === 'center' ? 'bg-purple-100 text-[#7C3AED] font-bold' : 'hover:text-[#7C3AED]' }}">
                پوستر
            </button>
        </li>

        <li>
            <button type="button" wire:click="$set('status', 'bottom')" class="transition-all hover:-translate-y-0.5 p-2 rounded-md cursor-pointer {{ $status === 'bottom' ? 'bg-purple-100 text-[#7C3AED] font-bold' : 'hover:text-[#7C3AED]' }}">
                تبلیغات
            </button>
        </li>
    </ul>

    <!-- جدول -->
    <div class="overflow-x-auto">
        <table class="w-full rounded-lg overflow-hidden border-collapse table-auto sm:text-[16px] text-[14px]">
            <thead class="bg-gray-300">
            <tr>
                <th class="p-3 border border-gray-400">شماره</th>
                <th class="p-3 border border-gray-400">تصویر</th>
                <th class="p-3 border border-gray-400">عنوان</th>
                <th class="p-3 border border-gray-400">توضیحات</th>
                <th class="p-3 border border-gray-400">توضیح کوتاه</th>
                <th class="p-3 border border-gray-400">جایگاه</th>
                <th class="p-3 border border-gray-400">ویرایش</th>
                <th class="p-3 border border-gray-400">حذف</th>
            </tr>
            </thead>

            <tbody class="bg-gray-100">

            @if($sliders->count() == 0)
                <tr>
                    <td colspan="8">
                        <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="180" height="135"
                             viewBox="0 0 180 135">
                            <defs>
                                <linearGradient id="a" x1="85.573%" x2="0%" y1="49.996%" y2="50.005%">
                                    <stop offset="0%" stop-color="#A1A3A8" />
                                    <stop offset="100%" stop-color="#C1C3C7" />
                                </linearGradient>
                                <filter id="b" width="106.2%" height="700%" x="-3.1%" y="-300%"
                                        filterUnits="objectBoundingBox">
                                    <feGaussianBlur in="SourceGraphic" stdDeviation=".9" />
                                </filter>
                                <linearGradient id="c" x1="30.024%" x2="30.024%" y1="0%" y2="100%">
                                    <stop offset="0%" stop-color="#EEE" />
                                    <stop offset="89.469%" stop-color="#DDD" />
                                    <stop offset="100%" stop-color="#EDEDED" />
                                </linearGradient>
                                <linearGradient id="d" x1="100%" x2="0%" y1="100%" y2="100%">
                                    <stop offset="0%" stop-color="#C0C2C5" />
                                    <stop offset="100%" stop-color="#A1A3A8" />
                                </linearGradient>
                                <linearGradient id="e" x1="30.024%" x2="30.024%" y1="0%" y2="100%">
                                    <stop offset="0%" stop-color="#F0F0F1" />
                                    <stop offset="67.831%" stop-color="#E0E0E2" />
                                    <stop offset="100%" stop-color="#C0C2C5" />
                                </linearGradient>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <path fill="url(#a)" d="M127.8 122.4l-.677.9H40.5l29.106-.9z" filter="url(#b)"
                                      transform="matrix(-1 0 0 1 168.3 0)" />
                                <path fill="url(#c)"
                                      d="M134.1 14.4v90.9H71.568c-5.726 0-10.368-4.642-10.368-10.368V14.4h72.9z"
                                      transform="matrix(-1 0 0 1 195.3 0)" />
                                <path fill="url(#d)" d="M0 0h38.88v3.888H0z"
                                      transform="matrix(-1 0 0 1 113.58 26.1)" />
                                <path fill="#A1A3A8" d="M121.356 26.1h-3.888v3.888h3.888z" />
                                <path fill="url(#d)" d="M0 0h38.88v3.888H0z"
                                      transform="matrix(-1 0 0 1 113.58 35.172)" />
                                <path fill="#A1A3A8" d="M121.356 35.172h-3.888v3.888h3.888z" />
                                <path fill="url(#d)" d="M0 0h38.88v3.888H0z"
                                      transform="matrix(-1 0 0 1 113.58 44.244)" />
                                <path fill="#A1A3A8" d="M121.356 44.244h-3.888v3.888h3.888z" />
                                <path fill="url(#d)" d="M0 0h38.88v3.888H0z"
                                      transform="matrix(-1 0 0 1 113.58 53.316)" />
                                <path fill="#A1A3A8" d="M121.356 53.316h-3.888v3.888h3.888z" />
                                <g>
                                    <path fill="url(#d)" d="M0 0h38.88v3.888H0z"
                                          transform="matrix(-1 0 0 1 113.58 62.388)" />
                                    <path fill="#A1A3A8" d="M121.356 62.388h-3.888v3.888h3.888z" />
                                </g>
                                <g>
                                    <path fill="url(#d)" d="M0 0h38.88v3.888H0z"
                                          transform="matrix(-1 0 0 1 113.58 71.46)" />
                                    <path fill="#A1A3A8" d="M121.356 71.46h-3.888v3.888h3.888z" />
                                </g>
                                <g>
                                    <path fill="url(#d)" d="M0 0h38.88v3.888H0z"
                                          transform="matrix(-1 0 0 1 113.58 80.532)" />
                                    <path fill="#A1A3A8" d="M121.356 80.532h-3.888v3.888h3.888z" />
                                </g>
                                <g>
                                    <path fill="url(#d)" d="M0 0h38.88v3.888H0z"
                                          transform="matrix(-1 0 0 1 113.58 89.604)" />
                                    <path fill="#A1A3A8" d="M121.356 89.604h-3.888v3.888h3.888z" />
                                </g>
                                <path fill="url(#e)"
                                      d="M50.85 91.8h72.45v2.092c0 5.803-4.705 10.508-10.508 10.508H40.5c5.716 0 10.35-4.634 10.35-10.35V91.8z"
                                      transform="matrix(-1 0 0 1 163.8 0)" />
                            </g>
                        </svg>
                        <p class="text-gray-400 text-center">موردی یافت نشد</p>
                    </td>
                </tr>
            @else
                @foreach($sliders as $slider)
                    <tr class="text-gray-500">
                        <td class="text-center border border-gray-300 p-3">{{$loop->index+1}}</td>
                        <td width="100" height="100" class="text-center w-1/5 border border-gray-300 p-1.5"><img src="{{ asset('storage/' . $slider->path) }}" alt="#" class="mx-auto w-full h-full object-cover rounded-md"></td>
                        <td class="text-center p-3 border border-gray-300">
                            @if(!is_null($slider->title))
                                {{$slider->title}}
                            @else
                                ...
                            @endif
                        </td>
                        <td class="text-center p-3 border border-gray-300">
                            @if(!is_null($slider->description))
                                {{ \Illuminate\Support\Str::limit(strip_tags($slider->description), 34) }}
                            @else
                                ...
                            @endif
                        </td>
                        <td class="text-center p-3 border border-gray-300">
                            @if(!is_null($slider->short_description))
                                {{ \Illuminate\Support\Str::limit(strip_tags($slider->short_description), 34) }}</td>
                            @else
                                ...
                            @endif

                        <td class="text-center p-3 border border-gray-300">
                            @if($slider->position === 'top')
                                اسلایدر
                            @elseif($slider->position === 'center')
                                پوستر
                            @else
                                تبلیغات
                            @endif
                        </td>
                        <td class="border border-gray-300 text-center"><a class="transition-all p-2 text-[#49BE78] hover:bg-[#49BE78] hover:text-white rounded-lg" href="{{ route('adminSliderCreat', $slider->id) }}">ویرایش</a></td>
                        <td class="transition-all border border-gray-300 text-center"><a wire:click.prevent="delete({{$slider->id}})" wire:confirm="آیا مطمئن هستید؟" class="transition-all text-[#ff483b] rounded-lg hover:bg-[#ff483b] hover:text-white p-2" href="">حذف</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>


    <!-- تب بندی -->
    <nav class="flex justify-center items-center gap-2 mt-8">
        {{-- قبلی --}}
        @if ($sliders->onFirstPage())
            <span class="px-4 py-2 rounded-lg bg-gray-200 text-gray-400 cursor-not-allowed">
            قبلی
        </span>
        @else
            <button
                wire:click="previousPage"
                class="px-4 py-2 rounded-lg bg-white hover:bg-gray-100">
                قبلی
            </button>
        @endif

        {{-- صفحه اول --}}
        <button
            wire:click="gotoPage(1)"
            class="px-4 py-2 rounded-lg {{ $sliders->currentPage() == 1 ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
            1
        </button>

        {{-- سه نقطه اول --}}
        @if($sliders->currentPage() > 3)
            <span class="px-2">...</span>
        @endif

        {{-- صفحات اطراف صفحه فعلی --}}
        @for($i = max(2, $sliders->currentPage() - 1); $i <= min($sliders->lastPage() - 1, $sliders->currentPage() + 1); $i++)
            <button
                wire:click="gotoPage({{ $i }})"
                class="px-4 py-2 rounded-lg {{ $sliders->currentPage() == $i ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                {{ $i }}
            </button>
        @endfor

        {{-- سه نقطه آخر --}}
        @if($sliders->currentPage() < $sliders->lastPage() - 2)
            <span class="px-2">...</span>
        @endif

        {{-- صفحه آخر --}}
        @if($sliders->lastPage() > 1)
            <button
                wire:click="gotoPage({{ $sliders->lastPage() }})"
                class="px-4 py-2 rounded-lg {{ $sliders->currentPage() == $sliders->lastPage() ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                {{ $sliders->lastPage() }}
            </button>
        @endif

        {{-- بعدی --}}
        @if ($sliders->hasMorePages())
            <button wire:click="nextPage" class="px-4 py-2 rounded-lg bg-white hover:bg-gray-100">
                بعدی
            </button>
        @else
            <span class="px-4 py-2 rounded-lg bg-gray-200 text-gray-400 cursor-not-allowed">
            بعدی
        </span>
        @endif
    </nav>
</div>
