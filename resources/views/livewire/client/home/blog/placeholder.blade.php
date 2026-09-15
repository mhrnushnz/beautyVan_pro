<div class="container mx-auto py-10">
    <!-- عنوان اسکلت -->
    <div class="mb-7 flex items-center justify-between">
        <div class="h-8 w-40 animate-pulse rounded-xl bg-gray-200"></div>
        <div class="h-5 w-20 animate-pulse rounded-lg bg-gray-100"></div>
    </div>
    <!-- کارت‌ها -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @for($i = 0; $i < 3; $i++)
            <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white">
                <!-- تصویر -->
                <div class="h-[220px] animate-pulse bg-gray-200"></div>
                <div class="space-y-3 p-4">
                    <!-- دسته بندی -->
                    <div class="h-5 w-20 animate-pulse rounded-full bg-gray-200"></div>
                    <!-- عنوان -->
                    <div class="h-5 w-4/5 animate-pulse rounded-lg bg-gray-200"></div>
                    <!-- متن -->
                    <div class="space-y-2">
                        <div class="h-3 w-full animate-pulse rounded bg-gray-100"></div>
                        <div class="h-3 w-3/4 animate-pulse rounded bg-gray-100"></div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
