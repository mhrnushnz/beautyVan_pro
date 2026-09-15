@section('title', 'داشبورد') {{-- عنوان این صفحه --}}
<div class="md:space-y-6 space-y-3">
    <!-- عنوان -->
    <div class="md:text-[20px] text-[18px] font-bold">پیشخوان</div>

    <div class="space-y-6">

        {{-- Welcome --}}
        <section class="relative overflow-hidden rounded-[28px]
                    border border-gray-200/70 bg-white
                    shadow-[0_10px_40px_rgba(15,23,42,0.05)]">

            {{-- Background --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="absolute -right-20 -top-24 size-72 rounded-full
                        bg-violet-100/60 blur-3xl"></div>

                <div class="absolute -bottom-32 left-10 size-72 rounded-full
                        bg-blue-100/50 blur-3xl"></div>
            </div>

            <div class="relative flex min-h-[230px] items-center
                    justify-between gap-8 px-6 py-7
                    sm:px-8 lg:px-10">

                {{-- Content --}}
                <div class="flex-1">

                    <div class="flex items-center gap-3">

                        <div class="size-12 overflow-hidden rounded-2xl
                                border border-gray-200 bg-gray-50
                                shadow-sm">

                            <img
                                src="{{ asset('admin/asset/pic/default-avatar.png') }}"
                                alt="{{ $user->name }}"
                                class="h-full w-full object-cover"
                            >

                        </div>

                        <div>
                            <div class="text-[11px] font-medium text-gray-400">
                                پنل مدیریت
                            </div>

                            <h1 class="mt-0.5 text-[18px] font-black text-gray-800
                                   sm:text-[20px]">

                                {{ $user->name }}
                                <span class="font-medium text-gray-500">
                                عزیز، خوش آمدید
                            </span>

                            </h1>
                        </div>

                    </div>


                    <p class="mt-5 max-w-xl text-[13px] leading-7 text-gray-500
                          sm:text-[14px]">

                        خلاصه‌ای از وضعیت سایت، نوبت‌ها، مقالات و بخش‌های
                        نیازمند بررسی را از این قسمت مشاهده کنید.

                    </p>


                    {{-- Status --}}
                    <div class="mt-5 flex flex-wrap items-center gap-2">

                        <div class="flex items-center gap-2 rounded-xl
                                border border-violet-100 bg-violet-50/70
                                px-3 py-2">

                            <span class="size-2 rounded-full bg-violet-500"></span>

                            <span class="text-[11px] font-bold text-gray-600">
                            نوبت‌های در انتظار
                        </span>

                            <span class="rounded-lg bg-white px-2 py-0.5
                                     text-[11px] font-black text-violet-600
                                     shadow-sm">

                            {{ $appointment }}

                        </span>

                        </div>


                        <div class="flex items-center gap-2 rounded-xl
                                border border-blue-100 bg-blue-50/70
                                px-3 py-2">

                            <span class="size-2 rounded-full bg-blue-500"></span>

                            <span class="text-[11px] font-bold text-gray-600">
                            مقالات منتشرشده
                        </span>

                            <span class="rounded-lg bg-white px-2 py-0.5
                                     text-[11px] font-black text-blue-600
                                     shadow-sm">

                            {{ $article }}

                        </span>

                        </div>

                    </div>

                </div>


                {{-- Illustration --}}
                <div class="hidden w-[230px] shrink-0 lg:block">

                    <img
                        src="{{ asset('admin/asset/pic/man_laptop_blue.png') }}"
                        alt=""
                        class="h-auto w-full object-contain"
                    >

                </div>

            </div>

        </section>


        {{-- Stats --}}
        <section class="grid grid-cols-2 gap-3 lg:grid-cols-4 lg:gap-4">


            {{-- Users --}}
            <div class="group relative overflow-hidden rounded-2xl
                    border border-gray-200/80 bg-white p-5
                    transition-all duration-300
                    hover:-translate-y-1
                    hover:shadow-[0_15px_35px_rgba(15,23,42,0.07)]">

                <div class="flex items-start justify-between">

                    <div>
                        <div class="text-[11px] font-bold text-gray-400">
                            کاربران
                        </div>

                        <div class="mt-2 flex items-end gap-1.5">

                        <span class="text-[28px] font-black tracking-tight
                                     text-gray-800">
                            {{ $users }}
                        </span>

                            <span class="mb-1 text-[11px] text-gray-400">
                            نفر
                        </span>

                        </div>
                    </div>


                    <div class="flex size-11 items-center justify-center
                            rounded-2xl bg-orange-50 text-orange-500">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>

                    </div>

                </div>


                <div class="mt-5 flex items-center gap-1.5
                        border-t border-gray-100 pt-3">

                    <span class="size-1.5 rounded-full bg-emerald-400"></span>

                    <span class="text-[10px] font-medium text-gray-400">
                    تعداد کل کاربران سایت
                </span>

                </div>

            </div>


            {{-- Appointments --}}
            <div class="group relative overflow-hidden rounded-2xl
                    border border-gray-200/80 bg-white p-5
                    transition-all duration-300
                    hover:-translate-y-1
                    hover:shadow-[0_15px_35px_rgba(15,23,42,0.07)]">

                <div class="flex items-start justify-between">

                    <div>
                        <div class="text-[11px] font-bold text-gray-400">
                            نوبت‌های در انتظار
                        </div>

                        <div class="mt-2 flex items-end gap-1.5">

                        <span class="text-[28px] font-black text-gray-800">
                            {{ $appointment }}
                        </span>

                            <span class="mb-1 text-[11px] text-gray-400">
                            نوبت
                        </span>

                        </div>
                    </div>


                    <div class="flex size-11 items-center justify-center
                            rounded-2xl bg-cyan-50 text-cyan-600">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M8 2v4m8-4v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z"/>
                        </svg>

                    </div>

                </div>


                <div class="mt-5 flex items-center gap-1.5
                        border-t border-gray-100 pt-3">

                    <span class="size-1.5 rounded-full bg-amber-400"></span>

                    <span class="text-[10px] font-medium text-gray-400">
                    نیازمند بررسی
                </span>

                </div>

            </div>


            {{-- Articles --}}
            <div class="group relative overflow-hidden rounded-2xl
                    border border-gray-200/80 bg-white p-5
                    transition-all duration-300
                    hover:-translate-y-1
                    hover:shadow-[0_15px_35px_rgba(15,23,42,0.07)]">

                <div class="flex items-start justify-between">

                    <div>
                        <div class="text-[11px] font-bold text-gray-400">
                            مقالات منتشرشده
                        </div>

                        <div class="mt-2 flex items-end gap-1.5">

                        <span class="text-[28px] font-black text-gray-800">
                            {{ $article }}
                        </span>

                            <span class="mb-1 text-[11px] text-gray-400">
                            مقاله
                        </span>

                        </div>
                    </div>


                    <div class="flex size-11 items-center justify-center
                            rounded-2xl bg-rose-50 text-rose-500">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Zm0 0v6h6M8 13h8M8 17h6"/>
                        </svg>

                    </div>

                </div>


                <div class="mt-5 flex items-center gap-1.5
                        border-t border-gray-100 pt-3">

                    <span class="size-1.5 rounded-full bg-emerald-400"></span>

                    <span class="text-[10px] font-medium text-gray-400">
                    وضعیت منتشرشده
                </span>

                </div>

            </div>


            {{-- Services --}}
            <div class="group relative overflow-hidden rounded-2xl
                    border border-gray-200/80 bg-white p-5
                    transition-all duration-300
                    hover:-translate-y-1
                    hover:shadow-[0_15px_35px_rgba(15,23,42,0.07)]">

                <div class="flex items-start justify-between">

                    <div>
                        <div class="text-[11px] font-bold text-gray-400">
                            خدمات فعال
                        </div>

                        <div class="mt-2 flex items-end gap-1.5">

                        <span class="text-[28px] font-black text-gray-800">
                            {{ $serviceCategory }}
                        </span>

                            <span class="mb-1 text-[11px] text-gray-400">
                            خدمت
                        </span>

                        </div>
                    </div>


                    <div class="flex size-11 items-center justify-center
                            rounded-2xl bg-violet-50 text-violet-600">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 3 4 7v10l8 4 8-4V7l-8-4Zm0 0v18M4 7l8 4 8-4"/>
                        </svg>
                    </div>
                </div>



                <div class="mt-5 flex items-center gap-1.5
                        border-t border-gray-100 pt-3">

                    <span class="size-1.5 rounded-full bg-emerald-400"></span>

                    <span class="text-[10px] font-medium text-gray-400">
                    دسته‌بندی‌های فعال
                </span>

                </div>

            </div>

        </section>

    </div>


    <!-- نمودار ها -->
    {{-- =========================================================
     SEO HEALTH
========================================================= --}}
    <section class="mt-8">

        {{-- Header --}}
        <div class="mb-5 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">

            <div>
                <div class="flex items-center gap-2">
                    <div class="flex size-10 items-center justify-center rounded-xl bg-violet-100 text-violet-600">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.8"
                             stroke="currentColor"
                             class="size-5">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-[18px] font-bold text-gray-800">
                            وضعیت سلامت سئو
                        </h2>

                        <p class="mt-0.5 text-[12px] text-gray-400">
                            بررسی خودکار وضعیت سئوی مقالات سایت
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-[12px] text-gray-400">
                {{ $totalArticles }} مقاله بررسی شده
            </div>

        </div>


        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">

            {{-- =====================================================
                 SEO SCORE
            ====================================================== --}}
            <div class="xl:col-span-4">

                <div class="relative h-full overflow-hidden rounded-[24px]
                        border border-gray-100 bg-white p-6
                        shadow-[0_10px_35px_rgba(15,23,42,0.05)]">

                    {{-- decoration --}}
                    <div class="absolute -end-16 -top-16 size-40 rounded-full bg-violet-100/60 blur-3xl"></div>

                    <div class="relative">

                        <div class="flex items-center justify-between">

                            <div>
                                <div class="text-[14px] font-bold text-gray-700">
                                    امتیاز کلی SEO
                                </div>

                                <div class="mt-1 text-[11px] text-gray-400">
                                    بر اساس وضعیت مقالات
                                </div>
                            </div>

                            @if($seoScore >= 80)

                                <span class="rounded-full bg-emerald-50 px-3 py-1
                                         text-[11px] font-bold text-emerald-600">
                                عالی
                            </span>

                            @elseif($seoScore >= 60)

                                <span class="rounded-full bg-amber-50 px-3 py-1
                                         text-[11px] font-bold text-amber-600">
                                نیاز به بهبود
                            </span>

                            @else

                                <span class="rounded-full bg-red-50 px-3 py-1
                                         text-[11px] font-bold text-red-600">
                                ضعیف
                            </span>

                            @endif

                        </div>


                        {{-- Circle --}}
                        <div class="my-7 flex justify-center">

                            <div class="relative flex size-44 items-center justify-center">

                                <svg class="size-44 -rotate-90"
                                     viewBox="0 0 120 120">

                                    {{-- Background --}}
                                    <circle
                                        cx="60"
                                        cy="60"
                                        r="52"
                                        fill="none"
                                        stroke="#f3f4f6"
                                        stroke-width="9"
                                    />

                                    {{-- Progress --}}
                                    <circle
                                        cx="60"
                                        cy="60"
                                        r="52"
                                        fill="none"
                                        stroke="{{ $seoScore >= 80 ? '#10b981' : ($seoScore >= 60 ? '#f59e0b' : '#ef4444') }}"
                                        stroke-width="9"
                                        stroke-linecap="round"
                                        stroke-dasharray="326.7"
                                        stroke-dashoffset="{{ 326.7 - (326.7 * $seoScore / 100) }}"
                                    />

                                </svg>


                                <div class="absolute text-center">

                                    <div class="text-[34px] font-black text-gray-800">
                                        {{ $seoScore }}
                                        <span class="text-[15px] text-gray-400">%</span>
                                    </div>

                                    <div class="mt-1 text-[11px] text-gray-400">
                                        SEO Health
                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Progress --}}
                        <div>
                            <div class="mb-2 flex justify-between text-[11px]">

                            <span class="text-gray-400">
                                سلامت کلی
                            </span>

                                <span class="font-bold text-gray-700">
                                {{ $seoScore }}%
                            </span>

                            </div>

                            <div class="h-2 overflow-hidden rounded-full bg-gray-100">

                                <div
                                    class="h-full rounded-full transition-all duration-700
                                {{ $seoScore >= 80
                                    ? 'bg-emerald-500'
                                    : ($seoScore >= 60
                                        ? 'bg-amber-500'
                                        : 'bg-red-500') }}"
                                    style="width: {{ $seoScore }}%">
                                </div>

                            </div>
                        </div>


                        <div class="mt-6 grid grid-cols-2 gap-3">

                            <div class="rounded-2xl bg-gray-50 p-3">

                                <div class="text-[10px] text-gray-400">
                                    کل مقالات
                                </div>

                                <div class="mt-1 text-[20px] font-black text-gray-800">
                                    {{ $totalArticles }}
                                </div>

                            </div>


                            <div class="rounded-2xl bg-red-50/70 p-3">

                                <div class="text-[10px] text-red-400">
                                    مشکلات شناسایی شده
                                </div>

                                <div class="mt-1 text-[20px] font-black text-red-500">
                                    {{ $seoIssues }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 SEO ISSUES
            ====================================================== --}}

            <div class="xl:col-span-8 rounded-3xl border border-gray-100 bg-white p-5 shadow-sm">

                {{-- Header --}}
                <div class="flex flex-col gap-3 border-b border-gray-100 pb-5 sm:flex-row sm:items-center sm:justify-between">

                    <div>
                        <div class="flex items-center gap-2">

                            <div class="flex size-10 items-center justify-center rounded-xl bg-red-50 text-red-500">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 9v3.75m9.303 3.376c.866 1.5-.217 3.374-1.948 3.374H4.645c-1.73 0-2.813-1.874-1.948-3.374L10.05 3.378c.866-1.5 3.032-1.5 3.898 0l7.355 12.748ZM12 15.75h.007v.008H12v-.008Z"/>

                                </svg>

                            </div>

                            <div>
                                <h2 class="text-[16px] font-black text-gray-800">
                                    مشکلات سئوی مقالات
                                </h2>

                                <p class="mt-1 text-[11px] text-gray-400">
                                    مواردی که بهتر است بررسی و اصلاح شوند
                                </p>
                            </div>

                        </div>
                    </div>


                    {{-- تعداد کل مشکلات --}}
                    <div class="flex items-center gap-3 rounded-2xl bg-red-50 px-4 py-2">

                        <div>
                            <div class="text-[10px] font-medium text-red-400">
                                مشکلات شناسایی شده
                            </div>

                            <div class="mt-0.5 text-[22px] font-black text-red-500">
                                {{ $seoIssues }}
                            </div>
                        </div>

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- مشکلات واقعی SEO --}}
                {{-- ========================================================= --}}

                <div class="mt-5 grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-3">


                    {{-- Meta Description ندارد --}}
                    <div class="group flex items-center justify-between rounded-2xl border
                    {{ $articlesWithoutMeta > 0 ? 'border-red-100 bg-red-50/40' : 'border-gray-100 bg-gray-50/50' }}
                    p-4 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-sm">

                        <div class="flex items-center gap-3">

                            <div class="flex size-10 shrink-0 items-center justify-center rounded-xl
                            {{ $articlesWithoutMeta > 0 ? 'bg-red-100 text-red-500' : 'bg-emerald-50 text-emerald-500' }}">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-5">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5A3.375 3.375 0 0 0 10.125 2.25H8.25m0 12.75h7.5m-7.5 3h7.5M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                                </svg>

                            </div>

                            <div>
                                <div class="text-[13px] font-bold text-gray-700">
                                    Meta Description
                                </div>

                                <div class="mt-1 text-[10px] text-gray-400">
                                    توضیحات متا ثبت نشده
                                </div>
                            </div>

                        </div>

                        <span class="text-[18px] font-black
                         {{ $articlesWithoutMeta > 0 ? 'text-red-500' : 'text-emerald-500' }}">
                {{ $articlesWithoutMeta }}
            </span>

                    </div>


                    {{-- طول Meta نامناسب --}}
                    <div class="group flex items-center justify-between rounded-2xl border
                    {{ $invalidMetaLength > 0 ? 'border-amber-100 bg-amber-50/40' : 'border-gray-100 bg-gray-50/50' }}
                    p-4 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-sm">

                        <div class="flex items-center gap-3">

                            <div class="flex size-10 shrink-0 items-center justify-center rounded-xl
                            {{ $invalidMetaLength > 0 ? 'bg-amber-100 text-amber-600' : 'bg-emerald-50 text-emerald-500' }}">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M10.5 6h9.75M10.5 9.75h9.75M10.5 13.5h9.75M3.75 6H6v2.25H3.75V6Zm0 7.5H6v2.25H3.75V13.5Z"/>

                                </svg>

                            </div>

                            <div>
                                <div class="text-[13px] font-bold text-gray-700">
                                    طول Meta Description
                                </div>

                                <div class="mt-1 text-[10px] text-gray-400">
                                    خارج از محدوده ۱۲۰ تا ۱۶۰ کاراکتر
                                </div>
                            </div>

                        </div>

                        <span class="text-[18px] font-black
                         {{ $invalidMetaLength > 0 ? 'text-amber-500' : 'text-emerald-500' }}">
                {{ $invalidMetaLength }}
            </span>

                    </div>


                    {{-- Focus Keyword ندارد --}}
                    <div class="group flex items-center justify-between rounded-2xl border
                    {{ $articlesWithoutFocusKeyword > 0 ? 'border-red-100 bg-red-50/40' : 'border-gray-100 bg-gray-50/50' }}
                    p-4 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-sm">

                        <div class="flex items-center gap-3">

                            <div class="flex size-10 shrink-0 items-center justify-center rounded-xl
                            {{ $articlesWithoutFocusKeyword > 0 ? 'bg-red-100 text-red-500' : 'bg-emerald-50 text-emerald-500' }}">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M21.75 10.5H19.5M4.5 10.5H2.25m3.457-4.243L4.116 4.666"/>

                                </svg>

                            </div>

                            <div>
                                <div class="text-[13px] font-bold text-gray-700">
                                    Focus Keyword
                                </div>

                                <div class="mt-1 text-[10px] text-gray-400">
                                    کلمه کلیدی اصلی ندارد
                                </div>
                            </div>

                        </div>

                        <span class="text-[18px] font-black
                         {{ $articlesWithoutFocusKeyword > 0 ? 'text-red-500' : 'text-emerald-500' }}">
                {{ $articlesWithoutFocusKeyword }}
            </span>

                    </div>


                    {{-- Keyword در Title نیست --}}
                    <div class="group flex items-center justify-between rounded-2xl border
                    {{ $keywordMissingFromTitle > 0 ? 'border-amber-100 bg-amber-50/40' : 'border-gray-100 bg-gray-50/50' }}
                    p-4 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-sm">

                        <div class="flex items-center gap-3">

                            <div class="flex size-10 shrink-0 items-center justify-center rounded-xl
                            {{ $keywordMissingFromTitle > 0 ? 'bg-amber-100 text-amber-600' : 'bg-emerald-50 text-emerald-500' }}">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M4.5 6.75h15M4.5 12h10.5M4.5 17.25H12"/>

                                </svg>

                            </div>

                            <div>
                                <div class="text-[13px] font-bold text-gray-700">
                                    کلمه کلیدی در عنوان
                                </div>

                                <div class="mt-1 text-[10px] text-gray-400">
                                    Focus Keyword در عنوان نیست
                                </div>
                            </div>

                        </div>

                        <span class="text-[18px] font-black
                         {{ $keywordMissingFromTitle > 0 ? 'text-amber-500' : 'text-emerald-500' }}">
                {{ $keywordMissingFromTitle }}
            </span>

                    </div>


                    {{-- Keyword در Content نیست --}}
                    <div class="group flex items-center justify-between rounded-2xl border
                    {{ $keywordMissingFromContent > 0 ? 'border-amber-100 bg-amber-50/40' : 'border-gray-100 bg-gray-50/50' }}
                    p-4 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-sm">

                        <div class="flex items-center gap-3">

                            <div class="flex size-10 shrink-0 items-center justify-center rounded-xl
                            {{ $keywordMissingFromContent > 0 ? 'bg-amber-100 text-amber-600' : 'bg-emerald-50 text-emerald-500' }}">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M19.5 6h-15m15 4.5h-15m15 4.5h-15m9 4.5h-9"/>

                                </svg>

                            </div>

                            <div>
                                <div class="text-[13px] font-bold text-gray-700">
                                    کلمه کلیدی در محتوا
                                </div>

                                <div class="mt-1 text-[10px] text-gray-400">
                                    Focus Keyword در متن مقاله نیست
                                </div>
                            </div>

                        </div>

                        <span class="text-[18px] font-black
                         {{ $keywordMissingFromContent > 0 ? 'text-amber-500' : 'text-emerald-500' }}">
                {{ $keywordMissingFromContent }}
            </span>

                    </div>


                    {{-- Secondary Keywords --}}
                    <div class="group flex items-center justify-between rounded-2xl border
                    {{ $articlesWithoutSecondaryKeywords > 0 ? 'border-amber-100 bg-amber-50/40' : 'border-gray-100 bg-gray-50/50' }}
                    p-4 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-sm">

                        <div class="flex items-center gap-3">

                            <div class="flex size-10 shrink-0 items-center justify-center rounded-xl
                            {{ $articlesWithoutSecondaryKeywords > 0 ? 'bg-amber-100 text-amber-600' : 'bg-emerald-50 text-emerald-500' }}">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M9.568 3.057A9.003 9.003 0 0 0 3 11.25c0 4.97 4.03 9 9 9a9.003 9.003 0 0 0 8.193-5.318M15 3.75h6m-3-3v6"/>

                                </svg>

                            </div>

                            <div>
                                <div class="text-[13px] font-bold text-gray-700">
                                    Secondary Keywords
                                </div>

                                <div class="mt-1 text-[10px] text-gray-400">
                                    کلمات کلیدی فرعی ندارد
                                </div>
                            </div>

                        </div>

                        <span class="text-[18px] font-black
                         {{ $articlesWithoutSecondaryKeywords > 0 ? 'text-amber-500' : 'text-emerald-500' }}">
                {{ $articlesWithoutSecondaryKeywords }}
            </span>

                    </div>


                    {{-- تصویر شاخص --}}
                    <div class="group flex items-center justify-between rounded-2xl border
                    {{ $articlesWithoutImage > 0 ? 'border-red-100 bg-red-50/40' : 'border-gray-100 bg-gray-50/50' }}
                    p-4 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-sm">

                        <div class="flex items-center gap-3">

                            <div class="flex size-10 shrink-0 items-center justify-center rounded-xl
                            {{ $articlesWithoutImage > 0 ? 'bg-red-100 text-red-500' : 'bg-emerald-50 text-emerald-500' }}">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 19.5h16.5A1.5 1.5 0 0 0 21.75 18V6A1.5 1.5 0 0 0 20.25 4.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm12-10.125h.008v.008h-.008v-.008Z"/>

                                </svg>

                            </div>

                            <div>
                                <div class="text-[13px] font-bold text-gray-700">
                                    تصویر شاخص
                                </div>

                                <div class="mt-1 text-[10px] text-gray-400">
                                    مقاله بدون تصویر
                                </div>
                            </div>

                        </div>

                        <span class="text-[18px] font-black
                         {{ $articlesWithoutImage > 0 ? 'text-red-500' : 'text-emerald-500' }}">
                {{ $articlesWithoutImage }}
            </span>

                    </div>


                    {{-- Slug --}}
                    <div class="group flex items-center justify-between rounded-2xl border
                    {{ $articlesWithoutSlug > 0 ? 'border-red-100 bg-red-50/40' : 'border-gray-100 bg-gray-50/50' }}
                    p-4 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-sm">

                        <div class="flex items-center gap-3">

                            <div class="flex size-10 shrink-0 items-center justify-center rounded-xl
                            {{ $articlesWithoutSlug > 0 ? 'bg-red-100 text-red-500' : 'bg-emerald-50 text-emerald-500' }}">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"/>

                                </svg>

                            </div>

                            <div>
                                <div class="text-[13px] font-bold text-gray-700">
                                    Slug
                                </div>

                                <div class="mt-1 text-[10px] text-gray-400">
                                    آدرس مقاله ثبت نشده
                                </div>
                            </div>

                        </div>

                        <span class="text-[18px] font-black
                         {{ $articlesWithoutSlug > 0 ? 'text-red-500' : 'text-emerald-500' }}">
                {{ $articlesWithoutSlug }}
            </span>

                    </div>


                    {{-- Robots نامعتبر --}}
                    <div class="group flex items-center justify-between rounded-2xl border
                    {{ $invalidRobots > 0 ? 'border-red-100 bg-red-50/40' : 'border-gray-100 bg-gray-50/50' }}
                    p-4 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-sm">

                        <div class="flex items-center gap-3">

                            <div class="flex size-10 shrink-0 items-center justify-center rounded-xl
                            {{ $invalidRobots > 0 ? 'bg-red-100 text-red-500' : 'bg-emerald-50 text-emerald-500' }}">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.8"
                                     stroke="currentColor"
                                     class="size-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 9v3.75m0 3.75h.008v.008H12V16.5Zm9-4.5a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>

                                </svg>

                            </div>

                            <div>
                                <div class="text-[13px] font-bold text-gray-700">
                                    Robots
                                </div>

                                <div class="mt-1 text-[10px] text-gray-400">
                                    مقدار Robots نامعتبر است
                                </div>
                            </div>

                        </div>

                        <span class="text-[18px] font-black
                         {{ $invalidRobots > 0 ? 'text-red-500' : 'text-emerald-500' }}">
                {{ $invalidRobots }}
            </span>

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- وضعیت‌های قابل بررسی --}}
                {{-- ========================================================= --}}

                <div class="mt-6 border-t border-gray-100 pt-5">

                    <div class="mb-3 flex items-center gap-2">

                        <div class="size-2 rounded-full bg-violet-500"></div>

                        <h3 class="text-[12px] font-black text-gray-700">
                            وضعیت‌های قابل بررسی
                        </h3>

                        <span class="text-[10px] text-gray-400">
                این موارد الزاماً خطای SEO نیستند
            </span>

                    </div>


                    <div class="grid grid-cols-1 gap-3 md:grid-cols-2">


                        {{-- Noindex --}}
                        <div class="flex items-center justify-between rounded-2xl border border-violet-100 bg-violet-50/40 p-4">

                            <div>

                                <div class="text-[13px] font-bold text-gray-700">
                                    Noindex
                                </div>

                                <div class="mt-1 text-[10px] text-gray-400">
                                    مقالاتی که از ایندکس موتور جستجو خارج شده‌اند
                                </div>

                            </div>

                            <span class="text-[18px] font-black text-violet-500">
                    {{ $noIndexArticles }}
                </span>

                        </div>


                        {{-- Draft --}}
                        <div class="flex items-center justify-between rounded-2xl border border-gray-200 bg-gray-50/60 p-4">

                            <div>

                                <div class="text-[13px] font-bold text-gray-700">
                                    پیش‌نویس
                                </div>

                                <div class="mt-1 text-[10px] text-gray-400">
                                    مقالاتی که هنوز منتشر نشده‌اند
                                </div>

                            </div>

                            <span class="text-[18px] font-black text-gray-500">
                    {{ $draftArticles }}
                </span>

                        </div>

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- وضعیت سلامت --}}
                {{-- ========================================================= --}}

                @if($seoIssues == 0)

                    <div class="mt-5 flex items-center gap-3 rounded-2xl border border-emerald-100 bg-emerald-50 p-4">

                        <div class="flex size-9 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="2"
                                 stroke="currentColor"
                                 class="size-5">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="m4.5 12.75 6 6 9-13.5"/>

                            </svg>

                        </div>

                        <div>
                            <div class="text-[12px] font-black text-emerald-700">
                                وضعیت SEO عالی است
                            </div>

                            <div class="mt-1 text-[10px] text-emerald-600/70">
                                در بررسی فعلی مشکلی در مقالات منتشرشده شناسایی نشد.
                            </div>
                        </div>

                    </div>

                @endif

            </div>
        </div>
    </section>
</div>
