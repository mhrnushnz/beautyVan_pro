// اسلایدر بالای صفحه-----------------------------------------------------------------------------
const slider = document.querySelector('.slider');
if (slider) {
    const slides = slider.querySelectorAll('.slide');
    const dots = slider.querySelectorAll('.slider-dot');
    const nextButton = slider.querySelector('.slider-next');
    const prevButton = slider.querySelector('.slider-prev');
    let currentSlide = 0;
    let sliderInterval;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            const content = slide.querySelector('.slide-content');
            const image = slide.querySelector('.slide-image');
            if (i === index) {
                // نمایش اسلاید
                slide.classList.remove('opacity-0', 'z-0');
                slide.classList.add('opacity-100', 'z-10');

                // Zoom آرام تصویر
                image.classList.remove('scale-100');
                image.classList.add('scale-110');

                // ورود متن
                setTimeout(() => {
                    content.classList.remove(
                        'opacity-0',
                        'translate-y-8'
                    );
                    content.classList.add(
                        'opacity-100',
                        'translate-y-0'
                    );
                }, 250);
            } else {
                // مخفی کردن اسلاید
                slide.classList.remove('opacity-100', 'z-10');
                slide.classList.add('opacity-0', 'z-0');

                // Reset تصویر
                image.classList.remove('scale-110');
                image.classList.add('scale-100');

                // Reset متن
                content.classList.remove(
                    'opacity-100',
                    'translate-y-0'
                );
                content.classList.add(
                    'opacity-0',
                    'translate-y-8'
                );
            }
        });

        // dots
        dots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.remove(
                    'w-2',
                    'bg-white/50'
                );
                dot.classList.add(
                    'w-8',
                    'bg-white'
                );
            } else {
                dot.classList.remove(
                    'w-8',
                    'bg-white'
                );
                dot.classList.add(
                    'w-2',
                    'bg-white/50'
                );
            }
        });
    }

    function nextSlide() {
        currentSlide =
            (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide =
            (currentSlide - 1 + slides.length)
            % slides.length;
        showSlide(currentSlide);
    }

    function startSlider() {
        stopSlider();
        sliderInterval = setInterval(() => {
            nextSlide();
        }, 6000);
    }

    function stopSlider() {
        if (sliderInterval) {
            clearInterval(sliderInterval);
        }
    }

    // Next
    nextButton?.addEventListener('click', () => {
        nextSlide();
        startSlider();
    });

    // Previous
    prevButton?.addEventListener('click', () => {
        prevSlide();
        startSlider();
    });

    // Dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
            startSlider();
        });
    });

    // توقف با Hover
    slider.addEventListener('mouseenter', stopSlider);
    slider.addEventListener('mouseleave', startSlider);
    // شروع
    showSlide(currentSlide);
    startSlider();
}






// اسلایدر تبلیغات-------------------------------------------------------------------------------
