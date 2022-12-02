<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\QuanLyTaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuanLyTaiKhoanController extends Controller
{
    public function index()
    {
        $sql = "SELECT * FROM agents";
        $taiKhoan = DB::select($sql);
        return view('admin.pages.qly_taikhoan.index', compact('taiKhoan'));
    }

    public function destroy($id)
    {
        $agent = Agent::find($id);
        if($agent){
            $agent->delete();
            return response()->json([
                'status'    => true,
            ]);
        }else{
            return response()->json([
                'status'    => false,
            ]);
        }
    }

    public function doiTrangThai($id)
    {
        $agent = Agent::find($id);
        if($agent){
            $agent->is_block = !$agent->is_block;
            $agent->save();
            return response()->json([
                'status'    => true,
                'block'     => $agent->is_block,
            ]);
        }else{
            return response()->json([
                'status'    => false,
            ]);
        }
    }
}
