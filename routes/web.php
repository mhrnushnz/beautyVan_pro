<?php
use App\Http\Controllers\Admin\CkeditorController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Admin\Appointment\AcceptAppointment;
use App\Livewire\Admin\Appointment\Index as Appointment;
use App\Livewire\Admin\Article\Create as ArticleCreate;
use App\Livewire\Admin\Article\Index as Article;
use App\Livewire\Admin\ArticleCategory\Index as ArticleCategory;
use App\Livewire\Admin\Dashboard\Index as Dashboard;
use App\Livewire\Admin\Notif\Index as Notif;
use App\Livewire\Admin\Profile\Index as Profile;
use App\Livewire\Admin\Service\Create as ServiceCreate;
use App\Livewire\Admin\Service\Index as Service;
use App\Livewire\Admin\ServiceCategory\Index as ServiceCategory;
use App\Livewire\Admin\Slider\Creat as CreateSlider;
use App\Livewire\Admin\Slider\Index as AdminSlider;
use App\Livewire\Admin\Users\Edit as UserEdit;
use App\Livewire\Admin\Users\Index as Users;

//client-------------------------------------------------
use App\Livewire\Client\AboutUs\Index as AboutUs;
use App\Livewire\Client\Appointment\Index as AppointmentClient;
use App\Livewire\Client\Article\Index as ArticleClient;
use App\Livewire\Client\ArticleArchive\Index as ArticleArchiveClient;
use App\Livewire\Client\Auth\Login as Login;
use App\Livewire\Client\ContactUs\Index as ContactUs;
use App\Livewire\Client\Home\Index as HomeIndex;
use App\Livewire\Client\Login\Forgotpassword as ForgotPassword;
use App\Livewire\Client\Login\Index as LoginClient;
use App\Livewire\Client\Reserve\Index as Reserve;
use App\Livewire\Client\Services\Index as ClientService;
use Illuminate\Support\Facades\Route;

//admin-------------------------------------------------


Route::middleware(['auth', 'role:admin|manager'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/users', Users::class)->name('users.index');
    Route::get('/users/edit/{id}', UserEdit::class)->name('users.edit');
    Route::get('/profile', Profile::class)->name('profile');

    Route::get('/appointment', Appointment::class)->name('appointment');
    Route::get('/accept_appointment/{id}', AcceptAppointment::class)->name('accept_appointment');

    Route::get('/slider', AdminSlider::class)->name('adminSlider');
    Route::get('/slider/creat/{id?}', CreateSlider::class)->name('adminSliderCreat');

    Route::get('/service', Service::class)->name('service');
    Route::get('/service/creat', ServiceCreate::class)->name('service.creat');
    Route::get('/service_category', ServiceCategory::class)->name('service_category');

    Route::get('/article_category', ArticleCategory::class)->name('article_category');
    Route::get('/article/lists', Article::class)->name('article_admin');
    Route::get('/article/creat', ArticleCreate::class)->name('article.creat');
    Route::post('article/upload', [ArticleCreate::class, 'uploadImage'])->name('article.upload');
    Route::get('/article/edit/{articleId?}', ArticleCreate::class)->name('article.edit');

    Route::get('/notification', Notif::class)->name('notif');

    Route::post('/ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
    Route::delete('/ckeditor/upload', [CkeditorController::class, 'delete'])->name('ckeditor.delete');
});

//client-------------------------------------------------------------------------------
Route::get('/', HomeIndex::class)->name('home');
Route::middleware('guest')->group(function () {
    Route::get('/register', LoginClient::class)->name('login_client');
    Route::get('/auth/login', Login::class)->name('auth_login');
    Route::get('/auth/login/forgotPassword', ForgotPassword::class)->name('forgotPassword');
});
Route::middleware('auth')->group(function () {//ورود ب این صحه حتما ب لاگین نیاز داره
    Route::get('/reserve', Reserve::class)->name('reserve');
    Route::get('/users/appointments', AppointmentClient::class)->name('clientAppointment');
    Route::get('/logout', LogoutController::class)->name('logOut');
});
Route::get('/blogPage/{slug}', ArticleClient::class)->name('article_client');
Route::get('/blog/{slug}', ArticleArchiveClient::class)->name('article_archive');
Route::get('/blogArchive', ArticleArchiveClient::class)->name('articleArchive');
Route::get('/about_us', AboutUs::class)->name('about_us');
Route::get('/contact_us', ContactUs::class)->name('contact_us');
Route::get('/our_service/{slug}', ClientService::class)->name('our_service');
Route::get('/our_service', ClientService::class)->name('ourService');
