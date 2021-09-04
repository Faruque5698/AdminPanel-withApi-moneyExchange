<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    //customer register Api => Post method
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:5|max:12|confirmed'
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password =bcrypt($request->password);

        $customer->save();

        return response()->json([
            "status" => 1,
            "message" => "Customer Registration Successfully"
        ]);
    }

    //Customer Login Api => Post Method
    public function login(Request $request){

        $login_data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        if (!auth()->attempt($login_data)){
            return response()->json([
                "status" => false,
                "message" => "Invalid Credential"
            ]);
        }

            //token
            $token = auth()->user()->createToken("auth_token");

            return response()->json([
                "status" => true,
                "message" => "Customer Logged Successfully",
                "token" => $token
            ]);



    }

    public function profile($customer_id){

    }

    public function logout(Request $request){
        //get token value
        $token = $request->user()->token();

        //revoke token  value
        $token->revoke();

        return response()->json([
            "status" => true,
            "message" => "Author Logged Out Successfully"
        ]);
    }
}
