<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DonHangController extends Controller
{
    public function billDone(){
        return view('home_page.pages.billDone');
    }

    public function store(Request $request)
    {
        $agent = Auth::guard('agent')->user();
        if($agent){
            //1.Lấy toàn bộ giỏ hàng của tk này
            $gioHang = ChiTietDonHang::where('is_cart', 1)
                                     ->where('agent_id', $agent->id)
                                     ->get();
            if(empty($gioHang) || count($gioHang) > 0){
                //2. Tạo đơn hàng
                $donHang = DonHang::create([
                    'ma_don_hang'       =>  Str::uuid(),
                    'tong_tien'         => 0,
                    'tien_giam_gia'     => 0,
                    'thuc_tra'          => 0,
                    'agent_id'          => $agent->id,
                    'loai_thanh_toan'   => 1,
                ]);
                $thuc_tra = 0;
                $tong_tien = 0;
                //3. Chuyển giỏ hàng thành đơn hàng
                foreach($gioHang as $key => $value){
                    $sanPham = SanPham::find($value->san_pham_id);
                    if($sanPham){
                        $giaBan     = $sanPham->gia_khuyen_mai ? $sanPham->gia_khuyen_mai : $sanPham->gia_ban;
                        $thuc_tra  += $value->so_luong * $giaBan;
                        $tong_tien += $value->so_luong * $sanPham->gia_ban;

                        $value->don_gia     = $giaBan;
                        $value->is_cart     = 0;
                        $value->don_hang_id = $donHang->id;
                        $value->save();
                    }else{
                        $value->delete();
                    }
                }
                //4. Đã có thực trả và tổng tiền
                $donHang->thuc_tra      = $thuc_tra;
                $donHang->tong_tien     = $tong_tien;
                $donHang->tien_giam_gia = $tong_tien - $thuc_tra;
                $donHang->save();

                return response()->json(['status' => 1]);
            }else{
                return response()->json(['status' => 2]);
            }
        }
        return response()->json(['status' => false]);
    }
}
