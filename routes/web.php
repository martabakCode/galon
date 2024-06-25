<?php

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

Route::get('language/{locale}', function ($locale) {
    $languages = config('app.languages');
    if (in_array($locale, $languages)) {
        session()->put('lang', $locale);
    }
    return redirect()->back();
})->name('language');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        // 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', function () {
            return view('home');
        })->name('home');

        Route::get('products', \App\Http\Livewire\Products::class)->name('products');
        Route::get('promotions', \App\Http\Livewire\Promotions::class)->name('promotions');
        Route::get('featured', \App\Http\Livewire\Featured::class)->name('featured');

        Route::get('product/{slug}', \App\Http\Livewire\Product\Index::class)->name('product.view');

        Route::get('categories', \App\Http\Livewire\Categories::class)->name('categories');
        Route::get('category/{slug}', \App\Http\Livewire\Categories::class)->name('category');

        Route::get('brands', \App\Http\Livewire\Brands::class)->name('brands');
        Route::get('brand/{slug}', \App\Http\Livewire\Brands::class)->name('brand');
        Route::get('cart', \App\Http\Livewire\ShoppingCart::class)->name('shopping.cart');
        Route::get('checkout', \App\Http\Livewire\Checkout::class)->name('checkout');

        Route::get('blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog');
        Route::get('post/{slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('post.view');

        Route::get('about', function () {
            return view('pages.about');
        })->name('pages.about');
        Route::get('contact', function () {
            return view('pages.contact');
        })->name('pages.contact');

        Route::get('guidance', function () {
            return view('pages.guidance');
        })->name('pages.guidance');

    }
);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/favourites', \App\Http\Livewire\Favourites::class)->name('favourites');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:Admin',
])->group(function () {

    Route::get('/admin', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/customers', \App\Http\Livewire\App\Customers::class)->name('app.customers');
    Route::get('/admin/categories', \App\Http\Livewire\App\Categories::class)->name('app.categories');
    Route::get('/admin/brands', \App\Http\Livewire\App\Brands::class)->name('app.brands');
    Route::get('/admin/products', \App\Http\Livewire\App\Products\Products::class)->name('app.products');
    Route::get('/admin/add/product', \App\Http\Livewire\App\Products\AddProduct::class)->name('app.add.product');
    Route::get('/admin/edit/product/{id}', \App\Http\Livewire\App\Products\EditProduct::class)->name('app.edit.product');
    Route::get('admin/blog/posts', \App\Http\Livewire\App\Blog\Posts::class)->name('blog.posts');
    Route::get('admin/blog/add/post', \App\Http\Livewire\App\Blog\AddPost::class)->name('blog.add.post');
    Route::get('admin/blog/edit/post/{id}', \App\Http\Livewire\App\Blog\EditPost::class)->name('blog.edit.post');
    Route::get('admin/blog/categories', \App\Http\Livewire\App\Blog\Categories::class)->name('blog.categories');
    Route::get('admin/settings/general', \App\Http\Livewire\App\Settings\General::class)->name('settings.general');
    Route::get('admin/settings/roles', \App\Http\Livewire\App\Settings\UserRoles::class)->name('settings.roles');
    Route::get('admin/settings/appearance', \App\Http\Livewire\App\Settings\Appearance::class)->name('settings.appearance');

    Route::get('admin/contacts', \App\Http\Livewire\App\Contacts::class)->name('app.contacts');

    Route::get('admin/orders', \App\Http\Livewire\App\Orders\Orders::class)->name('orders');
    Route::get('admin/order/{code}', \App\Http\Livewire\App\Orders\Order::class)->name('order.view');

    Route::get('admin/invoices', \App\Http\Livewire\App\Orders\Invoices::class)->name('invoices');
    Route::get('admin/invoice/{code}', \App\Http\Livewire\App\Orders\Invoice::class)->name('invoice.view');
});

// Route::group(['middleware' => ['role:Customer']], function () {
//     //
// });
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:Customer',
])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'customer'])->name('customer.dashboard');
    Route::get('customer/messages', \App\Http\Livewire\Customer\MyMessages::class)->name('my.messages');
    Route::get('customer/favourites', \App\Http\Livewire\Customer\MyFavourites::class)->name('my.favourites');

    Route::get('customer/orders', \App\Http\Livewire\Customer\MyOrders::class)->name('my.orders');
    Route::get('customer/order/{code}', \App\Http\Livewire\Customer\MyOrder::class)->name('my.order.view');

    Route::get('customer/invoices', \App\Http\Livewire\Customer\MyInvoices::class)->name('my.invoices');
    Route::get('customer/invoice/{code}', \App\Http\Livewire\Customer\MyInvoice::class)->name('my.invoice.view');
});
