<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cleared!";
});

Route::get('/', [App\Http\Controllers\frontend\homeController::class, 'home'])->name('home');

Route::get('/about', [App\Http\Controllers\frontend\aboutUsController::class, 'about'])->name('about');

Route::get('/why-fisherman', [App\Http\Controllers\frontend\roboController::class, 'robo'])->name('why.fisherman');

Route::get('/blog', [App\Http\Controllers\frontend\blogController::class, 'blog'])->name('blog');
Route::get('/blog-detail', [App\Http\Controllers\frontend\blogController::class, 'blog_detail'])->name('blog.detail');
Route::get('/blog-lt_list', [App\Http\Controllers\frontend\blogController::class, 'blog_lt_list'])->name('blog.lt_list');

Route::get('/video', [App\Http\Controllers\frontend\VideoController::class, 'video'])->name('video');
Route::get('/video-lt_list', [App\Http\Controllers\frontend\VideoController::class, 'video_lt_list'])->name('video.lt_list');

Route::get('/faq', [App\Http\Controllers\frontend\faqController::class, 'faq'])->name('faq');
Route::get('/faq-lt_list', [App\Http\Controllers\frontend\faqController::class, 'faq_lt_list'])->name('faq.lt_list');

Route::get('/contact', [App\Http\Controllers\frontend\contactController::class, 'index'])->name('contact');

Route::get('/login', [App\Http\Controllers\frontend\loginController::class, 'login'])->name('login');
Route::post('/login/attempt', [App\Http\Controllers\frontend\loginController::class,'login_attempt'])->name('login.attempt');

Route::get('/register', [App\Http\Controllers\frontend\loginController::class, 'register'])->name('register');
Route::post('/register/store', [App\Http\Controllers\frontend\loginController::class,'store'])->name('register.store');

Route::get('/account-detail', [App\Http\Controllers\frontend\account_detailController::class, 'account_detail'])->name('account.detail');
Route::post('/account-detail-store', [App\Http\Controllers\frontend\account_detailController::class, 'account_detail_store'])->name('account.detail.store');

Route::get('/forgot-password', [App\Http\Controllers\frontend\loginController::class, 'forgot_password'])->name('forgot.password');
Route::post('/forgot-password/attempt', [App\Http\Controllers\frontend\loginController::class,'forgot_password_attempt'])->name('forgot.password.attempt');

Route::get('/demo-call', [App\Http\Controllers\frontend\loginController::class, 'demo_call'])->name('demo.call');
Route::get('/demo-call/slote', [App\Http\Controllers\frontend\loginController::class, 'demo_call_slote'])->name('demo.call.slote');
Route::post('/demo-call/store', [App\Http\Controllers\frontend\loginController::class,'deom_store'])->name('demo.store');

Route::get('/user', [App\Http\Controllers\frontend\loginController::class, 'profile'])->name('user.profile');
Route::post('/profile/store', [App\Http\Controllers\frontend\loginController::class,'profilestore'])->name('profile.store');
Route::post('/password/store', [App\Http\Controllers\frontend\loginController::class,'passwordstore'])->name('password.store');
Route::post('/payment/store', [App\Http\Controllers\frontend\loginController::class,'paymentstore'])->name('payment.store');
Route::post('/logout', [App\Http\Controllers\frontend\loginController::class,'logout'])->name('logout');

// Route::post('/contact', [App\Http\Controllers\frontend\contactController::class, 'store'])->name('contact.attempt');
// Route::post('/contact', [App\Http\Controllers\frontend\contactController::class, 'store'])->name('contact.attempt');

Route::group(['prefix' => 'superAdmin'], function(){
    Route::get('/', [App\Http\Controllers\loginController::class, 'login'])->name('superAdmin.login');
    Route::post('/login/attempt', [App\Http\Controllers\loginController::class,'login_attempt'])->name('admin.login.attempt');

    Route::group(['middleware' => ['auth.admin']], function(){

        Route::get('/dashboard', [App\Http\Controllers\loginController::class, 'dashboard'])->name('superAdmin.dashboard');
        Route::post('/logout', [App\Http\Controllers\loginController::class,'logout'])->name('superAdmin.logout');
        
        Route::group(['prefix' => 'user'], function(){
            Route::get('/client', [App\Http\Controllers\userController::class, 'index'])->name('superAdmin.user.client');
            Route::get('/client-edit', [App\Http\Controllers\userController::class, 'client_edit'])->name('superAdmin.user.client.edit');
            Route::post('/client-update', [App\Http\Controllers\userController::class, 'client_update'])->name('superAdmin.user.client.update');
            
        });
        Route::group(['prefix' => 'time'], function(){
            Route::get('/available', [App\Http\Controllers\availabilityController::class, 'index'])->name('superAdmin.time.available');
            Route::post('/available-update', [App\Http\Controllers\availabilityController::class, 'available_update'])->name('superAdmin.time.available.update');
            
        });
        Route::group(['prefix' => 'call'], function(){
            Route::get('/demo', [App\Http\Controllers\democallController::class, 'index'])->name('superAdmin.call.demo');
            // Route::post('/available-update', [App\Http\Controllers\availabilityController::class, 'available_update'])->name('superAdmin.time.available.update');
            
        });

        Route::group(['prefix' => 'home'], function(){
            Route::get('/banner', [App\Http\Controllers\homeController::class, 'home_banner'])->name('superAdmin.home.banner');
            Route::post('/banner/update', [App\Http\Controllers\homeController::class, 'home_banner_update'])->name('superAdmin.home.banner.update');
            Route::post('/seo/update', [App\Http\Controllers\homeController::class, 'home_seo_update'])->name('superAdmin.home.seo.update');
            
            Route::get('/about', [App\Http\Controllers\homeController::class, 'home_about'])->name('superAdmin.home.about');
            Route::post('/about/update', [App\Http\Controllers\homeController::class, 'home_about_update'])->name('superAdmin.home.about.update');
            
            Route::get('/robo', [App\Http\Controllers\homeController::class, 'home_robo'])->name('superAdmin.home.robo');
            Route::post('/robo/update', [App\Http\Controllers\homeController::class, 'home_robo_update'])->name('superAdmin.home.robo.update');
            
            Route::get('/service', [App\Http\Controllers\homeController::class, 'home_service'])->name('superAdmin.home.service');
            Route::post('/service/update', [App\Http\Controllers\homeController::class, 'home_service_update'])->name('superAdmin.home.service.update');
            Route::post('/service_list/update', [App\Http\Controllers\homeController::class, 'home_service_list_update'])->name('superAdmin.home.service_list.update');
            
            Route::get('/secure_trading', [App\Http\Controllers\homeController::class, 'home_secure_trading'])->name('superAdmin.home.secure_trading');
            Route::post('/secure_trading/update', [App\Http\Controllers\homeController::class, 'home_secure_trading_update'])->name('superAdmin.home.secure_trading.update');
        });

        Route::group(['prefix' => 'aboutUs'], function(){
            Route::get('/banner', [App\Http\Controllers\aboutUsController::class, 'about_us_banner'])->name('superAdmin.about_us.banner');
            Route::post('/banner/update', [App\Http\Controllers\aboutUsController::class, 'about_us_banner_update'])->name('superAdmin.about_us.banner.update');
            Route::post('/seo/update', [App\Http\Controllers\aboutUsController::class, 'about_us_seo_update'])->name('superAdmin.about_us.seo.update');
            
            Route::get('/vision', [App\Http\Controllers\aboutUsController::class, 'about_us_vision'])->name('superAdmin.about_us.vision');
            Route::post('/vision/update', [App\Http\Controllers\aboutUsController::class, 'about_us_vision_update'])->name('superAdmin.about_us.vision.update');
            
            Route::get('/mission', [App\Http\Controllers\aboutUsController::class, 'about_us_mission'])->name('superAdmin.about_us.mission');
            Route::post('/mission/update', [App\Http\Controllers\aboutUsController::class, 'about_us_mission_update'])->name('superAdmin.about_us.mission.update');
            
            Route::get('/count', [App\Http\Controllers\aboutUsController::class, 'about_us_count'])->name('superAdmin.about_us.count');
            Route::post('/count/update', [App\Http\Controllers\aboutUsController::class, 'about_us_count_update'])->name('superAdmin.about_us.count.update');
            
            Route::get('/values', [App\Http\Controllers\aboutUsController::class, 'about_us_values'])->name('superAdmin.about_us.values');
            Route::post('/values/update', [App\Http\Controllers\aboutUsController::class, 'about_us_values_update'])->name('superAdmin.about_us.values.update');

            Route::get('/finance', [App\Http\Controllers\aboutUsController::class, 'about_us_finance'])->name('superAdmin.about_us.finance');
            Route::post('/finance/update', [App\Http\Controllers\aboutUsController::class, 'about_us_finance_update'])->name('superAdmin.about_us.finance.update');
        });

        Route::group(['prefix' => 'why-fisherman'], function(){
            Route::get('/banner', [App\Http\Controllers\roboController::class, 'fisherman_banner'])->name('superAdmin.whyFisherman.banner');
            Route::post('/banner/update', [App\Http\Controllers\roboController::class, 'fisherman_banner_update'])->name('superAdmin.whyFisherman.banner.update');
            Route::post('/seo/update', [App\Http\Controllers\roboController::class, 'fisherman_seo_update'])->name('superAdmin.whyFisherman.seo.update');
            // fisherman_chooseUs
            Route::get('/choose-Us', [App\Http\Controllers\roboController::class, 'fisherman_chooseUs'])->name('superAdmin.whyFisherman.chooseUs');
            Route::post('/choose-Us/update', [App\Http\Controllers\roboController::class, 'fisherman_chooseUs_update'])->name('superAdmin.whyFisherman.chooseUs.update');
            Route::post('/choose-Us_list/update', [App\Http\Controllers\roboController::class, 'fisherman_chooseUs_list_update'])->name('superAdmin.whyFisherman.chooseUs_list.update');
            
            Route::get('/service', [App\Http\Controllers\roboController::class, 'fisherman_service'])->name('superAdmin.whyFisherman.service');
            Route::post('/service/update', [App\Http\Controllers\roboController::class, 'fisherman_service_update'])->name('superAdmin.whyFisherman.service.update');

            Route::get('/key_features', [App\Http\Controllers\roboController::class, 'fisherman_key_features'])->name('superAdmin.whyFisherman.key_features');
            Route::post('/key_features/update', [App\Http\Controllers\roboController::class, 'fisherman_key_features_update'])->name('superAdmin.whyFisherman.key_features.update');

            Route::get('/static', [App\Http\Controllers\roboController::class, 'fisherman_static'])->name('superAdmin.whyFisherman.static');
            Route::post('/static/update', [App\Http\Controllers\roboController::class, 'fisherman_static_update'])->name('superAdmin.whyFisherman.static.update');
        });

        Route::group(['prefix' => 'blog'], function(){
            Route::get('/banner', [App\Http\Controllers\blogController::class, 'blog_banner'])->name('superAdmin.blog.banner');
            Route::post('/banner/update', [App\Http\Controllers\blogController::class, 'blog_banner_update'])->name('superAdmin.blog.banner.update');
            Route::post('/seo/update', [App\Http\Controllers\blogController::class, 'blog_seo_update'])->name('superAdmin.blog.seo.update');
            
            Route::get('/category', [App\Http\Controllers\blogController::class, 'blog_category'])->name('superAdmin.blog.category');
            Route::post('/category/update', [App\Http\Controllers\blogController::class, 'blog_category_update'])->name('superAdmin.blog.category.update');
            
            Route::get('/blog-list', [App\Http\Controllers\blogController::class, 'blog_index'])->name('superAdmin.blog.blog');
            Route::get('/blog-crate', [App\Http\Controllers\blogController::class, 'blog_add'])->name('superAdmin.blog.blog.add');
            Route::post('/blog-store', [App\Http\Controllers\blogController::class, 'blog_store'])->name('superAdmin.blog.blog.store');
            Route::get('/blog-edit', [App\Http\Controllers\blogController::class, 'blog_edit'])->name('superAdmin.blog.blog.edit');
            Route::post('/blog-update', [App\Http\Controllers\blogController::class, 'blog_update'])->name('superAdmin.blog.blog.update');
        
        });
        Route::group(['prefix' => 'video'], function(){
            Route::get('/banner', [App\Http\Controllers\VideoController::class, 'video_banner'])->name('superAdmin.video.banner');
            Route::post('/banner/update', [App\Http\Controllers\VideoController::class, 'video_banner_update'])->name('superAdmin.video.banner.update');
            Route::post('/seo/update', [App\Http\Controllers\VideoController::class, 'video_seo_update'])->name('superAdmin.video.seo.update');
            
            Route::get('/video-list', [App\Http\Controllers\VideoController::class, 'video_list'])->name('superAdmin.video.list');
            Route::post('/list/update', [App\Http\Controllers\VideoController::class, 'video_list_update'])->name('superAdmin.video.list.update');
            
        });
        Route::group(['prefix' => 'faq'], function(){
            Route::get('/banner', [App\Http\Controllers\faqController::class, 'faq_banner'])->name('superAdmin.faq.banner');
            Route::post('/banner/update', [App\Http\Controllers\faqController::class, 'faq_banner_update'])->name('superAdmin.faq.banner.update');
            Route::post('/seo/update', [App\Http\Controllers\faqController::class, 'faq_seo_update'])->name('superAdmin.faq.seo.update');

            Route::get('/', [App\Http\Controllers\faqController::class, 'faq_list'])->name('superAdmin.faq.list');
            Route::post('/update', [App\Http\Controllers\faqController::class, 'faq_list_update'])->name('superAdmin.faq.update');
        });
    });
});