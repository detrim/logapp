<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateJWT
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('jwt_token'); // PRIORITY: Cookie

        // Fallback: header
        if (!$token && $request->bearerToken()) {
            $token = $request->bearerToken();
        }

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Token tidak ditemukan'
            ], 401);
        }

        try {
            JWTAuth::setToken($token); // SET TOKEN MANUAL
            $user = JWTAuth::authenticate(); // VALIDATE TOKEN

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User tidak ditemukan'
                ], 401);
            }

        } catch (TokenInvalidException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Token tidak valid'
            ], 401);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Token expired'
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }

        return $next($request);
    }
}
