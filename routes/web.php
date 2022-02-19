<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BirthdayPackageController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EducationCategoryController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\EventAudienceController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\EventCostController;
use App\Http\Controllers\Admin\EventModalityController;
use App\Http\Controllers\Admin\EventTypeController;
use App\Http\Controllers\Admin\ExhibitionRoomController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\PublicationSpecialtyController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VirtualTourController;
use App\Http\Controllers\Admin\WorkshopController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Header
    Route::post('headers/media', [HeaderController::class, 'storeMedia'])->name('headers.storeMedia');
    Route::resource('headers', HeaderController::class, ['except' => ['store', 'update', 'destroy']]);

    // Subscription
    Route::resource('subscriptions', SubscriptionController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit', 'show']]);

    // Exhibition Room
    Route::post('exhibition-rooms/media', [ExhibitionRoomController::class, 'storeMedia'])->name('exhibition-rooms.storeMedia');
    Route::resource('exhibition-rooms', ExhibitionRoomController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Tour
    Route::post('tours/media', [TourController::class, 'storeMedia'])->name('tours.storeMedia');
    Route::resource('tours', TourController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Virtual Tour
    Route::post('virtual-tours/media', [VirtualTourController::class, 'storeMedia'])->name('virtual-tours.storeMedia');
    Route::resource('virtual-tours', VirtualTourController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Workshop
    Route::post('workshops/media', [WorkshopController::class, 'storeMedia'])->name('workshops.storeMedia');
    Route::resource('workshops', WorkshopController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Event
    Route::post('events/media', [EventController::class, 'storeMedia'])->name('events.storeMedia');
    Route::resource('events', EventController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Publication
    Route::post('publications/media', [PublicationController::class, 'storeMedia'])->name('publications.storeMedia');
    Route::resource('publications', PublicationController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Article
    Route::post('articles/media', [ArticleController::class, 'storeMedia'])->name('articles.storeMedia');
    Route::resource('articles', ArticleController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Collection
    Route::post('collections/media', [CollectionController::class, 'storeMedia'])->name('collections.storeMedia');
    Route::resource('collections', CollectionController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Store
    Route::post('stores/media', [StoreController::class, 'storeMedia'])->name('stores.storeMedia');
    Route::resource('stores', StoreController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Education Category
    Route::resource('education-categories', EducationCategoryController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Education
    Route::post('educations/media', [EducationController::class, 'storeMedia'])->name('educations.storeMedia');
    Route::resource('educations', EducationController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Event Type
    Route::resource('event-types', EventTypeController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Event Audience
    Route::resource('event-audiences', EventAudienceController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Event Modality
    Route::resource('event-modalities', EventModalityController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Event Cost
    Route::resource('event-costs', EventCostController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Publication Specialty
    Route::resource('publication-specialties', PublicationSpecialtyController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Contact
    Route::resource('contacts', ContactController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // Birthday Package
    Route::post('birthday-packages/media', [BirthdayPackageController::class, 'storeMedia'])->name('birthday-packages.storeMedia');
    Route::resource('birthday-packages', BirthdayPackageController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Information
    Route::post('informations/media', [InformationController::class, 'storeMedia'])->name('informations.storeMedia');
    Route::resource('informations', InformationController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Home Section
    Route::resource('home-sections', HomeSectionController::class, ['except' => ['store', 'update', 'destroy', 'show']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
