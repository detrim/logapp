<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = auth('api')->user();

        return response()->json([
            'success' => true,
            'message' => 'Welcome to Dashboard',
            'user' => $user
        ]);
    }
}
