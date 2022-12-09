<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddToCartRequest;
use App\Models\Agent;
use App\Models\DonHang;
use Illuminate\Support\Facades\DB;

class ChiTietDonHangController extends Controller
{
    public function index()
    {
        return view('home_page.pages.cart.index');
    }

    public function addToCart(AddToCartRequest $request)
    {
        // Phải kiểm tra xem là đã login hay chưa?
        $agent = Auth::guard('agent')->user();
        if($agent) {
            $sanPham = SanPham::find($request->san_pham_id);

            $chiTietDonHang = ChiTietDonHang::where('san_pham_id', $request->san_pham_id)
                                            ->where('is_cart', 1)
                                            ->where('agent_id', $agent->id)
                                            ->first();
            if($chiTietDonHang) {
                $chiTietDonHang->so_luong += $request->so_luong;
                $chiTietDonHang->save();
            } else {
                ChiTietDonHang::create([
                    'san_pham_id'       => $sanPham->id,
                    'ten_san_pham'      => $sanPham->ten_san_pham,
                    'don_gia'           => $sanPham->gia_khuyen_mai ? $sanPham->gia_khuyen_mai : $sanPham->gia_ban,
                    'so_luong'          => $request->so_luong,
                    'is_cart'           => 1,
                    'agent_id'          => $agent->id,
                ]);
            }

            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function dataCart()
    {
        $agent = Auth::guard('agent')->user();
        if($agent) {
            $data = ChiTietDonHang::join('san_phams', 'chi_tiet_don_hangs.san_pham_id', 'san_phams.id')
                                  ->where('agent_id', $agent->id)
                                  ->where('is_cart', 1)
                                  ->select('chi_tiet_don_hangs.*', 'san_phams.anh_dai_dien')
                                  ->get();

            return response()->json(['data' => $data]);
        }
    }

    public function addToCartUpdate(AddToCartRequest $request)
    {
        // Phải kiểm tra xem là đã login hay chưa?
        $agent = Auth::guard('agent')->user();
        if($agent) {
            $sanPham = SanPham::find($request->san_pham_id);

            $chiTietDonHang = ChiTietDonHang::where('san_pham_id', $request->san_pham_id)
                                            ->where('is_cart', 1)
                                            ->where('agent_id', $agent->id)
                                            ->first();
            if($chiTietDonHang) {
                $chiTietDonHang->so_luong = $request->so_luong;
                $chiTietDonHang->save();
            } else {
                ChiTietDonHang::create([
                    'san_pham_id'       => $sanPham->id,
                    'ten_san_pham'      => $sanPham->ten_san_pham,
                    'don_gia'           => $sanPham->gia_khuyen_mai ? $sanPham->gia_khuyen_mai : $sanPham->gia_ban,
                    'so_luong'          => $request->so_luong,
                    'is_cart'           => 1,
                    'agent_id'          => $agent->id,
                ]);
            }

            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function removeCart(Request $request)
    {
        $agent = Auth::guard('agent')->user();
        if($agent) {
            $chiTietDonHang = ChiTietDonHang::where('is_cart', 1)
                                            ->where('agent_id', $agent->id)
                                            ->where('san_pham_id', $request->san_pham_id)
                                            ->first();
            $chiTietDonHang->delete();
        }
    }

    public function viewBill($id)
    {
        $agent = Auth::guard('agent')->user();
        if($agent){
            $view = ChiTietDonHang::join('san_phams', 'chi_tiet_don_hangs.san_pham_id', 'san_phams.id')
                                  ->where('agent_id', $agent->id)
                                  ->where('don_hang_id', $id)
                                  ->select('chi_tiet_don_hangs.*', 'san_phams.anh_dai_dien')
                                  ->get();
            $tongTien = DonHang::where('agent_id', $agent->id)
                             ->where('id', $id)
                             ->get();

            return view('home_page.pages.viewBill.index', compact('view', 'tongTien'));
        }else{

        }
    }
}
