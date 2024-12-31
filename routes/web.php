<?php

use App\Http\Controllers\HelloController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hello", function () {
    return "Hello World";
});

Route::get("/about", function () {
    return view('about', ["name" => "budi"]);
});

Route::fallback(function () {
    return "error 404";
});

Route::redirect("/about-me", "/about");

Route::get("/hi", function () {
    return view('hello.world');
});

Route::get("/product/{id?}", function ($id = 1) {
    return "product id : $id";
})->where('id', '[0-9]+')->name('product.detail');

Route::get("/product/{productId}/items/{itemId}", function ($productId, $itemId) {
    return "product id: $productId, item id: $itemId";
})->name('product.item');

Route::get("/produk/{id}", function ($id) {
    $link = route('product.detail', ['id' => $id]);
    return "link : $link";
});

Route::get("/produk-redirect/{id}", function ($id) {
    return redirect()->route('product.detail', ['id' => $id]);
});

Route::get("/controller/hello/{name}", [HelloController::class, "hello"]);

Route::get("/controller/request", [HelloController::class, "request"]);
