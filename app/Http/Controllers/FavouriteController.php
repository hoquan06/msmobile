<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function index()
    {
        $agent = Auth::guard('agent')->user();
        if($agent) {
            $data = Favourite::join('san_phams', 'favourites.san_pham_id', 'san_phams.id')
                                  ->where('agent_id', $agent->id)
                                  ->where('is_favourite', 1)
                                  ->where('is_cart', 1)
                                  ->select('favourites.*', 'san_phams.anh_dai_dien')
                                  ->get();
            return view('home_page.pages.favourite.index', compact('data'));
        }else{
            $data = Favourite::where('is_favourite', 3)->get();
            return view('home_page.pages.favourite.index', compact('data'));
        }
    }

    public function addFavourite(Request $request)
    {
        $agent = Auth::guard('agent')->user();
        if($agent){
            $san_pham = SanPham::find($request->san_pham_id);
            $love = Favourite::where('san_pham_id', $request->san_pham_id)
                             ->where('is_cart', 1)
                             ->where('is_favourite', 1)
                             ->where('agent_id', $agent->id)
                             ->first();
            if($love){
                $love->is_favourite = 0;
                $love->save();
                $love->delete();
                return response()->json(['status' => 0]);
            }else{
                Favourite::create([
                    'san_pham_id'       => $san_pham->id,
                    'ten_san_pham'      => $san_pham->ten_san_pham,
                    'don_gia'           => $san_pham->gia_khuyen_mai ? $san_pham->gia_khuyen_mai : $san_pham->gia_ban,
                    'so_luong'          => $request->so_luong,
                    'is_cart'           => 1,
                    'is_favourite'      => 1,
                    'agent_id'          => $agent->id,
                ]);
            }
            return response()->json(['status' => 1]);
        }
        else{
            return response()->json(['status' => 2]);
        }
    }

    public function removeFavourite(Request $request)
    {
        $agent = Auth::guard('agent')->user();
        if($agent){
            $love = Favourite::where('san_pham_id', $request->san_pham_id)
                             ->where('is_favourite', 1)
                             ->where('agent_id', $agent->id)
                             ->first();
            if($love){
                $love->delete();
                return response()->json(['status' => 0]);
            }else{
                return response()->json(['status' => 1]);
            }
        }else{
            return response()->json(['status' => 2]);
        }
    }
}
