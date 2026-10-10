import './bootstrap';


// اسکریپت الرت کوچک
window.addEventListener('toast', function (event) {
    const toast = document.getElementById('toast');
    const box = document.getElementById('toastBox');
    const message = document.getElementById('toastMessage');
    const icon = document.getElementById('toastIcon');

    if (!toast || !box) return;

    const type = event.detail.type || 'success';

    message.textContent = event.detail.message;

    // رنگ‌ها
    box.className = "min-w-[320px] rounded-xl px-5 py-4 shadow-2xl text-white flex items-center gap-3";

    if (type === 'success') {
        box.classList.add('bg-green-500');
        icon.textContent = "✅";
    }
    else if (type === 'error') {
        box.classList.add('bg-red-500');
        icon.textContent = "❌";
    }
    else if (type === 'warning') {
        box.classList.add('bg-yellow-500');
        icon.textContent = "⚠️";
    }
    else {
        box.classList.add('bg-blue-500');
        icon.textContent = "ℹ️";
    }

    toast.classList.remove('hidden');

    setTimeout(() => {
        toast.classList.add('hidden');
    }, 3000);
});





// ----------------------------------------------------------------------------اسلایدر تبلیغات
import Swiper from 'swiper';
import { Autoplay } from 'swiper/modules';
import 'swiper/css';

function initBeautyAdsSlider() {
    document.querySelectorAll('.beauty-ads-swiper').forEach((element) => {
        if (element.swiper) return;
        const wrapper = element.querySelector('.swiper-wrapper');

        if (!wrapper) return;
        const originalSlides = Array.from(wrapper.children);

        if (originalSlides.length < 2) return;
        // تکثیر تبلیغات برای حرکت چرخشی در دسکتاپ
        if (originalSlides.length < 8) {
            const repeats = Math.ceil(8 / originalSlides.length);
            for (let i = 1; i < repeats; i++) {
                originalSlides.forEach((slide) => {
                    const clone = slide.cloneNode(true);
                    clone.setAttribute('aria-hidden', 'true');
                    wrapper.appendChild(clone);
                });
            }
        }

        new Swiper(element, {
            modules: [Autoplay],
            slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 16,
            speed: 700,

            loop: true,
            watchOverflow: true,

            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            grabCursor: true,

            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 16,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 14,
                },
            },
        });
    });
}

document.addEventListener('DOMContentLoaded', initBeautyAdsSlider);
document.addEventListener('livewire:navigated', initBeautyAdsSlider);
