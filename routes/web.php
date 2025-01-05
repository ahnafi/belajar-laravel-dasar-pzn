<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
use App\Http\Middleware\ContohMiddleware;
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

Route::controller(InputController::class)->group(function () {
    Route::get("/input/hello", "hello");
    Route::post("/input/hello", "hello");
    Route::post("/input/firstName", "HelloFirstName");
    Route::post("/input/all", "HelloAll");
    Route::post("/input/product", "HelloArray");
    Route::post("/input/type", "HelloType");
    Route::post("/input/only", "FilterOnly");
    Route::post("/input/except", "FilterExcept");
    Route::post("/input/filter/merge", "FilterMerge");
});

Route::post("/file/upload", [FileController::class, "upload"]);

Route::get("/response/hello", [ResponseController::class, "response"]);
Route::get("/response/header", [ResponseController::class, "header"]);

Route::prefix("/response/type")->group(function () {
    Route::get("/view", [ResponseController::class, "resView"]);
    Route::get("/json", [ResponseController::class, "resJson"]);
    Route::get("/file", [ResponseController::class, "resFile"]);
    Route::get("/download", [ResponseController::class, "resDownload"]);
});

Route::get("/cookie/set", [CookieController::class, "createCookie"]);
Route::get("/cookie/get", [CookieController::class, "getCookie"]);
Route::get("/cookie/clear", [CookieController::class, "clearCookie"]);

Route::get("/redirect/to", [RedirectController::class, "redirectTo"]);
Route::get("/redirect/from", [RedirectController::class, "redirectFrom"]);
Route::get("/redirect/name/{name}", [RedirectController::class, "redirectHello"])->name("redirect.hello");
Route::get("/redirect/name", [RedirectController::class, "redirectName"]);
Route::get("/redirect/action", [RedirectController::class, "redirectAction"]);
Route::get("/redirect/away", [RedirectController::class, "redirectAway"]);

Route::get("/middleware/api", function () {
    return "OK";
})->middleware([ContohMiddleware::class]);

Route::get("/form", [\App\Http\Controllers\FormController::class, "Form"]);
Route::post("/form", [\App\Http\Controllers\FormController::class, "hello"]);

Route::get("/url/current", function () {
    return \Illuminate\Support\Facades\URL::full();
});

Route::get("/session/put", [\App\Http\Controllers\SessionController::class, "putSession"]);
Route::get("/session/pull", [\App\Http\Controllers\SessionController::class, "pullSession"]);
