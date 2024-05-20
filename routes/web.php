<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::controller(StudentController::class)->group(function () {
  
   Route::get('/students', 'index')->name('students.index');
   Route::get('/students/create','create')->name('students.create');
   Route::post('/students', 'store')->name('students.store');


    Route::get('/students/{student}', 'show')->name('students.show');
    Route::get('/students/{student}/edit', 'edit')->name('students.edit');
    Route::put('/students/{student}', 'update')->name('students.update');
   
    Route::delete('/students/{student}','destroy')->name('students.destroy');
    
});
Route::controller(CourseController::class)->group(function () {
  
    Route::get('/courses', 'index')->name('courses.index');
    Route::get('/courses/create','create')->name('courses.create');
    Route::post('/courses', 'store')->name('courses.store');
 
 
     Route::get('/courses/{course}', 'show')->name('courses.show');
     Route::get('/courses/{course}/edit', 'edit')->name('courses.edit');
     Route::put('/courses/{course}', 'update')->name('courses.update');
    
     Route::delete('/courses/{course}','destroy')->name('courses.destroy');
     
 });
 Route::controller(ExamResultController::class)->group(function () {
  
    Route::get('/exam_results', 'index')->name('exam_results.index');
    Route::get('/exam_results/create','create')->name('exam_results.create');
    Route::post('/exam_results', 'store')->name('exam_results.store');
 
 
     Route::get('/exam_results/{exam_result}', 'show')->name('exam_results.show');
     Route::get('/exam_results/{exam_result}/edit', 'edit')->name('exam_results.edit');
     Route::put('/exam_results/{exam_result}', 'update')->name('exam_results.update');
    
     Route::delete('/exam_results/{exam_result}','destroy')->name('exam_results.destroy');
     
 });


 Route::controller(RegistrationController::class)->group(function () {
  
    Route::get('/registrations', 'index')->name('registrations.index');
    Route::get('/registrations/create','create')->name('registrations.create');
    Route::post('/registrations', 'store')->name('registrations.store');
 
 
     Route::get('/registrations/{registration}', 'show')->name('registrations.show');
     Route::get('/registrations/{registration}/edit', 'edit')->name('registrations.edit');
     Route::put('/registrations/{registration}', 'update')->name('registrations.update');
    
     Route::delete('/registrations/{registration}','destroy')->name('registrations.destroy');
     
 });
 
 Route::controller(TransactionController::class)->group(function () {
  
    Route::get('/transactions', 'index')->name('transactions.index');
    Route::get('/transactions/create','create')->name('transactions.create');
    Route::post('/transactions', 'store')->name('transactions.store');
 
 
     Route::get('/transactions/{transaction}', 'show')->name('transactions.show');
     Route::get('/transactions/{transaction}/edit', 'edit')->name('transactions.edit');
     Route::put('/transactions/{transaction}', 'update')->name('transactions.update');
    
     Route::delete('/transactions/{transaction}','destroy')->name('transactions.destroy');
     
 });

 Route::controller(RoleController::class)->group(function () {
  
    Route::get('/roles', 'index')->name('roles.index');
    Route::get('/roles/create','create')->name('roles.create');
    Route::post('/roles', 'store')->name('roles.store');
 
 
     Route::get('/roles/{role}', 'show')->name('roles.show');
     Route::get('/roles/{role}/edit', 'edit')->name('roles.edit');
     Route::put('/roles/{role}', 'update')->name('roles.update');
    
     Route::delete('/roles/{role}','destroy')->name('roles.destroy');
     
 });

 
 Route::controller(AuthController::class)->group(function () {
    Route::get('register','showRegistrationForm')->name('register');
    Route::post('register','register');
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');
});
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
});

Route::resource('courses', CourseController::class)->middleware('auth');

Route::resource('registrations',RegistrationController::class)->middleware('auth');


require __DIR__.'/auth.php';
