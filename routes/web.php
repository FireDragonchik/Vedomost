<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\App\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\App\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['role:User'])->prefix('teacher_panel')->group(function () {
    Route::get('/', [\App\Http\Controllers\User\HomeController::class, 'index'])->name('homeTeacher');

    Route::get('/show-report', [\App\Http\Controllers\User\TeacherReportController::class, 'showThroughRequest'])->name('showReport');
    Route::get('/show-group', [\App\Http\Controllers\User\GroupController::class, 'showThroughRequest'])->name('showGroup');
    Route::resource('tGroup', \App\Http\Controllers\User\GroupController::class);
    Route::resource('tReport', \App\Http\Controllers\User\TeacherReportController::class);
    Route::resource('tAttestation', \App\Http\Controllers\User\AttestationController::class);
    Route::get('/report{id}/save', [\App\Http\Controllers\User\TeacherReportController::class, 'download'])->name('downloadReport');
    Route::get('/report{id}/delete', [\App\Http\Controllers\User\TeacherReportController::class, 'deleteThroughRequest'])->name('deleteReport');
    Route::get('/report{id}/edit', [\App\Http\Controllers\User\TeacherReportController::class, 'editThroughRequest'])->name('editReport');
    Route::get('/report{id}/update', [\App\Http\Controllers\User\TeacherReportController::class, 'updateThroughRequest'])->name('updateReport');
    Route::get('/attestation{id}/update', [\App\Http\Controllers\User\AttestationController::class, 'attestationUpdate'])->name('attestationUpdate');
    Route::get('/attestation{id}/edit', [\App\Http\Controllers\User\AttestationController::class, 'attestationEdit'])->name('attestationEdit');
});

Route::middleware(['role:Admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin');

    Route::resource('teacher', \App\Http\Controllers\Admin\TeacherController::class);
    Route::resource('department', \App\Http\Controllers\Admin\DepartmentController::class);
    Route::resource('faculty', \App\Http\Controllers\Admin\FacultyController::class);
    Route::resource('specialty', \App\Http\Controllers\Admin\SpecialtyController::class);
    Route::resource('graduateDegree', \App\Http\Controllers\Admin\GraduateDegreeController::class);
    Route::resource('educationForm', \App\Http\Controllers\Admin\EducationFormController::class);
    Route::resource('course', \App\Http\Controllers\Admin\CourseController::class);
    Route::resource('group', \App\Http\Controllers\Admin\GroupController::class);
    Route::resource('student', \App\Http\Controllers\Admin\StudentController::class);
    Route::resource('discipline', \App\Http\Controllers\Admin\DisciplineController::class);
    Route::resource('year', \App\Http\Controllers\Admin\YearController::class);
    Route::resource('semester', \App\Http\Controllers\Admin\SemesterController::class);
    Route::resource('report', \App\Http\Controllers\Admin\ReportController::class);
    Route::resource('attestation', \App\Http\Controllers\Admin\AttestationController::class);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::get('/report{id}/save', [\App\Http\Controllers\Admin\ReportController::class, 'download'])->name('download');
});
