<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [
    'uses'  =>  'NewShopController@index',
    'as'    =>  'shop'
]);


    //


Route::get('/category-product/{id}', [
    'uses'  =>  'NewShopController@categoryProduct',
    'as'    =>  'category-product'
]);



Route::get('/product', [
	'uses' => 'NewshopController@product',
	'as' => 'product'	

]);

Route::get('/product-checkout', [
	'uses' => 'NewshopController@checkout',
	'as' => 'product-checkout'	

]);

Route::get('/product-cart', [
	'uses' => 'NewshopController@cart',
	'as' => 'product-cart'	

]);

Route::get('/product-details/{id}',[
       'uses' =>  'NewshopController@productDetails',
       'as' =>'product-details'
]);



/* cart */ 

Route::post('/cart/add',[
    'uses' =>  'CartController@addToCart',
    'as' =>'add-to-cart'
]);

Route::get('/cart/show',[
    'uses' =>  'CartController@showCart',
    'as' =>'show-cart'
]);

Route::get('/cart/delete/{rowId}',[
    'uses' =>  'CartController@deleteCart',
    'as' =>'delete-cart'
]);

Route::post('/cart/update',[
    'uses' =>  'CartController@updateCart',
    'as' =>'update-cart'
]);


/*Checkout*/


Route::get('/signup', [
    'uses' => 'CheckoutController@signUpForm',
    'as' => 'signup-customer-head' 
]);


Route::post('/customer/registration',[
    'uses' =>  'CheckoutController@customerSignUp',
    'as' =>'customer-sign-up'
]);


Route::post('checkout/customer-login',[
    'uses' =>  'CheckoutController@customerLoginCheck',
    'as' =>'customer-login'
]);

Route::post('checkout/customer-logout',[
    'uses' =>  'CheckoutController@customerLogout',
    'as' =>'customer-logout'
]);

Route::get('customer/login',[
    'uses' =>  'CheckoutController@customerLoginForm',
    'as' =>'new-login'
]);


Route::get('/checkout', [
    'uses' => 'CheckoutController@index',
    'as' => 'signup-customer' 
]);



Route::get('/checkout/payment',[
    'uses' =>  'CheckoutController@paymentForm',
    'as' =>'checkout-payment'
]);

Route::get('/checkout/shipping',[
    'uses' =>  'CheckoutController@shippingForm',
    'as' =>'checkout-shipping'
]);

Route::post('/shipping/save',[
        'uses' => 'CheckoutController@saveShippingInfo',
        'as' => 'new-shippping'
]);


Route::post('/checkout/order',[
    'uses' => 'CheckoutController@newOrder',
    'as' => 'new-order'
]);



Route::get('/complete/order',[

    'uses' => 'CheckoutController@completeOrder',
    'as' => 'OrderComplete'
]);

//Inventory management

Route::group(['middleware' => ['testing']], function () {


Route::get('/order/manage-order',[
    'uses' => 'OrderController@manageOrderInfo',
    'as' => 'manage-order'
]);

Route::get('/manage/view-order-detail/{id}', [
    'uses'  =>  'OrderController@ViewOrderDetail',
    'as'    =>  'view-order-detail'
]);

Route::get('/manage/view-order-invoice/{id}', [
    'uses'  =>  'OrderController@ViewOrderInvoice',
    'as'    =>  'view-order-invoice'
]);

Route::get('/manage/download-order-invoice/{id}', [
    'uses'  =>  'OrderController@DownloadOrderInvoice',
    'as'    =>  'download-order-invoice'
]);

Route::get('/status/changed/{id}', [
    'uses' => 'OrderController@updateOrderStatus',
    'as' => 'update-order-status'

]);

Route::get('/cancel/order/{id}',[
    'uses' =>'OrderController@deleteOrder',
    'as'=> 'cancel-order'
]);
/*
Route::get('/', [
	'uses' => 'CategoryController@index',
	'as' => '/'	

]);*/

Route::get('/category/add', [
    'uses'  =>  'CategoryController@index',
    'as'    =>  'add-category'
]);

Route::post('/category/save', [
    'uses'  =>  'CategoryController@saveCategoryInfo',
    'as'    =>  'new-category'
]);

Route::get('/category/manage', [
    'uses'  =>  'CategoryController@manageCategoryInfo',
    'as'    =>  'manage-category'
]);


Route::get('/category/unpublished/{id}', [
    'uses'  =>  'CategoryController@unpublishedCategoryInfo',
    'as'    =>  'unpublished-category'
]);

Route::get('/category/published/{id}', [
    'uses'  =>  'CategoryController@publishedCategoryInfo',
    'as'    =>  'published-category'
]);

Route::get('/category/edit/{id}', [
    'uses'  =>  'CategoryController@editCategoryInfo',
    'as'    =>  'edit-category'
]);

Route::post('/category/update/', [
    'uses'  =>  'CategoryController@updateCategoryInfo',
    'as'    =>  'update-category'
]);

Route::get('/category/delete/{id}', [
    'uses'  =>  'CategoryController@deleteCategoryInfo',
    'as'    =>  'delete-category'
]);

Route::get('/brand/add', [
    'uses'  =>  'BrandController@index',
    'as'    =>  'add-brand'
]);

Route::get('/brand/edit/{id}', [
    'uses'  =>  'BrandController@editBrandInfo',
    'as'    =>  'edit-brand'
]);

Route::post('/brand/update/', [
    'uses'  =>  'BrandController@updateBrandInfo',
    'as'    =>  'update-brand'
]);

Route::get('/brand/delete/{id}', [
    'uses'  =>  'BrandController@deleteBrandInfo',
    'as'    =>  'delete-brand'
]);

Route::post('/brand/save', [
    'uses'  =>  'BrandController@saveBrandInfo',
    'as'    =>  'new-brand'
]);


Route::get('/brand/manage', [
    'uses'  =>  'BrandController@manageBrandInfo',
    'as'    =>  'manage-brand'
]);

Route::get('/brand/unpublished/{id}', [
    'uses'  =>  'BrandController@unpublishedBrandInfo',
    'as'    =>  'unpublished-brand'
]);

Route::get('/brand/published/{id}', [
    'uses'  =>  'BrandController@publishedBrandInfo',
    'as'    =>  'published-brand'
]);



Route::get('/product/add',[
     'uses' => 'ProductController@index',
      'as' => 'add-product' 
]);

Route::post('/product/save',[
     'uses' => 'ProductController@saveProduct',
     'as' => 'new-product'

]);

Route::get('/product/manage',[
    'uses' => 'ProductController@manageProductInfo',
    'as' => 'manage-product'

]);

Route::get('/product/unpublished/{id}', [
    'uses'  =>  'ProductController@unpublishedProduct',
    'as'    =>  'unpublished-product'
]);

Route::get('/product/published/{id}', [
    'uses'  =>  'ProductController@publishedProduct',
    'as'    =>  'published-product'
]);

Route::get('/product/edit/{id}', [
    'uses'  =>  'ProductController@editProduct',
    'as'    =>  'edit-product'
]);

Route::post('/product/update/', [
    'uses'  =>  'ProductController@updateProduct',
    'as'    =>  'update-product'
]);

Route::get('/product/delete/{id}', [
    'uses'  =>  'productController@deleteProduct',
    'as'    =>  'delete-product'
]);

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

?>