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

Route::get('/', function () {
    return view('backend.home.index');
});


Route::group(["prefix" => "admin", "as" => "backend", "namespace" => "Backend"], function () {

    Route::group(["as" => ".home", "namespace" => "Home"], function () {
        Route::get("/", "HomeController@index")->name(".index");
    });

    /*Route::group(["prefix" => "category", "as" => ".category", "namespace" => "Category"], function () {
        Route::get("/", "CategoryController@index")->name(".index");
        Route::get("/create", "CategoryController@create")->name(".create");
        Route::post("/createpost", "CategoryController@createpost")->name(".createpost");
        Route::get("/edit/{id}", "CategoryController@edit")->name(".edit");
        Route::post("/editpost", "CategoryController@editpost")->name(".editpost");
        Route::post("/delete", "CategoryController@delete")->name(".delete");
    });*/

});