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


