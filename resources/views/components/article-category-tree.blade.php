@props(['categories','level' => 0])
@foreach($categories as $category)
    <li>
        <a href="{{ route('article_archive', ['path' => $category->full_path]) }}" class="group rounded-lg flex items-center justify-between gap-3rounded-xl px-3 py-2.5 text-gray-600 lg:text-[13px] text-[12px] hover:bg-[#fff5f8] hover:text-[#cf4070] transition-all duration-300" style="margin-right: {{ $level * 16 }}px;">
            <div class="flex items-center gap-2.5">
                @if($level === 0)
                    {{-- دسته اصلی --}}
                    <span class="size-1.5 rounded-full bg-gray-300 group-hover:bg-[#ff528c] group-hover:scale-125 transition-all duration-300"></span>
                @else
                    {{-- زیر دسته --}}
                    <span class="h-px w-3 bg-gray-300 transition-all duration-300 group-hover:w-4 group-hover:bg-[#ff528c]"></span>
                @endif
                <span class="{{ $level === 0 ? 'font-medium' : '' }}"> {{ $category->name }} </span>
            </div>
        </a>

        {{-- زیر دسته‌های این دسته --}}
        @if($category->childrenRecursive->isNotEmpty())
            <ul class="mt-1 space-y-1">
                <x-article-category-tree :categories="$category->childrenRecursive" :level="$level + 1"/>
            </ul>
        @endif
    </li>
@endforeach
