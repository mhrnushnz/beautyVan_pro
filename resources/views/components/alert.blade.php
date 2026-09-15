<div x-data="toast()"
     @modal-alert.window="show($event.detail)"
     x-show="visible"
     x-cloak
     x-transition:enter="transition-opacity duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[9999] flex items-center justify-center">

    <div @click.stop
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 scale-75 rotate-1 blur-sm"
         x-transition:enter-end="opacity-100 scale-100 rotate-0 blur-0"
         x-transition:leave="transition ease-in duration-250"
         x-transition:leave-start="opacity-100 scale-100 blur-0"
         x-transition:leave-end="opacity-0 scale-90 blur-sm"
         class="lg:w-1/3 md:w-1/3 sm:w-1/2 w-1/2 shadow-md relative p-6 rounded-2xl bg-gray-200">

        <!-- close btn -->
         <span @click="hide()" class="absolute top-3 start-3 cursor-pointer">
             <svg class="size-6 bg-gray-300 p-1 rounded-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
         </span>

        <!-- Icon -->
        <div class="w-full flex h-16 items-center justify-center rounded-full" :class="iconBg">
            <!-- Success -->
            <svg x-show="type=='success'" class="h-10 w-10 rounded-full p-2 text-white shadow-lg" style="background: radial-gradient(circle at 30% 30%, #8af871 0%, #3caa1e 70%, #1c6c12 100%);" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                <path d="M5 13l4 4L19 7"/>
            </svg>

            <!-- Error -->
            <svg x-show="type=='error'" class="h-10 w-10 rounded-full p-2 text-white shadow-lg" style="background: radial-gradient(circle at 30% 30%, #f88976 0%, #d32121 70%, #911717 100%);" fill="none" stroke="currentColor" stroke-width="2.8" viewBox="0 0 24 24">
                <path d="M6 6l12 12M18 6L6 18"/>
            </svg>

            <!-- Warning -->
            <svg x-show="type=='warning'" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 rounded-full p-2 text-white shadow-lg size-6" style="background: radial-gradient(circle at 30% 30%, #fceea5 0%, #e19b1d 70%, #8e6314 100%);" fill="none" viewBox="0 0 24 24" stroke-width="2.7" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>

            <!-- Info -->
            <svg x-show="type=='info'" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 rounded-full p-2 text-white shadow-lg size-6" style="background: radial-gradient(circle at 30% 30%, #a1e4ff 0%, #2289c1 70%, #15627e 100%);" fill="none" viewBox="0 0 24 24" stroke-width="2.7" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
            </svg>
        </div>

        <!-- Text -->
        <div>
            <h2 x-text="title" class="lg:text-[24px] md:text-[22px] text-[20px] font-bold text-gray-800 text-center" ></h2>
            <hr class="text-gray-300 w-full h-[1px] my-3">
            <p x-text="message" class="mt-2 lg:text-[18px] text-[16px] text-gray-500 text-center" ></p>
        </div>
    </div>
</div>
