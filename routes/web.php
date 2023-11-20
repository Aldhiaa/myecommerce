<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CashpayController;
use App\Http\Controllers\CashONDeliveryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\AUserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\VendorOrderController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\AdminNotificationController;
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

Route::get('setlocale/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
})->name('setLocale');

Route::get('/',[FrontendController::class, 'Index'])->name('/');


Route::controller(FrontendController::class)->group(function(){

    Route::get('product/details/{id}/{slug}','productdetails');
    Route::get('front/vendor/details/{id}','FrontVendordetails')->name('front.vendor.details');
    Route::get('front/vendor/all','VendorAll')->name('front.vendor.all');
    Route::get('/product/category/{id}/{slug}','CatWiseProduct');
    Route::get('/product/subcategory/{id}/{slug}','SubCatWiseProduct');
    
    Route::get('/product/view/modal/{id}', 'ProductViewAjax');


    Route::post('/search' , 'ProductSearch')->name('product.search');
    Route::post('/search-product' , 'SearchProduct'); 
});
Route::controller(CartController::class)->group(function(){

    Route::post('/cart/data/store/{id}', 'AddToCart')->name('cart.data.store');
    Route::post('/cart/product/store/{id}', 'AddproductToCart')->name('cart.product.store');
    Route::get('/product/mini/cart','AddMiniCart');
    Route::get('/minicart/product/remove/{rowId}','RemoveMiniCart');


    Route::get('/mycart','MyCart')->name('mycart');
    Route::get('/get-cart-product' , 'GetCartProduct');
    Route::get('/cart-remove/{rowId}' , 'CartRemove');
    Route::get('/cart-decrement/{rowId}' , 'CartDecrement');
    Route::get('/cart-increment/{rowId}' , 'CartIncrement');
    Route::post('/coupon-apply', 'CouponApply');
    Route::get('/coupon-calculation', 'CouponCalculation');
    Route::get('/coupon-remove', 'CouponRemove');
    Route::get('/checkout', 'CheckoutCreate')->name('checkout');


});
Route::controller(CheckoutController::class)->group(function(){
    Route::get('/district-get/ajax/{division_id}' , 'DistrictGetAjax');
    Route::get('/state-get/ajax/{district_id}' , 'StateGetAjax');
    Route::post('/checkout/store', 'CheckoutStore')->name('checkout.store');


});

Route::controller(StripeController::class)->group(function(){
    Route::post('/stripe/order' , 'StripeOrder')->name('stripe.order');

});
Route::controller(CashpayController::class)->group(function(){
    Route::post('/cash/order' , 'cashOrder')->name('cash.order');

});
Route::controller(CashONDeliveryController::class)->group(function(){
    Route::post('/cash/on/delivery/order' , 'cashONDELOrder')->name('cash.on.delivery.order');

});


Route::middleware(['auth'])->group(function(){
    Route::get('dashboard',[UserController::class, 'UserDashboard'])->name('dashboard');
    Route::post('user/profile/update',[UserController::class, 'profileUpdate'])->name('User.profile.store');
    Route::get('user/logout',[UserController::class, 'Userlogout'])->name('user.logout');
    Route::get('/user/order_details/{order_id}',[UserController::class, 'UserOrderDetails']);
    Route::get('/user/invoice_download/{order_id}',[UserController::class, 'UserOrderInvoice']);
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('admin/dashboard',[AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout',[AdminController::class, 'Adminlogout'])->name('admin.logout');
    Route::get('admin/profile',[AdminController::class, 'Adminprofile'])->name('admin.profile');
    Route::post('admin/profile/update',[AdminController::class, 'profileupdate'])->name('admin.profile.update');
    Route::post('admin/profile/update/photo',[AdminController::class, 'updatephoto'])->name('update.photo');
    Route::get('admin/change_password',[AdminController::class, 'Adminchange_password'])->name('admin.change_password');
    Route::post('admin/update_password',[AdminController::class, 'Adminupdate_password'])->name('admin.change_password_post');
    // about vendor 

    Route::get('inactive/vendor',[AdminController::class, 'inActiveVendor'])->name('inactive.vendor');
    Route::get('active/vendor',[AdminController::class, 'ActiveVendor'])->name('active.vendor');
    Route::get('vendor/details/{id}',[AdminController::class, 'VendorDetails'])->name('vendor.details');

    Route::post('vendor/active/approve',[AdminController::class, 'VendorActiveapprove'])->name('active.vendor.approve');
    Route::get('active/vendor/details/{id}',[AdminController::class, 'activeVendorDetails'])->name('active.vendor.details');

    Route::post('vendor/inactive/approve',[AdminController::class, 'Vendorinactiveapprove'])->name('inactive.vendor.approve');

});

Route::get('admin/login',[AdminController::class, 'Adminlogin'])->name('admin.login');
Route::get('become/vendor',[VendorController::class, 'BecomeVendor'])->name('become.vendor');
Route::post('vendor/register',[VendorController::class, 'VendorRegister'])->name('vendor.register');

// vendor 
Route::middleware(['auth','role:vendor'])->group(function(){

    Route::get('vendor/dashboard',[VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');
    Route::get('vendor/logout',[VendorController::class, 'vendorlogout'])->name('vendor.logout');
    Route::get('vendor/profile',[VendorController::class, 'vendorprofile'])->name('vendor.profile');
    Route::post('vendor/profile/update',[VendorController::class, 'profileupdate'])->name('vendor.profile.update');
    Route::post('vendor/profile/update/photo',[VendorController::class, 'updatephoto'])->name('vendor.update.photo');
    Route::get('vendor/change_password',[VendorController::class, 'vendorchange_password'])->name('vendor.change_password');
    Route::post('vendor/change_password',[VendorController::class, 'vendorchange_password'])->name('vendor.change_password_post');

//vendor product
    Route::controller(VendorProductController::class)->group(function(){
        Route::get('vendor/all/product','vendorallProduct')->name('vendor.all.product');
        Route::get('vendor/add/product','vendoraddProduct')->name('vendor.add.product'); 
        Route::post('vendor/add/product/store','vendorstoreproduct')->name('vendor.add.product.store');
        Route::get('vendor/delete/product/{id}','deleteproduct')->name('vendor.delete.product');


        Route::get('/vendor/subcategory/ajax/{categoryId}','vendorgetSubcategories');

        Route::get('vendor/edit/product/{id}','editproduct')->name('vendor.edit.product');
        Route::post('vendor/product/store','updateproduct')->name('vendor.eidt.product.store');
        Route::post('vendor/update/product/multiimage' , 'UpdateProductMultiimage')->name('vendor.update.product.multiimage');
        Route::get('vendor/product/multiimg/delete/{id}' , 'VendorMulitImageDelelte')->name('vendor.product.multiimg.delete');
        Route::get('vendor/product/inactive/{id}' , 'ProductInactive')->name('vendor.product.inactive');
        Route::get('vendor/product/active/{id}' , 'ProductActive')->name('vendor.product.active');

    });

    Route::controller(VendorOrderController::class)->group(function(){
        Route::get('/vendor/order' , 'VendorOrder')->name('vendor.order');
    
    
    });
    Route::controller(AdminNotificationController::class)->group(function(){
        Route::put('/mark-all-notifications-as-read','markAllAsRead')->name('markAllNotificationsAsRead');  
    });

});
Route::middleware(['auth','role:admin'])->group(function(){

Route::controller(BrandController::class)->group(function(){
    Route::get('all/brand','allbrand')->name('all.brand');
    Route::get('add/brand','addbrand')->name('add.brand');
    Route::post('add/brand/store','storebrand')->name('add.brand.store');
    Route::get('edit/brand/{id}','editbrand')->name('edit.brand');
    Route::post('brand/store/{id}','updatebrand')->name('eidt.brand.store');
    Route::get('delete/brand/{id}','deletebrand')->name('delete.brand');

});

Route::controller(CategoryController::class)->group(function(){
    Route::get('all/category','allcategory')->name('all.category');
    Route::get('add/category','addcategory')->name('add.category');
    Route::post('add/category/store','storecategory')->name('add.category.store');
    Route::get('edit/category/{id}','editcategory')->name('edit.category');
    Route::post('category/store/{id}','updatecategory')->name('eidt.category.store');
    Route::get('delete/category/{id}','deletecategory')->name('delete.category');

});

Route::controller(SubCategoryController::class)->group(function(){
    Route::get('all/subcategory','allsubcategory')->name('all.subcategory');
    Route::get('add/subcategory','addsubcategory')->name('add.subcategory');
    Route::post('add/subcategory/store','storesubcategory')->name('add.subcategory.store');
    Route::get('edit/subcategory/{id}','editsubcategory')->name('edit.subcategory');
    Route::post('subcategory/store/{id}','updatesubcategory')->name('eidt.subcategory.store');
    Route::get('delete/subcategory/{id}','deletesubcategory')->name('delete.subcategory');
    Route::get('/subcategory/ajax/{categoryId}','getSubcategories');

});

Route::controller(ProductController::class)->group(function(){
    Route::get('all/product','allProduct')->name('all.product');
    Route::get('add/product','addProduct')->name('add.product');
    Route::post('add/product/store','storeproduct')->name('add.product.store');
    Route::get('edit/product/{id}','editproduct')->name('edit.product');
    Route::post('product/store','updateproduct')->name('eidt.product.store');
    Route::get('delete/product/{id}','deleteproduct')->name('delete.product');
    Route::post('/update/product/multiimage' , 'UpdateProductMultiimage')->name('update.product.multiimage');
    Route::get('/product/multiimg/delete/{id}' , 'MulitImageDelelte')->name('product.multiimg.delete');
    Route::get('/product/inactive/{id}' , 'ProductInactive')->name('product.inactive');
    Route::get('/product/active/{id}' , 'ProductActive')->name('product.active');

});

Route::controller(SliderController::class)->group(function(){
    Route::get('all/slider','allslider')->name('all.slider');
    Route::get('add/slider','addslider')->name('add.slider');
    Route::post('add/slider/store','storeslider')->name('add.slider.store');
    Route::get('edit/slider/{id}','editslider')->name('edit.slider');
    Route::post('slider/update/{id}','updateslider')->name('eidt.slider.update');
    Route::get('delete/slider/{id}','deleteslider')->name('delete.slider');
});
Route::controller(AUserController::class)->group(function(){
    Route::get('all/user','alluser')->name('all.user');
    Route::get('veiw/user/details/{id}','AuserDetails')->name('veiw.user.details');

});

Route::controller(BannerController::class)->group(function(){
    Route::get('/all/banner' , 'AllBanner')->name('all.banner');
    Route::get('/add/banner' , 'AddBanner')->name('add.banner');
    Route::post('/store/banner' , 'StoreBanner')->name('store.banner');
    Route::get('/edit/banner/{id}' , 'Editbanner')->name('edit.banner');
    Route::post('/update/banner' , 'Updatebanner')->name('update.banner');
    Route::get('/delete/banner/{id}' , 'Deletebanner')->name('delete.banner');

});

Route::controller(CouponController::class)->group(function(){
    Route::get('/all/coupon' , 'Allcoupon')->name('all.coupon');
    Route::get('/add/coupon' , 'Addcoupon')->name('add.coupon');
    Route::post('/store/coupon' , 'StoreCoupon')->name('add.coupon.store');
    Route::get('/edit/coupon/{id}' , 'Editcoupon')->name('edit.coupon');
    Route::post('/update/coupon' , 'Updatecoupon')->name('update.coupon');
    Route::get('/delete/coupon/{id}' , 'Deletecoupon')->name('delete.coupon');

});

Route::controller(OrderController::class)->group(function(){
    Route::get('/pending/order' , 'PendingOrder')->name('pending.order');
    Route::get('/admin/order/details/{order_id}' , 'AdminOrderDetails')->name('admin.order.details');
    Route::get('/admin/confirmed/order' , 'AdminConfirmedOrder')->name('admin.confirmed.order');
    Route::get('/admin/processing/order' , 'AdminProcessingOrder')->name('admin.processing.order');
    Route::get('/admin/delivered/order' , 'AdminDeliveredOrder')->name('admin.delivered.order');
    Route::get('/admin/invoice/download/{order_id}' , 'AdminInvoiceDownload')->name('admin.invoice.download');

});
 // Shipping Division All Route 
 Route::controller(ShippingAreaController::class)->group(function(){
    Route::get('/all/division' , 'AllDivision')->name('all.division');
    Route::get('/add/division' , 'AddDivision')->name('add.division');
    Route::post('/store/division' , 'StoreDivision')->name('store.division');
    Route::get('/edit/division/{id}' , 'EditDivision')->name('edit.division');
    Route::post('/update/division' , 'UpdateDivision')->name('update.division');
    Route::get('/delete/division/{id}' , 'DeleteDivision')->name('delete.division');

});
Route::controller(ShippingAreaController::class)->group(function(){
    Route::get('/all/district' , 'AllDistrict')->name('all.district');
    Route::get('/add/district' , 'AddDistrict')->name('add.district');
    Route::post('/store/district' , 'StoreDistrict')->name('store.district');
    Route::get('/edit/district/{id}' , 'EditDistrict')->name('edit.district');
    Route::post('/update/district' , 'UpdateDistrict')->name('update.district');
    Route::get('/delete/district/{id}' , 'DeleteDistrict')->name('delete.district');

    Route::get('/district/ajax/{division_id}' , 'GetDistrict');
}); 

Route::controller(ShippingAreaController::class)->group(function(){
    Route::get('/all/state' , 'AllState')->name('all.state');
    Route::get('/add/state' , 'AddState')->name('add.state');
    Route::post('/store/state' , 'StoreState')->name('store.state');
    Route::get('/edit/state/{id}' , 'EditState')->name('edit.state');
    Route::post('/update/state' , 'UpdateState')->name('update.state');
    Route::get('/delete/state/{id}' , 'DeleteState')->name('delete.state');

    Route::get('/district/ajax/{division_id}' , 'GetDistrict');

}); 
// Site Setting All Route 
Route::controller(SiteSettingController::class)->group(function(){

    Route::get('/site/setting' , 'SiteSetting')->name('site.setting');
    Route::post('/site/setting/update' , 'SiteSettingUpdate')->name('site.setting.update');

    Route::get('/seo/setting' , 'SeoSetting')->name('seo.setting');
    Route::post('/seo/setting/update' , 'SeoSettingUpdate')->name('seo.setting.update');
   });
Route::controller(RoleController::class)->group(function(){

    Route::get('/all/permission' , 'AllPermission')->name('all.permission');
    Route::get('/add/permission' , 'AddPermission')->name('add.permission');
    Route::post('/store/permission' , 'StorePermission')->name('store.permission');
    Route::get('/edit/permission/{id}' , 'EditPermission')->name('edit.permission');
    Route::post('/update/permission' , 'UpdatePermission')->name('update.permission');
    Route::get('/delete/permission/{id}' , 'DeletePermission')->name('delete.permission');
   });
   
   Route::controller(RoleController::class)->group(function(){

    Route::get('/all/roles' , 'AllRoles')->name('all.roles');
    Route::get('/add/roles' , 'AddRoles')->name('add.roles');
    Route::post('/store/roles' , 'StoreRoles')->name('store.roles');
    Route::get('/edit/roles/{id}' , 'EditRoles')->name('edit.roles');   
    Route::post('/update/roles' , 'UpdateRoles')->name('update.roles');   
    Route::get('/delete/roles/{id}' , 'DeleteRoles')->name('delete.roles');
   
    // add role permission 
    Route::get('/add/roles/permission' , 'AddRolesPermission')->name('add.roles.permission');
    Route::post('/role/permission/store' , 'RolePermissionStore')->name('role.permission.store');
    Route::get('/all/roles/permission' , 'AllRolesPermission')->name('all.roles.permission');

    Route::get('/admin/edit/roles/{id}' , 'AdminRolesEdit')->name('admin.edit.roles');
    Route::post('/admin/roles/update/{id}' , 'AdminRolesUpdate')->name('admin.roles.update');
    Route::get('/admin/delete/roles/{id}' , 'AdminRolesDelete')->name('admin.delete.roles');
   });
   // Admin User All Route 
   Route::controller(AdminController::class)->group(function(){

    Route::get('/all/admin' , 'AllAdmin')->name('all.admin');
    Route::get('/add/admin' , 'AddAdmin')->name('add.admin');
    Route::post('/admin/user/store' , 'AdminUserStore')->name('admin.user.store');
    Route::get('/edit/admin/role/{id}' , 'EditAdminRole')->name('edit.admin.role');
    Route::post('/admin/user/update/{id}' , 'AdminUserUpdate')->name('admin.user.update');
    Route::get('/delete/admin/role/{id}' , 'DeleteAdminRole')->name('delete.admin.role');
   });

   Route::controller(ReportController::class)->group(function(){

    Route::get('/report/view' , 'ReportView')->name('report.view');
    Route::post('/search/by/date' , 'SearchByDate')->name('search-by-date');
    Route::post('/search/by/month' , 'SearchByMonth')->name('search-by-month');
    Route::post('/search/by/year' , 'SearchByYear')->name('search-by-year');

    Route::get('/order/by/user' , 'OrderByUser')->name('order.by.user');
    Route::post('/search/by/user' , 'SearchByUser')->name('search-by-user');
});
   Route::controller(AdminNotificationController::class)->group(function(){

    Route::get('/ceate/notification' , 'createnotifi')->name('ceate.notification');
    Route::post('/store/notification' , 'sendMessage')->name('store.notification');
});

});

