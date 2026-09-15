<div>
    <div class="lg:w-[20%] md:w-[25%] md:block bg-gray-50 hidden lg:mt-[53px] mt-[50px] py-7 px-4 space-y-4 overflow-y-auto fixed bottom-0 top-0 start-0">
        <h1 class="font-bold text-lg">
            <a class="text-gray-700 text-shadow-2xl" href="{{route('dashboard')}}">
                @role('admin')
                    پنل ادمین
                @endrole
                @role('manager')
                    پنل مدیریت
                @endrole
            </a>
        </h1>

        <ul class="space-y-2.5 lg:text-[16px]  md:text-[14px]" id="accordionExample">
            <li class="">
                <a class="flex bg-white overflow-hidden items-center gap-1.5 rounded-xl py-2 px-4 border-[1px] border-gray-50 transition-all shadow-sm shadow-gray-100 text-gray-600 hover:text-[#7817f6]  hover:shadow-[#e9d6ff] hover:font-bold hover:-translate-x-2"
                   href="{{route('dashboard')}}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                            </span>
                    <span>
                                پیشخوان
                            </span>
                </a>
            </li>

            <li class="">
                <a class="flex bg-white overflow-hidden items-center gap-1.5 rounded-xl py-2 px-4 border-[1px] border-gray-50 transition-all hover:-translate-x-2 shadow-sm shadow-gray-100 text-gray-600 hover:text-[#7817f6]  hover:shadow-[#e9d6ff] hover:font-bold"
                   href="{{route('profile')}}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                    <span>
                                ویرایش پروفایل من
                            </span>
                </a>
            </li>

            <li class="group ">
                <a href="{{route('users.index')}}" class="block submenu-link bg-white overflow-hidden rounded-xl py-2 px-4 border-[1px] border-gray-50 transition-all focus:-translate-x-2 shadow-sm shadow-gray-100 text-gray-600 focus:text-[#7817f6]  focus:shadow-[#e9d6ff] focus:font-bold hover:text-[#7817f6]  hover:shadow-[#e9d6ff] hover:font-bold hover:-translate-x-2">
                    <div class="flex items-center gap-1.5">
                        <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </span>
                        <span>
                            کاربران
                        </span>
                    </div>
                </a>
            </li>

            <li class="group">
                <a href="{{route('appointment')}}" class="block submenu-link bg-white overflow-hidden rounded-xl py-2 px-4 border-[1px] border-gray-50 transition-all focus:-translate-x-2 shadow-sm shadow-gray-100 text-gray-600 focus:text-[#7817f6]  focus:shadow-[#e9d6ff] focus:font-bold hover:text-[#7817f6]  hover:shadow-[#e9d6ff] hover:font-bold hover:-translate-x-2">
                    <div class="flex items-center gap-1.5">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                        </span>
                        <span>
                            نوبت ها
                        </span>
                    </div>
                </a>
            </li>

            <li class="group">
                <a class="dropdown-toggle bg-white overflow-hidden block rounded-xl py-2 px-4 border-[1px] border-gray-50 transition-all focus:-translate-x-2 shadow-sm shadow-gray-100 text-gray-600 focus:text-[#7817f6]  focus:shadow-[#e9d6ff] focus:font-bold hover:text-[#7817f6]  hover:shadow-[#e9d6ff] hover:font-bold hover:-translate-x-2"
                   href={{route('service')}}>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-1.5">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L9 17.59a2 2 0 0 1-2.83 0L4.41 15.83a2 2 0 0 1 0-2.83l2.42-2.42" /><path stroke-linecap="round" stroke-linejoin="round" d="M13.83 8.83l2.42-2.42a2 2 0 0 1 2.83 0l1.76 1.76a2 2 0 0 1 0 2.83l-2.42 2.42" /><path stroke-linecap="round" stroke-linejoin="round" d="M14 10l-4 4" /></svg>
                                    </span>
                            <span>
                                        خدمات
                                    </span>
                        </div>

                        <span class="group-focus:transition-all rotate-180 group-focus:rotate-90">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                         fill="none" stroke="gray" stroke-width="2.5" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </span>
                    </div>
                </a>
                <ul class="mt-2 space-y-1 hidden ">
                    <li class="transition-all group focus:transition-all focus:-translate-x-2">
                        <a href="{{route('service')}}"
                           class="text-gray-600 focus:text-[#f3447e] transition-all hover:text-[#f3447e] border border-gray-200 hover:-translate-x-0.5 block bg-gray-100 rounded-2xl py-1 px-4">لیست
                            نمونه کار ها</a>
                    </li>

                    <li class="transition-all focus:-translate-x-2">
                        <a href="{{route('service.creat')}}"
                           class="text-gray-600 focus:text-[#f3447e] transition-all hover:text-[#f3447e] border border-gray-200 hover:-translate-x-0.5 block bg-gray-100 rounded-2xl py-1 px-4">ایجاد
                            نمونه کار </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="flex bg-white overflow-hidden items-center gap-1.5 rounded-xl py-2 px-4 border-[1px] border-gray-50 transition-all shadow-sm shadow-gray-100 text-gray-600 hover:text-[#7817f6]  hover:shadow-[#e9d6ff] hover:font-bold hover:-translate-x-2"
                   href="{{route('service_category')}}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 56 57"
                                     fill="none">
                                    <g id="makeup 1" clip-path="url(#clip0_100_1273)">
                                        <g id="Group">
                                            <g id="Group_2">
                                                <path id="Vector"
                                                      d="M23.2677 33.155C22.8406 32.728 22.1482 32.728 21.721 33.155C20.5796 34.2966 18.7225 34.2964 17.5811 33.155C17.1539 32.728 16.4615 32.728 16.0342 33.155C15.6071 33.5821 15.6071 34.2746 16.0342 34.7019C17.0314 35.6989 18.3412 36.1975 19.651 36.1975C20.9608 36.1975 22.2705 35.6989 23.2677 34.7019C23.6949 34.2747 23.6949 33.5822 23.2677 33.155Z"
                                                      fill="currentColor"></path>
                                            </g>
                                        </g>
                                        <g id="Group_3">
                                            <g id="Group_4">
                                                <path id="Vector_2"
                                                      d="M39.9659 33.155C39.5388 32.728 38.8465 32.728 38.4193 33.155C37.2779 34.2963 35.4209 34.2965 34.2793 33.155C33.8521 32.728 33.1598 32.728 32.7324 33.155C32.3053 33.5821 32.3053 34.2746 32.7324 34.7019C33.7296 35.6989 35.0395 36.1975 36.3491 36.1975C37.659 36.1975 38.9688 35.6989 39.9659 34.7019C40.3931 34.2747 40.3931 33.5822 39.9659 33.155Z"
                                                      fill="currentColor"></path>
                                            </g>
                                        </g>
                                        <g id="Group_5">
                                            <g id="Group_6">
                                                <path id="Vector_3"
                                                      d="M51.298 32.179C51.2936 29.7363 49.426 27.7207 47.0451 27.4796V25.7624C47.0451 19.3735 43.8805 13.7099 39.0366 10.2565C38.2 4.84556 33.5467 0.824951 28.0141 0.824951C22.4816 0.824951 17.8281 4.84556 16.9913 10.2565C12.1474 13.7099 8.9829 19.3735 8.9829 25.7624V27.4775C6.58891 27.7056 4.70679 29.7267 4.70231 32.1789L4.69727 34.9494C4.69498 36.215 5.18618 37.4054 6.08032 38.3012C6.97456 39.1968 8.16401 39.6902 9.42958 39.6902H9.9595C12.362 47.9913 19.0084 54.6157 27.7368 56.7922C27.8238 56.8139 27.9126 56.8247 28.0015 56.8247C28.0901 56.8247 28.1787 56.8139 28.2652 56.7925L28.2835 56.7879C30.2847 56.2895 32.2161 55.5441 34.0241 54.5721C34.5561 54.2861 34.7556 53.6229 34.4695 53.0908C34.1836 52.5588 33.5206 52.3594 32.9882 52.6454C31.4149 53.4912 29.7384 54.149 28.0019 54.6022C18.0779 52.0016 11.1703 43.0702 11.1703 32.7875V31.3912L11.6423 31.2843C17.8693 29.8751 23.8663 27.3306 29.2303 23.8462C32.9174 28.6507 38.6339 31.4893 44.7319 31.4893H44.8576V32.7812C44.8576 36.4922 43.9321 40.1778 42.181 43.4399C41.8953 43.9721 42.0952 44.6353 42.6274 44.9208C42.792 45.0093 42.9691 45.0511 43.1437 45.0511C43.5337 45.0511 43.9111 44.8421 44.1083 44.4745C44.9252 42.9526 45.5766 41.3464 46.0576 39.6903H46.5707C47.8362 39.6903 49.0257 39.1969 49.9199 38.3013C50.8141 37.4056 51.3052 36.2152 51.303 34.9494L51.298 32.179ZM9.42958 37.5027C8.74895 37.5027 8.10943 37.2374 7.62851 36.7558C7.1477 36.2741 6.88345 35.634 6.88477 34.9534L6.8898 32.1831C6.89209 30.9365 7.79673 29.8977 8.9829 29.6839V32.7875C8.9829 34.3946 9.1369 35.9716 9.4321 37.5027H9.42958ZM28.0141 3.01244C31.7709 3.01244 35.022 5.3185 36.3472 8.6553C33.829 7.42374 31.0011 6.73118 28.0141 6.73118C25.0271 6.73118 22.1991 7.42374 19.6809 8.65541C21.0061 5.3185 24.2573 3.01244 28.0141 3.01244ZM44.8578 28.8248V29.3017H44.732C39.3594 29.3017 34.3195 26.8214 31.0429 22.616C31.8001 22.0791 32.5437 21.5237 33.2711 20.9486C33.7449 20.5738 33.8253 19.886 33.4508 19.4122C33.076 18.9385 32.3882 18.8581 31.9144 19.2325C25.865 24.0155 18.6921 27.4442 11.1705 29.1483V28.8248V25.7624C11.1704 16.4747 18.7264 8.91867 28.0141 8.91867C37.3017 8.91867 44.8578 16.4747 44.8578 25.7624V28.8248ZM48.3719 36.7557C47.8948 37.2336 47.2615 37.4981 46.5869 37.5022C46.889 35.9497 47.0452 34.3676 47.0452 32.781V29.6887C48.2177 29.9137 49.1083 30.9462 49.1106 32.183L49.1156 34.9532C49.1169 35.634 48.8528 36.274 48.3719 36.7557Z"
                                                      fill="currentColor"></path>
                                            </g>
                                        </g>
                                        <g id="Group_7">
                                            <g id="Group_8">
                                                <path id="Vector_4"
                                                      d="M36.3571 16.855C35.9546 16.4046 35.2631 16.3656 34.8127 16.7682L34.7976 16.7816C34.3472 17.1842 34.3083 17.8756 34.7108 18.326C34.9269 18.5678 35.2261 18.691 35.5268 18.691C35.7861 18.691 36.0466 18.5992 36.2551 18.4129L36.2702 18.3994C36.7206 17.9968 36.7596 17.3054 36.3571 16.855Z"
                                                      fill="currentColor"></path>
                                            </g>
                                        </g>
                                        <g id="Group_9">
                                            <g id="Group_10">
                                                <path id="Vector_5"
                                                      d="M47.6291 52.1434L41.5866 46.1011L39.2629 40.0261C38.9041 39.0882 37.9273 38.5381 36.9386 38.7188C32.815 39.4718 29.5385 42.7482 28.7863 46.8685L28.7816 46.8942C28.6061 47.8548 29.1336 48.8235 30.036 49.1973L35.9984 51.6673L40.8358 56.5047C41.0494 56.7182 41.3293 56.8251 41.6092 56.8251C41.8891 56.8251 42.169 56.7182 42.3826 56.5047C42.8097 56.0776 42.8097 55.385 42.3826 54.9578L38.1649 50.7401L40.6485 48.2565L46.0822 53.6903C46.5094 54.1173 47.2018 54.1173 47.6291 53.6903C48.0562 53.2632 48.0562 52.5706 47.6291 52.1434ZM36.3614 49.4498L30.9482 47.2073C31.5533 44.0277 34.0734 41.5008 37.2498 40.8859L39.3734 46.4379L36.3614 49.4498Z"
                                                      fill="currentColor"></path>
                                            </g>
                                        </g>
                                        <g id="Group_11">
                                            <g id="Group_12">
                                                <path id="Vector_6"
                                                      d="M50.4442 54.9577C50.2407 54.7541 49.9585 54.6372 49.6709 54.6372C49.3832 54.6372 49.1011 54.7541 48.8965 54.9577C48.6931 55.1611 48.5771 55.4433 48.5771 55.731C48.5771 56.0186 48.6931 56.3008 48.8965 56.5041C49.1011 56.7076 49.3832 56.8247 49.6709 56.8247C49.9585 56.8247 50.2407 56.7077 50.4442 56.5041C50.6475 56.3008 50.7646 56.0186 50.7646 55.731C50.7646 55.4433 50.6476 55.1611 50.4442 54.9577Z"
                                                      fill="currentColor"></path>
                                            </g>
                                        </g>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_100_1273">
                                            <rect width="56" height="56" fill="white" transform="translate(0 0.824951)">
                                            </rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                    <span>
                                دسته بندی خدمات
                            </span>
                </a>
            </li>

            <li>
                <a class="flex bg-white overflow-hidden items-center gap-1.5 rounded-xl py-2 px-4 border-[1px] border-gray-50 transition-all shadow-sm shadow-gray-100 text-gray-600 hover:text-[#7817f6]  hover:shadow-[#e9d6ff] hover:font-bold hover:-translate-x-2"
                   href="{{route('article_category')}}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" aria-hidden="true" data-slot="icon" width="22" height="22"
                                     class="ml-2 h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z">
                                    </path>
                                </svg>
                            </span>
                    <span>
                                دسته بندی مقالات
                            </span>
                </a>
            </li>

            <li class="group">
                <a class="dropdown-toggle bg-white overflow-hidden block rounded-xl py-2 px-4 border-[1px] border-gray-50 transition-all focus:-translate-x-2 shadow-sm shadow-gray-100 text-gray-600 focus:text-[#7817f6]  focus:shadow-[#e9d6ff] focus:font-bold hover:text-[#7817f6]  hover:shadow-[#e9d6ff] hover:font-bold hover:-translate-x-2"
                   href="{{route('article_admin')}}">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-1.5">
                                    <span>
                                        <svg width="20" height="20" viewBox="0 0 40 40" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M8.75 24.167C8.75 23.4765 9.30965 22.917 10 22.917H23.3333C24.0237 22.917 24.5833 23.4765 24.5833 24.167C24.5833 24.8573 24.0237 25.417 23.3333 25.417H10C9.30965 25.417 8.75 24.8573 8.75 24.167Z"
                                                  fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M8.75 30C8.75 29.3097 9.30965 28.75 10 28.75H19.1667C19.857 28.75 20.4167 29.3097 20.4167 30C20.4167 30.6905 19.857 31.25 19.1667 31.25H10C9.30965 31.25 8.75 30.6905 8.75 30Z"
                                                  fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M20.4166 4.72387C19.6493 4.59347 18.6033 4.58359 16.7163 4.58359C13.5218 4.58359 11.2512 4.58622 9.52967 4.81662C7.84319 5.04234 6.87414 5.46572 6.16975 6.17009C5.4644 6.87544 5.04162 7.84152 4.81619 9.51834C4.5859 11.2311 4.58325 13.4889 4.58325 16.667V23.3337C4.58325 26.5117 4.5859 28.7693 4.81619 30.4822C5.04162 32.159 5.4644 33.125 6.16975 33.8303C6.8751 34.5358 7.84119 34.9585 9.518 35.184C11.2308 35.4143 13.4886 35.417 16.6666 35.417H23.3333C26.5113 35.417 28.7691 35.4143 30.4819 35.184C32.1586 34.9585 33.1248 34.5358 33.8301 33.8303C34.5354 33.125 34.9583 32.159 35.1836 30.4822C35.4139 28.7693 35.4166 26.5117 35.4166 23.3337V22.605C35.4166 20.045 35.3986 18.8315 35.1269 17.917H29.9104C28.0224 17.917 26.4794 17.917 25.2614 17.7532C23.9881 17.582 22.8843 17.2115 22.0031 16.3304C21.1219 15.4493 20.7514 14.3454 20.5803 13.0721C20.4166 11.854 20.4166 10.3111 20.4166 8.42307V4.72387ZM22.9166 6.016V8.33359C22.9166 10.3331 22.9193 11.707 23.0579 12.739C23.1919 13.735 23.4316 14.2234 23.7709 14.5627C24.1101 14.9019 24.5984 15.1416 25.5946 15.2755C26.6266 15.4143 28.0004 15.4169 29.9999 15.4169H33.3658C32.8716 14.9377 32.2386 14.3635 31.4166 13.6236L24.8186 7.68545C24.0096 6.95739 23.4076 6.41995 22.9166 6.016ZM16.9591 2.08354C19.2668 2.08292 20.7576 2.08254 22.1298 2.60909C23.5019 3.13565 24.6053 4.12909 26.3121 5.66609C26.3709 5.71915 26.4306 5.77285 26.4911 5.82722L33.0889 11.7654C33.1593 11.8286 33.2286 11.891 33.2971 11.9527C35.2699 13.7271 36.5456 14.8745 37.2318 16.4152C37.9179 17.9558 37.9174 19.6717 37.9166 22.325C37.9166 22.4172 37.9166 22.5105 37.9166 22.605V23.4277C37.9166 26.4905 37.9166 28.9167 37.6614 30.8153C37.3986 32.7693 36.8451 34.3508 35.5979 35.5982C34.3506 36.8455 32.7689 37.399 30.8149 37.6617C28.9163 37.917 26.4903 37.917 23.4273 37.917H16.5726C13.5096 37.917 11.0836 37.917 9.18489 37.6617C7.23085 37.399 5.64927 36.8455 4.40199 35.5982C3.15472 34.3508 2.60119 32.7693 2.33849 30.8153C2.0832 28.9167 2.08322 26.4905 2.08325 23.4277V16.5729C2.08322 13.51 2.0832 11.0839 2.33849 9.18522C2.60119 7.23119 3.15472 5.6496 4.40199 4.40232C5.65024 3.15409 7.23712 2.60115 9.19804 2.33872C11.1046 2.08354 13.5428 2.08355 16.6225 2.08359H16.7163C16.7981 2.08359 16.8791 2.08357 16.9591 2.08354Z"
                                                  fill="currentColor"></path>
                                        </svg>
                                    </span>
                            <span>
                                        مقالات
                                    </span>
                        </div>

                        <span class="group-focus:transition-all rotate-180 group-focus:rotate-90">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                         fill="none" stroke="gray" stroke-width="2.5" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </span>
                    </div>

                </a>
                <ul class="mt-2 space-y-1 hidden ">
                    <li class="transition-all group focus:transition-all focus:-translate-x-2">
                        <a href="{{route('article_admin')}}"
                           class="text-gray-600 focus:text-[#f3447e] transition-all hover:text-[#f3447e] border border-gray-200 hover:-translate-x-0.5 block bg-gray-100 rounded-2xl py-1 px-4">لیست
                            مقالات</a>
                    </li>

                    <li class="transition-all focus:-translate-x-2">
                        <a href="{{route('article.creat')}}"
                           class="text-gray-600 focus:text-[#f3447e] transition-all hover:text-[#f3447e] border border-gray-200 hover:-translate-x-0.5 block bg-gray-100 rounded-2xl py-1 px-4">ایجاد
                            مقاله</a>
                    </li>
                </ul>
            </li>


            <li class="">
                <a class="flex bg-white overflow-hidden items-center gap-1.5 rounded-xl py-2 px-4 border-[1px] border-gray-50 transition-all hover:-translate-x-2 shadow-sm shadow-gray-100 text-gray-600 hover:text-[#7817f6]  hover:shadow-[#e9d6ff] hover:font-bold"
                   href="{{route('adminSlider')}}">
                    <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 6.75h15a1.5 1.5 0 0 1 1.5 1.5v7.5a1.5 1.5 0 0 1-1.5 1.5h-15a1.5 1.5 0 0 1-1.5-1.5v-7.5a1.5 1.5 0 0 1 1.5-1.5Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 12h.008v.008H8.25V12Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5l2.25 3 1.5-2.25 3 4.5" />
</svg></span>
                    <span>
                        اسلایدر
                    </span>
                </a>
            </li>

            <li class="">
                <a wire:confirm="آیا قصد خروج از حساب کاربری را دارید؟" class="flex bg-white overflow-hidden items-center gap-1.5 rounded-xl py-2 px-4 border-[1px] border-gray-50 transition-all shadow-sm shadow-gray-100 text-gray-600 hover:text-[#7817f6]  hover:shadow-[#e9d6ff] hover:font-bold hover:-translate-x-2"
                   href="{{route('logOut')}}">
                   <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                   </span>
                   <span>
                         خروج از حساب کاربری
                   </span>
                </a>
            </li>
        </ul>
    </div>
</div>
