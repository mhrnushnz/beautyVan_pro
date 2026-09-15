@section('title', 'لیست کاربران') {{-- عنوان این صفحه --}}
<div class="md:space-y-6 space-y-3">
    <!-- عنوان و دکمه افزودن -->
    <div class="flex items-center justify-between">
        <!-- عنوان -->
        <h1 class="font-bold text-shadow-md sm:text-[20px] text-[18px]">لیست کاربران</h1>
    </div>

    <!-- باکس سرچ -->
    <form class="relative">
        <svg class="text-secondary absolute top-2.5 start-3" width="18" height="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="gray"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"></path></svg>
        <input wire:model.live="search" type="text" class="focus:outline-none focus:ring-0 sm:text-[16px] text-[14px] py-2 px-4 ps-9 rounded-full bg-gray-50 w-full" placeholder="بر اساس شماره همراه, کاربر مورد نظر را جست و جو کنید...">
    </form>

    <!-- فیلترینگ -->
    <ul class="flex items-center sm:gap-6 gap-3 sm:text-[16px] text-[12px]">
        <li> مرتب سازی بر اساس:</li>

        <li class="transition-all hover:-translate-y-0.5">
            <a wire:click.prevent="setFilterRole('all')" href="" class="focus:bg-gray-300  hover:text-[#7C3AED] p-2 rounded-md">همه</a>
        </li>

        <li class="transition-all hover:-translate-y-0.5">
            <a wire:click.prevent="setFilterRole('user')" href="" class="focus:bg-gray-300 hover:text-[#7C3AED] p-2 rounded-md">کاربر</a>
        </li>

        <li class="transition-all hover:-translate-y-0.5">
            <a href="" wire:click.prevent="setFilterRole('admin')" class="focus:bg-gray-300 hover:text-[#7C3AED] p-2 rounded-md">ادمین</a>
        </li>

        <li class="transition-all hover:-translate-y-0.5">
            <a href="" wire:click.prevent="setFilterRole('manager')" class="focus:bg-gray-300 hover:text-[#7C3AED] p-2 rounded-md">مدیریت</a>
        </li>
    </ul>

    <!-- جدول -->
    <div class="overflow-x-auto">
        <table class="w-full rounded-lg overflow-hidden border-collapse table-auto sm:text-[16px] text-[14px]">
            <thead class="bg-gray-300">
                <tr>
                    <th class="p-3 border border-gray-400">شماره</th>
                    <th class="p-3 border border-gray-400">تصویر</th>
                    <th class="p-3 border border-gray-400">نام</th>
                    <th class="p-3 border border-gray-400">شماره تلفن</th>
                    <th class="p-3 border border-gray-400">ایمیل</th>
                    <th class="p-3 border border-gray-400">نقش</th>
                    <th class="p-3 border border-gray-400">تاریخ ورود</th>
                    <th class="p-3 border border-gray-400">ویرایش</th>
                    <th class="p-3 border border-gray-400">مسدود کردن</th>
                </tr>
            </thead>

            <tbody class="bg-gray-100">
            @if($users->count() == 0)
                <tr>
                    <td colspan="11">
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
                @foreach($users as $user)
                    <tr class="text-gray-500">
                        <td class="text-center border border-gray-300 p-3">{{$loop->index+1}}</td>
                        <td class="text-center border border-gray-300 p-3"><img width="50" height="50" src="{{asset('admin/asset/pic/default-avatar.png')}}" alt="avatar" class="mx-auto object-cover rounded-lg"></td>
                        <td class="text-center p-3 border border-gray-300 truncate-char">{{$user->name}}</td>
                        <td class="text-center p-3 border border-gray-300">{{ $user->phone }}</td>
                        <td class="text-center p-3 border border-gray-300">{{$user->email}}</td>
                        <td class="text-center p-3 border border-gray-300">
                            @switch($user->getRoleNames()->first())
                                @case('admin')
                                    ادمین
                                @break
                                @case('manager')
                                    مدیریت
                                @break
                                @case('user')
                                    کاربر
                                @break
                                @default
                                    بدون نقش
                            @endswitch
                        </td>
                        <td class="text-center p-3 border border-gray-300">
                            {{ \Morilog\Jalali\Jalalian::fromDateTime($user->created_at)->format('Y/m/d ')}}
                            <br>
                            {{ \Morilog\Jalali\Jalalian::fromDateTime($user->created_at->timezone('Asia/Tehran'))->format('H:i') }}
                        </td>
                        <td class="border text-center border-gray-300 ">
                                @if(auth()->user()->hasRole('admin'))
                                    @if($user->hasRole('admin'))
                                        <span class="text-gray-400 cursor-not-allowed p-2">ویرایش</span>
                                    @else
                                        <a href="{{ route('users.edit',$user->id) }}" class="text-[#49BE78] hover:bg-[#49BE78] hover:text-white rounded-lg p-2">ویرایش</a>
                                    @endif
                                @elseif(auth()->user()->hasRole('manager'))
                                    @if($user->hasRole('manager'))
                                        <span class="text-gray-400 cursor-not-allowed p-2">ویرایش</span>
                                    @else
                                        <a href="{{ route('users.edit',$user->id) }}" class="text-[#49BE78] hover:bg-[#49BE78] hover:text-white rounded-lg p-2">ویرایش</a>
                                    @endif
                                @endif
                        </td>
                        <td class="border border-gray-300 text-center ">
                                @if(auth()->user()->hasRole('admin'))
                                    @if($user->hasRole('admin'))
                                        <span class="text-gray-400 cursor-not-allowed p-2">مسدود کردن</span>
                                    @else
                                        <a wire:click.prevent="delete({{ $user->id }})" href="" class="text-[#ff483b] hover:bg-[#ff483b] hover:text-white rounded-lg p-2">مسدود کردن</a>
                                    @endif
                                @elseif(auth()->user()->hasRole('manager'))
                                    @if($user->hasRole('manager'))
                                        <span class="text-gray-400 cursor-not-allowed p-2">مسدود کردن</span>
                                    @else
                                        <a wire:click.prevent="delete({{ $user->id }})" href="" class="text-[#ff483b] hover:bg-[#ff483b] hover:text-white rounded-lg p-2">مسدود کردن</a>
                                    @endif
                                @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <!-- تب بندی -->
    <nav class="flex justify-center items-center gap-2 mt-8">

        {{-- قبلی --}}
        @if ($users->onFirstPage())
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
            class="px-4 py-2 rounded-lg {{ $users->currentPage() == 1 ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
            1
        </button>

        {{-- سه نقطه اول --}}
        @if($users->currentPage() > 3)
            <span class="px-2">...</span>
        @endif

        {{-- صفحات اطراف صفحه فعلی --}}
        @for($i = max(2, $users->currentPage() - 1); $i <= min($users->lastPage() - 1, $users->currentPage() + 1); $i++)
            <button
                wire:click="gotoPage({{ $i }})"
                class="px-4 py-2 rounded-lg {{ $users->currentPage() == $i ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                {{ $i }}
            </button>
        @endfor

        {{-- سه نقطه آخر --}}
        @if($users->currentPage() < $users->lastPage() - 2)
            <span class="px-2">...</span>
        @endif

        {{-- صفحه آخر --}}
        @if($users->lastPage() > 1)
            <button
                wire:click="gotoPage({{ $users->lastPage() }})"
                class="px-4 py-2 rounded-lg {{ $users->currentPage() == $users->lastPage() ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                {{ $users->lastPage() }}
            </button>
        @endif

        {{-- بعدی --}}
        @if ($users->hasMorePages())
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
