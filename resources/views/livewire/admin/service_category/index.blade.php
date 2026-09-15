@section('title', 'دسته بندی خدمات') {{-- عنوان این صفحه --}}
<div class="md:space-y-6 space-y-3">
    <!-- عنوان -->
    <div class="md:text-[20px] text-[18px] font-bold">ایجاد دسته بندی خدمات</div>

    <div class="flex md:flex-row flex-col gap-3">
        <div class="md:w-[30%] w-full h-fit px-3 py-3 shadow-lg rounded-lg bg-white border border-gray-100">
            <form wire:submit.prevent="submit" class="space-y-5">
                <div class="space-y-2">
                    <div class="relative w-full lg:h-50 md:h-40 sm:h-50 h-50 shrink-0 bg-gray-100 rounded-2xl overflow-hidden">
                        @if($image)
                            <img src="{{ $image->temporaryUrl() }}" alt="" class="w-full h-full object-cover">
                            <button type="button" wire:click="removeImage" class="cursor-pointer absolute md:top-3 top-3 md:end-3 end-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 3.5H14C14.5523 3.5 15 3.94772 15 4.5V5H18.5C18.7761 5 19 5.22386 19 5.5C19 5.77614 18.7761 6 18.5 6H5.5C5.22386 6 5 5.77614 5 5.5C5 5.22386 5.22386 5 5.5 5H9V4.5C9 3.94772 9.44772 3.5 10 3.5Z" fill="#fa2e1f"/><path d="M7 7H17L16.2 19.2C16.1289 20.2843 15.2281 21.125 14.1415 21.125H9.85848C8.7719 21.125 7.87108 20.2843 7.8 19.2L7 7Z" fill="#fa2e1f"/><path d="M10 9.5C10.2761 9.5 10.5 9.72386 10.5 10V17C10.5 17.2761 10.2761 17.5 10 17.5C9.72386 17.5 9.5 17.2761 9.5 17V10C9.5 9.72386 9.72386 9.5 10 9.5Z" fill="white"/><path d="M14 9.5C14.2761 9.5 14.5 9.72386 14.5 10V17C14.5 17.2761 14.2761 17.5 14 17.5C13.7239 17.5 13.5 17.2761 13.5 17V10C13.5 9.72386 13.7239 9.5 14 9.5Z" fill="white"/></svg></button>
                        @elseif($imageEdit)
                            <img src="{{ asset('storage/' . $imageEdit) }}" alt="" class="w-full h-full object-cover">
                            <button type="button" wire:click="removeImage" class="cursor-pointer absolute md:top-3 top-3 md:end-3 end-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 3.5H14C14.5523 3.5 15 3.94772 15 4.5V5H18.5C18.7761 5 19 5.22386 19 5.5C19 5.77614 18.7761 6 18.5 6H5.5C5.22386 6 5 5.77614 5 5.5C5 5.22386 5.22386 5 5.5 5H9V4.5C9 3.94772 9.44772 3.5 10 3.5Z" fill="#fa2e1f"/><path d="M7 7H17L16.2 19.2C16.1289 20.2843 15.2281 21.125 14.1415 21.125H9.85848C8.7719 21.125 7.87108 20.2843 7.8 19.2L7 7Z" fill="#fa2e1f"/><path d="M10 9.5C10.2761 9.5 10.5 9.72386 10.5 10V17C10.5 17.2761 10.2761 17.5 10 17.5C9.72386 17.5 9.5 17.2761 9.5 17V10C9.5 9.72386 9.72386 9.5 10 9.5Z" fill="white"/><path d="M14 9.5C14.2761 9.5 14.5 9.72386 14.5 10V17C14.5 17.2761 14.2761 17.5 14 17.5C13.7239 17.5 13.5 17.2761 13.5 17V10C13.5 9.72386 13.7239 9.5 14 9.5Z" fill="white"/></svg></button>
                        @else
                            <div class="w-full text-[18px] h-full flex items-center justify-center text-gray-400">
                                تصویری وجود ندارد
                            </div>
                        @endif
                    </div>

                    <input type="file" wire:model="image" name="image" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">

                    @error('image')
                    <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="space-y-2">
                    <p>دسته بندی مورد نظر خود را وارد کنید</p>
                    <input type="text" name="name" wire:model.live="name" placeholder="نام دسته بندی" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                    @error('name')
                    <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                    <input type="text" name="slug" wire:model.live="slug" placeholder="اسلاگ" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                    @error('slug')
                    <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                    <textarea type="text" rows="3" name="meta_description" wire:model="meta_description" placeholder="توضیخات متا" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-1 px-4 rounded-2xl bg-gray-50 text-gray-600"></textarea>
                    @error('meta_description')
                    <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="space-y-1">
                    <p>آیا میخواهید این خدمات فعال باشه؟</p>
                    <div class="grid grid-cols-2">
                        <div class="flex items-center gap-1.5">
                            <input type="radio" value="1" wire:model="is_active" id="active" name="radio" class="border w-fit border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                            <label for="active">بله</label>
                        </div>

                        <div class="flex items-center text-nowrap gap-1.5">
                            <input type="radio" value="0" wire:model="is_active" id="not_active" name="radio" class="w-fit border border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                            <label for="not_active">خیر</label>
                        </div>

                        @error('radio')
                        <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="w-full cursor-pointer p-1.5 bg-[#ff528c] hover:bg-[#7C3AED] text-white rounded-full">افزودن</button>
            </form>
        </div>


        <div class="md:w-[70%] w-full p-3 shadow-lg rounded-lg bg-white border border-gray-100">
            <!-- جدول -->
            <div class="overflow-x-auto mt">
                <table class="w-full rounded-lg overflow-hidden border-collapse table-auto sm:text-[16px] text-[14px]">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="p-3 border border-gray-400">شماره</th>
                            <th class="p-3 border border-gray-400">تصویر</th>
                            <th class="p-3 border border-gray-400">نام</th>
                            <th class="p-3 border border-gray-400">وضعیت فعالیت</th>
                            <th class="p-3 border border-gray-400">ویرایش</th>
                            <th class="p-3 border border-gray-400">حذف</th>
                        </tr>
                    </thead>

                    <tbody class="bg-gray-100">
                    @if($servicesCategories->count() == 0)
                        <tr>
                            <td colspan="6">
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
                        @foreach($servicesCategories as $servicesCategory)
                            <tr class="text-gray-500">
                                <td class="text-center border border-gray-300 p-3">{{ $loop->index + 1 }}</td>
                                <td width="100" height="100" class="text-center p-3 border border-gray-300"><img src="{{ asset('storage/'. $servicesCategory->path) }}" alt="" class="w-full h-full object-cover rounded-2xl"></td>
                                <td class="text-center p-3 border border-gray-300">{{ $servicesCategory->name }}</td>
                                <td class="text-center p-3 border border-gray-300">{{ $servicesCategory->is_active == true? 'فعال' : 'غیر فعال' }}</td>
                                <td class="border border-gray-300 text-center"><a wire:click.prevent="edit({{ $servicesCategory->id }})" class="transition-all p-2 text-[#49BE78] hover:bg-[#49BE78] hover:text-white rounded-lg" href="">ویرایش</a></td>
                                <td class="border border-gray-300 text-center"><a wire:confirm="آیا مطمئن هستید؟" wire:click.prevent="delete({{ $servicesCategory->id }})" class="transition-all text-[#ff483b] rounded-lg hover:bg-[#ff483b] hover:text-white p-2" href="">حذف</a></td>
                            </tr>
                        @endforeach
                    @endif()
                    </tbody>
                </table>
            </div>



            <nav class="flex justify-center items-center gap-2 mt-8">

                {{-- قبلی --}}
                @if ($servicesCategories->onFirstPage())
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
                <button wire:click="gotoPage(1)" class="px-4 py-2 rounded-lg {{ $servicesCategories->currentPage() == 1 ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                    1
                </button>

                {{-- سه نقطه اول --}}
                @if($servicesCategories->currentPage() > 3)
                    <span class="px-2">...</span>
                @endif

                {{-- صفحات اطراف صفحه فعلی --}}
                @for($i = max(2, $servicesCategories->currentPage() - 1); $i <= min($servicesCategories->lastPage() - 1, $servicesCategories->currentPage() + 1); $i++)
                    <button
                        wire:click="gotoPage({{ $i }})"
                        class="px-4 py-2 rounded-lg {{ $servicesCategories->currentPage() == $i ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                        {{ $i }}
                    </button>
                @endfor

                {{-- سه نقطه آخر --}}
                @if($servicesCategories->currentPage() < $servicesCategories->lastPage() - 2)
                    <span class="px-2">...</span>
                @endif

                {{-- صفحه آخر --}}
                @if($servicesCategories->lastPage() > 1)
                    <button wire:click="gotoPage({{ $servicesCategories->lastPage() }})" class="px-4 py-2 rounded-lg {{ $servicesCategories->currentPage() == $servicesCategories->lastPage() ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                        {{ $servicesCategories->lastPage() }}
                    </button>
                @endif

                {{-- بعدی --}}
                @if ($servicesCategories->hasMorePages())
                    <button wire:click="nextPage" class="px-4 py-2 rounded-lg bg-white hover:bg-gray-100">بعدی</button>
                @else
                    <span class="px-4 py-2 rounded-lg bg-gray-200 text-gray-400 cursor-not-allowed">بعدی</span>
                @endif

            </nav>
        </div>
    </div>
</div>
