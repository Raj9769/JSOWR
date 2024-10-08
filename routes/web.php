<?php

use App\Http\Controllers\AdminBooksController;
use App\Http\Controllers\AdminClientController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDonationsController;
use App\Http\Controllers\AdminEventsController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminMusicsController;
use App\Http\Controllers\AdminParticipantsController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/admin/login', function () {
    return view('auth.login');
})->name('admin.login');

//  for admin registration below comment uncomment karvi and above auth.login ne comment karvi
// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();

Route::get('/', [AdminController::class, 'homePage']);

Route::get('site/userlogin', [AdminController::class, 'userLogin'])->name('userlogin');
Route::get('site/signup', [AdminController::class, 'signup'])->name('signup');
Route::post('site/logincheck', [AdminController::class, 'userLogincheck'])->name('logincheck');
Route::get('site/userlogout', [AdminController::class, 'userLogout'])->name('userlogout');
Route::get('site/about', [AdminController::class, 'about'])->name('about');
Route::get('site/event', [AdminController::class, 'event'])->name('event');
Route::get('site/event-detail/{id}', [AdminController::class, 'eventDetail'])->name('eventdetail');
Route::get('site/donation', [AdminController::class, 'donation'])->name('donation');
Route::get('site/contact', [AdminController::class, 'contact'])->name('contact');
Route::post('participant/store', [AdminParticipantsController::class, 'store'])->name('participant.store');
Route::post('donation/store', [AdminDonationsController::class, 'store'])->name('donation.store');
Route::post('contact/store', [AdminContactController::class, 'store'])->name('contact.store');

// Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'usersession']], function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin');

    Route::get('/profile/{id}', [AdminController::class, 'profiledit'])->name('profile.edit');
    Route::post('/profile/update', [AdminController::class, 'profileUpdate'])->name('profile.update');

    Route::get("admin/event", 'AdminEventsController@index')->name('admin.event.index');
    Route::get('admin/event/create', [AdminEventsController::class, 'create'])->name('admin.event.create');
    Route::post('admin/event/store', [AdminEventsController::class, 'store'])->name('admin.event.store');
    Route::get('admin/event/edit/{id}', [AdminEventsController::class, 'edit'])->name('admin.event.edit');
    Route::patch('admin/event/update/{id}', [AdminEventsController::class, 'update'])->name('admin.event.update');
    Route::get('admin/event/destroy/{id}', [AdminEventsController::class, 'destroy'])->name('admin.event.destroy');
    Route::delete('/myeventDeleteAll', [AdminEventsController::class, 'deleteEventAll'])->name('deleteeventsAll');
    Route::get("admin/eventdetail/searchevent", [AdminEventsController::class, 'searchEventList'])->name('admin.searchevent.search');
    Route::get("admin/event/popular/{id}", [AdminEventsController::class, 'popularEventList'])->name('admin.event.popular');

    Route::get("admin/client", [AdminClientController::class, 'index'])->name('admin.client.index');
    Route::get('admin/client/create', [AdminClientController::class, 'create'])->name('admin.client.create');
    Route::post('admin/client/store', [AdminClientController::class, 'store'])->name('admin.client.store');
    Route::get('admin/client/edit/{id}', [AdminClientController::class, 'edit'])->name('admin.client.edit');
    Route::patch('admin/client/update/{id}', [AdminClientController::class, 'update'])->name('admin.client.update');
    Route::get('admin/client/destroy/{id}', [AdminClientController::class, 'destroy'])->name('admin.client.destroy');
    Route::delete('/myclientDeleteAll', [AdminClientController::class, 'deleteClientAll'])->name('deleteclientAll');
    Route::get("admin/client/active/{id}/{value}", [AdminClientController::class, 'clientActive'])->name('admin.client.active');

    Route::get("admin/galleryimage", [AdminGalleryController::class, 'index'])->name('admin.galleryimage.index');
    Route::get('admin/galleryimage/create', [AdminGalleryController::class, 'create'])->name('admin.galleryimage.create');
    Route::post('admin/galleryimage/store', [AdminGalleryController::class, 'store'])->name('admin.galleryimage.store');
    Route::get('admin/galleryimage/edit/{id}', [AdminGalleryController::class, 'edit'])->name('admin.galleryimage.edit');
    Route::patch('admin/galleryimage/update/{id}', [AdminGalleryController::class, 'update'])->name('admin.galleryimage.update');
    Route::get('admin/galleryimage/destroy/{id}', [AdminGalleryController::class, 'destroy'])->name('admin.galleryimage.destroy');
    Route::delete('/mygalleryimageDeleteAll', [AdminGalleryController::class, 'deleteGalleryAll'])->name('deletegalleryAll');
    Route::get("admin/gallery/active/{id}", [AdminGalleryController::class, 'galleryActive'])->name('admin.gallery.active');

    Route::get("admin/music", [AdminMusicsController::class, 'index'])->name('admin.music.index');
    Route::get('admin/music/create', [AdminMusicsController::class, 'create'])->name('admin.music.create');
    Route::post('admin/music/store', [AdminMusicsController::class, 'store'])->name('admin.music.store');
    Route::get('admin/music/edit/{id}', [AdminMusicsController::class, 'edit'])->name('admin.music.edit');
    Route::patch('admin/music/update/{id}', [AdminMusicsController::class, 'update'])->name('admin.music.update');
    Route::get('admin/music/destroy/{id}', [AdminMusicsController::class, 'destroy'])->name('admin.music.destroy');
    Route::delete('/mymusicsDeleteAll', [AdminMusicsController::class, 'deleteMusicsAll'])->name('deletemusicsAll');
    Route::get("admin/music/active/{id}", [AdminMusicsController::class, 'musicActive'])->name('admin.music.active');

    Route::get("admin/book", [AdminBooksController::class, 'index'])->name('admin.book.index');
    Route::get('admin/book/create', [AdminBooksController::class, 'create'])->name('admin.book.create');
    Route::post('admin/book/store', [AdminBooksController::class, 'store'])->name('admin.book.store');
    Route::get('admin/book/edit/{id}', [AdminBooksController::class, 'edit'])->name('admin.book.edit');
    Route::patch('admin/book/update/{id}', [AdminBooksController::class, 'update'])->name('admin.book.update');
    Route::get('admin/book/destroy/{id}', [AdminBooksController::class, 'destroy'])->name('admin.book.destroy');
    Route::delete('/mybooksDeleteAll', [AdminBooksController::class, 'deleteBooksAll'])->name('deletebooksAll');
    Route::get("admin/book/active/{id}", [AdminBooksController::class, 'bookActive'])->name('admin.book.active');

    Route::get('admin/contact', [AdminContactController::class, 'index'])->name('admin.contact');
    Route::get('admin/contact/create', [AdminContactController::class, 'create'])->name('admin.contact.create');
    Route::get('admin/contact/edit/{id}', [AdminContactController::class, 'edit'])->name('admin.contact.edit');
    Route::patch('admin/contact/update/{id}', [AdminContactController::class, 'update'])->name('admin.contact.update');
    Route::get('admin/contact/destroy/{id}', [AdminContactController::class, 'destroy'])->name('admin.contact.destroy');
    Route::delete('/mycontactDeleteAll', [AdminContactController::class, 'mycontactDeleteAll'])->name('mycontactDeleteAll');

    Route::get('admin/participant', [AdminParticipantsController::class, 'index'])->name('admin.contact');
    Route::get('admin/participant/create', [AdminParticipantsController::class, 'create'])->name('admin.participant.create');

    Route::get('admin/participant/edit/{id}', [AdminParticipantsController::class, 'edit'])->name('admin.participant.edit');
    Route::patch('admin/participant/update/{id}', [AdminParticipantsController::class, 'update'])->name('admin.participant.update');
    Route::get('admin/participant/destroy/{id}', [AdminParticipantsController::class, 'destroy'])->name('admin.participant.destroy');
    Route::delete('/myparticipantDeleteAll', [AdminParticipantsController::class, 'myparticipantDeleteAll'])->name('myparticipantDeleteAll');

    Route::get('admin/donation', [AdminDonationsController::class, 'index'])->name('admin.contact');
    Route::get('admin/donation/create', [AdminDonationsController::class, 'create'])->name('admin.donation.create');
    Route::get('admin/donation/edit/{id}', [AdminDonationsController::class, 'edit'])->name('admin.donation.edit');
    Route::patch('admin/donation/update/{id}', [AdminDonationsController::class, 'update'])->name('admin.donation.update');
    Route::get('admin/donation/destroy/{id}', [AdminDonationsController::class, 'destroy'])->name('admin.donation.destroy');
    Route::delete('/mydonationDeleteAll', [AdminDonationsController::class, 'mydonationDeleteAll'])->name('mydonationDeleteAll');
});

//Clear Cache facade value:
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
    Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function () {
    Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
    Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
    Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
