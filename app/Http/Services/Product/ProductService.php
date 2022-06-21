<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService
{

    public function getMenuloc()
    {
        return DB::table('menus')->where('active', 1)->get();
    }




    public function getProduct()
    {

        return DB::table('products')->orderByDesc('id')->paginate(5);
    }


    public function ValidatePrice($request)
    {
        if (
            $request->input('price') != 0 &&  $request->input('price_sale') != 0 &&
            $request->input('price_sale') > $request->input('price')
        ) {
            session()->flash('error', 'Gia giam khong duoc nho hon gia goc');
            return false;
        }

        if ($request->input('price_sale') != 0 && $request->input('price') == 0) {
            session()->flash('error', 'Vui long nhap gia goc');
            return false;
        }

        return true;
    }

    public function detailProduct($id)
    {
        return  DB::table('products')->where('id', $id)->first();
    }
}
