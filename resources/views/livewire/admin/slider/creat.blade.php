@section('title', 'ایجاد اسلایدر')
<div class="md:space-y-6 space-y-3">
    <!-- عنوان -->
    @error('position')
    <div class="rounded-lg bg-red-50 px-3 py-3 text-sm text-red-600">
        {{ $message }}
    </div>
    @enderror
    <h1 class="font-bold text-shadow-md sm:text-[20px] text-[18px]">ایجاد اسلایدر</h1>

    <form wire:submit.prevent="submit" class="sm:text-[16px] text-[14px]">
        <div class="w-full shadow-lg rounded-lg px-3 sm:py-6 py-3 border h-fit border-gray-100 ">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">

                {{-- اطلاعات فرم: 8 ستون --}}
                <div class="lg:col-span-8 space-y-4">
                    <p class="text-gray-600">لطفا فرم زیر را پر کنید</p>

                    <div class="space-y-2">
                        <label for="position" class="ms-1" >جایگاه:</label>
                        <select wire:model.live="position" id="position" class="border w-full focus:outline-none focus:ring-0 border-gray-100 py-1.5 px-4 rounded-full bg-gray-50 text-gray-600">
                            <option value="top" selected>اسلایدر</option>
                            <option value="center">پوستر</option>
                            <option value="bottom">تبلیغات</option>
                        </select>
                    </div>


                    @if($position === 'top')
                        {{-- عنوان --}}
                        <div class="space-y-2">
                            <label for="title" class="ms-1" >عنوان:</label>
                            <input wire:model="title" name="title" id="title" type="text" placeholder="عنوان" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                            @error('title')
                            <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- توضیحات --}}
                        <div class="space-y-2">
                            <label for="description" class="ms-1" >توضیحات:</label>
                            <input wire:model="description" name="description" id="description" type="text" placeholder="توضیحات" class="w-full border focus:outline-none focus:ring-0 border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                            @error('description')
                            <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        {{-- توضیح کوتاه --}}
                        <div class="space-y-2">
                            <label for="short_description" class="ms-1" >توضیحات کوتاه:</label>
                            <input wire:model="short_description" name="short_description" id="short_description" type="text" placeholder="توضیح کوتاه" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                            @error('short_description')
                            <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    @elseif($position === 'bottom')
                        {{-- آدرس لینک --}}
                        <div class="space-y-2">
                            <label for="link" class="ms-1" >آدرس لینک:</label>
                            <input wire:model="link" id="link" name="link" type="url" dir="ltr" placeholder="https://example.com" class="w-full focus:outline-none focus:ring-0 border border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                            @error('link')
                            <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    @endif
                </div>


                {{-- آپلود تصویر: 4 ستون --}}
                <div class="lg:col-span-4 space-y-3">
                    <div class="space-y-3">
                        <div class="relative w-full xl:h-80 lg:h-60 sm:h-70 h-50 shrink-0 bg-gray-100 rounded-2xl overflow-hidden">
                            @if($image)
                                <img src="{{ $image->temporaryUrl() }}" alt="" class="w-full h-full object-cover">
                                <button wire:click.prevent="clear_temporary_image" class="cursor-pointer absolute md:top-3 top-3 md:end-3 end-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 3.5H14C14.5523 3.5 15 3.94772 15 4.5V5H18.5C18.7761 5 19 5.22386 19 5.5C19 5.77614 18.7761 6 18.5 6H5.5C5.22386 6 5 5.77614 5 5.5C5 5.22386 5.22386 5 5.5 5H9V4.5C9 3.94772 9.44772 3.5 10 3.5Z" fill="#fa2e1f"/><path d="M7 7H17L16.2 19.2C16.1289 20.2843 15.2281 21.125 14.1415 21.125H9.85848C8.7719 21.125 7.87108 20.2843 7.8 19.2L7 7Z" fill="#fa2e1f"/><path d="M10 9.5C10.2761 9.5 10.5 9.72386 10.5 10V17C10.5 17.2761 10.2761 17.5 10 17.5C9.72386 17.5 9.5 17.2761 9.5 17V10C9.5 9.72386 9.72386 9.5 10 9.5Z" fill="white"/><path d="M14 9.5C14.2761 9.5 14.5 9.72386 14.5 10V17C14.5 17.2761 14.2761 17.5 14 17.5C13.7239 17.5 13.5 17.2761 13.5 17V10C13.5 9.72386 13.7239 9.5 14 9.5Z" fill="white"/></svg></button>
                            @elseif($imageEdit)
                                <img src="{{ asset('storage/'.$imageEdit) }}" alt="" class="w-full h-full object-cover">
                                <button wire:click.prevent="clear_temporary_image" class="cursor-pointer absolute md:top-3 top-3 md:end-3 end-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 3.5H14C14.5523 3.5 15 3.94772 15 4.5V5H18.5C18.7761 5 19 5.22386 19 5.5C19 5.77614 18.7761 6 18.5 6H5.5C5.22386 6 5 5.77614 5 5.5C5 5.22386 5.22386 5 5.5 5H9V4.5C9 3.94772 9.44772 3.5 10 3.5Z" fill="#fa2e1f"/><path d="M7 7H17L16.2 19.2C16.1289 20.2843 15.2281 21.125 14.1415 21.125H9.85848C8.7719 21.125 7.87108 20.2843 7.8 19.2L7 7Z" fill="#fa2e1f"/><path d="M10 9.5C10.2761 9.5 10.5 9.72386 10.5 10V17C10.5 17.2761 10.2761 17.5 10 17.5C9.72386 17.5 9.5 17.2761 9.5 17V10C9.5 9.72386 9.72386 9.5 10 9.5Z" fill="white"/><path d="M14 9.5C14.2761 9.5 14.5 9.72386 14.5 10V17C14.5 17.2761 14.2761 17.5 14 17.5C13.7239 17.5 13.5 17.2761 13.5 17V10C13.5 9.72386 13.7239 9.5 14 9.5Z" fill="white"/></svg></button>
                            @else
                                <div class="w-full text-[18px] h-full flex items-center justify-center text-gray-400">
                                    تصویری وجود ندارد
                                </div>
                            @endif
                        </div>

                        <input wire:model="image" name="image" type="file" class="w-full border cursor-pointer border-gray-100 py-1 px-4 rounded-full bg-gray-50 text-gray-600">
                        @error('image')
                        <div class="rounded-full bg-red-100 px-3 py-2 text-sm text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                        <button class="bg-[#ff528c] block hover:bg-[#7C3AED] py-1.5 sm:px-14 px-8 cursor-pointer rounded-full text-white">ایجاد</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
