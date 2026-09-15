@section('title', 'افزودن نمونه کار') {{-- عنوان این صفحه --}}
<div class="md:space-y-6 space-y-3">
    <!-- عنوان -->
    <div class="md:text-[20px] text-[18px] font-bold">نمونه کار ها</div>

    <form wire:submit.prevent="submit" class="flex gap-3 sm:text-[16px] text-[14px]" enctype="multipart/form-data">
        <div class="space-y-6 w-full shadow-lg rounded-lg px-3 sm:py-3 py-3 border h-fit border-gray-100 ">
            <!-- دکمه و انتخاب دسته -->
            <div class="flex items-center justify-between">
                <div class="w-[49%]">
                    <p class="text-gray-600">لطفا خدمات مورد نظر خود را انتخاب نمایید</p>
                    <select name="serviceCategory" wire:model="serviceCategory" class="w-full mt-2 focus:outline-none focus:ring-0 border border-gray-100  py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                        <option value="" selected  hidden>انتخاب خدمات</option>
                        @foreach($serviceCategories as $service_category)
                            <option value="{{$service_category->id}}" >{{$service_category->name}}</option>
                        @endforeach
                    </select>
                    @error('serviceCategory')
                    <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="bg-[#ff528c] hover:bg-[#7C3AED] py-1.5 sm:px-14 px-8 cursor-pointer rounded-full text-white">ایجاد</button>

            </div>

            <!-- گالری تصاویر ورودی-->
            <div class="flex items-center gap-2">
                <p class="text-[]">گالری نمونه کار ها</p>
                <input multiple wire:model="images" name="images" type="file" class="md:w-1/4 w-1/2 border cursor-pointer border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                @error('images')
                <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                    {{ $message }}
                </div>
                @enderror

                @error('images.*')
                <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                    {{ $message }}
                </div>
                @enderror
            </div>

            @if(count($images))
                <!-- گالری تصاویر -->
                <ul class="grid lg:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-3">
                    @foreach($images as $index => $image)
                        <li class="relative shadow-lg bg-white md:p-3 sm:p-2 p-1 border border-gray-100  rounded-lg h-fit">
                            <div class="lg:h-[14rem] md:h-[14rem] sm:h-[12rem] h-[10rem]">
                                <img src="{{ $image->temporaryUrl() }}" alt="#" class="w-full h-full object-cover rounded-md">
                            </div>


                            {{--چون تصویر تو حافظه موقته و میخوایم حذف کنیم باید از ارایه حذف کنیم برای همین ایندکس میدیم--}}
                            <a wire:click.prevent="removeImage({{ $index }})" href="" class="absolute md:top-5 top-3 md:end-5 end-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 3.5H14C14.5523 3.5 15 3.94772 15 4.5V5H18.5C18.7761 5 19 5.22386 19 5.5C19 5.77614 18.7761 6 18.5 6H5.5C5.22386 6 5 5.77614 5 5.5C5 5.22386 5.22386 5 5.5 5H9V4.5C9 3.94772 9.44772 3.5 10 3.5Z" fill="#fa2e1f"/><path d="M7 7H17L16.2 19.2C16.1289 20.2843 15.2281 21.125 14.1415 21.125H9.85848C8.7719 21.125 7.87108 20.2843 7.8 19.2L7 7Z" fill="#fa2e1f"/><path d="M10 9.5C10.2761 9.5 10.5 9.72386 10.5 10V17C10.5 17.2761 10.2761 17.5 10 17.5C9.72386 17.5 9.5 17.2761 9.5 17V10C9.5 9.72386 9.72386 9.5 10 9.5Z" fill="white"/><path d="M14 9.5C14.2761 9.5 14.5 9.72386 14.5 10V17C14.5 17.2761 14.2761 17.5 14 17.5C13.7239 17.5 13.5 17.2761 13.5 17V10C13.5 9.72386 13.7239 9.5 14 9.5Z" fill="white"/></svg>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="grid-cols-12 w-full bg-gray-100 rounded-2xl py-6">
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
                </div>
            @endif

        </div>
    </form>
</div>
