// نمایش زیرمنو ها در حالت دسکتاپ
document.addEventListener('DOMContentLoaded', () => {
  const submenuItems = document.querySelectorAll('.has-submenu');

  // تبلت/تاچ: 768 تا 1024 را هم می‌توانی تنظیم کنی
  const isTouchLike = () => window.matchMedia('(max-width: 1024px)').matches;

  submenuItems.forEach((item) => {
    const link = item.querySelector('.submenu-link');

    if (!link) return;

    link.addEventListener('click', (e) => {
      // فقط در تبلت/موبایل این رفتار فعال باشد
      if (!isTouchLike()) return;

      const isOpen = item.classList.contains('open');

      // بار اول: فقط منو باز شود
      if (!isOpen) {
        e.preventDefault();

        // بستن بقیه منوها
        submenuItems.forEach((other) => {
          if (other !== item) other.classList.remove('open');
        });

        item.classList.add('open');
        return;
      }

      // بار دوم: اجازه بده به لینک برود
      // یعنی هیچ preventDefault ای نکن
    });
  });

  // کلیک بیرون: بستن منوی باز
  document.addEventListener('click', (e) => {
    if (!isTouchLike()) return;

    if (!e.target.closest('.has-submenu')) {
      submenuItems.forEach((item) => item.classList.remove('open'));
    }
  });

  // اگر سایز صفحه عوض شد، open ها بسته شوند
  window.addEventListener('resize', () => {
    if (!isTouchLike()) {
      submenuItems.forEach((item) => item.classList.remove('open'));
    }
  });
});




// نمایش زیر منو ها در حالت موبایل برای عملکرد این کد تو فرانت باید از toggle ها استفاده کرد!
document.addEventListener('DOMContentLoaded', () => {
  const toggles = document.querySelectorAll('.submenu-toggle');
  let lastClickedToggle = null;

  toggles.forEach(toggle => {
    toggle.addEventListener('click', (e) => {
      e.preventDefault(); // جلوگیری از رفرش فوری صفحه
      const key = toggle.getAttribute('data-toggle');
      const submenu = document.querySelector(`[data-submenu="${key}"]`);

      // اگر این آیتم زیرمنو ندارد، کلاً رد شو
      if (!submenu) {
        window.location.href = toggle.href;
        return;
      }

      // اگر دوبار پشت سر هم روی یک آیتم کلیک شد، برو به لینک آن
      if (lastClickedToggle === toggle && !submenu.classList.contains('hidden')) {
        window.location.href = toggle.href;
        return;
      }

      // اگر آیتم دیگری را کلیک کرد، زیرمنوهای دیگر را ببند
      document.querySelectorAll('[data-submenu]').forEach(item => {
        if (item !== submenu) item.classList.add('hidden');
      });

      // نمایش یا مخفی‌سازی زیرمنوی فعلی
      submenu.classList.toggle('hidden');

      // ثبت آخرین آیتم کلیک‌شده
      lastClickedToggle = toggle;
    });
  });

  // کلیک بیرون منو برای بستن زیرمنوها (اختیاری)
  document.addEventListener('click', (e) => {
    if (!e.target.closest('.mobile_menu')) {
      document.querySelectorAll('[data-submenu]').forEach(el => el.classList.add('hidden'));
      lastClickedToggle = null;
    }
  });
});





// پنهان شدن مودال با زدن روی قسمت بلور صفحه یا هرجایی بجز خوده لیست منو ها
const blur = document.querySelector('.mobile_blur');
  if (blur) {
    blur.addEventListener('click', (e) => {
      // اگر کلیک دقیقاً روی خودِ blur بود (نه روی mobile_menu داخلش)
      if (e.target === blur) {
        blur.classList.add('hidden');
      }
    });
}




// نمایش مودال با زدن روی همبرگر موبایل
function showMenu() {
    const blur = document.querySelector('.mobile_blur');
    if (blur) blur.classList.remove('hidden');
}





