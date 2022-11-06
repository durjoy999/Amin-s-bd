<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\AuthorizedController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\ConfigSettingsController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CarerrController;
use App\Http\Controllers\Admin\ConcernController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\LogicController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\RequestAquoteController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ShippingCostController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Models\Logic;
use App\Models\Partner;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes(['verify' => true]);
/**
 * Frontend route start
 */
Route::middleware('xssSanitizer')->as('frontend.')->group(function () {
    /**
     * Guest route with web guard start
     */
    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('homee');
    Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');
    Route::get('company/award', [App\Http\Controllers\Frontend\CompanyController::class, 'award'])->name('award');
    Route::get('carrer', [App\Http\Controllers\Frontend\CompanyController::class, 'carrer'])->name('carrer');
    Route::get('/career/{slug}', [App\Http\Controllers\Frontend\CompanyController::class, 'singleCarrer'])->name('single.carrer');
    Route::get('blogs', [App\Http\Controllers\Frontend\BlogsController::class, 'index'])->name('blogs');
    Route::get('single/blogs/{id}', [App\Http\Controllers\Frontend\BlogsController::class, 'singleNews'])->name('single.news');
    Route::get('contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');
    Route::post('/contact/store', [App\Http\Controllers\Frontend\ContactController::class, 'store'])->name('contact.store');
    Route::get('/service/{slug}', [App\Http\Controllers\Frontend\ServicesController::class, 'service'])->name('service');
    Route::get('/find/location', [App\Http\Controllers\Frontend\FindLocationController::class, 'index'])->name('find.location');
    Route::get('/request/quote', [App\Http\Controllers\Frontend\RequestQuoteController::class, 'index'])->name('equest.quote');
    Route::get('/track/order', [App\Http\Controllers\Frontend\TrackTraceController::class, 'index'])->name('track.shipment');
    Route::post('/track/trace', [App\Http\Controllers\Frontend\TrackTraceController::class, 'track_trace'])->name('track_trace');
    Route::get('/shipping-cost', [App\Http\Controllers\Frontend\ShippingCostController::class, 'index'])->name('calculator.index');
    // air shipping
    Route::post('/air/shipping', [App\Http\Controllers\Frontend\ShippingCostController::class, 'airShipping'])->name('air.shipping');
    // sea shipping
    // Route::post('/sea/shipping', [App\Http\Controllers\Frontend\ShippingCostController::class, 'seaShipping'])->name('sea.shipping');

    Route::post('/sea/store', [App\Http\Controllers\Frontend\ShippingCostController::class, 'seastore'])->name('sea.store');

    Route::post('/request/quote/store', [App\Http\Controllers\Frontend\RequestQuoteController::class, 'quote_store'])->name('request.quote.store');



    /**
     * Guest route with web guard end
     */

    /**
     * Authenticate with web guard start
     */
    Route::middleware(['auth:web', 'verified', 'checkStatus'])->prefix('user')->group(function () {
        //frontend home route
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/home', 'index')->name('home');
        });
    });
    /**
     * Authenticate with web guard end
     */
});
/**
 * Fronend route end
 */
/**
 * admin  route start
 */
Route::prefix('admin')->as('admin.')->group(function () {
    /**
     * guest route with admin guard start
     */
    Route::middleware('guest:admin')->group(function () {
        //login controller
        Route::controller(LoginController::class)->group(function () {
            Route::get('/login', 'showLoginForm')->name('login');
            Route::post('/login/post', 'login')->name('login.post');
        });
        //forgetpassword controller
        Route::controller(ForgotPasswordController::class)->group(function () {
            Route::get('/reset-password', 'showLinkRequestForm')->name('resetPassword');
            Route::post('/reset-password/post', 'sendResetLinkEmail')->name('resetpassword.post');
        });
        //reset password controller
        Route::controller(ResetPasswordController::class)->group(function () {
            Route::get('/update-password/{token}', 'index')->name('updatePassword');
            Route::post('/update-password', 'update')->name('updatePassword.post');
        });
    });
    /**
     * guest route with admin guard end
     */
    /**
     * Authenticated with admin guard route start
     */
    Route::middleware(['auth:admin', 'checkStatus'])->group(function () {
        //logout
        Route::controller(LoginController::class)->group(function () {
            Route::post('/logout', 'logout')->name('logout');
        });
        //home route
        Route::controller(HomeController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('home');
        });
        //roles route
        Route::controller(RolesController::class)->prefix('roles')->as('roles.')->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });
        //admin route
        Route::controller(AdminController::class)->as('admin.')->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
        });
        //profile route
        Route::controller(ProfileController::class)->prefix('profile')->as('profile.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/update', 'update')->name('update');
            Route::post('/update-password', 'updatePassword')->name('password.update');
        });
        //settings route
        Route::prefix('settings')->as('settings.')->group(function () {
            Route::controller(GeneralSettingsController::class)->group(function () {
                Route::get('/general', 'generalSettings')->name('general');
                Route::post('/general/post/{id}', 'generalSettingsUpdate')->name('general.post');
            });
            Route::controller(ConfigSettingsController::class)->group(function () {
                Route::get('/config', 'configSettings')->name('config');
                Route::get('/config-optimize-clear', 'optimizeClear')->name('config.optimize.clear');
                Route::get('/config-optimize', 'optimize')->name('config.optimize');
            });
        });
        //blog route
        Route::controller(BlogController::class)->prefix('blogs')->as('blogs.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
            Route::get('/show/{id}','show')->name('show');
        });
        Route::controller(SliderController::class)->prefix('sliders')->as('sliders.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
        });
         //-------------Service controller start-------
        Route::controller(ServiceController::class)->prefix('services')->as('services.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
            Route::get('/show/{id}', 'show')->name('show');
        });
           //-------------Service controller end --------
          //-------------authorized controller start-------
        Route::controller(AuthorizedController::class)->prefix('authorizeds')->as('authorizeds.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
        });
            //-------------authorized controller end --------

           //-------------concern controller start-------
        Route::controller(ConcernController::class)->prefix('concerns')->as('concerns.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
        });
            //-------------concern controller end --------

            //-------------partner controller start-------
        Route::controller(PartnerController::class)->prefix('partners')->as('partners.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
        });
            //-------------partner controller end --------

            //-------------Award controller start-------
        Route::controller(AwardController::class)->prefix('awards')->as('awards.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
        });
            //-------------Award controller end --------

            //-------------Carrer controller start-------
        Route::controller(CarerrController::class)->prefix('carrers')->as('carrers.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
            Route::get('/show/{id}', 'show')->name('show');
        });
            //-------------Carrer controller end --------

            //-------------testimonial controller start-------
        Route::controller(TestimonialController::class)->prefix('testimonials')->as('testimonials.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
            Route::get('/show/{id}', 'show')->name('show');
        });
           //-------------testimonial controller end --------
        Route::controller(LogicController::class)->prefix('logics')->as('logics.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
        });
            //-------------Country controller start-------
        Route::controller(CountryController::class)->prefix('countrys')->as('countrys.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
        });
            //-------------Country controller end --------

            //-------------Product controller start-------
        Route::controller(ProductTypeController::class)->prefix('ProductTypes')->as('ProductTypes.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
        });
            //-------------Product controller end --------

            //-------------shipping controller start-------
        Route::controller(ShippingCostController::class)->prefix('ShippingCosts')->as('ShippingCosts.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
        });
            //-------------shipping controller end --------
        Route::controller(ContactController::class)->prefix('contacts')->as('contacts.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
        });
        //-------------Request Quotes controller start-------
        Route::controller(RequestAquoteController::class)->prefix('requestsQuotes')->as('requestsQuotes.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/delete/{id}', 'delete')->name('delete');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/reply/{id}', 'reply')->name('reply');
            Route::post('/store', 'store')->name('store');
            Route::post('/reply/store', 'replyStore')->name('replyStore');
        });
        //-------------Request Quotes controller end-------
    });
    /**
     * Authenticated with admin guard route end
     */
});
/**
 * admin  route end
 */
Route::fallback(function () {
    return redirect('admin/login');
});
