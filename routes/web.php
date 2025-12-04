<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ApplicantController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');
Route::resource('jobs', JobController::class)->middleware('auth')->only(['create', 'update', 'destroy', 'edit']);
Route::resource('jobs', JobController::class)->except(['create', 'update', 'destroy', 'edit']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});
Route::post('/', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index')->middleware('auth');
Route::post('/bookmarks/{job}', [BookmarkController::class, 'store'])->name('bookmarks.store')->middleware('auth');
Route::delete('/bookmarks/{job}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy')->middleware('auth');
Route::post('/jobs/{job}', [ApplicantController::class, 'store'])->name('applicant.store')->middleware('auth');
Route::delete('/dashboard/{applicant}', [ApplicantController::class, 'destroy'])->name('applicant.destroy')->middleware('auth');












// Route::get('/about', function() {
//     return '<h1>Currently NO jobs available</h1>';
// });

// Route::any('/submit', function () {
//     return "Submitted";
// });

// Route::get('/test', function () {
//     $url = route('jobs');
//     return "<a href='$url'>Click here</a>";
// });

// Route::get('/api/users', function () {
//     return [
//         "name" => "Mazin",
//         "email" => "abc@gmail.com"
//     ];
// });

// Route::get("/posts/{id}", function (string $id) {
//     return 'Post ' . $id;
// });

// Route::get('/posts/{id}/comments/{commentid}', function (string $id, string $commentid) {
//     return "Post " . $id . " Comment " . $commentid;
// });

// Route::get("/test", function (Request $request) {
//     return [
//         "method" => $request->method(),
//         "url" => $request->url(),
//         "path" => $request->path(),
//         "fullUrl" => $request->fullUrl(),
//         "ip" => $request->ip(),
//         "userAgent" => $request->userAgent(),
//         "header" => $request->header()
//     ];
// });

// Route::get('/users', function (Request $request) {
//     return $request->input('name');
// });

// Route::get('/users', function (Request $request) {
//     return $request->query('name');
// });

// Route::get('/users', function (Request $request) {
//     return $request->only(['name', 'age']);
// });

// Route::get('/users', function (Request $request) {
//     return $request->all();
// });

// Route::get('/users', function (Request $request) {
//     return $request->has('name');
// });

// Route::get('/users', function (Request $request) {
//     return $request->input('job', 'Default Name');
// });

// Route::get('/users', function (Request $request) {
//     return $request->except(['name']);
// });


// Route::get('/test', function () {
//     return response('<h1>Hello</h1>');
// });

// Route::get('/notfound', function () {
//     return response('Not found', 404);
// });

// Route::get('/notfound', function () {
//     return response('Not found', 404);
// });

// Route::get('/notfound', function () {
//     return new Response('Not found', 200);
// });

// Route::get('/notfound', function () {
//     return response('<h1>Not found</h1>', 200)->header('Content-type', 'text/html');
// });

// Route::get('/test', function () {
//     return response()->json(['name' => 'Mazin', 'job' => 'Developer'])->cookie('name', 'John');
// });

// Route::get('/download', function () {
//     return response()->download(public_path('./favicon.ico'));
// });

// Route::get('/read-cookie', function (Request $request) {
//     $cookieValue = $request->cookie('name');
//     return response()->json(['cookie' => $cookieValue]);
// });