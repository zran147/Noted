<?php
use App\Http\Controllers\HomeNotesController;
use App\Http\Controllers\MoneyboxController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Kategorinotes;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('login.index');
});


Route::get('/home', [UserController::class, 'showHomePage'])->name('home');

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
Route::get('/transactions', [TransaksiController::class, 'index'])->name('transactions');
Route::get('/transactions/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::get('/transactions/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transactions.edit');
Route::post('/transactions', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::put('/transactions/{transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::get('/transactions/{transaksi}', [TransaksiController::class, 'show']);
Route::delete('/transactions/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

// Route Moneybox and single moneybox:
Route::get('/moneybox', [MoneyboxController::class, 'index'])->name('moneybox');
Route::get('/moneybox/create', [MoneyboxController::class, 'create'])->name('moneybox.create');
Route::get('/moneybox/{moneybox}/edit', [MoneyboxController::class, 'edit'])->name('moneybox.edit');
Route::post('/moneybox', [MoneyboxController::class, 'store'])->name('moneybox.store');
Route::put('/moneybox/{moneybox}/addmoney', 'MoneyboxController@addMoney')->name('moneybox.addmoney');
Route::put('/moneybox/{moneybox}', [MoneyboxController::class, 'update'])->name('moneybox.update');
Route::get('/moneybox/{moneybox}', [MoneyboxController::class, 'show']);
Route::delete('/moneybox/{id}', [MoneyboxController::class, 'destroy'])->name('moneybox.destroy');
Route::get('/moneybox/{moneybox}/addmoney', [MoneyboxController::class, 'showAddMoneyForm'])->name('moneybox.addMoney');
Route::post('/moneybox/{moneybox}/savemoney', [MoneyboxController::class, 'saveMoney'])->name('moneybox.saveMoney');


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
Route::delete('/home/notes/{note}', [HomeNotesController::class, 'destroy'])->name('notes.destroy');
Route::put('/home/notes/{note}', [HomeNotesController::class, 'update'])->name('notes.update');
Route::get('/categories/academics', [NoteController::class, 'academics'])->name('academics');

//Dynamic Routes
Route::get('/categories/{category}', 'NoteController@notesByCategory');

