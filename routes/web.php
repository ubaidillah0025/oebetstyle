use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;

// Halaman Statis Utama (Beranda, Profil, Kontak)
Route::get('/', function () { return view('beranda'); });
Route::get('/profil', function () { return view('profil'); });
Route::get('/kontak', function () { return view('kontak'); });

// Halaman Formulir Input & Proses Simpan
Route::get('/input', function () { return view('input0025'); }); // Sesuaikan nama view form input Anda
Route::post('/input', [PendaftaranController::class, 'store']);

// Halaman Manajemen Data (CRUD Lengkap)
Route::get('/tampil', [PendaftaranController::class, 'index']);
Route::get('/detail/{id}', [PendaftaranController::class, 'show']);
Route::get('/ubah/{id}', [PendaftaranController::class, 'edit']);
Route::put('/ubah/{id}', [PendaftaranController::class, 'update']);
Route::get('/hapus/{id}', [PendaftaranController::class, 'destroy']);