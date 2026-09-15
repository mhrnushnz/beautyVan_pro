@section('title', 'ایجاد مقاله') {{-- عنوان این صفحه --}}
@push('scripts')
   @vite(['resources/css/ckeditor.css','resources/js/ckeditor.js']) {{--   این اسکریپت فقط تو این صفحه لود میشه  --}}
@endpush

<div class="md:space-y-6 space-y-3">
    <!-- عنوان -->
    <div class="md:text-[20px] text-[18px] font-bold">ایجاد مقاله</div>


    <form wire:submit.prevent="submit" class="flex md:flex-row flex-col gap-3 sm:text-[16px] text-[14px]" enctype="multipart/form-data">
        <!-- باکس محتویات -->
        <div class="md:w-[75%] w-full shadow-lg h-fit rounded-lg p-3 border border-gray-100 space-y-5">
            {{--      اطلاعات مقاله      --}}
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <input name="title" wire:model="title" type="text" placeholder="عنوان مقاله را وارد کنید." class="border w-full focus:outline-none focus:ring-0w-full border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                    @error('title')
                    <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <input name="slug" wire:model.live="slug" type="text" placeholder="اسلاگ" class="border  w-full focus:outline-none focus:ring-0 border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                    @error('slug')
                    <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <select name="article_category" wire:model="article_category" class="border w-full border-gray-100 focus:outline-none focus:ring-0 py-1 px-4 rounded-full bg-gray-50 text-gray-400">
                        <option value="" selected hidden>دسته بندی</option>
                        @foreach($article_categories as $article_category)
                            <option value="{{$article_category->id}}" >{{$article_category->name}}</option>
                        @endforeach
                    </select>
                    @error('article_category')
                    <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>



                <div>
                    <select wire:model="status" class="w-full border focus:outline-none focus:ring-0 border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-400">
                        <option value="draft">پیش نویس</option>
                        <option value="published">منتشر شده</option>
                    </select>

                    @error('status')
                    <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{--      توضیحات متا      --}}
            <textarea rows="3" placeholder="توضیحات متا" wire:model="meta_description" name="meta_description" class="w-full border focus:outline-none focus:ring-0 border-gray-100 py-1 px-4 rounded-2xl bg-gray-50 text-gray-500"></textarea>
            @error('meta_description')
            <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                {{ $message }}
            </div>
            @enderror

            {{--       کلمات سئویی     --}}
            <div class="space-y-5">
                <div>
                    <input name="focus_keyword" wire:model="focus_keyword" type="text" placeholder="کلمه کلیدی اصلی" class="border w-full focus:outline-none focus:ring-0 border-gray-100 py-1.5 px-4 rounded-full bg-gray-50 text-gray-600">
                    @error('focus_keyword')
                    <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="relative rounded-full overflow-hidden">
                    <input type="text" wire:keydown.enter.prevent="addSecondaryKeyword" wire:model="secondary_keywords_text" placeholder="کلمات کلیدی فرعی..." class="border w-full focus:outline-none space-y-2 focus:ring-0 border-gray-100 py-1.5 px-4 rounded-full bg-gray-50 text-gray-600 overflow-hidden">
                    <button type="button" wire:click="addSecondaryKeyword()" class="bg-gray-200 py-2 px-4 absolute end-0 cursor-pointer text-gray-400">
                        افزودن
                    </button>
                    @error('secondary_keywords_text')
                        <div class="rounded-full mt-2 bg-red-100 px-3 py-2 text-sm text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{--   نمایش کلمات فرعی   --}}
                @if(count($secondary_keywords) > 0 )
                    <div class="flex flex-wrap gap-2">
                        @foreach($secondary_keywords as $index => $keyword)
                            <div class="flex items-center gap-2 bg-pink-100 text-pink-600 px-3 py-1.5 rounded-full text-sm">
                                <span> {{ $keyword }} </span>
                                <button type="button" wire:click="removeSecondaryKeyword({{ $index }})" class="text-pink-500 hover:text-red-600 cursor-pointer font-bold" > × </button>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div>
                     <select wire:model="robots" class="border w-full focus:outline-none focus:ring-0 border-gray-100 py-1.5 px-4 rounded-full bg-gray-50 text-gray-400">
                         <option value="index, follow">index, follow</option>
                         <option value="noindex, follow">noindex, follow</option>
                         <option value="noindex, nofollow">noindex, nofollow</option>
                     </select>
                </div>
            </div>


            {{--        ادیتور       --}}
            <div wire:ignore>
                <div id="ckeditor">{!! $description !!}</div>

                @error('description')
                <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>


        <!-- باکس تصویر و امتیاز سئو -->
        <div class="md:w-[25%] w-full space-y-5">
            {{--  تصویر شاخص  --}}
            <div class="space-y-2 shadow-lg rounded-lg px-3 sm:py-3 py-3 border h-fit border-gray-100">
                <p class="text-[16px] text-gray-500">انتخاب تصویر شاخص</p>

                <div class="w-full lg:max-h-[14rem] md:max-h-[12rem] sm:max-h-[20rem] h-[16rem]">
                    {{--  برای ایجاد مقاله  --}}
                    @if($image)
                        <div class="relative h-full w-full">
                            <img src="{{ $image->temporaryUrl() }}" alt="#" class="w-full h-full object-cover rounded-lg">
                            <button wire:click.prevent="clear_temporary_image()" class="cursor-pointer absolute md:top-3 top-3 md:end-3 end-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 3.5H14C14.5523 3.5 15 3.94772 15 4.5V5H18.5C18.7761 5 19 5.22386 19 5.5C19 5.77614 18.7761 6 18.5 6H5.5C5.22386 6 5 5.77614 5 5.5C5 5.22386 5.22386 5 5.5 5H9V4.5C9 3.94772 9.44772 3.5 10 3.5Z" fill="#fa2e1f"/><path d="M7 7H17L16.2 19.2C16.1289 20.2843 15.2281 21.125 14.1415 21.125H9.85848C8.7719 21.125 7.87108 20.2843 7.8 19.2L7 7Z" fill="#fa2e1f"/><path d="M10 9.5C10.2761 9.5 10.5 9.72386 10.5 10V17C10.5 17.2761 10.2761 17.5 10 17.5C9.72386 17.5 9.5 17.2761 9.5 17V10C9.5 9.72386 9.72386 9.5 10 9.5Z" fill="white"/><path d="M14 9.5C14.2761 9.5 14.5 9.72386 14.5 10V17C14.5 17.2761 14.2761 17.5 14 17.5C13.7239 17.5 13.5 17.2761 13.5 17V10C13.5 9.72386 13.7239 9.5 14 9.5Z" fill="white"/></svg></button>
                        </div>

                        {{--  برای ویرایش  --}}
                    @elseif($articleId)
                        @if($editImage)
                            <div class="relative h-full w-full">
                                <img src="{{ asset('storage/' . $editImage) }}" alt="#" class="w-full h-full object-cover rounded-lg">
                                <button wire:click.prevent="delete_poster({{ $articleId }})"  class="cursor-pointer absolute md:top-3 top-3 md:end-3 end-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 3.5H14C14.5523 3.5 15 3.94772 15 4.5V5H18.5C18.7761 5 19 5.22386 19 5.5C19 5.77614 18.7761 6 18.5 6H5.5C5.22386 6 5 5.77614 5 5.5C5 5.22386 5.22386 5 5.5 5H9V4.5C9 3.94772 9.44772 3.5 10 3.5Z" fill="#fa2e1f"/><path d="M7 7H17L16.2 19.2C16.1289 20.2843 15.2281 21.125 14.1415 21.125H9.85848C8.7719 21.125 7.87108 20.2843 7.8 19.2L7 7Z" fill="#fa2e1f"/><path d="M10 9.5C10.2761 9.5 10.5 9.72386 10.5 10V17C10.5 17.2761 10.2761 17.5 10 17.5C9.72386 17.5 9.5 17.2761 9.5 17V10C9.5 9.72386 9.72386 9.5 10 9.5Z" fill="white"/><path d="M14 9.5C14.2761 9.5 14.5 9.72386 14.5 10V17C14.5 17.2761 14.2761 17.5 14 17.5C13.7239 17.5 13.5 17.2761 13.5 17V10C13.5 9.72386 13.7239 9.5 14 9.5Z" fill="white"/></svg></button>
                            </div>
                        @else
                            <div class="h-full w-full">
                                <img src="{{ asset('/admin/asset/pic/unnamed.png') }}" alt="#" class="w-full h-full object-cover rounded-lg">
                            </div>
                        @endif

                    @else
                        <img src="{{ asset('/admin/asset/pic/unnamed.png') }}" alt="#" class="w-full h-full object-cover rounded-lg">
                    @endif
                </div>

                <input name="image" wire:model="image" type="file" class="w-full border cursor-pointer border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                @error('image')
                <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                    {{ $message }}
                </div>
                @enderror
                <button type="submit" class="w-full cursor-pointer p-1.5 bg-[#ff528c] hover:bg-[#7C3AED] text-white rounded-full">ایجاد کردن</button>
            </div>

            {{--  چک لیست سئو --}}
            <div class="bg-white rounded-lg border border-gray-100 shadow-lg px-3 sm:py-3 py-3 space-y-3">
                {{-- امتیاز کلی سئو --}}
                <div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800"> امتیاز سئو مقاله</h3>
                    </div>

                    {{-- Progress --}}
                    <div class="w-full h-4 bg-gray-200 rounded-full overflow-hidden mb-6 relative">
                        <div class="h-full px-5 rounded-full transition-all duration-500 flex items-center justify-center
                            @if(($seoAnalysis['score'] ?? 0) >= 80)
                                bg-green-400
                            @elseif(($seoAnalysis['score'] ?? 0) >= 60)
                                bg-yellow-400
                            @else
                                bg-red-400
                             @endif" style="width: {{ $seoAnalysis['score'] ?? 0 }}%" >

                        <span class="text-white text-xs font-bold whitespace-nowrap">
                            {{ $seoAnalysis['score'] ?? 0 }}/100
                        </span>
                        </div>
                    </div>
                </div>
                <hr class="text-gray-100">
                {{--   چک لیست   --}}
                <div class="space-y-3">
                    @foreach($seoAnalysis['checks'] ?? [] as $check)
                        <div class="flex items-center justify-between border-b border-gray-100 pb-2">
                            <div class="flex items-center gap-2">
                                @if($check['status'])
                                    <span class="text-green-500 text-lg font-bold">✓</span>
                                @else
                                    <span class="text-red-500 text-lg font-bold">✕</span>
                                @endif
                                <div>
                                    <div class="text-sm font-medium text-gray-700">{{ $check['label'] }}</div>
                                    <div class="text-xs text-gray-400 mt-1">{{ $check['message'] }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
</div>

