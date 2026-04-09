<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // RATE LIMITING
        $key = 'login:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return response()->json([
                'success' => false,
                'message' => 'Terlalu Banyak Percobaan.'
            ], 429);
        }

        // VALIDASI
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                RateLimiter::hit($key, 60);
                return response()->json([
                    'success' => false,
                    'message' => 'Email atau password salah'
                ], 401);
            }

            $user = JWTAuth::user();

            // COOKIE JWT
            $cookie = cookie(
                'jwt_token',
                $token,
                60,     // 1 jam
                '/',
                null,
                false,  // localhost
                true    // httpOnly
            );

            RateLimiter::clear($key);

            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'user' => $user,
                'token' => $token
            ])->withCookie($cookie);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Login gagal: ' . $e->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $token = $request->cookie('jwt_token');
            if ($token) {
                JWTAuth::setToken($token)->invalidate();
            }

            return response()->json([
                'success' => true,
                'message' => 'Logout berhasil'
            ])->withCookie(cookie()->forget('jwt_token'));

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Logout gagal'
            ], 500);
        }
    }

    public function me(Request $request)
    {
        try {
            // Coba dari cookie dulu
            $token = $request->cookie('jwt_token');

            if ($token) {
                JWTAuth::setToken($token);
            }

            $user = JWTAuth::user();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'error' => 'Tidak ada pengguna yang terautentikasi'
                ], 401);
            }

            return response()->json([
                'success' => true,
                'user' => $user
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Otentikasi gagal'
            ], 401);
        }
    }
}
