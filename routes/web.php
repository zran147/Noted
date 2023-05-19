<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\LoginController;
use App\Models\Kategorinotes;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return view('home', [
        //Key yang bisa dikirim langsung ke view
        "title" => "Dashboard",
        "active" => 'home'
        // "nama" => "Salma Nadhira",
        // "email" => "salmanadhira@apps.ipb.ac.id"
    ]);
});

//Route Notes dan single note
Route::get('/notes', [NoteController::class, 'index']);
Route::get('notes/{note:slug}', [NoteController::class, 'show']); 
//note:slug -> di url jadinya pake slug nya

Route::get('/categories/{kategorinotes:slug}', function(Kategorinotes $kategorinotes) {
    return view('category', [
        'title' => $kategorinotes->nama,
        'notes' => $kategorinotes->notes,
        'kategorinotes' => $kategorinotes->nama
    
    ]);

});

// Route::get('/login', [LoginController::class, 'index']);
// Route::get('/login', [LoginController::class, 'authenticate']);

// Add a new login route with a different URL
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Adjust the existing register route
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


// Route::get('/register', [RegisterController::class, 'index']);

// Route::post('/register', [RegisterController::class, 'store']);

Route::get('/moneybox', function () {
    return view('moneybox', [
        "title" => "MoneyBox"
    ]);
});

Route::get('/transactions', function () {
    return view('transactions', [
        "title" => "Transactions",
    ]);
});

Route::get('/test-database-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Database connection is successful.";
    } catch (\Exception $e) {
        return "Database connection failed: " . $e->getMessage();
    }
});


