@section('title', 'دسته بندی مقالات') {{-- عنوان این صفحه --}}
<div class="md:space-y-6 space-y-3">
    <!-- عنوان -->
    <div class="md:text-[20px] text-[18px] font-bold">ایجاد دسته بندی مقالات</div>

    <div class="flex md:flex-row flex-col gap-3">
        <div class="md:w-[30%] w-full h-fit p-3 shadow-lg rounded-lg bg-white border border-gray-100">
            <p>دسته بندی مورد نظر خود را وارد کنید</p>
            <form wire:submit.prevent="submit" wire:key="category-form" class="space-y-5 mt-4">
                <input name="name" wire:model.live="name" wire:key="name-input" type="text" placeholder="نام دسته بندی" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                @error('name')
                <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                    {{ $message }}
                </div>
                @enderror

                <input name="slug" wire:model.live="slug" wire:key="slug-input" type="text" placeholder="اسلاگ" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                @error('slug')
                <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                    {{ $message }}
                </div>
                @enderror

                <div>
                    <select name="parent_id" wire:model="parent_id" class="border w-full border-gray-100 focus:outline-none focus:ring-0 py-1 px-4 rounded-full bg-gray-50 text-gray-400">
                        <option value="" selected>دسته اصلی</option>
                        @foreach($articleCategories as $articleCategory)
                            <option value="{{$articleCategory->id}}">{{$articleCategory->name}}</option>
                        @endforeach
                    </select>
                    @error('parent_id')
                    <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <textarea name="meta_description" wire:model="meta_description" wire:key="meta_description-input" type="text" placeholder="توضیحات متا" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-1 px-4 rounded-2xl bg-gray-50 text-gray-500"></textarea>
                @error('meta_description')
                <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                    {{ $message }}
                </div>
                @enderror
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
                            <th class="p-3 border border-gray-400">نام</th>
                            <th class="p-3 border border-gray-400">دسته والد</th>
                            <th class="p-3 border border-gray-400">ویرایش</th>
                            <th class="p-3 border border-gray-400">حذف</th>
                        </tr>
                    </thead>

                    <tbody class="bg-gray-100">
                        @if($articleCategories->isEmpty())
                            <tr>
                                <td colspan="5">
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
                            @foreach($articleCategories as $articleCategory)
                                <tr class="text-gray-500">
                                    <td class="text-center border border-gray-300 p-3">{{$loop->index+1}}</td>
                                    <td class="text-center p-3 border border-gray-300">{{$articleCategory->name}}</td>
                                    <td class="text-center p-3 border border-gray-300">
                                        @if($articleCategory->parent_id)
                                            {{$articleCategory->parent->name}}
                                        @else
                                            دسته اصلی
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 text-center"><a wire:click.prevent="edit({{$articleCategory->id}})" class="transition-all p-2 text-[#49BE78] hover:bg-[#49BE78] hover:text-white rounded-lg" href="">ویرایش</a></td>
                                    <td class="border border-gray-300 text-center"><a wire:click.prevent="delete({{$articleCategory->id}})" class="transition-all text-[#ff483b] rounded-lg hover:bg-[#ff483b] hover:text-white p-2" href="">حذف</a></td>
                                </tr>
                            @endforeach
                        @endif()


                    </tbody>
                </table>
            </div>


            <!-- تب بندی -->
            <nav class="flex justify-center items-center gap-2 mt-8">

                {{-- قبلی --}}
                @if ($articleCategories->onFirstPage())
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
                <button wire:click="gotoPage(1)"
                        class="px-4 py-2 rounded-lg {{ $articleCategories->currentPage() == 1 ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                    1
                </button>

                {{-- سه نقطه اول --}}
                @if($articleCategories->currentPage() > 3)
                    <span class="px-2">...</span>
                @endif

                {{-- صفحات اطراف صفحه فعلی --}}
                @for($i = max(2, $articleCategories->currentPage() - 1); $i <= min($articleCategories->lastPage() - 1, $articleCategories->currentPage() + 1); $i++)
                    <button
                        wire:click="gotoPage({{ $i }})"
                        class="px-4 py-2 rounded-lg {{ $articleCategories->currentPage() == $i ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                        {{ $i }}
                    </button>
                @endfor

                {{-- سه نقطه آخر --}}
                @if($articleCategories->currentPage() < $articleCategories->lastPage() - 2)
                    <span class="px-2">...</span>
                @endif

                {{-- صفحه آخر --}}
                @if($articleCategories->lastPage() > 1)
                    <button
                        wire:click="gotoPage({{ $articleCategories->lastPage() }})"
                        class="px-4 py-2 rounded-lg {{ $articleCategories->currentPage() == $articleCategories->lastPage() ? 'bg-[#A855F7] text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                        {{ $articleCategories->lastPage() }}
                    </button>
                @endif

                {{-- بعدی --}}
                @if ($articleCategories->hasMorePages())
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
    </div>
</div>
