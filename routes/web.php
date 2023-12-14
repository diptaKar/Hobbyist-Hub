<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\CategoryTypeController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;

use App\Http\Controllers\FController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\OrderController;
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

Route::get('/download-pdf', [ReportController::class, 'downloadPdf'])->name('download.pdf');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FController::class, 'FController'])->name('front.home');

Route::get('/about',[FController::class, 'About'])->name('front.about');

Route::get('/contact',[FController::class, 'Contact'])->name('front.contact');

Route::get('/privacy',[FController::class, 'Privacy'])->name('front.privacy');

Route::get('/refund',[FController::class, 'Refund'])->name('front.refund');

Route::get('/shop/{categorySlug?}',[ShopController::class, 'index'])->name('front.shop');


Route::post('/confirm-order/{id}', 'OrderController@confirmOrder')->name('confirm.order');

Route::get('/product/{slug}',[ShopController::class, 'product'])->name('front.product');

Route::get('/cart',[CartController::class, 'cart'])->name('front.cart');

Route::post('/add-to-cart',[CartController::class, 'addToCart'])->name('front.addToCart');

Route::post('/update-cart',[CartController::class, 'updateCart'])->name('front.updateCart');

Route::post('/delete-item',[CartController::class, 'deleteItem'])->name('front.deleteItem.cart');
Route::get('/checkout',[CartController::class, 'checkout'])->name('front.checkout');
Route::post('/submit-order', [OrderController::class, 'submitOrder'])->name('order.submit');


Route::get('/dashboard', [FController::class, 'FController'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    
});

Route::middleware(['auth','role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});


Route::middleware(['auth','role:user'])->group(function(){
    Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.home');
});

Route::middleware(['auth','role:admin'])->group(function(){
    

Route::controller(CategoryTypeController::class)->group(function(){
    Route::get('/all/type', 'AllType')->name('all.type');

    Route::get('/add/type', 'AddType')->name('add.type');

    Route::post('/store/type', 'StoreType')->name('store.type');

    Route::get('/edit/type/{id}', 'EditType')->name('edit.type');

    Route::post('/update/type', 'UpdateType')->name('update.type');

    Route::get('/delete/type/{id}', 'DeleteType')->name('delete.type');
});    

    
});


Route::middleware(['auth','role:admin'])->group(function(){
    

    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/sub/type', 'SubType')->name('sub.type');
        Route::get('/add/sub/type', 'AddType')->name('add.sub.type');
        Route::post('/store/sub/type', 'StoreType')->name('store.sub.type');
        Route::get('/edit/sub/type/{id}', 'EditType')->name('sub.edit.type');
        Route::post('/update/sub/type', 'UpdateType')->name('sub.update.type');
        Route::get('/delete/sub/type/{id}', 'DeleteType')->name('sub.delete.type');
        
    });    
    
        
    });


    Route::middleware(['auth','role:admin'])->group(function(){
    

        Route::controller(BrandController::class)->group(function(){
            Route::get('/brand/type', 'BrandType')->name('brand.type');
            Route::get('/add/brand/type', 'AddType')->name('add.brand.type');
            Route::post('/store/brand/type', 'StoreType')->name('store.brand.type');
            Route::get('/edit/brand/type/{id}', 'EditType')->name('brand.edit.type');
            Route::post('/update/brand/type', 'UpdateType')->name('brand.update.type');
            Route::get('/delete/brand/type/{id}', 'DeleteType')->name('brand.delete.type');
        });    
        
            
        });

        
        
        Route::middleware(['auth','role:admin'])->group(function(){
    

            Route::controller(ProductController::class)->group(function(){
                Route::get('/products/type', 'ProductType')->name('products.type');
            
                Route::get('/add/product/type', 'AddType')->name('add.product.type');

                Route::post('/store/product/type', 'StoreType')->name('store.product.type');

                Route::get('/edit/product/type/{id}', 'EditType')->name('product.edit.type');

                Route::post('/update/product/type', 'UpdateType')->name('product.update.type');

                Route::get('/delete/product/type/{id}', 'DeleteType')->name('product.delete.type');
            });    
            
                
            });



Route::middleware(['auth','role:admin'])->group(function(){


Route::controller(OrderController::class)->group(function(){
    Route::get('/show-orders', 'OrderType')->name('orders.type');

    Route::get('/delete/order/{id}', 'DeleteType')->name('order.delete.type');

    
});    

    
});




