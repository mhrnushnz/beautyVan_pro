export default class MyUploadAdapter {
    constructor(loader) {
        this.loader = loader;
        this.xhr = null;
    }

    upload() {
        return this.loader.file
            .then(file => new Promise((resolve, reject) => {

                const formData = new FormData();
                formData.append('upload', file);

                this.xhr = new XMLHttpRequest();

                this.xhr.open('POST', '/ckeditor/upload', true);

                this.xhr.setRequestHeader(
                    'X-CSRF-TOKEN',
                    document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                );

                this.xhr.onload = () => {

                    if (this.xhr.status >= 200 && this.xhr.status < 300) {

                        const response = JSON.parse(this.xhr.responseText);

                        resolve({
                            default: response.url
                        });

                    } else {
                        reject('آپلود تصویر ناموفق بود.');
                    }
                };

                this.xhr.onerror = () => {
                    reject('خطا در ارتباط با سرور.');
                };

                this.xhr.send(formData);

            }));
    }

    abort() {
        if (this.xhr) {
            this.xhr.abort();
        }
    }
}
