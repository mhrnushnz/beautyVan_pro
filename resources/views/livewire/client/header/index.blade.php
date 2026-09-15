<div>
    <header class="relative z-50">

        {{-- ============================================================
            ADMIN / MANAGER BAR
        ============================================================= --}}
        @role('manager|admin')

        <div class="relative z-50
                    bg-[#17121f]
                    border-b border-white/5
                    text-white">

            <div class="container mx-auto
                        min-h-[38px]
                        px-3 sm:px-4
                        flex items-center justify-between
                        gap-4">

                <ul class="flex items-center
                           lg:gap-6 md:gap-4 gap-3
                           text-[11px] sm:text-[12px] lg:text-[13px]">

                    <li>
                        <a href="{{ route('appointment') }}"
                           class="group flex items-center gap-1.5
                                  text-white/70
                                  hover:text-[#ff7ca7]
                                  transition-colors duration-300">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.7"
                                 stroke="currentColor"
                                 class="size-3.5">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M6.75 3v2.25M17.25 3v2.25M3.75 9.75h16.5m-15-4.5h13.5A1.5 1.5 0 0 1 20.25 6.75v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z"/>

                            </svg>

                            نوبت‌ها
                        </a>
                    </li>


                    <li class="w-px h-3 bg-white/10"></li>


                    <li>
                        <a href="{{ route('article_admin') }}"
                           class="flex items-center gap-1.5
                                  text-white/70
                                  hover:text-[#ff7ca7]
                                  transition-colors duration-300">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.7"
                                 stroke="currentColor"
                                 class="size-3.5">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5A3.375 3.375 0 0 0 10.125 2.25H6.75A2.25 2.25 0 0 0 4.5 4.5v15A2.25 2.25 0 0 0 6.75 21.75h10.5a2.25 2.25 0 0 0 2.25-2.25v-5.25Z"/>

                            </svg>

                            مقالات
                        </a>
                    </li>

                </ul>


                <a href="{{ route('dashboard') }}"
                   class="group
                          flex items-center gap-2
                          text-[11px] sm:text-[12px] lg:text-[13px]
                          text-white/70
                          hover:text-white
                          transition-colors duration-300">

                    <div class="size-6
                                overflow-hidden
                                rounded-full
                                ring-1 ring-white/20
                                group-hover:ring-[#ff528c]/60
                                transition-all">

                        <img src="{{ asset('admin/asset/pic/default-avatar.png') }}"
                             alt=""
                             class="w-full h-full object-cover">

                    </div>

                    <span>
                        @role('manager')
                            پنل مدیریت
                        @endrole

                        @role('admin')
                            پنل ادمین
                        @endrole
                    </span>

                </a>

            </div>

        </div>

        @endrole



        {{-- ============================================================
            MAIN NAVBAR
        ============================================================= --}}
        <div class="container mx-auto mt-3 sm:mt-4 px-2 sm:px-0">

            <div class="relative
                    min-h-[68px]
                    lg:min-h-[76px]
                    flex items-center justify-between
                    gap-3
                    px-3 sm:px-4 lg:px-5
                    bg-white/40
                    backdrop-blur-xs
                    border border-gray-50/50
                    rounded-[22px]
                    shadow-[0_10px_35px_rgba(20,10,40,.07)]">


                {{-- subtle decoration --}}
                <div class="pointer-events-none
                        absolute top-0 start-[15%]
                        w-36 h-10
                        bg-[#ff528c]/5
                        blur-2xl">
                </div>



                {{-- =====================================================
                    RIGHT: LOGO + NAV
                ====================================================== --}}
                <div class="relative z-10
                        flex items-center
                        lg:gap-7 md:gap-4 gap-2">


                    {{-- LOGO --}}
                    <a href="{{ route('home') }}"
                       class="group
                          shrink-0
                          flex items-center justify-center">

                        <img src="{{ asset('/client/asset/pic/logo.png') }}"
                             alt="بیوتی ون"
                             class="lg:w-[78px]
                                md:w-[65px]
                                sm:w-[70px]
                                w-[62px]
                                h-auto
                                object-contain
                                transition-transform duration-300
                                group-hover:scale-[1.03]">

                    </a>



                    {{-- divider --}}
                    <span class="hidden lg:block
                             w-px h-7
                             bg-gray-100">
                </span>



                    {{-- =================================================
                        DESKTOP MENU
                    ================================================== --}}
                    <nav class="hidden md:block">

                        <ul class="flex items-center
                               lg:gap-7 md:gap-4
                               lg:text-[14px]
                               md:text-[12px]
                               text-gray-600">


                            {{-- HOME --}}
                            <li>
                                <a href="{{ route('home') }}"
                                   class="relative group
                                      block py-6
                                      font-medium
                                      hover:text-[#d3245e]
                                      transition-colors duration-300">

                                    صفحه اصلی

                                    <span class="absolute
                                             bottom-[17px]
                                             start-1/2
                                             -translate-x-1/2
                                             w-0 h-[2px]
                                             rounded-full
                                             bg-[#ff528c]
                                             group-hover:w-5
                                             transition-all duration-300">
                                </span>

                                </a>
                            </li>



                            {{-- =================================================
                                SERVICES DROPDOWN
                            ================================================== --}}
                            <li class="relative group">

                                <a href="{{ route('ourService') }}"
                                   class="relative
                                      flex items-center gap-1.5
                                      py-6
                                      font-medium
                                      group-hover:text-[#d3245e]
                                      transition-colors duration-300">

                                    خدمات ویژه


                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke-width="2"
                                         stroke="currentColor"
                                         class="size-3.5
                                            transition-transform duration-300
                                            group-hover:-rotate-90">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M15.75 19.5 8.25 12l7.5-7.5"/>

                                    </svg>


                                    <span class="absolute
                                             bottom-[17px]
                                             start-1/2
                                             -translate-x-1/2
                                             w-0 h-[2px]
                                             rounded-full
                                             bg-[#ff528c]
                                             group-hover:w-5
                                             transition-all duration-300">
                                </span>

                                </a>



                                {{-- Dropdown --}}
                                <div class="absolute
                                        top-[90%] right-0
                                        pt-3
                                        min-w-[260px]
                                        invisible
                                        opacity-0
                                        translate-y-2
                                        pointer-events-none
                                        group-hover:visible
                                        group-hover:opacity-100
                                        group-hover:translate-y-0
                                        group-hover:pointer-events-auto
                                        transition-all duration-300">


                                    <div class="relative
                                            overflow-hidden
                                            bg-white/95
                                            backdrop-blur-xl
                                            border border-gray-100
                                            rounded-[20px]
                                            shadow-[0_20px_50px_rgba(20,10,40,.13)]
                                            p-2">


                                        {{-- top decoration --}}
                                        <div class="absolute
                                                -top-12 -end-12
                                                size-28
                                                rounded-full
                                                bg-[#ff528c]/10
                                                blur-2xl">
                                        </div>



                                        {{-- Dropdown title --}}
                                        <div class="relative
                                                px-3 pt-2 pb-3
                                                border-b border-gray-100">

                                        <span class="block
                                                     text-[10px]
                                                     text-[#cf4070]
                                                     font-bold">
                                            BEAUTY SERVICES
                                        </span>

                                            <span class="block
                                                     text-[12px]
                                                     text-gray-600
                                                     font-bold
                                                     mt-0.5">
                                            خدمات تخصصی بیوتی وان
                                        </span>

                                        </div>



                                        <ul class="relative space-y-1 py-2">

                                            @foreach($servicesCategories as $servicesCategory)

                                                <li>

                                                    <a href="{{ route('our_service', [$servicesCategory->slug]) }}"
                                                       class="group/item
                                                          flex items-center
                                                          justify-between
                                                          gap-4
                                                          w-full
                                                          px-3 py-2.5
                                                          rounded-xl
                                                          text-[12px]
                                                          text-gray-600
                                                          hover:text-[#d3245e]
                                                          hover:bg-[#fff3f7]
                                                          transition-all duration-300">


                                                        <div class="flex items-center gap-2">

                                                        <span class="size-1.5
                                                                     rounded-full
                                                                     bg-gray-300
                                                                     group-hover/item:bg-[#ff528c]
                                                                     transition-colors">
                                                        </span>

                                                            {{ $servicesCategory->name }}

                                                        </div>


                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             fill="none"
                                                             viewBox="0 0 24 24"
                                                             stroke-width="2"
                                                             stroke="currentColor"
                                                             class="size-3.5
                                                                opacity-0
                                                                translate-x-1
                                                                group-hover/item:opacity-100
                                                                group-hover/item:translate-x-0
                                                                transition-all duration-300">

                                                            <path stroke-linecap="round"
                                                                  stroke-linejoin="round"
                                                                  d="M15.75 19.5 8.25 12l7.5-7.5"/>

                                                        </svg>

                                                    </a>

                                                </li>

                                            @endforeach

                                        </ul>



                                        {{-- All services --}}
                                        <div class="border-t border-gray-100 pt-2">

                                            <a href="{{ route('ourService') }}"
                                               class="group/all
                                                  flex items-center justify-center
                                                  gap-2
                                                  px-3 py-2.5
                                                  rounded-xl
                                                  bg-gray-50
                                                  hover:bg-[#fff0f5]
                                                  text-[11px]
                                                  font-medium
                                                  text-[#cf4070]
                                                  transition-all duration-300">

                                                مشاهده همه خدمات

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     fill="none"
                                                     viewBox="0 0 24 24"
                                                     stroke-width="2"
                                                     stroke="currentColor"
                                                     class="size-3.5
                                                        transition-transform duration-300
                                                        group-hover/all:-translate-x-1">

                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          d="M15.75 19.5 8.25 12l7.5-7.5"/>

                                                </svg>

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </li>



                            {{-- BLOG --}}
                            <li>
                                <a href="{{ route('articleArchive') }}"
                                   class="relative group
                                      block py-6
                                      font-medium
                                      hover:text-[#d3245e]
                                      transition-colors duration-300">

                                    مجله آموزشی

                                    <span class="absolute
                                             bottom-[17px]
                                             start-1/2
                                             -translate-x-1/2
                                             w-0 h-[2px]
                                             rounded-full
                                             bg-[#ff528c]
                                             group-hover:w-5
                                             transition-all duration-300">
                                </span>

                                </a>
                            </li>



                            {{-- CONTACT --}}
                            <li>
                                <a href="{{ route('contact_us') }}"
                                   class="relative group
                                      block py-6
                                      font-medium
                                      hover:text-[#d3245e]
                                      transition-colors duration-300">

                                    تماس با ما

                                    <span class="absolute
                                             bottom-[17px]
                                             start-1/2
                                             -translate-x-1/2
                                             w-0 h-[2px]
                                             rounded-full
                                             bg-[#ff528c]
                                             group-hover:w-5
                                             transition-all duration-300">
                                </span>

                                </a>
                            </li>



                            {{-- ABOUT --}}
                            <li>
                                <a href="{{ route('about_us') }}"
                                   class="relative group
                                      block py-6
                                      font-medium
                                      hover:text-[#d3245e]
                                      transition-colors duration-300">

                                    درباره ما

                                    <span class="absolute
                                             bottom-[17px]
                                             start-1/2
                                             -translate-x-1/2
                                             w-0 h-[2px]
                                             rounded-full
                                             bg-[#ff528c]
                                             group-hover:w-5
                                             transition-all duration-300">
                                </span>

                                </a>
                            </li>

                        </ul>

                    </nav>



                    {{-- MOBILE MENU BUTTON --}}
                    <button type="button"
                            onclick="showMenu()"
                            class="md:hidden
                               size-10
                               flex items-center justify-center
                               rounded-xl
                               bg-[#fff3f7]
                               text-[#d3245e]
                               hover:bg-[#ff528c]
                               hover:text-white
                               transition-all duration-300">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.8"
                             stroke="currentColor"
                             class="size-5">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>

                        </svg>

                    </button>

                </div>



                {{-- =====================================================
                    LEFT ACTIONS
                ====================================================== --}}
                <div class="relative z-10
                        flex items-center
                        lg:gap-2.5 gap-1.5">


                    @auth


                        {{-- Appointment --}}
                        <a href="{{ route('reserve') }}"
                           class="group
                              hidden sm:inline-flex
                              items-center justify-center gap-1.5
                              h-10
                              lg:px-5 md:px-3 px-4
                              rounded-full
                              bg-[#ff528c]
                              hover:bg-[#7C3AED]
                              text-white
                              lg:text-[12px]
                              text-[11px]
                              font-medium
                              shadow-[0_6px_18px_rgba(255,82,140,.20)]
                              hover:shadow-[0_8px_22px_rgba(124,58,237,.20)]
                              hover:-translate-y-0.5
                              transition-all duration-300">


                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.8"
                                 stroke="currentColor"
                                 class="size-3.5">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 4.5v15m7.5-7.5h-15"/>

                            </svg>

                            درخواست نوبت

                        </a>



                        {{-- PROFILE --}}
                        <div class="relative"
                             x-data="{ open: false }"
                             x-cloak>


                            <button @click="open = !open"
                                    class="group
                                       h-10
                                       flex items-center gap-2
                                       lg:px-3 px-2.5
                                       rounded-full
                                       bg-gray-50
                                       border border-gray-100
                                       hover:bg-white
                                       hover:border-[#ff528c]/20
                                       hover:shadow-sm
                                       text-gray-600
                                       cursor-pointer
                                       transition-all duration-300">


                                <div class="size-7
                                        flex items-center justify-center
                                        rounded-full
                                        bg-[#fff0f5]
                                        text-[#d3245e]">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke-width="1.8"
                                         stroke="currentColor"
                                         class="size-4">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.118a7.5 7.5 0 0 1 15 0"/>

                                    </svg>

                                </div>


                                <span class="hidden lg:block
                                         text-[11px]
                                         max-w-[85px]
                                         truncate">

                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags(auth()->user()->name),
                                    12
                                ) }}

                            </span>


                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="2"
                                     stroke="currentColor"
                                     class="hidden lg:block
                                        size-3
                                        transition-transform duration-300"
                                     :class="open ? '-rotate-90' : ''">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M15.75 19.5 8.25 12l7.5-7.5"/>

                                </svg>

                            </button>



                            {{-- PROFILE DROPDOWN --}}
                            <div x-show="open"
                                 @click.away="open = false"
                                 x-transition
                                 class="absolute
                                    left-0
                                    mt-2
                                    w-[200px]
                                    overflow-hidden
                                    bg-white
                                    border border-gray-100
                                    rounded-[18px]
                                    shadow-[0_15px_40px_rgba(20,10,40,.12)]
                                    z-50">


                                <div class="px-4 py-3
                                        bg-gray-50/70
                                        border-b border-gray-100">

                                <span class="block
                                             text-[9px]
                                             text-gray-400">
                                    حساب کاربری
                                </span>

                                    <span class="block
                                             text-[12px]
                                             text-gray-700
                                             font-bold
                                             mt-0.5">

                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags(auth()->user()->name),
                                        18
                                    ) }}

                                </span>

                                </div>


                                <div class="p-2">

                                    <a href="{{ route('clientAppointment') }}"
                                       @click="open = false"
                                       class="flex items-center gap-2
                                          px-3 py-2.5
                                          rounded-xl
                                          text-[11px]
                                          text-gray-600
                                          hover:bg-gray-50
                                          hover:text-[#cf4070]
                                          transition-all">

                                        نوبت‌های من

                                    </a>


                                    <a href="{{ route('logOut') }}"
                                       @click="open = false"
                                       class="flex items-center gap-2
                                          px-3 py-2.5
                                          rounded-xl
                                          text-[11px]
                                          text-red-500
                                          hover:bg-red-50
                                          transition-all">

                                        خروج از حساب

                                    </a>

                                </div>

                            </div>

                        </div>


                    @else


                        <a href="{{ route('login_client') }}"
                           class="inline-flex
                              items-center justify-center gap-1.5
                              h-10
                              lg:px-5 sm:px-4 px-3
                              rounded-full
                              bg-[#ff528c]
                              hover:bg-[#7C3AED]
                              text-white
                              lg:text-[12px]
                              sm:text-[11px]
                              text-[10px]
                              font-medium
                              shadow-[0_6px_18px_rgba(255,82,140,.20)]
                              hover:-translate-y-0.5
                              transition-all duration-300">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.8"
                                 stroke="currentColor"
                                 class="size-3.5">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3-3H9m0 0 3-3m-3 3 3 3"/>

                            </svg>

                            ورود | ثبت نام

                        </a>

                    @endauth

                </div>

            </div>

        </div>



        {{-- ============================================================
            MOBILE MENU OVERLAY
        ============================================================= --}}
        <div class="mobile_blur
                hidden
                fixed inset-0
                z-[100]
                bg-[#150a29]/30
                backdrop-blur-sm">


            <div class="mobile_menu
                    relative
                    sm:w-[360px]
                    w-[82%]
                    max-w-[360px]
                    h-dvh
                    overflow-y-auto
                    bg-white
                    shadow-[0_0_50px_rgba(20,10,40,.18)]
                    p-4">


                {{-- Mobile header --}}
                <div class="flex items-center justify-between
                        pb-4 mb-3
                        border-b border-gray-100">

                    <img src="{{ asset('/client/asset/pic/logo.png') }}"
                         alt="بیوتی ون"
                         class="w-[70px] h-auto object-contain">


                    <button type="button"
                            onclick="showMenu()"
                            class="size-9
                               flex items-center justify-center
                               rounded-xl
                               bg-gray-50
                               text-gray-500">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.8"
                             stroke="currentColor"
                             class="size-5">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M6 18 18 6M6 6l12 12"/>

                        </svg>

                    </button>

                </div>



                <ul class="space-y-1.5
                       text-[12px]
                       text-gray-600">


                    {{-- HOME --}}
                    <li>

                        <a href="{{ route('home') }}"
                           class="flex items-center justify-between
                              px-3 py-3
                              rounded-xl
                              hover:bg-[#fff3f7]
                              hover:text-[#cf4070]
                              transition-all">

                            خانه
                        </a>
                    </li>



                    {{-- SERVICES --}}
                    <li class="relative has-submenu">
                        <a href="{{ route('ourService') }}"
                           class="submenu-toggle
                              flex items-center justify-between
                              px-3 py-3
                              rounded-xl
                              hover:bg-[#fff3f7]
                              hover:text-[#cf4070]
                              transition-all"
                           data-toggle="news-submenu">

                            خدمات

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

                        </a>


                        <ul id="news-submenu"
                            data-submenu="news-submenu"
                            class="hidden
                               mt-1.5
                               me-3
                               pe-3
                               border-r border-gray-100
                               space-y-1">


                            @foreach($servicesCategories as $servicesCategory)
                                <li>
                                    <a href="{{ route('our_service', [$servicesCategory->slug]) }}"
                                       class="block
                                          px-3 py-2.5
                                          rounded-xl
                                          text-[11px]
                                          text-gray-500
                                          hover:bg-gray-50
                                          hover:text-[#cf4070]
                                          transition-all">

                                        {{ $servicesCategory->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    {{-- BLOG --}}
                    <li>
                        <a href="{{ route('articleArchive') }}"
                           class="flex items-center justify-between
                              px-3 py-3
                              rounded-xl
                              hover:bg-[#fff3f7]
                              hover:text-[#cf4070]
                              transition-all">
                            مجله آموزشی
                        </a>
                    </li>



                    {{-- CONTACT --}}
                    <li>
                        <a href="{{ route('contact_us') }}"
                           class="flex items-center justify-between
                              px-3 py-3
                              rounded-xl
                              hover:bg-[#fff3f7]
                              hover:text-[#cf4070]
                              transition-all">

                            تماس با ما
                        </a>
                    </li>



                    {{-- ABOUT --}}
                    <li>
                        <a href="{{ route('about_us') }}"
                           class="flex items-center justify-between
                              px-3 py-3
                              rounded-xl
                              hover:bg-[#fff3f7]
                              hover:text-[#cf4070]
                              transition-all">

                            درباره ما
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</div>

