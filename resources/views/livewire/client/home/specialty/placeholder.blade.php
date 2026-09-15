<div>
    <div class="place-items-center">

        {{-- =========================
            Header Skeleton
        ========================== --}}
        <div
            class="relative -z-10 h-[18rem] w-full bg-gradient-to-t from-white to-white/0"
            style="
                background-image: url({{ asset('/client/asset/pic/Group-344902.png') }});
                background-position: top;
            "
        >

            {{-- جای SVG بالای عنوان --}}
            <div
                class="
                    absolute
                    md:-top-10.5
                    sm:-top-7.5
                    -top-5.5
                    lg:start-[45%]
                    md:start-[43%]
                    sm:start-[43%]
                    start-[39%]
                    lg:size-30
                    md:size-30
                    sm:size-24
                    size-20
                    rounded-full
                    bg-gray-100/70
                    animate-pulse
                "
            ></div>

            {{-- عنوان --}}
            <div
                class="
                    absolute
                    top-20
                    left-1/2
                    h-7
                    md:w-32
                    w-28
                    -translate-x-1/2
                    rounded-lg
                    bg-gray-200
                    animate-pulse
                "
            ></div>

        </div>


        {{-- =========================
            Cards Skeleton
        ========================== --}}
        <ul
            class="
                container
                grid
                md:grid-cols-2
                grid-cols-1
                gap-3
                sm:-mt-32
                -mt-36
            "
        >

            @for($i = 0; $i < 4; $i++)

                <li
                    class="
                        rounded-2xl
                        bg-white
                        p-5
                        shadow-lg
                        space-y-4
                    "
                >

                    {{-- بالای کارت --}}
                    <div class="flex items-center justify-between gap-5">

                        {{-- عنوان‌ها --}}
                        <div class="flex-1 space-y-3">

                            <div
                                class="
                                    h-5
                                    sm:w-32
                                    w-28
                                    rounded-md
                                    bg-gray-200
                                    animate-pulse
                                "
                            ></div>

                            <div
                                class="
                                    h-3.5
                                    sm:w-48
                                    w-36
                                    max-w-full
                                    rounded-md
                                    bg-gray-100
                                    animate-pulse
                                "
                            ></div>

                        </div>


                        {{-- آیکون --}}
                        <div
                            class="
                                flex
                                sm:size-[68px]
                                size-[60px]
                                shrink-0
                                items-center
                                justify-center
                                rounded-full
                                bg-[#ffe1ea]/70
                            "
                        >

                            <div
                                class="
                                    sm:size-10
                                    size-8
                                    rounded-xl
                                    bg-[#f7bfd1]
                                    animate-pulse
                                "
                            ></div>

                        </div>

                    </div>


                    {{-- توضیحات --}}
                    <div class="space-y-2.5 pt-1">

                        <div
                            class="
                                h-3
                                w-full
                                rounded-full
                                bg-gray-100
                                animate-pulse
                            "
                        ></div>

                        <div
                            class="
                                h-3
                                w-[94%]
                                rounded-full
                                bg-gray-100
                                animate-pulse
                            "
                        ></div>

                        <div
                            class="
                                h-3
                                w-[88%]
                                rounded-full
                                bg-gray-100
                                animate-pulse
                            "
                        ></div>

                        <div
                            class="
                                h-3
                                w-[65%]
                                rounded-full
                                bg-gray-100
                                animate-pulse
                            "
                        ></div>

                    </div>

                </li>

            @endfor

        </ul>

    </div>
</div>
