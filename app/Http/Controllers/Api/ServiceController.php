<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function all_services(){
        $services = Service::all();

        return response()->json([
            'status'=>true,
            'message'=>"All Service List",
            'data'=>$services
        ]);
    }
}
