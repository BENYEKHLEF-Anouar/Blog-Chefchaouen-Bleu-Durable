<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ArticleController::class,'index'])->name('articles.index');


Route::delete('/articles/{id}',[ArticleController::class,'destroy'])->name('articles.destroy');