<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Models\DanhMucSanPham;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomePageController extends Controller
{
    public function index()
    {
        $menuCha = DanhMucSanPham::where('id_danh_muc_cha', 0)
                                 ->where('is_open', 1)
                                 ->get();
        $menuCon = DanhMucSanPham::where('id_danh_muc_cha', '<>', 0)
                                 ->where('is_open', 1)
                                 ->get();

        $sql = "SELECT *, (`gia_ban` - `gia_khuyen_mai`) / `gia_ban` * 100 AS `TYLE` FROM `san_phams` ORDER BY TYLE DESC";
        $trending = "SELECT *, (gia_ban > 10000000) AS `TRENDING` FROM `san_phams` ORDER BY TRENDING DESC";
        $new_arrival = "SELECT *, (`gia_ban` - `gia_khuyen_mai` < 100000) AS `arrival` FROM `san_phams` ORDER BY arrival DESC";
        $gio = "SELECT * FROM `chi_tiet_don_hangs`";
        $demgiohang = "SELECT COUNT(`san_pham_id`) AS sl FROM `chi_tiet_don_hangs` WHERE `so_luong` >= 1";

        $bestSeller = DB::select($sql);
        $arrival = DB::select($new_arrival);
        $sanPhamTrending = DB::select($trending);
        $gioHang = DB::select($gio);
        $dem = DB::select($demgiohang);

        return view('home_page.pages.home', compact('menuCha', 'menuCon', 'bestSeller','arrival', 'sanPhamTrending', 'gioHang', 'dem'));
    }

    public function viewSanPham($id)
    {
        while(strpos($id, 'post')) {
            $viTri = strpos($id, 'post');
            $id = Str::substr($id, $viTri + 4);
        }

        $sanPham = SanPham::find($id);

        $allSanPham = SanPham::where('id_danh_muc', $sanPham->id_danh_muc)->get();

        if($sanPham) {
            return view('home_page.pages.detail_san_pham', compact('sanPham', 'allSanPham'));
        } else {
            return redirect('/');
        }
    }

    public function viewDanhMuc($id)
    {
        while(strpos($id, 'post')) {
            $viTri = strpos($id, 'post');
            $id = Str::substr($id, $viTri + 4);
        }

        $danhMuc = DanhMucSanPham::find($id);
        if($danhMuc) {
            // Nếu là danh mục con
            if($danhMuc->id_danh_muc_cha > 0) {
                $sanPham = SanPham::where('is_open', 1)
                                  ->where('id_danh_muc', $danhMuc->id)
                                  ->get();
            } else {
                // Nó là danh mục cha. Tìm toàn bộ danh mục con
                $danhMucCon = DanhMucSanPham::where('id_danh_muc_cha', $danhMuc->id)
                                            ->get();
                $danhSach   = $danhMuc->id;
                foreach($danhMucCon as $key => $value) {
                    $danhSach = $danhSach . ',' . $value->id;
                }
                $sanPham = SanPham::whereIn('id_danh_muc', explode(",", $danhSach))->get();
            }

            return view('home_page.pages.san_pham', compact('sanPham'));
        }
    }

    public function search(Request $request){
        $data = $request->search;

        $list = SanPham::where('ten_san_pham', 'like', '%' . $data . '%')->get();
        return view('home_page.pages.san_pham_search', compact('list'));
    }
}
