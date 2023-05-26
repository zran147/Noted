<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeNotesController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\LoginController;
use App\Models\Kategorinotes;
use App\Models\Kategoripemasukan;
use Illuminate\Support\Facades\Route;
use App\Models\Note;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home', [
        "title" => "Dashboard",
        "active" => 'home'
    ]);
});

// Add a new login route with a different URL
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//Route Notes dan single note
Route::get('/notes', [NoteController::class, 'index']);
Route::get('notes/{note:slug}', [NoteController::class, 'show']); 


Route::get('/categories/{kategorinotes:slug}', function(Kategorinotes $kategorinotes) {
    $user = auth()->user();
    $notes = $user->notes()->where('kategorinotes_id', $kategorinotes->id)->get();

    return view('category', [
        'title' => $kategorinotes->nama,
        'notes' => $notes,
        'kategorinotes' => $kategorinotes->nama
    ]);
});

// Route Transactions and single transactions:
Route::get('/transactions', [PemasukanController::class, 'index'])->name('transactions');
Route::get('/transactions/create', [PemasukanController::class, 'create'])->name('pemasukan.create');
Route::get('/transactions/{pemasukan}/edit', [PemasukanController::class, 'edit'])->name('transactions.edit');
Route::post('/transactions', [PemasukanController::class, 'store'])->name('pemasukan.store');
Route::get('/transactions/{pemasukan}', [PemasukanController::class, 'show']);
Route::delete('/transactions/{id}', [PemasukanController::class, 'destroy'])->name('pemasukan.destroy');



Route::get('/moneybox', function () {
    return view('moneybox', [
        "title" => "MoneyBox"
    ]);
});

// Route::get('/transactions', function () {
//     return view('transactions', [
//         "title" => "Transactions",
//     ]);
// });

Route::get('/test-database-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Database connection is successful.";
    } catch (\Exception $e) {
        return "Database connection failed: " . $e->getMessage();
    }
});

//Buat bikin slug otomatis w/ HomeNotesController
Route::get('home/notes/checkSlug', [HomeNotesController::class, 'checkSlug'])->middleware('auth');


// Route Resources
Route::resource('home/notes', HomeNotesController::class)->middleware('auth');
Route::delete('/notes/{id}', [HomeNotesController::class, 'destroy'])->name('notes.destroy');
Route::get('/categories/academics', [NoteController::class, 'academics'])->name('academics');

//Dynamic Routes
Route::get('/categories/{category}', 'NoteController@notesByCategory');

