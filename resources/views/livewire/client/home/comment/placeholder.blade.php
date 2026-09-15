<div>
    <div class="place-items-center">

        <!-- پس زمینه -->
        <div
            class="relative -z-10 h-[16rem] w-full
                   bg-gradient-to-t from-white to-white/0
                   md:h-[14rem]"
            style="
                background-image: url({{ asset('/client/asset/pic/Group-344902.png') }});
                background-position: top;
            "
        ></div>


        <!-- Skeleton -->
        <div
            class="container
                   -mt-50
                   flex flex-col
                   items-center
                   justify-between
                   sm:-mt-55
                   md:-mt-40 md:flex-row
                   lg:-mt-35"
        >

            <!-- Skeleton عنوان -->
            <div
                class="flex w-full flex-col items-center justify-center
                       md:w-[50%]"
            >

                <!-- عنوان -->
                <div
                    class="h-8 w-40 animate-pulse
                           rounded-xl bg-gray-200
                           sm:w-44 md:w-48"
                ></div>

                <!-- comments -->
                <div
                    class="mt-2 h-11 w-52 animate-pulse
                           rounded-xl bg-gray-100
                           md:h-14 md:w-64"
                ></div>

            </div>


            <!-- Skeleton کارت نظر -->
            <div class="mt-5 w-full md:mt-0 md:w-[50%]">

                <div
                    class="relative overflow-hidden
                           rounded-2xl
                           border border-gray-100
                           bg-white
                           px-4 py-6
                           shadow-lg"
                >

                    <!-- Header -->
                    <div class="flex items-center gap-3">

                        <!-- Avatar -->
                        <div
                            class="size-10 shrink-0
                                   animate-pulse
                                   rounded-full
                                   bg-gray-200"
                        ></div>


                        <!-- Name -->
                        <div class="space-y-2">

                            <div
                                class="h-4 w-28
                                       animate-pulse
                                       rounded-lg
                                       bg-gray-200"
                            ></div>

                            <div
                                class="h-2.5 w-16
                                       animate-pulse
                                       rounded-lg
                                       bg-gray-100"
                            ></div>

                        </div>

                    </div>


                    <!-- متن نظر -->
                    <div class="mt-5 space-y-3">

                        <div
                            class="h-3 w-full
                                   animate-pulse
                                   rounded-full
                                   bg-gray-200"
                        ></div>

                        <div
                            class="h-3 w-[92%]
                                   animate-pulse
                                   rounded-full
                                   bg-gray-200"
                        ></div>

                        <div
                            class="h-3 w-[75%]
                                   animate-pulse
                                   rounded-full
                                   bg-gray-100"
                        ></div>

                    </div>


                    <!-- Shine Effect -->
                    <div
                        class="pointer-events-none
                               absolute inset-0
                               -translate-x-full
                               animate-[shimmer_1.8s_infinite]
                               bg-gradient-to-r
                               from-transparent
                               via-white/50
                               to-transparent"
                    ></div>

                </div>

            </div>

        </div>

    </div>
</div>
