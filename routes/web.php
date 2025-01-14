<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GeneralPagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserLevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMessageController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ClassSectionsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\DisciplinariesController;
use App\Http\Controllers\LeaveoutsController;
use App\Http\Controllers\TextbooksController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\PaymentRecordsController;
use App\Http\Controllers\ReceiptsController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\SectionSubjectTeacherController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\DormController;

Route::get('/', [GeneralPagesController::class, 'home'])->name('home');
Route::get('/about', [GeneralPagesController::class, 'about'])->name('about');
Route::get('/services', [GeneralPagesController::class, 'services'])->name('services');
Route::get('/contact', [GeneralPagesController::class, 'contact'])->name('contact');
Route::post('/contact', [UserMessageController::class, 'store'])->name('user-messages.store');
Route::get('/blogs', [BlogController::class, 'users_blogs'])->name('users.blogs');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/receipts/{payment_record_id}', [ReceiptsController::class, 'print'])->name('receipts.print');

Route::middleware(['student'])
->prefix('student')
->group(function () {
    Route::get('/student-details', [StudentController::class, 'details'])->name('student-details');
    Route::get('/textbooks', [StudentController::class, 'textbooks'])->name('student-textbooks');
    Route::get('/leaveouts', [StudentController::class, 'leavouts'])->name('student-leaveouts');
    Route::get('/disciplinaries', [StudentController::class, 'disciplinaries'])->name('student-disciplinaries');
    Route::get('/payments', [StudentController::class, 'payments'])->name('student-payments');
    Route::get('/results', [StudentController::class, 'results'])->name('student-results');
    Route::post('/logout', [StudentController::class, 'logout_student'])->name('student_logout');
});

Route::middleware(['auth', 'verified', 'active'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/accountant/dashboard', [DashboardController::class, 'accountant_dashboard'])->name('accountant.dashboard');
    Route::get('/teacher/dashboard', [DashboardController::class, 'teacher_dashboard'])->name('teacher.dashboard');
    Route::get('/storekeeper/dashboard', [DashboardController::class, 'storekeeper_dashboard'])->name('storekeeper.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

    Route::resource('/parents', ParentsController::class)->except('show');

    Route::resource('/disciplinaries', DisciplinariesController::class)->except('show');

    Route::resource('/leaveouts', LeaveoutsController::class)->except('show');

    Route::resource('/textbooks', TextbooksController::class)->except('show');

    // Route::resource('/payment-records', PaymentRecordsController::class)->except('show');
    Route::get('/payment-records/{class_section_id?}', [PaymentRecordsController::class, 'index'])->name('payment-records.index');
    Route::get('/payment-records/create/{student_id}', [PaymentRecordsController::class, 'create'])->name('payment-records.create');
    Route::post('/payment-records', [PaymentRecordsController::class, 'store'])->name('payment-records.store');
    Route::post('/payment-records/update', [PaymentRecordsController::class, 'update'])->name('payment-records.update');

    Route::get('/exam-results/{exam_id?}', [ExamResultController::class, 'index'])->name('exam-results.index');
    Route::resource('/exam-results', ExamResultController::class)->except('index', 'show');
});

require __DIR__ . '/auth.php';

Route::middleware('admin_auth')
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin.dashboard');

        Route::resource('/user-levels', UserLevelController::class)->except('show');
        Route::resource('/users', UserController::class)->except('show');

        Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
        Route::post('/students', [StudentController::class, 'store'])->name('students.store');
        Route::patch('/students/{student}', [StudentController::class, 'update'])->name('students.update');
        Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

        Route::resource('user-messages', UserMessageController::class)->only('index', 'show', 'destroy');

        Route::resource('/blog-categories', BlogCategoryController::class)->only('store', 'edit', 'update', 'destroy');
        Route::resource('/blogs', BlogController::class)->except('show');
        Route::post('/blogs/sort-lessons', [BlogController::class, 'sort_blogs'])->name('blogs.sort');

        Route::prefix('settings')->group(function() {
            Route::get('/all', [SettingsController::class, 'index'])->name('settings.index');

            Route::get('/general', [SettingsController::class, 'general'])->name('settings.general');

            Route::patch('/update', [SettingsController::class, 'update'])->name('settings.update');

            Route::resource('/dorms', DormController::class)->except('show');

            Route::resource('/payments', PaymentsController::class)->except('create', 'show');

            Route::resource('/grades', GradesController::class)->except('show');

            Route::resource('/subjects', SubjectsController::class)->except('show');

            Route::resource('/subject-teachers', SectionSubjectTeacherController::class)->except('show');

            Route::resource('/exams', ExamController::class)->except('create', 'show');
        });

        Route::get('/classes', [ClassesController::class, 'index'])->name('classes.index');
        Route::get('/classes/create', [ClassesController::class, 'create'])->name('classes.create');
        Route::post('/classes', [ClassesController::class, 'store'])->name('classes.store');
        Route::get('/classes/{classes}', [ClassesController::class, 'show'])->name('classes.show');
        Route::get('/classes/{classes}/edit', [ClassesController::class, 'edit'])->name('classes.edit');
        Route::patch('/classes/{classes}', [ClassesController::class, 'update'])->name('classes.update');
        Route::delete('/classes/{classes}', [ClassesController::class, 'destroy'])->name('classes.destroy');
        Route::resource('class_sections', ClassSectionsController::class)->except('show');
    });
