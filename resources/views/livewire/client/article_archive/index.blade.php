@push('schemas')
    @if(!empty($schemas))
        <script type="application/ld+json">
            {!! json_encode(
                $schemas,
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES |
                JSON_PRETTY_PRINT
            ) !!}
        </script>
    @endif
@endpush
<div>
    <!-- مسیر  -->
    <ul class="container mx-auto mt-5 p-1 px-3 rounded-lg
           flex items-center flex-wrap gap-2
           sm:text-[15px] text-[12px]">

        {{-- خانه --}}
        <li>
            <a
                href="{{ route('home') }}"
                class="hover:text-[#7C3AED] transition-all"
            >
                خانه
            </a>
        </li>


        {{-- فلش --}}
        <li aria-hidden="true">
            <svg
                width="14"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2.5"
                stroke="gray"
                class="size-3"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 19.5 8.25 12l7.5-7.5"
                />
            </svg>
        </li>


        {{-- مجله آموزشی --}}
        <li>
            <a
                href="{{ route('articleArchive') }}"
                class="hover:text-[#7C3AED] transition-all"
            >
                مجله آموزشی
            </a>
        </li>


        {{-- تمام والدها + دسته فعلی --}}
        @foreach($categoryBreadcrumbs as $breadcrumbCategory)

            {{-- فلش --}}
            <li aria-hidden="true">
                <svg
                    width="14"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2.5"
                    stroke="gray"
                    class="size-3"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 19.5 8.25 12l7.5-7.5"
                    />
                </svg>
            </li>


            <li>

                @if(!$loop->last)

                    {{-- والدها قابل کلیک --}}
                    <a
                        href="{{ route('article_archive', [
                        'path' => $breadcrumbCategory->full_path
                    ]) }}"
                        class="hover:text-[#7C3AED] transition-all"
                    >
                        {{ $breadcrumbCategory->name }}
                    </a>

                @else

                    {{-- دسته فعلی --}}
                    <span class="font-medium text-[#ff528c]">
                    {{ $breadcrumbCategory->name }}
                </span>

                @endif

            </li>

        @endforeach

    </ul>

    <!-- بدنه سایت -->
    <div class="container mx-auto md:mt-8 mt-5">

        <div class="flex md:flex-row flex-col-reverse
                lg:gap-6 md:gap-4 gap-5
                items-start">


            {{-- =========================================================
                SIDEBAR
            ========================================================== --}}
            <aside class="md:w-[27%] lg:w-[25%] w-full">

                <div class="md:sticky md:top-5 space-y-5">


                    {{-- ================= CATEGORIES ================= --}}
                    <div class="relative overflow-hidden
                            bg-white
                            border border-gray-100
                            rounded-[24px]
                            shadow-[0_12px_40px_rgba(20,10,40,.05)]">


                        {{-- Header --}}
                        <div class="relative
                                flex items-center justify-between
                                px-5 py-4
                                border-b border-gray-100">

                            <div class="flex items-center gap-3">

                                <div class="size-10
                                        flex items-center justify-center
                                        rounded-[13px]
                                        bg-[#fff0f5]
                                        text-[#ff528c]">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke-width="1.7"
                                         stroke="currentColor"
                                         class="size-[19px]">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M3.75 5.25h16.5M3.75 12h16.5M3.75 18.75h16.5"/>

                                    </svg>

                                </div>


                                <div>

                                    <h2 class="text-gray-800
                                           font-bold
                                           lg:text-[15px]
                                           text-[14px]">
                                        دسته‌بندی مقالات
                                    </h2>

                                    <p class="text-gray-400 text-[10px] mt-0.5">موضوع موردنظر را انتخاب کنید</p>
                                </div>
                            </div>

                        <span class="size-2 rounded-full bg-[#ff528c]"></span></div>

                        {{-- Items --}}
                        <div class="p-3">
                            @if($articlecategories->count() == 0)
                                <div class="rounded-2xl bg-gray-50 border border-gray-100 py-8 px-4">
                                    <p class="text-gray-400 text-center text-[12px]">
                                        درحال حاظر هیچ دسته بندی ای وجود ندارد
                                    </p>
                                </div>
                            @else
                                <ul class="space-y-1">
                                    <x-article-category-tree :categories="$articlecategories"/>
                                </ul>
                            @endif
                        </div>
                    </div>



                    {{-- ================= LATEST ARTICLES ================= --}}
                    <div class="relative overflow-hidden
                            bg-white
                            border border-gray-100
                            rounded-[24px]
                            shadow-[0_12px_40px_rgba(20,10,40,.05)]">


                        {{-- Header --}}
                        <div class="flex items-center justify-between
                                px-5 py-4
                                border-b border-gray-100">

                            <div class="flex items-center gap-3">

                                <div class="size-10
                                        flex items-center justify-center
                                        rounded-[13px]
                                        bg-purple-50
                                        text-[#7C3AED]">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke-width="1.7"
                                         stroke="currentColor"
                                         class="size-[19px]">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>

                                    </svg>

                                </div>


                                <div>

                                    <h2 class="font-bold
                                           text-gray-800
                                           lg:text-[15px]
                                           text-[14px]">
                                        جدیدترین مقالات
                                    </h2>

                                    <p class="text-gray-400 text-[10px] mt-0.5">
                                        آخرین مطالب منتشر شده
                                    </p>

                                </div>

                            </div>

                        </div>



                        <div class="p-3">

                            @if($articles->count() == 0)

                                <div class="rounded-2xl
                                        bg-gray-50
                                        py-8">

                                    <p class="text-gray-400
                                          text-center
                                          text-[12px]">
                                        درحال حاظر هیچ مقاله ای وجود ندارد
                                    </p>

                                </div>

                            @else

                                <ul class="space-y-2">

                                    @foreach($articles->take(6) as $article)

                                        <li>

                                            <a href="{{ route('article_client', ['path' => $article->articleCategories->full_path, 'slug' => $article->slug]) }}"
                                               class="group
                                                  flex lg:flex-row md:flex-col sm:flex-row flex-row
                                                  lg:items-center
                                                  gap-3
                                                  p-2
                                                  rounded-2xl
                                                  hover:bg-gray-50
                                                  transition-all duration-300">


                                                {{-- Image --}}
                                                <div class="relative
                                                        overflow-hidden
                                                        shrink-0
                                                        lg:w-[72px]
                                                        md:w-full
                                                        sm:w-[80px]
                                                        w-[72px]
                                                        lg:h-[62px]
                                                        md:h-[110px]
                                                        sm:h-[65px]
                                                        h-[62px]
                                                        rounded-xl">

                                                    <img src="{{ asset('storage/'. $article->path) }}"
                                                         alt="{{ $article->title }}"
                                                         loading="lazy"
                                                         class="w-full h-full
                                                            object-cover
                                                            transition-transform
                                                            duration-500
                                                            group-hover:scale-110">


                                                    <div class="absolute inset-0
                                                            bg-black/0
                                                            group-hover:bg-black/10
                                                            transition-all duration-300">
                                                    </div>

                                                </div>



                                                {{-- Info --}}
                                                <div class="min-w-0 flex-1
                                                        lg:text-start
                                                        md:text-center
                                                        sm:text-start
                                                        text-start">


                                                    <div class="text-gray-700
                                                            lg:text-[12px]
                                                            md:text-[13px]
                                                            sm:text-[13px]
                                                            text-[12px]
                                                            font-medium
                                                            leading-6
                                                            line-clamp-2
                                                            group-hover:text-[#cf4070]
                                                            transition-colors duration-300">

                                                        {{ \Illuminate\Support\Str::limit(
                                                            strip_tags($article->title),
                                                            40
                                                        ) }}

                                                    </div>


                                                    <div class="flex
                                                            md:justify-center lg:justify-start
                                                            sm:justify-start
                                                            justify-start
                                                            items-center
                                                            gap-1.5
                                                            mt-1
                                                            text-gray-400
                                                            text-[10px]">

                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             fill="none"
                                                             viewBox="0 0 24 24"
                                                             stroke-width="1.5"
                                                             stroke="currentColor"
                                                             class="size-3">

                                                            <path stroke-linecap="round"
                                                                  stroke-linejoin="round"
                                                                  d="M6.75 3v2.25M17.25 3v2.25M3.75 9.75h16.5m-15-4.5h13.5A1.5 1.5 0 0 1 20.25 6.75v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z"/>

                                                        </svg>


                                                        {{ \Morilog\Jalali\Jalalian::fromCarbon($article->created_at)->format('d F Y') }}

                                                    </div>

                                                </div>

                                            </a>

                                        </li>

                                    @endforeach

                                </ul>

                            @endif

                        </div>

                    </div>

                </div>

            </aside>



            {{-- =========================================================
                MAIN CONTENT
            ========================================================== --}}
            <main class="md:w-[73%] lg:w-[75%] w-full">


                <div class="relative overflow-hidden
                        bg-white
                        border border-gray-100
                        rounded-[28px]
                        shadow-[0_15px_50px_rgba(20,10,40,.05)]
                        md:p-6 p-4">


                    {{-- Decorative --}}
                    <div class="pointer-events-none
                            absolute -top-28 -end-28
                            size-72
                            rounded-full
                            bg-[#ff528c]/5
                            blur-3xl">
                    </div>



                    <div class="relative z-10">


                        {{-- ================= HEADER ================= --}}
                        <div class="flex sm:flex-row flex-col
                                sm:items-center
                                justify-between
                                gap-4
                                mb-5">


                            <div>

                                <div class="flex items-center gap-2 mb-1.5">

                                <span class="w-6 h-[2px]
                                             rounded-full
                                             bg-[#ff528c]">
                                </span>

                                    <span class="text-[#cf4070]
                                             text-[10px]
                                             font-bold">
                                    BEAUTY WAN BLOG
                                </span>

                                </div>


                                <h1 class="font_heavy
                                       text-gray-800
                                       lg:text-[26px]
                                       md:text-[22px]
                                       sm:text-[22px]
                                       text-[20px]">

                                    {{ $articlecategoryId
                                        ? 'وبلاگ های ' . $articlecategoryId->name
                                        : 'وبلاگ های بیوتی ون'
                                    }}

                                </h1>


                                <p class="text-gray-400
                                      text-[11px]
                                      sm:text-[12px]
                                      mt-1.5">

                                    جدیدترین مطالب، آموزش‌ها و نکات تخصصی زیبایی

                                </p>

                            </div>


                            {{-- Count --}}
                            <div class="shrink-0
                                    px-3 py-2
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    text-gray-400
                                    text-[10px]">

                            <span class="text-gray-700 font-bold">
                                {{ $articles->total() }}
                            </span>

                                مقاله

                            </div>

                        </div>



                        {{-- ================= SEARCH ================= --}}
                        <form class="relative mb-6">

                            <div class="absolute
                                    start-4
                                    top-1/2
                                    -translate-y-1/2
                                    text-gray-300">

                                <svg width="18"
                                     height="18"
                                     xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.7"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>

                                </svg>

                            </div>


                            <input wire:model.live="search"
                                   type="text"
                                   class="w-full
                                      h-[50px]
                                      ps-11 pe-4
                                      rounded-2xl
                                      bg-gray-50/80
                                      border border-gray-100
                                      sm:text-[13px]
                                      text-[12px]
                                      text-gray-700
                                      placeholder:text-gray-300
                                      outline-none
                                      focus:bg-white
                                      focus:border-[#ff528c]/40
                                      focus:ring-4
                                      focus:ring-[#ff528c]/5
                                      transition-all duration-300"
                                   placeholder="عنوان مقاله مورد نظر را جست و جو کنید...">

                        </form>



                        @if($articles->count() == 0)


                            {{-- ================= EMPTY ================= --}}
                            <div class="flex flex-col
                                    items-center justify-center
                                    min-h-[350px]
                                    rounded-[24px]
                                    bg-gray-50/60
                                    border border-dashed border-gray-200
                                    px-5">


                                <div class="size-16
                                        flex items-center justify-center
                                        rounded-full
                                        bg-white
                                        shadow-sm
                                        text-gray-300
                                        mb-4">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke-width="1.4"
                                         stroke="currentColor"
                                         class="size-7">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5A3.375 3.375 0 0 0 10.125 2.25H6.75A2.25 2.25 0 0 0 4.5 4.5v15A2.25 2.25 0 0 0 6.75 21.75h10.5a2.25 2.25 0 0 0 2.25-2.25v-5.25Z"/>

                                    </svg>

                                </div>


                                <h3 class="font-bold
                                       text-gray-600
                                       text-[15px]">
                                    مقاله‌ای پیدا نشد
                                </h3>


                                <p class="text-gray-400
                                      text-[11px]
                                      mt-1.5
                                      text-center">
                                    درحال حاظر هیچ مقاله ای وجود ندارد
                                </p>

                            </div>


                        @else


                            {{-- ================= ARTICLES ================= --}}
                            <ul class="grid
                                   lg:grid-cols-2
                                   md:grid-cols-2
                                   sm:grid-cols-2
                                   grid-cols-1
                                   gap-5">


                                @foreach($articles as $article)

                                    <li class="group
                                           overflow-hidden
                                           rounded-[24px]
                                           bg-white
                                           border border-gray-100
                                           shadow-[0_8px_30px_rgba(20,10,40,.05)]
                                           hover:shadow-[0_18px_45px_rgba(20,10,40,.12)]
                                           transition-all duration-500
                                           hover:-translate-y-1.5">


                                        <a href="{{ route('article_client', ['path' => $article->articleCategories->full_path, 'slug' => $article->slug]) }}"
                                           class="relative block
                                              xl:h-[24rem]1
                                              lg:h-[20rem]
                                              md:h-[17rem]
                                              sm:h-[17rem]
                                              h-[19rem]
                                              w-full
                                              overflow-hidden">


                                            {{-- Image --}}
                                            <img src="{{ asset('storage/' . $article->path) }}"
                                                 alt="{{ $article->title }}"
                                                 loading="lazy"
                                                 class="w-full h-full
                                                    object-cover
                                                    transition-transform
                                                    duration-700
                                                    ease-out
                                                    group-hover:scale-[1.06]">



                                            {{-- Overlay --}}
                                            <div class="absolute inset-0
                                                    bg-gradient-to-t
                                                    from-[#130921]/95
                                                    via-[#190d2c]/45
                                                    to-transparent
                                                    z-10">
                                            </div>



                                            {{-- subtle overlay --}}
                                            <div class="absolute inset-0
                                                    bg-[#7C3AED]/0
                                                    group-hover:bg-[#7C3AED]/5
                                                    z-10
                                                    transition-colors duration-500">
                                            </div>



                                            {{-- Category --}}
                                            <div class="absolute
                                                    top-4 start-4
                                                    z-20">

                                            <span class="inline-flex
                                                         items-center gap-1.5
                                                         px-3 py-1.5
                                                         rounded-full
                                                         bg-white/15
                                                         backdrop-blur-md
                                                         border border-white/20
                                                         text-white
                                                         text-[10px] sm:text-[11px]
                                                         shadow-sm">


                                                <span class="size-1.5
                                                             rounded-full
                                                             bg-[#ff528c]">
                                                </span>


                                                {{ $article->articleCategories->name }}

                                            </span>

                                            </div>



                                            {{-- Content --}}
                                            <div class="absolute
                                                    z-20
                                                    start-5 end-5
                                                    bottom-5
                                                    transition-all duration-500
                                                    group-hover:bottom-6">


                                                <h3 class="xl:text-[22px]
                                                       lg:text-[20px]
                                                       md:text-[17px]
                                                       sm:text-[17px]
                                                       text-[19px]
                                                       font-bold
                                                       line-clamp-2
                                                       leading-8
                                                       text-white
                                                       group-hover:text-[#ffd6e4]
                                                       transition-colors duration-300">

                                                    {{ $article->title }}

                                                </h3>



                                                <div class="w-7
                                                        h-[2px]
                                                        my-2.5
                                                        rounded-full
                                                        bg-[#ff528c]
                                                        transition-all duration-500
                                                        group-hover:w-14">
                                                </div>



                                                <p class="line-clamp-2
                                                      text-white/70
                                                      text-[11px]
                                                      sm:text-[12px]
                                                      lg:text-[13px]
                                                      leading-6">

                                                    {{ \Illuminate\Support\Str::limit(
                                                        strip_tags($article->content),
                                                        140
                                                    ) }}

                                                </p>



                                                <div class="flex items-center
                                                        gap-1.5
                                                        mt-3
                                                        text-[#ffb9d2]
                                                        text-[11px]
                                                        font-medium
                                                        transition-all duration-300
                                                        group-hover:gap-2.5">

                                                <span>
                                                    مطالعه مقاله
                                                </span>


                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="2"
                                                         stroke="currentColor"
                                                         class="size-3.5">

                                                        <path stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              d="M15.75 19.5 8.25 12l7.5-7.5"/>

                                                    </svg>

                                                </div>

                                            </div>

                                        </a>

                                    </li>

                                @endforeach

                            </ul>



                            {{-- =================================================
                                PAGINATION
                            ================================================== --}}
                            <nav class="flex flex-wrap
                                    justify-center items-center
                                    gap-1.5
                                    mt-8
                                    pt-6
                                    border-t border-gray-100">


                                {{-- Previous --}}
                                @if ($articles->onFirstPage())

                                    <span class="h-10
                                             px-4
                                             inline-flex items-center
                                             rounded-xl
                                             bg-gray-50
                                             text-gray-300
                                             text-[11px]
                                             cursor-not-allowed">

                                    قبلی

                                </span>

                                @else

                                    <button wire:click="previousPage"
                                            class="h-10
                                               px-4
                                               rounded-xl
                                               bg-gray-50
                                               text-gray-600
                                               text-[11px]
                                               cursor-pointer
                                               hover:bg-[#fff0f5]
                                               hover:text-[#cf4070]
                                               transition-all duration-300">

                                        قبلی

                                    </button>

                                @endif



                                {{-- First Page --}}
                                <button wire:click="gotoPage(1)"
                                        class="size-10
                                           rounded-xl
                                           text-[11px]
                                           cursor-pointer
                                           transition-all duration-300
                                           {{ $articles->currentPage() == 1
                                               ? 'bg-[#ff528c] text-white shadow-[0_5px_15px_rgba(255,82,140,.25)]'
                                               : 'bg-gray-50 text-gray-600 hover:bg-[#fff0f5] hover:text-[#cf4070]'
                                           }}">

                                    1

                                </button>



                                {{-- First dots --}}
                                @if($articles->currentPage() > 3)

                                    <span class="px-1 text-gray-300">
                                    ...
                                </span>

                                @endif



                                {{-- Around current --}}
                                @for(
                                    $i = max(2, $articles->currentPage() - 1);
                                    $i <= min($articles->lastPage() - 1, $articles->currentPage() + 1);
                                    $i++
                                )

                                    <button wire:click="gotoPage({{ $i }})"
                                            class="size-10
                                               rounded-xl
                                               text-[11px]
                                               cursor-pointer
                                               transition-all duration-300
                                               {{ $articles->currentPage() == $i
                                                   ? 'bg-[#ff528c] text-white shadow-[0_5px_15px_rgba(255,82,140,.25)]'
                                                   : 'bg-gray-50 text-gray-600 hover:bg-[#fff0f5] hover:text-[#cf4070]'
                                               }}">

                                        {{ $i }}

                                    </button>

                                @endfor



                                {{-- Last dots --}}
                                @if($articles->currentPage() < $articles->lastPage() - 2)

                                    <span class="px-1 text-gray-300">
                                    ...
                                </span>

                                @endif



                                {{-- Last Page --}}
                                @if($articles->lastPage() > 1)

                                    <button wire:click="gotoPage({{ $articles->lastPage() }})"
                                            class="size-10
                                               rounded-xl
                                               text-[11px]
                                               cursor-pointer
                                               transition-all duration-300
                                               {{ $articles->currentPage() == $articles->lastPage()
                                                   ? 'bg-[#ff528c] text-white shadow-[0_5px_15px_rgba(255,82,140,.25)]'
                                                   : 'bg-gray-50 text-gray-600 hover:bg-[#fff0f5] hover:text-[#cf4070]'
                                               }}">

                                        {{ $articles->lastPage() }}

                                    </button>

                                @endif



                                {{-- Next --}}
                                @if ($articles->hasMorePages())

                                    <button wire:click="nextPage"
                                            class="h-10
                                               px-4
                                               rounded-xl
                                               bg-gray-50
                                               text-gray-600
                                               text-[11px]
                                               cursor-pointer
                                               hover:bg-[#fff0f5]
                                               hover:text-[#cf4070]
                                               transition-all duration-300">

                                        بعدی

                                    </button>

                                @else

                                    <span class="h-10
                                             px-4
                                             inline-flex items-center
                                             rounded-xl
                                             bg-gray-50
                                             text-gray-300
                                             text-[11px]
                                             cursor-not-allowed">

                                    بعدی

                                </span>

                                @endif

                            </nav>

                        @endif

                    </div>

                </div>

            </main>

        </div>

    </div>
</div>
