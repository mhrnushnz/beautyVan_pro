@push('schemas')
    @if(!empty($schema))
        <script type="application/ld+json">
            {!! json_encode(
                $schema,
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES |
                JSON_PRETTY_PRINT
            ) !!}
        </script>
    @endif
@endpush
<div class="place-items-center">
    <div class="container mx-auto mt-10">
        <section class="relative overflow-hidden
                    bg-white
                    rounded-[30px]
                    border border-gray-100
                    shadow-[0_18px_55px_rgba(20,10,40,.06)]
                    sm:p-6 p-4">


            {{-- المان‌های تزئینی پس‌زمینه --}}
            <div class="pointer-events-none
                    absolute -top-28 -end-28
                    size-72
                    rounded-full
                    bg-[#ff528c]/8
                    blur-3xl">
            </div>

            <div class="pointer-events-none
                    absolute -bottom-32 start-1/3
                    size-72
                    rounded-full
                    bg-[#7C3AED]/5
                    blur-3xl">
            </div>


            <div class="relative z-10">


                {{-- =====================================================
                    HEADER
                ====================================================== --}}
                <div class="flex sm:flex-row flex-col
                        sm:items-end
                        justify-between
                        gap-4
                        mb-7">


                    <div>

                        {{-- عنوان کوچک --}}
                        <div class="flex items-center gap-2 mb-2">

                        <span class="w-7 h-[2px]
                                     rounded-full
                                     bg-[#ff528c]">
                        </span>

                            <span class="text-[#cf4070]
                                     text-[10px]
                                     sm:text-[11px]
                                     font-bold
                                     tracking-wide">

                            BEAUTY WAN PORTFOLIO

                        </span>

                        </div>


                        {{-- عنوان اصلی --}}
                        <h1 class="font_heavy
                               text-gray-800
                               lg:text-[30px]
                               md:text-[25px]
                               sm:text-[24px]
                               text-[21px]
                               leading-9">

                            نمونه کار خدمات

                            <span class="text-[#cf4070]">
                            {{ $servicecategories->firstWhere('id', $serviceCategoryId)?->name ?? '' }}
                        </span>

                        </h1>


                        {{-- توضیح --}}
                        <p class="text-gray-400
                              sm:text-[13px]
                              text-[11px]
                              leading-6
                              mt-2">

                            بخشی از نمونه‌کارهای انجام‌شده توسط متخصصان بیوتی وان

                        </p>

                    </div>


                    {{-- تعداد نمونه کار --}}
                    <div class="shrink-0
                            inline-flex items-center gap-2
                            w-fit
                            px-3 py-2
                            rounded-xl
                            bg-gray-50
                            border border-gray-100
                            text-gray-400
                            text-[11px]">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.6"
                             stroke="currentColor"
                             class="size-4 text-[#ff528c]">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Z"/>

                        </svg>

                        <span>
                        <strong class="text-gray-700">
                            {{ $servicesImages->total() }}
                        </strong>
                        نمونه کار
                    </span>

                    </div>

                </div>



                {{-- =====================================================
                    SERVICE CATEGORIES
                ====================================================== --}}
                <div class="mb-7">

                    <div class="flex items-center gap-2 mb-3">

                    <span class="text-gray-700
                                 text-[12px]
                                 sm:text-[13px]
                                 font-bold">
                        مشاهده خدمات
                    </span>

                        <span class="flex-1 h-px bg-gray-100"></span>

                    </div>


                    <ul class="flex items-center
                           flex-wrap
                           gap-2">


                        @foreach($servicecategories as $servicecategory)

                            <li>

                                <a href="{{ route('our_service', ['slug' => $servicecategory->slug]) }}"

                                    @class([
                                        'group inline-flex items-center gap-2
                                         rounded-full
                                         sm:px-4 px-3
                                         sm:py-2.5 py-2
                                         sm:text-[12px] text-[11px]
                                         font-medium
                                         border
                                         transition-all duration-300',

                                        'bg-[#ff528c]
                                         border-[#ff528c]
                                         text-white
                                         shadow-[0_6px_18px_rgba(255,82,140,.20)]'
                                             => $serviceCategoryId == $servicecategory->id,

                                        'bg-gray-50
                                         border-gray-100
                                         text-gray-600
                                         hover:bg-[#fff3f7]
                                         hover:border-[#ff528c]/20
                                         hover:text-[#cf4070]
                                         hover:-translate-y-0.5'
                                             => $serviceCategoryId != $servicecategory->id,
                                    ])>


                                <span @class([
                                    'size-1.5 rounded-full transition-all',
                                    'bg-white'
                                        => $serviceCategoryId == $servicecategory->id,
                                    'bg-gray-300 group-hover:bg-[#ff528c]'
                                        => $serviceCategoryId != $servicecategory->id,
                                ])>
                                </span>


                                    {{ $servicecategory->name }}

                                </a>

                            </li>

                        @endforeach

                    </ul>

                </div>



                @if($servicesImages->count() == 0)


                    {{-- =====================================================
                        EMPTY STATE
                    ====================================================== --}}
                    <div class="min-h-[330px]
                            flex flex-col
                            items-center justify-center
                            rounded-[24px]
                            bg-gray-50/70
                            border border-dashed border-gray-200
                            px-5">


                        <div class="size-20
                                flex items-center justify-center
                                rounded-full
                                bg-white
                                border border-gray-100
                                shadow-sm
                                mb-4">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.3"
                                 stroke="currentColor"
                                 class="size-9 text-gray-300">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Z"/>

                            </svg>

                        </div>


                        <h3 class="text-gray-700
                               font-bold
                               text-[15px]">
                            هنوز نمونه کاری ثبت نشده
                        </h3>


                        <p class="text-gray-400
                              text-center
                              text-[11px]
                              sm:text-[12px]
                              mt-2">
                            درحال حاظر هیچ نمونه کاری وجود ندارد
                        </p>

                    </div>


                @else


                    {{-- =====================================================
                        PORTFOLIO GRID
                    ====================================================== --}}
                    <ul class="grid
                           xl:grid-cols-4
                           lg:grid-cols-4
                           md:grid-cols-3
                           sm:grid-cols-2
                           grid-cols-1
                           lg:gap-5
                           gap-4">


                        @foreach($servicesImages as $Images)

                            <li class="group
                                   relative
                                   overflow-hidden
                                   lg:h-[16rem]
                                   md:h-[15rem]
                                   sm:h-[17rem]
                                   h-[20rem]
                                   rounded-[22px]
                                   bg-gray-100
                                   border border-gray-100
                                   shadow-[0_8px_25px_rgba(20,10,40,.06)]
                                   hover:shadow-[0_18px_40px_rgba(20,10,40,.14)]
                                   hover:-translate-y-1
                                   transition-all duration-500">


                                {{-- Image --}}
                                <img src="{{ asset('storage/' . $Images->path) }}"
                                     alt="{{ $Images->service->serviceCategory->name }}"
                                     loading="lazy"
                                     class="w-full h-full
                                        object-cover
                                        transition-transform
                                        duration-700
                                        ease-out
                                        group-hover:scale-[1.07]">



                                {{-- Gradient --}}
                                <div class="absolute inset-0
                                        bg-gradient-to-t
                                        from-[#150a29]/70
                                        via-[#150a29]/5
                                        to-transparent
                                        opacity-60
                                        group-hover:opacity-100
                                        transition-all duration-500">
                                </div>



                                {{-- Hover layer --}}
                                <div class="absolute inset-0
                                        bg-[#7C3AED]/0
                                        group-hover:bg-[#7C3AED]/5
                                        transition-colors duration-500">
                                </div>



                                {{-- Top badge --}}
                                <div class="absolute
                                        top-3 start-3
                                        z-10
                                        opacity-0
                                        -translate-y-2
                                        group-hover:opacity-100
                                        group-hover:translate-y-0
                                        transition-all duration-500">

                                <span class="inline-flex
                                             items-center gap-1.5
                                             px-2.5 py-1.5
                                             rounded-full
                                             bg-white/15
                                             backdrop-blur-md
                                             border border-white/20
                                             text-white
                                             text-[9px]
                                             sm:text-[10px]">

                                    <span class="size-1.5
                                                 rounded-full
                                                 bg-[#ff528c]">
                                    </span>

                                    {{ $Images->service->serviceCategory->name }}

                                </span>

                                </div>



                                {{-- Bottom content --}}
                                <div class="absolute
                                        start-4 end-4
                                        bottom-4
                                        z-10
                                        translate-y-3
                                        opacity-0
                                        group-hover:translate-y-0
                                        group-hover:opacity-100
                                        transition-all duration-500">


                                    <div class="flex items-center
                                            justify-between
                                            gap-3">


                                        <div>

                                            <p class="text-white
                                                  font-bold
                                                  sm:text-[13px]
                                                  text-[12px]">

                                                نمونه کار
                                                {{ $Images->service->serviceCategory->name }}

                                            </p>


                                            <div class="w-6 h-[2px]
                                                    bg-[#ff528c]
                                                    rounded-full
                                                    mt-2
                                                    group-hover:w-10
                                                    transition-all duration-500">
                                            </div>

                                        </div>



                                        {{-- View icon --}}
                                        <div class="size-9
                                                shrink-0
                                                flex items-center justify-center
                                                rounded-full
                                                bg-white/15
                                                backdrop-blur-md
                                                border border-white/20
                                                text-white">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke-width="1.6"
                                                 stroke="currentColor"
                                                 class="size-4">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12 18 18.75 12 18.75 2.25 12 2.25 12Z"/>

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>

                                            </svg>

                                        </div>

                                    </div>

                                </div>

                            </li>

                        @endforeach

                    </ul>

                @endif



                {{-- =====================================================
                    PAGINATION
                ====================================================== --}}
                @if($servicesImages->lastPage() > 1)

                    <nav class="flex flex-wrap
                            justify-center items-center
                            gap-1.5
                            mt-8
                            pt-6
                            border-t border-gray-100">


                        {{-- قبلی --}}
                        @if ($servicesImages->onFirstPage())

                            <span class="h-10
                                     px-4
                                     inline-flex items-center justify-center
                                     rounded-xl
                                     bg-gray-50
                                     border border-gray-100
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
                                       border border-gray-100
                                       text-gray-600
                                       text-[11px]
                                       cursor-pointer
                                       hover:bg-[#fff0f5]
                                       hover:border-[#ff528c]/20
                                       hover:text-[#cf4070]
                                       transition-all duration-300">

                                قبلی

                            </button>

                        @endif



                        {{-- صفحه اول --}}
                        <button wire:click="gotoPage(1)"
                                class="size-10
                                   rounded-xl
                                   text-[11px]
                                   cursor-pointer
                                   transition-all duration-300
                                   {{ $servicesImages->currentPage() == 1
                                       ? 'bg-[#ff528c] text-white shadow-[0_6px_18px_rgba(255,82,140,.25)]'
                                       : 'bg-gray-50 border border-gray-100 text-gray-600 hover:bg-[#fff0f5] hover:text-[#cf4070]'
                                   }}">

                            1

                        </button>



                        {{-- سه نقطه اول --}}
                        @if($servicesImages->currentPage() > 3)

                            <span class="px-1 text-gray-300">
                            ...
                        </span>

                        @endif



                        {{-- صفحات اطراف صفحه فعلی --}}
                        @for(
                            $i = max(2, $servicesImages->currentPage() - 1);
                            $i <= min($servicesImages->lastPage() - 1, $servicesImages->currentPage() + 1);
                            $i++
                        )

                            <button wire:click="gotoPage({{ $i }})"
                                    class="size-10
                                       rounded-xl
                                       text-[11px]
                                       cursor-pointer
                                       transition-all duration-300
                                       {{ $servicesImages->currentPage() == $i
                                           ? 'bg-[#ff528c] text-white shadow-[0_6px_18px_rgba(255,82,140,.25)]'
                                           : 'bg-gray-50 border border-gray-100 text-gray-600 hover:bg-[#fff0f5] hover:text-[#cf4070]'
                                       }}">

                                {{ $i }}

                            </button>

                        @endfor



                        {{-- سه نقطه آخر --}}
                        @if($servicesImages->currentPage() < $servicesImages->lastPage() - 2)

                            <span class="px-1 text-gray-300">
                            ...
                        </span>

                        @endif



                        {{-- صفحه آخر --}}
                        @if($servicesImages->lastPage() > 1)

                            <button wire:click="gotoPage({{ $servicesImages->lastPage() }})"
                                    class="size-10
                                       rounded-xl
                                       text-[11px]
                                       cursor-pointer
                                       transition-all duration-300
                                       {{ $servicesImages->currentPage() == $servicesImages->lastPage()
                                           ? 'bg-[#ff528c] text-white shadow-[0_6px_18px_rgba(255,82,140,.25)]'
                                           : 'bg-gray-50 border border-gray-100 text-gray-600 hover:bg-[#fff0f5] hover:text-[#cf4070]'
                                       }}">

                                {{ $servicesImages->lastPage() }}

                            </button>

                        @endif



                        {{-- بعدی --}}
                        @if ($servicesImages->hasMorePages())

                            <button wire:click="nextPage"
                                    class="h-10
                                       px-4
                                       rounded-xl
                                       bg-gray-50
                                       border border-gray-100
                                       text-gray-600
                                       text-[11px]
                                       cursor-pointer
                                       hover:bg-[#fff0f5]
                                       hover:border-[#ff528c]/20
                                       hover:text-[#cf4070]
                                       transition-all duration-300">

                                بعدی

                            </button>

                        @else

                            <span class="h-10
                                     px-4
                                     inline-flex items-center justify-center
                                     rounded-xl
                                     bg-gray-50
                                     border border-gray-100
                                     text-gray-300
                                     text-[11px]
                                     cursor-not-allowed">

                            بعدی

                        </span>

                        @endif

                    </nav>

                @endif

            </div>

        </section>

    </div>
</div>
