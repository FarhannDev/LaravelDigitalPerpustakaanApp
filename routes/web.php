<?php

use App\Http\Livewire\Dashboard\Book\BookAdd;
use App\Http\Livewire\Dashboard\Book\BookCategoryAdd;
use App\Http\Livewire\Dashboard\Book\BookCategoryEdit;
use App\Http\Livewire\Dashboard\Book\BookCategoryIndex;
use App\Http\Livewire\Dashboard\Book\BookEdit;
use App\Http\Livewire\Dashboard\Book\BookIndex;
use App\Http\Livewire\Dashboard\Book\BookPreview;
use App\Http\Livewire\Dashboard\DashboardIndex;
use App\Http\Livewire\Dashboard\User\UserAdd;
use App\Http\Livewire\Dashboard\User\UserEdit;
use App\Http\Livewire\Dashboard\User\UserIndex;
use App\Http\Livewire\Dashboard\User\UserPetugasAdd;
use App\Http\Livewire\Dashboard\User\UserPetugasEdit;
use App\Http\Livewire\Dashboard\User\UserPetugasIndex;
use App\Http\Livewire\Profile\ProfileEdit;
use App\Http\Livewire\Profile\ProfileIndex;
use App\Http\Livewire\User\UserBookList;
use App\Http\Livewire\User\UserBookShow;
use App\Http\Livewire\User\UserDashboard;
use App\Http\Livewire\User\UserEditProfil;
use App\Models\Book;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Dompdf\Dompdf;


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

Auth::routes();


Route::redirect('/', '/login');

Route::get('/generate-pdf', function () {
    $data = [
        'title' => 'Preview Export Data Buku',
        'items'      => Book::all(),
    ];

    $pdf = new Dompdf();
    $pdf->loadHtml(view('pdf.example', $data));
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    return $pdf->stream('export-buku' . '-' . uniqid()  . '.pdf');
});



// Route for Admin
Route::middleware(['auth', 'user-access:adminstrator'])->prefix('dashboard')->group(function () {
    Route::get('/', DashboardIndex::class)->name('dashboard.index');

    Route::get('book', BookIndex::class)->name('dashboard.book.index');
    Route::get('book/add', BookAdd::class)->name('dashboard.book.add');
    Route::get('book/{slug}', BookPreview::class)->name('dashboard.book.preview');
    Route::get('book/{slug}/edit', BookEdit::class)->name('dashboard.book.edit');

    Route::get('category', BookCategoryIndex::class)->name('dashboard.book.category.index');
    Route::get('category/add', BookCategoryAdd::class)->name('dashboard.book.category.add');
    Route::get('category/edit/{slug}', BookCategoryEdit::class)->name('dashboard.book.category.edit');

    Route::get('user', UserIndex::class)->name('dashboard.user.index');
    Route::get('user/operator', UserPetugasIndex::class)->name('dashboard.user.operator');
    Route::get('user/operator/add', UserPetugasAdd::class)->name('dashboard.user.operator.add');
    Route::get('user/operator/{id}/edit', UserPetugasEdit::class)->name('dashboard.user.operator.edit');

    Route::get('user/add', UserAdd::class)->name('dashboard.user.add');
    Route::get('user/{userId}', UserIndex::class)->name('dashboard.user.preview');
    Route::get('user/{userId}/edit', UserEdit::class)->name('dashboard.user.edit');
});


// Route For User
Route::middleware(['auth', 'user-access:anggota'])->prefix('user')->group(function () {
    Route::get('dashboard', UserDashboard::class)->name('user.dashboard');
    Route::get('book/list', UserBookList::class)->name('user.book.list');
    Route::get('book/{slug}', UserBookShow::class)->name('user.book.show');
    Route::get('profile', UserEditProfil::class)->name('user.profile');
});


Route::middleware('auth')->prefix('profile')->group(function () {
    Route::get('/', ProfileIndex::class)->name('profile.index');
    Route::get('/edit', ProfileEdit::class)->name('profile.edit');
});
