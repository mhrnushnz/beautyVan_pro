{{--اسکریپتاش تو resource/js/app قرار داره--}}
<div id="toast" class="fixed top-5 left-5 z-[99999] hidden">
    <div id="toastBox" class="min-w-[320px] rounded-xl px-5 py-4 shadow-2xl text-white flex items-center gap-3">
        <span id="toastIcon"></span>
        <span id="toastMessage"></span>
    </div>
</div>


{{--معرفی کد های alpine--}}
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('toast', () => ({
            visible: false,
            type: 'success',
            title: '',
            message: '',
            iconBg: '',

            show(data) {
                this.type = data.type ?? 'success';
                this.title = data.title ?? '';
                this.message = data.message ?? '';

                this.iconBg = {
                    success: 'bg-green-500',
                    error: 'bg-red-500',
                    warning: 'bg-yellow-500',
                    info: 'bg-blue-500',
                }[this.type] ?? 'bg-gray-500';

                this.visible = true;

                setTimeout(() => {
                    this.visible = false;
                }, 3000);
            }
        }));
    });
</script>
