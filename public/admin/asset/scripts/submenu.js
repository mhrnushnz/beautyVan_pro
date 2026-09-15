document.addEventListener("DOMContentLoaded", function () {
    // فقط در دسکتاپ (عرض بالای 768 پیکسل - مطابق استاندارد md)
    if (window.innerWidth < 768) return;

    // انتخاب تمام لینک‌هایی که نقش دکمه منو دارند
    const dropdownToggles = document.querySelectorAll('#usersToggle, .dropdown-toggle');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            // پیدا کردن والد (li) و زیرمنوی مربوطه
            const parentLi = this.closest('li');
            const targetSubmenu = parentLi.querySelector('ul');

            // وضعیت فعلی باز بودن
            const isOpen = parentLi.classList.contains('open');

            // بستن تمام منوهای دیگر
            document.querySelectorAll('li.group').forEach(item => {
                item.classList.remove('open');
                const menu = item.querySelector('ul');
                if (menu) menu.classList.add('hidden');
            });

            // اگر منو قبلاً باز نبود، بازش کن
            if (!isOpen) {
                parentLi.classList.add('open');
                if (targetSubmenu) {
                    targetSubmenu.classList.remove('hidden');
                }
            }
        });
    });

    // بستن منوها با کلیک در خارج از ناحیه منو
    document.addEventListener('click', function () {
        document.querySelectorAll('li.group').forEach(item => {
            item.classList.remove('open');
            const menu = item.querySelector('ul');
            if (menu) menu.classList.add('hidden');
        });
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





