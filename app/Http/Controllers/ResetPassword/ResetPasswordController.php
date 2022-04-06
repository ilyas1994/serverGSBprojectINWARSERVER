<?php

namespace App\Http\Controllers\ResetPassword;

use App\Http\Controllers\Controller;

use App\Mail\SendPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Str;


class ResetPasswordController extends Controller
{
    public function index(Request $request) {

        $request->validate([
            'email' => 'required|exists:users'
        ]);

        $email = $request->input('email');
        $user = User::query()->where('email', $email)->exists();
        if ($user == false) {
            return redirect()->back();
        } else {
            try {
                DB::beginTransaction();
                $password = Str::random(5);
                $toHash = Hash::make($password);
//                User::query()->updateFrom([
//                   'email' => $toHash
//                ]);
//                UPDATE `users` SET `name` = 'NewNAME' WHERE id= 1;
                DB::select("UPDATE users SET password = '".$toHash."' WHERE email = '".$email."'");
                \Mail::to($email)->send(new SendPassword($email, $password));

                DB::commit();

                return redirect()->back()->with('success', 'success');
            } catch (\Exception $exception) {
                DB::rollBack();
                dd($exception);
            }
        }


//
    }
}
