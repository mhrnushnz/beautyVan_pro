@section('title', 'ارتباط با شما') {{-- عنوان این صفحه --}}
<div class="md:space-y-6 space-y-3">
    <!-- عنوان -->
    <div class="space-y-3">
        <div class="md:text-[20px] text-[18px] font-bold">ارتباط با شما</div>
        <p class="md:text-[16px] text-[14px]">پیام کاربرانی ک در خارج از ساعات اداری باشما ارتباط گرفتند</p>
    </div>

    <!-- باکس سرچ -->
    <form class="relative">
        <svg class="text-secondary absolute top-2.5 start-3" width="18" height="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="gray"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"></path></svg>
        <input wire:model.live="search" type="text" class="focus:outline-none focus:ring-0 sm:text-[16px] text-[14px] py-2 px-4 ps-9 rounded-full bg-gray-50 w-full" placeholder="بر اساس نام و شماره تماس, کاربر مورد نظر را جست و جو کنید...">
    </form>



    <ul class="p-4 shadow-lg bg-white rounded-2xl border border-gray-100 space-y-4">
        @if($messages->count() == 0)
            <div class="bg-gray-100 rounded-2xl p-5">
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
                <p class="text-gray-400 text-center">هیچ پیامی وجود ندارد</p>
            </div>
        @else
            @foreach($messages as $message)
                <li class="bg-gray-100 p-3 rounded-2xl space-y-3">
                    <!-- پروفایل -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="rounded-full overflow-hidden shrink-0 h-10 w-10">
                                <img src="{{ asset('/admin/asset/pic/default-avatar.png') }}" alt="#" class="w-full h-full object-cover">
                            </div>
                            <p class="font-bold sm:text-[16px] text-[13px]">{{$message->name}}</p>
                        </div>

                        <a wire:click.prevent="delete({{ $message->id }})" href="" class="md:end-5 end-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 3.5H14C14.5523 3.5 15 3.94772 15 4.5V5H18.5C18.7761 5 19 5.22386 19 5.5C19 5.77614 18.7761 6 18.5 6H5.5C5.22386 6 5 5.77614 5 5.5C5 5.22386 5.22386 5 5.5 5H9V4.5C9 3.94772 9.44772 3.5 10 3.5Z" fill="#fa2e1f"/><path d="M7 7H17L16.2 19.2C16.1289 20.2843 15.2281 21.125 14.1415 21.125H9.85848C8.7719 21.125 7.87108 20.2843 7.8 19.2L7 7Z" fill="#fa2e1f"/><path d="M10 9.5C10.2761 9.5 10.5 9.72386 10.5 10V17C10.5 17.2761 10.2761 17.5 10 17.5C9.72386 17.5 9.5 17.2761 9.5 17V10C9.5 9.72386 9.72386 9.5 10 9.5Z" fill="white"/><path d="M14 9.5C14.2761 9.5 14.5 9.72386 14.5 10V17C14.5 17.2761 14.2761 17.5 14 17.5C13.7239 17.5 13.5 17.2761 13.5 17V10C13.5 9.72386 13.7239 9.5 14 9.5Z" fill="white"/></svg>
                        </a>
                    </div>

                    <div class="grid sm:grid-cols-2 grid-cols-1 gap-2 lg:text-[16px] sm:text-[14px] text-[12px]">
                        <input readonly value="شماره تماس: {{ $message->phone }}" type="text" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-2 px-4 rounded-full bg-gray-50 text-gray-600">
                        <input readonly value="{{ $message->email? 'ایمیل: ' . $message->email : 'ایمیل: هیچ ایمیلی وجود ندارد' }}" type="text" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-2 px-4 rounded-full bg-gray-50 text-gray-600">
                    </div>

                    <textarea rows="3" readonly class="w-full lg:text-[16px] sm:text-[14px] text-[12px] border focus:outline-none focus:ring-0 border-gray-100 py-2 px-4 rounded-2xl bg-gray-50 cursor-auto text-gray-600">پیام: {{$message->message}}</textarea>
                </li>
            @endforeach

                <!-- تب بندی -->
                <nav class="flex justify-center items-center gap-2 mt-8">
                    {{-- قبلی --}}
                    @if ($messages->onFirstPage())
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
                        class="px-4 py-2 rounded-lg {{ $messages->currentPage() == 1 ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                        1
                    </button>

                    {{-- سه نقطه اول --}}
                    @if($messages->currentPage() > 3)
                        <span class="px-2">...</span>
                    @endif

                    {{-- صفحات اطراف صفحه فعلی --}}
                    @for($i = max(2, $messages->currentPage() - 1); $i <= min($messages->lastPage() - 1, $messages->currentPage() + 1); $i++)
                        <button
                            wire:click="gotoPage({{ $i }})"
                            class="px-4 py-2 rounded-lg {{ $messages->currentPage() == $i ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                            {{ $i }}
                        </button>
                    @endfor

                    {{-- سه نقطه آخر --}}
                    @if($messages->currentPage() < $messages->lastPage() - 2)
                        <span class="px-2">...</span>
                    @endif

                    {{-- صفحه آخر --}}
                    @if($messages->lastPage() > 1)
                        <button
                            wire:click="gotoPage({{ $messages->lastPage() }})"
                            class="px-4 py-2 rounded-lg {{ $messages->currentPage() == $messages->lastPage() ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                            {{ $messages->lastPage() }}
                        </button>
                    @endif

                    {{-- بعدی --}}
                    @if ($messages->hasMorePages())
                        <button wire:click="nextPage" class="px-4 py-2 rounded-lg bg-white hover:bg-gray-100">
                            بعدی
                        </button>
                    @else
                        <span class="px-4 py-2 rounded-lg bg-gray-200 text-gray-400 cursor-not-allowed">
            بعدی
        </span>
                    @endif
                </nav>
        @endif
    </ul>


</div>
