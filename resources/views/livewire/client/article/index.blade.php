@push('schemas')
    {{-- Schema اختصاصی مقاله از پنل مدیریت --}}
    @if(!empty($schema))
        <script type="application/ld+json">
            {!! json_encode(
                $schema,
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES |
                JSON_PRETTY_PRINT |
                JSON_HEX_TAG |
                JSON_HEX_AMP |
                JSON_HEX_APOS |
                JSON_HEX_QUOT
            ) !!}
        </script>
    @endif

    {{-- Breadcrumb Schema خودکار --}}
    @if(!empty($breadcrumbSchema))
        <script type="application/ld+json">
            {!! json_encode(
                $breadcrumbSchema,
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES |
                JSON_PRETTY_PRINT |
                JSON_HEX_TAG |
                JSON_HEX_AMP |
                JSON_HEX_APOS |
                JSON_HEX_QUOT
            ) !!}
        </script>
    @endif
@endpush

<div>
    <!-- مسیر  -->
    <nav aria-label="مسیر راهنما" class="container mx-auto mt-5 p-1 px-3">
        <ol class="flex items-center flex-wrap gap-2 sm:text-[15px] text-[12px]">
            {{-- خانه --}}
            <li>
                <a href="{{ route('home') }}" class="hover:text-[#7C3AED] transition-all">خانه</a>
            </li>

            {{-- فلش --}}
            <li aria-hidden="true">
                <svg width="14"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="2.5"
                     stroke="gray"
                     class="size-3">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M15.75 19.5 8.25 12l7.5-7.5"/>
                </svg>
            </li>

            {{-- مجله آموزشی --}}
            <li>
                <a href="{{ route('articleArchive') }}" class="hover:text-[#7C3AED] transition-all">مجله آموزشی</a>
            </li>

            {{-- تمام دسته‌ها از والد اصلی تا دسته مقاله --}}
            @foreach($categoryBreadcrumbs as $breadcrumbCategory)
                {{-- فلش --}}
                <li aria-hidden="true">
                    <svg width="14"
                         xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="2.5"
                         stroke="gray"
                         class="size-3">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15.75 19.5 8.25 12l7.5-7.5"/>
                    </svg>
                </li>

                {{-- دسته --}}
                <li>
                    <a href="{{ route('article_archive', ['path' => $breadcrumbCategory['path']]) }}" class="hover:text-[#7C3AED] transition-all">
                        {{ $breadcrumbCategory['name'] }}
                    </a>
                </li>
            @endforeach

            {{-- عنوان مقاله --}}
            @if($articleId)
                {{-- فلش --}}
                <li aria-hidden="true">
                    <svg width="14"
                         xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="2.5"
                         stroke="gray"
                         class="size-3">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15.75 19.5 8.25 12l7.5-7.5"/>
                    </svg>
                </li>

                {{-- صفحه فعلی --}}
                <li aria-current="page" class="text-gray-700 font-medium">
                    <span>{{ $articleId->title }}</span>
                </li>
            @endif
        </ol>
    </nav>



    <!-- بدنه سایت -->
    <div class="place-items-center md:mt-5 mt-4">
        <div class="container mx-auto">

            <article class="relative overflow-hidden rounded-[28px] border border-gray-100 bg-white
                    shadow-[0_20px_60px_rgba(15,23,42,0.07)]">

                {{-- =========================
                    HEADER ARTICLE
                ========================== --}}
                <header class="relative mx-auto w-full px-5 pt-7 sm:px-8 sm:pt-9 lg:w-10/12 lg:px-0 lg:pt-11">

                    {{-- بک‌گراند تزئینی خیلی ظریف --}}
                    <div class="pointer-events-none absolute -start-24 -top-24 size-64 rounded-full
                        bg-[#ff528c]/5 blur-3xl">
                    </div>

                    <div class="pointer-events-none absolute -end-24 top-0 size-56 rounded-full
                        bg-[#7C3AED]/5 blur-3xl">
                    </div>


                    {{-- دسته‌بندی --}}
                    <div class="relative mb-4">
                        <div class="group inline-flex items-center gap-2 rounded-full border border-[#ff528c]/15 bg-[#fff5f8] px-3.5 py-1.5 text-[12px] font-bold text-[#cf4070] transition-all duration-300 hover:border-[#ff528c]/30 hover:bg-[#ff528c]hover:text-white">
                            <span class="size-1.5 rounded-full bg-[#ff528c] transition-colors group-hover:bg-white"></span>
                            {{ $articleId->articleCategories->name }}
                        </div>
                    </div>


                    {{-- عنوان --}}
                    <h1 class="relative max-w-4xl
                       text-[23px] font-black leading-[1.8] tracking-tight text-[#19131f]
                       sm:text-[27px]
                       md:text-[31px]
                       lg:text-[36px] lg:leading-[1.65]">
                        {{ $articleId->title }}
                    </h1>


                    {{-- خط کوچک زیر عنوان --}}
                    <div class="mt-4 flex items-center gap-2">
                        <span class="h-[3px] w-10 rounded-full bg-[#ff528c]"></span>
                        <span class="h-[3px] w-2 rounded-full bg-[#7C3AED]/40"></span>
                        <span class="h-[3px] w-1 rounded-full bg-gray-200"></span>
                    </div>


                    {{-- =========================
                        ARTICLE META
                    ========================== --}}
                    <div class="mt-6 flex flex-wrap items-center gap-x-5 gap-y-3
                        border-t border-gray-100 py-4
                        text-[11px] text-gray-400
                        sm:text-[12px] md:text-[13px]">


                        {{-- نویسنده --}}
                        <div class="group flex items-center gap-2">

                            <div class="flex size-8 items-center justify-center rounded-full
                                bg-gray-50 text-gray-400
                                transition-all duration-300
                                group-hover:bg-[#fff1f6]
                                group-hover:text-[#ff528c]">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-4">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>

                                </svg>

                            </div>

                            <div>
                                <span class="text-gray-400">نویسنده</span>

                                <span class="ms-1 font-bold text-gray-600">
                            {{ $articleId->admin->name }}
                        </span>
                            </div>

                        </div>


                        {{-- جداکننده --}}
                        <span class="hidden h-5 w-px bg-gray-100 sm:block"></span>


                        {{-- تاریخ --}}
                        <div class="group flex items-center gap-2">

                            <div class="flex size-8 items-center justify-center rounded-full
                                bg-gray-50 text-gray-400
                                transition-all duration-300
                                group-hover:bg-[#fff1f6]
                                group-hover:text-[#ff528c]">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-4">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M6.75 3v2.25M17.25 3v2.25M3.75 9.75h16.5m-15 11.25h13.5A1.5 1.5 0 0 0 20.25 19.5V6.75a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5V19.5A1.5 1.5 0 0 0 5.25 21Z"/>

                                </svg>

                            </div>

                            <span>
                        {{ \Morilog\Jalali\Jalalian::fromCarbon($articleId->created_at)->format('d F Y') }}
                    </span>

                        </div>


                        {{-- جداکننده --}}
                        <span class="hidden h-5 w-px bg-gray-100 sm:block"></span>


                        {{-- ساعت --}}
                        <div class="group flex items-center gap-2">

                            <div class="flex size-8 items-center justify-center rounded-full
                                bg-gray-50 text-gray-400
                                transition-all duration-300
                                group-hover:bg-[#fff1f6]
                                group-hover:text-[#ff528c]">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-4">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>

                                </svg>

                            </div>

                            <span>
                        {{ str_replace(
                            ['AM','PM'],
                            ['صبح','عصر'],
                            \Carbon\Carbon::parse($articleId->time)->format('h:i A')
                        ) }}
                    </span>

                        </div>


                        {{-- جداکننده --}}
                        <span class="hidden h-5 w-px bg-gray-100 sm:block"></span>


                        {{-- نظرات --}}
                        <div class="group flex items-center gap-2">

                            <div class="flex size-8 items-center justify-center rounded-full
                                bg-gray-50 text-gray-400
                                transition-all duration-300
                                group-hover:bg-[#fff1f6]
                                group-hover:text-[#ff528c]">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-4">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M8.625 12.75h6.75m-6.75 3h4.5M21 12c0 4.556-4.03 8.25-9 8.25a10.3 10.3 0 0 1-3.555-.625L3 21l1.53-4.08A7.76 7.76 0 0 1 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"/>

                                </svg>

                            </div>
                            <span>بدون نظر</span>

                        </div>

                    </div>

                </header>



                {{-- =========================
                    FEATURED IMAGE
                ========================== --}}
                <div class="mx-auto mt-1 w-full px-3 sm:px-6 lg:w-10/12 lg:px-0">

                    <figure class="group relative
                           h-[17rem] overflow-hidden rounded-[24px]
                           bg-gray-100
                           sm:h-[26rem]
                           md:h-[32rem]
                           lg:h-[38rem]
                           xl:h-[50rem]">

                        <img
                            src="{{ asset('storage/' . $articleId->path) }}"
                            alt="{{ $articleId->title }}"
                            class="h-full w-full object-cover
                           transition-transform duration-[900ms] ease-out
                           group-hover:scale-[1.025]"
                        >


                        {{-- Overlay --}}
                        <div class="pointer-events-none absolute inset-0
                            bg-gradient-to-t
                            from-[#150a29]/25
                            via-transparent
                            to-transparent">
                        </div>


                        {{-- دسته‌بندی روی تصویر --}}
                        <div class="absolute bottom-4 start-4 sm:bottom-5 sm:start-5">

                            <div class="flex items-center gap-2 rounded-full
                                border border-white/20
                                bg-black/20
                                px-3 py-1.5
                                text-[11px] font-medium text-white
                                shadow-lg backdrop-blur-md
                                sm:text-[12px]">

                                <span class="size-1.5 rounded-full bg-[#ff528c]"></span>

                                مجله بیوتی ون

                            </div>

                        </div>

                    </figure>

                </div>



                {{-- =========================
                    ARTICLE CONTENT
                ========================== --}}
                <div class="mx-auto w-full px-5 pb-10 pt-8
                    sm:px-8 sm:pb-14 sm:pt-11
                    lg:w-10/12 lg:px-0">


                    {{-- خط بالای محتوا --}}
                    <div class="mb-8 flex items-center gap-3">

                        <div class="h-px flex-1 bg-gradient-to-l from-gray-100 to-transparent"></div>

                        <div class="size-1.5 rounded-full bg-[#ff528c]/50"></div>

                        <div class="h-px flex-1 bg-gradient-to-r from-gray-100 to-transparent"></div>

                    </div>


                    {{-- محتوای CKEditor --}}
                    <div class="article-content
                        mx-auto w-full
                        text-[14px] leading-[2.15] text-gray-600
                        sm:text-[16px] sm:leading-[2.2]
                        lg:w-[94%]
                        lg:text-[17px] lg:leading-[2.25]">

                        {!! $articleId->content !!}

                    </div>


                    {{-- پایان مقاله --}}
                    <div class="mt-12 border-t border-gray-100 pt-6">

                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                            <div class="flex items-center gap-3">

                                <div class="flex size-10 items-center justify-center
                                    rounded-xl bg-[#fff1f6] text-[#ff528c]">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke-width="1.8"
                                         stroke="currentColor"
                                         class="size-5">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/>

                                    </svg>

                                </div>

                                <div>
                                    <div class="text-[13px] font-bold text-gray-700">
                                        بیوتی ون
                                    </div>

                                    <div class="mt-0.5 text-[11px] text-gray-400">
                                        زیبایی، مراقبت و سبک زندگی
                                    </div>
                                </div>

                            </div>


                            <a href="{{ route('articleArchive') }}"
                               class="group flex w-fit items-center gap-2
                              text-[12px] font-bold text-[#cf4070]
                              transition-colors hover:text-[#7C3AED]">

                                مشاهده سایر مقالات

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="2"
                                     stroke="currentColor"
                                     class="size-4 transition-transform duration-300 group-hover:-translate-x-1">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M10.5 6 4.5 12m0 0 6 6m-6-6H21"/>

                                </svg>

                            </a>

                        </div>

                    </div>

                </div>

            </article>

        </div>


        <!-- جدید ترین مقالات -->
        <div class="container mx-auto mt-20">
            <!-- عنوان -->
            <div class="w-full bg-gradient-to-t from-white to-white/0">
                <div class=" font_heavy sm:text-[26px] text-[24px] text-shadow-md w-full">جدیدترین مقالات وبلاگ</div>
            </div>


            <!-- وبلاگ ها -->
            <ul class="mt-5 grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 grid-cols-1 gap-5">

                @foreach($articles->take(3) as $article)

                    <li class="lg:h-[21rem] md:h-[19rem] sm:h-[17rem] h-[16rem]
                   overflow-hidden rounded-2xl group
                   shadow-sm hover:shadow-xl
                   transition-all duration-500
                   hover:-translate-y-1.5">

                        <a href="{{ route('article_client', ['path' => $article->articleCategories->full_path,'slug' =>$article->slug]) }}"
                           class="relative block h-full overflow-hidden">

                            {{-- تصویر --}}
                            <img
                                src="{{ asset('storage/' . $article->path) }}"
                                alt="{{ $article->title }}"
                                loading="lazy"
                                class="w-full h-full object-cover
                           transition-transform duration-700 ease-out
                           group-hover:scale-105"
                            >


                            {{-- گرادینت --}}
                            <div class="absolute inset-0
                            bg-gradient-to-t
                            from-[#150a29]/95
                            via-[#1d0e38]/35
                            to-transparent
                            z-10
                            transition-all duration-500">
                            </div>


                            {{-- دسته‌بندی --}}
                            <div class="absolute top-4 start-4 z-20">

                    <span class="sm:text-[13px] text-[11px]
                                 text-white
                                 py-1.5 px-3
                                 bg-[#ff528c]/90
                                 backdrop-blur-sm
                                 border border-white/20
                                 shadow-sm
                                 rounded-full">

                        {{ $article->articleCategories->name }}

                    </span>

                            </div>


                            {{-- محتوای کارت --}}
                            <div class="absolute z-20
                            start-5 end-5 bottom-5
                            transition-all duration-500
                            group-hover:bottom-6">

                                {{-- عنوان --}}
                                <h3 class="sm:text-[21px] text-[18px]
                               font-bold
                               line-clamp-2
                               leading-8
                               text-white
                               transition-colors duration-300
                               group-hover:text-[#ffb9d2]">

                                    {{ $article->title }}

                                </h3>


                                {{-- خط تزئینی --}}
                                <div class="w-8 h-[2px]
                                bg-[#ff528c]
                                rounded-full
                                my-2
                                transition-all duration-500
                                group-hover:w-14">
                                </div>


                                {{-- توضیحات --}}
                                <p class="line-clamp-2
                              text-gray-200
                              text-[13px] sm:text-[14px]
                              leading-6">

                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($article->content),
                                        120
                                    ) }}

                                </p>


                                {{-- مطالعه مقاله --}}
                                <div class="flex items-center gap-1.5
                                mt-2
                                text-[#ffb9d2]
                                text-[13px]
                                font-medium
                                opacity-80
                                transition-all duration-300
                                group-hover:opacity-100
                                group-hover:gap-2.5">

                                    <span>مطالعه مقاله</span>

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke-width="2"
                                         stroke="currentColor"
                                         class="size-4">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M15.75 19.5 8.25 12l7.5-7.5"/>

                                    </svg>

                                </div>

                            </div>

                        </a>

                    </li>

                @endforeach

            </ul>        </div>
    </div>
</div>
