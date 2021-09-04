<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reivew;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function review(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                "LoggedUserInfo" => $user
            ];

            $reviews = Reivew::with('customer')->get();

            return view("Admin.AdminPanel.review.review",[
                'reviews' => $reviews
            ],$data);
        }
    }

    public function unpublished($id){
        $review = Reivew::find($id);
        $review->status = 0;
        $review->save();

        return back()->with('message','Service saved Successfully');
    }
    public function published($id){
        $review = Reivew::find($id);
        $review->status = 1;
        $review->save();

        return back()->with('message','Service saved Successfully');
    }

    public function delete($id){
        $review = Reivew::find($id);
        $review->delete();
        return back();
    }
}
