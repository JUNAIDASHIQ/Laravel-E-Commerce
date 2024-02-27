<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Auth(Request $req)
    {
        // echo "Here";die;
        // return $req->input();
        $user = User::where(['email' => $req->email])->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            return "You Have Enter Wrong Paaword";
        } else {
            $req->session()->put('user', $user);
            // dd($req->session()->all()); // Dump all session data
            // return;
            return redirect('products');
        }
    }
}
