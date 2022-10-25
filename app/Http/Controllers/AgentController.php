<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentLoginRequest;
use App\Http\Requests\AgentRegisterRequest;
use App\Mail\KichHoatMail;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('home_page.pages.register');
    }

    public function registerAction(AgentRegisterRequest $request)
    {
        $parts = explode(" ", $request->ho_va_ten);
        if(count($parts) > 1) {
            $lastname = array_pop($parts);
            $firstname = implode(" ", $parts);
        }
        else
        {
            $firstname = $request->ho_va_ten;
            $lastname = " ";
        }

        $data = $request->all();
        $data['hash']       = Str::uuid();
        $data['ho_lot']     = $firstname;
        $data['ten']        = $lastname;
        $data['thanh_pho']  = "Đà Nẵng";
        $data['password']   = bcrypt($request->password);
        Agent::create($data);

        //Gửi mail
        Mail::to($request->email)->send(new KichHoatMail(
            $request->ho_va_ten,
            $data['hash'],
            'Kích Hoạt Tài Khoản Đăng Ký'
        ));

        return response()->json(['status' => true]);
    }

    public function login()
    {
        return view('home_page.pages.login');
    }

    public function loginAction(AgentLoginRequest $request)
    {
        $data  = $request->all();
        $check = Auth::guard('agent')->attempt($data);
        if($check) {
            // Đã login thành công!!!
            $agent = Auth::guard('agent')->user();
            if($agent->is_email) {
                return response()->json(['status' => 2]);
            } else {
                //Chưa kích hoạt mail
                Auth::guard('agent')->logout();
                return response()->json(['status' => 1]);
            }
        } else {
            //Login thất bại
            return response()->json(['status' => 0]);
        }
    }

    public function active($hash)
    {
        $agent = Agent::where('hash', $hash)->first();
        if($agent->is_email) {
            toastr()->warning('Tài khoản của bạn đã được kích hoạt trước đó!');
        } else {
            $agent->is_email = 1;
            $agent->save();
            toastr()->success('Tài khoản của bạn đã được kích hoạt!');
        }
        return redirect('/agent/login');
    }

    public function logout()
    {
        Auth::guard("agent")->logout();
        toastr()->success('Đăng xuất thành công!!!');
        return redirect()->back();
    }

    // public function myaccount()
    // {
    //     return view('home_page.pages.my_account');
    // }

    // public function editMyaccount($id)
    // {
    //     $agent = Auth::guard('agent')->user();
    //     $agent = Agent::find($id);
    //     if($agent) {
    //         return response()->json([
    //             'status'  =>  true,
    //             'data'    =>  $agent,
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status'  =>  false,
    //         ]);
    //     }
    // }

    // public function UpdateMyaccount(Request $request)
    // {
    //     $data     = $request->all();
    //     $agent    = Agent::find($request->id);
    //     $agent    ->update($data);

    //     return response()->json(['status'=> true]);
    // }
}
