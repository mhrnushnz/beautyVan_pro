import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import MyUploadAdapter from './ckeditor-upload-adapter';

// تابع استفاده از آپلود آداپتور
function MyCustomUploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return new MyUploadAdapter(loader);
    };
}

document.addEventListener('DOMContentLoaded', () => {

    const editorElement = document.querySelector('#ckeditor');

    if (!editorElement) {
        return;
    }

    ClassicEditor
        .create(editorElement, {
            language: {
                ui: 'fa',
                content: 'fa'
            },
            heading: {
                options: [
                    {
                        model: 'paragraph',
                        title: 'متن معمولی',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'H1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'H2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'H3',
                        class: 'ck-heading_heading3'
                    }
                ]
            },
            extraPlugins: [
                MyCustomUploadAdapterPlugin
            ]
        })
        .then(editor => {

            console.log('Heading options:', editor.config.get('heading.options'));

            // تصاویر موجود در محتوای فعلی
            let previousImages = getImageUrls(editor.getData());

            editor.model.document.on('change:data', () => {

                const content = editor.getData();

                // تصاویر فعلی
                const currentImages = getImageUrls(content);

                // تصاویری که حذف شده‌اند
                const deletedImages = previousImages.filter(
                    url => !currentImages.includes(url)
                );

                // حذف فایل‌های حذف‌شده از Storage
                deletedImages.forEach(url => {
                    deleteImage(url);
                });

                // لیست تصاویر را به‌روزرسانی می‌کنیم
                previousImages = currentImages;

                // ارسال محتوا به Livewire
                window.Livewire.dispatch('set-description', {
                    content: content
                });

            });

        })
        .catch(error => {
            console.error('CKEditor error:', error);
        });
});


// استخراج URL تمام تصاویر از HTML
function getImageUrls(content) {

    const parser = new DOMParser();
    const doc = parser.parseFromString(content, 'text/html');

    return Array.from(doc.querySelectorAll('img'))
        .map(img => img.getAttribute('src'))
        .filter(Boolean);
}


// ارسال درخواست حذف تصویر به Laravel
function deleteImage(url) {

    fetch('/ckeditor/upload', {
        method: 'DELETE',

        headers: {
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content'),

            'Content-Type': 'application/json'
        },

        body: JSON.stringify({
            url: url
        })
    })
        .then(response => {

            if (!response.ok) {
                throw new Error('حذف تصویر ناموفق بود.');
            }

            return response.json();
        })
        .then(data => {
            console.log('تصویر از Storage حذف شد:', data);
        })
        .catch(error => {
            console.error('خطا در حذف تصویر:', error);
        });
}
