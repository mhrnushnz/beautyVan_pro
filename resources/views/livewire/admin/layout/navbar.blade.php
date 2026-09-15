<div>
    <header class="fixed top-0 w-full z-20">
        <div class="relative w-full bg-gray-50 shadow-md text-blue-950">
            <div class="flex items-center justify-between py-2 px-4">
                <div class="w-1/2 flex items-center gap-2">
                    <!-- لوگو -->
                    <a href="{{ route('home') }}" class="shrink-0 sm:h-12 sm:w-18 h-9 w-13">
                        <img class="w-full h-full rounded-xl" src="{{asset('admin/asset/pic/logo.png')}}" alt="بیوتی ون">
                    </a>

                    <!-- نام سایت -->
                    <h1 class="font-bold md:block hidden text-[20px]">بیوتی ون</h1>

                    <!-- منوی موبایل -->
                    <div onclick="showMenu()" class="md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="14" height="14"
                             viewBox="0 0 24 24" stroke-width="2" stroke="#f3447e"
                             class="size-7 transition-all hover:-translate-y-0.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                        </svg>
                    </div>
                </div>


                <div class="flex items-center justify-end space-x-2 lg:text-[16px] md:text-[16px] sm:text-[16px] text-[12px]">
                    <a href="{{ route('notif') }}" class="relative transition-all bg-[#f3447e] shrink-0 sm:h-9 sm:w-9 h-7 w-7 flex items-center justify-center rounded-full hover:bg-[#7C3AED]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                        @if($messageCount == 0)
                            <div class="hidden absolute -top-2 -start-1 bg-[#49BE78] rounded-full shrink-0 min-w-5 h-5 flex items-center text-white justify-center p-0.5 sm:text-[12px] text-[10px]"></div>
                        @else
                            <div class="absolute -top-2 -start-1 bg-[#49BE78] rounded-full shrink-0 min-w-5 h-5 flex items-center text-white justify-center p-0.5 sm:text-[12px] text-[10px]">
                                {{$messageCount}}
                            </div>
                        @endif
                    </a>

                    <a href="{{ route('home') }}" class="flex items-center justify-center shrink-0 sm:h-9 sm:w-9 h-7 w-7 transition-all bg-[#f3447e] rounded-full hover:bg-[#7C3AED]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    </a>

                    <a href="{{ route('profile') }}" class="transition-all bg-[#f3447e] text-nowrap text-white sm:py-2 py-1 sm:px-4 px-3 w-fit rounded-full flex justify-center items-center gap-1 hover:bg-[#7C3AED]">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        </span>
                        <span>
                            {{ \Illuminate\Support\Str::limit(strip_tags(auth()->user()->name), 15) }}
                        </span>
                    </a>
                </div>
            </div>



            <!-- داشبورد در حالت تبلت و موبایل  -->
            <div
                class="mobile_blur hidden fixed top-0 bottom-0 z-20 botton-0 bg-black/25 h-lvh  backdrop-blur-sm w-full">
                <ul class="mobile_menu overflow-y-scroll sm:w-1/2 w-[60%] bg-white p-5 h-lvh space-y-3 text-[12px]">

                    <li class="has-submenu transition-all group hover:-translate-x-0.5 ">
                        <a href="{{ route('dashboard') }}"
                           class="group-active:text-[#f3447e] bg-white  rounded-lg shadow-md p-2 flex items-center justify-between">
                            <div class="">پیشخوان</div>
                        </a>
                    </li>


                    <li class="relative has-submenu transition-all group hover:-translate-x-0.5">
                        <a href="{{ route('profile')}}"
                           class="submenu-toggle group-active:text-[#f3447e] bg-white rounded-lg shadow-md p-2 flex items-center justify-between"
                           data-toggle="news-submenu">
                            <div>ویرایش پروفایل من</div>
                        </a>
                    </li>


                    <li class="relative has-submenu transition-all group hover:-translate-x-0.5">
                        <a href="{{ route('users.index')}}" class="submenu-toggle group-active:text-[#f3447e] bg-white rounded-lg shadow-md p-2 flex items-center justify-between" data-toggle="news-world">
                            <div>کاربران</div>
                        </a>
                    </li>


                    <li class="relative has-submenu transition-all group hover:-translate-x-0.5">
                        <a href="{{ route('appointment')}}"
                           class="submenu-toggle group-active:text-[#f3447e] bg-white rounded-lg shadow-md p-2 flex items-center justify-between"
                           data-toggle="submenu-economy">
                            <div>نوبت ها</div>

                        </a>
                    </li>


                    <li class="relative has-submenu transition-all group hover:-translate-x-0.5">
                        <a href="{{ route('service')}}"
                           class="submenu-toggle group-active:text-[#f3447e] bg-white rounded-lg shadow-md p-2 flex items-center justify-between"
                           data-toggle="submenu-industry">
                            <div>خدمات</div>
                            <div
                                class="transition-transform group-active:-rotate-90 group-active:transition-all group-active:translate-x-0.5">
                                <svg width="14" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="3" stroke="currentColor" class="size-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </div>
                        </a>

                        <!-- زیرمنوی جداگانه -->
                        <ul id="submenu-industry"
                            class="text-gray-500 text-[12px] overflow-hidden bg-gray-50 mt-2 shadow-lg rounded-sm space-y-1 hidden"
                            data-submenu="submenu-industry">
                            <li>
                                <a href="{{ route('service')}}"
                                   class="block px-2 py-1 transition-all hover:bg-gray-200 hover:text-[#f3447e]">لیست
                                    نمونه کار ها</a>
                            </li>
                            <hr class="text-gray-200 h-[2px]">
                            <li>
                                <a href="{{ route('service.creat')}}"
                                   class="block px-2 py-1 transition-all hover:bg-gray-200 hover:text-[#f3447e]">ایجاد
                                    نمونه کار</a>
                            </li>
                        </ul>
                    </li>


                    <li class="relative has-submenu transition-all group hover:-translate-x-0.5">
                        <a href="{{ route('service_category')}}"
                           class="submenu-toggle group-active:text-[#f3447e] bg-white rounded-lg shadow-md p-2 flex items-center justify-between"
                           data-toggle="news-home">
                            <div>دسته بندی خدمات</div>
                        </a>
                    </li>


                    <li class="relative has-submenu transition-all group hover:-translate-x-0.5">
                        <a href="{{ route('article_category')}}"
                           class="submenu-toggle group-active:text-[#f3447e] bg-white rounded-lg shadow-md p-2 flex items-center justify-between"
                           data-toggle="news-home">
                            <div>دسته بندی مقالات</div>
                        </a>
                    </li>


                    <li class="relative has-submenu transition-all group hover:-translate-x-0.5">
                        <a href="{{ route('article_admin')}}"
                           class="submenu-toggle group-active:text-[#f3447e] bg-white rounded-lg shadow-md p-2 flex items-center justify-between"
                           data-toggle="news-energy">
                            <div>مقالات</div>
                            <div
                                class="transition-transform group-active:-rotate-90 group-active:transition-all group-active:translate-x-0.5">
                                <svg width="14" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="3" stroke="currentColor" class="size-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </div>
                        </a>

                        <!-- زیرمنوی جداگانه -->
                        <ul id="news-energy"
                            class="text-gray-500 text-[12px] overflow-hidden bg-gray-50 mt-2 shadow-lg rounded-sm space-y-1 hidden"
                            data-submenu="news-energy">
                            <li>
                                <a href="{{ route('article_admin')}}"
                                   class="block px-2 py-1 transition-all hover:bg-gray-200 hover:text-[#f3447e]">لیست
                                    مقالات</a>
                            </li>

                            <hr class="text-gray-200 h-[2px]">

                            <li>
                                <a href="{{ route('article.creat')}}"
                                   class="block px-2 py-1 transition-all hover:bg-gray-200 hover:text-[#f3447e]">ایجاد
                                    مقاله</a>
                            </li>
                        </ul>
                    </li>


                    <li class="has-submenu transition-all group hover:-translate-x-0.5 ">
                        <a href="{{route('adminSlider')}}"
                           class="group-active:text-[#f3447e] bg-white  rounded-lg shadow-md p-2 flex items-center justify-between">
                            <div class="">اسلایدر</div>
                        </a>
                    </li>


                    <li class="has-submenu transition-all group hover:-translate-x-0.5 ">
                        <a href="{{route('logOut')}}"
                           class="group-active:text-[#f3447e] bg-white  rounded-lg shadow-md p-2 flex items-center justify-between">
                            <div class="">خروج از حساب کاربری</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</div>
