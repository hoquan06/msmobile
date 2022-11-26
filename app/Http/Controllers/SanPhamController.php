<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSanPham;
use App\Http\Requests\KiemTraDuLieuTaoSanPham;
use App\Http\Requests\UpdateSanPhamRequest;
use App\Models\SanPham;
use App\Models\DanhMucSanPham;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_danh_muc = DanhMucSanPham::where('is_open', 1)
                                        ->where('id_danh_muc_cha', '<>', 0)
                                        ->get();
        return view('admin.pages.san_pham.index', compact('list_danh_muc'));
    }

    public function HamTaoSanPham(CreateSanPham $request)
    {
        $data = $request->all();
        SanPham::create($data);

        return response()->json(['thongBao' => true]);
    }

    public function getData()
    {
        $danhSachDanhMuc = DanhMucSanPham::all();
        $danhSachSanPham = SanPham::join('danh_muc_san_phams', 'san_phams.id_danh_muc', 'danh_muc_san_phams.id')
                        ->select('san_phams.*', 'danh_muc_san_phams.ten_danh_muc')
                        ->get();

        return response()->json([
            'danhSachDanhMuc'   => $danhSachDanhMuc,
            'danhSachSanPham' => $danhSachSanPham
        ]);
    }

    public function DoiTrangThaiSanPham($id)
    {
        $san_pham = SanPham::find($id);
        if($san_pham) {
            $san_pham->is_open = !$san_pham->is_open;
            $san_pham->save();

            return response()->json(['status' => true]);
        }
    }

    public function XoaSanPham($id)
    {
        $san_pham = SanPham::find($id);
        if($san_pham) {
            $san_pham->delete();

            return response()->json(['status' => true]);
        }
    }

    public function editSanPham($id)
    {
        $san_pham = SanPham::find($id);;
        if($san_pham) {
            return response()->json([
                'status'  =>  true,
                'data'    =>  $san_pham,
            ]);
        } else {
            return response()->json([
                'status'  =>  false,
            ]);
        }
    }

    public function updateSanPham(UpdateSanPhamRequest $request)
    {
        $data     = $request->all();
        $san_pham = SanPham::find($data['id']);
        $san_pham->update($data);

        return response()->json([
            'status' => true,
        ]);
    }

    public function search(Request $request)
    {
        $data = SanPham::where('ten_san_pham', 'like', '%' . $request->tenSanPham .'%')->get();

        return response()->json(['sanPhamTimDuoc' => $data]);
    }

    public function viewProduct()
    {
        return view('home_page.pages.detail_san_pham');
    }
}
