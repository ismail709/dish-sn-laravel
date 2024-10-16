<?php

use App\Http\Controllers\DishController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;

// home
Route::get('/', function () {
    if (Auth::check()) {
        return redirect("feed")->with("user", Auth::user());
    }
    return view('home');
})->name("home");

// register
Route::get('/register', function () {
    if (Auth::check()) {
        return redirect("feed")->with("user", Auth::user());
    }
    return view('register');
})->name("register");
// logout
Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerate();
    return redirect("/");
})->name("logout");

// feed
Route::get("/feed", [FeedController::class, "index"])->middleware("auth")->name("feed");
Route::get("/dishes/{id}", [FeedController::class, "show"])->middleware("auth")->name("dishes");
Route::post("/dishes/create", [DishController::class, "create"])->middleware("auth")->name("dishes.create");
Route::post("/dishes/temp", [DishController::class, "temp"])->middleware("auth")->name("temp");

// profile
Route::post("/user", [UserController::class, "login"]);
Route::post("/user/create", [UserController::class, "register"])->name("user.register");
Route::get("/profile", [UserController::class, "showProfile"])->name("profile");
Route::get("/settings", [UserController::class, "showSettings"])->name("settings");

// favorites
Route::get("/favorites", [FeedController::class, "favorites"])->middleware("auth")->name("favorites");
