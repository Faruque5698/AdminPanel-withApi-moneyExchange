<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reivew;

class ReviewController extends Controller
{
    public function create(Request $request){
        $request->validate([
            "review_description" => "required"
        ]);

        $review = new Reivew();

        $review->customer_id = auth()->user()->id;
        $review->review_description = $request->review_description;
        $review->status = $request->status;

        $review->save();

        return response()->json([
            "status" => true,
            "message" => "Review Added"
        ]);


    }

    public function show_review(){
        $reviews = Reivew::with('customer')->where('status','=',1)->get();

        return response()->json([
            "status" => true,
            "message" => "review list",
            "data" => $reviews
        ]);
    }
}
