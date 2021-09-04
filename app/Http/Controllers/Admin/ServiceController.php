<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function services(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                "LoggedUserInfo" => $user
            ];

            $services = Service::all();

            return view("Admin.AdminPanel.services.services",[
                'services' => $services
            ],$data);
        }
    }
    public function add_services(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                "LoggedUserInfo" => $user
            ];



            return view("Admin.AdminPanel.services.add_services",[

            ],$data);
        }
    }

    public function save_services(Request $request){
        $request->validate([
            'account_name' => "required",
            'account_number' => "required",
            'bank_name' => "required",
            'logo_image' => "required|image",
            'status' => "required",
        ]);

        $logo_image = $request->file('logo_image');
        $imageName = $logo_image->getClientOriginalName();
        $directory = 'Admin/AdminPanel/images/';
        $imageUrl = $directory.$imageName;
        $logo_image->move($directory, $imageName);

        $services = new Service();
        $services->account_name = $request->account_name;
        $services->account_number = $request->account_number;
        $services->bank_name = $request->bank_name;
        $services->logo_image = $imageUrl;
        $services->status = $request->status;

        $services->save();

        return back()->with('message','New Service saved Successfully');
    }

    public function service_edit($id){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                "LoggedUserInfo" => $user
            ];

            $service = Service::find($id);

            return view("Admin.AdminPanel.services.edit_services",[
                "service" => $service
            ],$data);
        }
    }

    public function update_service(Request $request){
        $service = Service::find($request->id);
        $logo_image = $request->file('logo_image');

        if ($logo_image) {

            unlink($service->logo_image);

            $imageName = $logo_image->getClientOriginalName();
            $directory = 'Admin/AdminPanel/images/';
            $imageUrl = $directory . $imageName;
            $logo_image->move($directory, $imageName);
            $service->account_name = $request->account_name;
            $service->account_number = $request->account_number;
            $service->bank_name = $request->bank_name;
            $service->logo_image = $imageUrl;
            $service->status = $request->status;


            $service->save();
        }else{
            $service->account_name = $request->account_name;
            $service->account_number = $request->account_number;
            $service->bank_name = $request->bank_name;
            $service->status = $request->status;

            $service->save();
        }

        return redirect('/services')->with('message','Category Updated');
    }

    public function unpublished_service($id){
        $service = Service::find($id);
        $service->status = 0;
        $service->save();

        return back()->with('message','Service saved Successfully');
    }
    public function published_service($id){
        $service = Service::find($id);
        $service->status = 1;
        $service->save();

        return back()->with('message','Service saved Successfully');
    }

    public function delete_service($id){
        $service = Service::find($id);
        unlink($service->logo_image);
        $service->delete();

        return back()->with('message','Service saved Successfully');
    }
}
