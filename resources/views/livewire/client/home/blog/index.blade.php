<div>
    <div class="place-items-center">
        <!-- عنوان -->
        <div class="w-full h-[18rem] bg-gradient-to-t from-white to-white/0 relative -z-10" style=" background-image: url({{ asset('/client/asset/pic/Group-344902.png')}}); background-position: top;">
            <svg class="lg:size-30 md:size-30 sm:size-24 size-20 absolute md:-top-10.5 sm:-top-7.5 -top-5.5 lg:start-[45%] md:start-[43%] sm:start-[43%] start-[39%]" xmlns="http://www.w3.org/2000/svg" width="166" height="78" viewBox="0 0 166 78" fill="none"><path d="M44.0908 39C44.0908 60.5391 61.5806 78 83.1553 78C104.73 78 122.22 60.5391 122.22 39C122.22 17.4609 104.73 0 83.1553 0C61.5806 0 44.0908 17.4609 44.0908 39Z" fill="white"></path><path d="M47.2373 55.5859C47.2373 55.5859 43.9739 39.8795 23.7826 39.1465C3.59127 38.4135 42.8218 29.626 42.8218 29.626L47.2373 55.5859Z" fill="white"></path><path d="M110.813 65.6534C120.836 56.2534 131.719 39.6136 158.83 39.2276C185.941 38.8416 118.964 22.6856 118.964 22.6856C118.964 22.6856 100.791 75.0554 110.813 65.6534Z" fill="white"></path><path d="M54.669 65.6535C46.1079 55.4685 33.7635 39.6135 6.65176 39.2275C-20.46 38.8415 46.5175 22.6855 46.5175 22.6855C46.5175 22.6855 63.2301 75.8375 54.669 65.6535Z" fill="white"></path><path d="M74.7413 47.4584L81.8163 52.8917C82.6519 53.5334 84.0191 53.5334 84.8547 52.8917L91.9297 47.4584" fill="#202020"></path><path d="M74.7413 47.4584L81.8163 52.8917C82.6519 53.5334 84.0191 53.5334 84.8547 52.8917L91.9297 47.4584" stroke="#202020" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            <h2 class="text-center font_heavy md:text-[30px] sm:text-[26px] text-[24px] text-shadow-md w-full absolute top-20">مطالب وبلاگ</h2>
        </div>

        <!-- وبلاگ ها -->
        <ul class="container grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 grid-cols-1 gap-5 md:-mt-32 -mt-36 relative z-10">
            @foreach($articles as $article)
                <li class="lg:h-[21rem] md:h-[19rem] sm:h-[17rem] h-[16rem] overflow-hidden rounded-2xl group shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-1.5">
                    <a href="{{ route('article_client', ['path' => $article->articleCategories->full_path,'slug'=>$article->slug]) }}"
                       class="relative block h-full overflow-hidden">
                        {{-- تصویر --}}
                        <img src="{{ asset('storage/' . $article->path) }}" alt="{{ $article->title }}" loading="lazy" class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">

                        {{-- گرادینت --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-[#150a29]/95 via-[#1d0e38]/35 to-transparent z-10 transition-all duration-500"></div>

                        {{-- دسته بندی --}}
                        <div class="absolute top-4 start-4 z-20">
                            <span class="sm:text-[13px] text-[11px] text-white py-1.5 px-3 bg-[#ff528c]/90 backdrop-blur-sm border border-white/20 shadow-sm  rounded-full">
                                 {{ $article->articleCategories->name }}
                            </span>
                        </div>


                        {{-- محتوای کارت --}}
                        <div class="absolute z-20 start-5 end-5 bottom-5 transition-all duration-500 group-hover:bottom-6">
                            {{-- عنوان --}}
                            <h3 class="sm:text-[21px] text-[18px] font-bold  line-clamp-2 leading-8 text-white transition-colors duration-300 group-hover:text-[#ffb9d2]">
                                {{ $article->title }}
                            </h3>

                            {{-- خط تزئینی --}}
                            <div class="w-8 h-[2px] bg-[#ff528c] rounded-full my-2 transition-all duration-500 group-hover:w-14"></div>
                            {{-- توضیحات --}}
                            <p class="line-clamp-2 text-gray-200 text-[13px] sm:text-[14px] leading-6">
                                {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                            </p>

                            {{-- مشاهده مقاله --}}
                            <div class="flex items-center gap-1.5 mt-2 text-[#ffb9d2] text-[13px] font-medium  opacity-80 transition-all duration-300 group-hover:opacity-100 group-hover:gap-2.5">
                                <span>مطالعه مقاله</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
