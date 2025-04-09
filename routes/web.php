<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

/* Route::get('/', function () {
    return view('welcome');
}); */


Auth::routes();
Route::redirect('/', '/home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('import', [HomeController::class, 'import'])->name('import');
    
});
/*
Route::get("/login", function(Request $request) {
    $request->session()->put("state", $state = Str::random(40));
    $query = http_build_query([
        //"client_id" => "3",
        //"redirect_uri" => "http://localhost:8082/callback",
        "client_id" => env('LOGIN_CLIENT'),
        "redirect_uri" => env('LOGIN_CALLBACK'),
        "response_type" => "code",
        "scope" => "",
        "state" => $state
    ]);
    //return redirect(env('LOGIN_URL') . "http://localhost:8080/oauth/authorize?" . $query);
    return redirect(env('LOGIN_URL') . "/oauth/authorize?" . $query);
});

Route::get('/callback', function(Request $request) {
    $state = $request->state;

    $response = Http::asForm()->post(
        //"http://auth/oauth/token",
        env('LOGIN_URL') . '/oauth/token',
        [
            "grant_type" => "authorization_code",
            //"client_id" => "3",
            //"client_secret" => "GtI8FrJEZQEChd868vvvbG79GHxG67nt1ZQQaN7Z",
            //"redirect_uri" => "http://localhost:8082/home",
            "client_id" => env('LOGIN_CLIENT'),
            "client_secret" => env('LOGIN_SECRET'),
            "redirect_uri" => env('LOGIN_CALLBACK'),
            "code" => $request->code
        ]
    );
    $request->session()->put($response->json());
            return $response->json();
});

Route::get('/home', function(Request $request) {
    $state = $request->state;

    $response = Http::asForm()->post(
        "http://auth/oauth/token",
        [
            "grant_type" => "authorization_code",
            "client_id" => "3",
            "client_secret" => "GtI8FrJEZQEChd868vvvbG79GHxG67nt1ZQQaN7Z",
            "redirect_uri" => "http://localhost:8082/home",
            "code" => $request->code
        ]
    );
            return $response->json();
});
*/
// Route::get("login", [AuthController::class, 'login'])->name('auth.login');
// Route::get("callback", [AuthController::class, 'callback'])->name('auth.callback');
// Route::get("profile", [AuthController::class, 'profile'])->name('auth.profile');
/*
Route::middleware('auth.check')->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
*/