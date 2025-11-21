<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $admin=Admin::where('email',$request->email)->first();
        if($admin && Hash::check($request->password,$admin->password)){
            $token = $admin->createToken('MyApp')->accessToken;
            return response()->json([
                'token' => $token,
                'admin' => $admin,
            ]);
        }
        return response()->json(['error' => 'invalid credentials'], 401);
    }
}
