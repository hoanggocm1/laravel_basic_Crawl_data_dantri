<?php

namespace App\Http\Services\Menu;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MenuService
{
    public function getParent()
    {
        return  DB::table('menus')->where('parent_id', 0)->get();
    }


    // public function getMenus($list, $parent_id1 = 0, $char = '')
    // {

    //     $htmla = '';
    //     $htmlc = '';
    //     foreach ($list as $key => $value) {
    //         if ($value->active == 1) {
    //             $htmlc = '<label style="color: green;">On </label>';
    //         } else {
    //             $htmlc = '<label style="color: red;">Off </label>';
    //         }

    //         if ($value->parent_id == $parent_id1) {
    //             $htmla .= '<tr>
    //             <td>' . $char . $value->name . '</td>
    //             <td>'  . $value->description . '</td>
    //             <td>' . $value->content . '</td>
    //             <td>' . $htmlc . '
    //             <a href="/admin/menus/editactive/' . $value->id . '">  
    //             <i class="fas fa-retweet" ></i>
    //             </a></td>
    //             <td> 
    //                     <a class"btn btn-primary btn-sm" href="/admin/menus/edit/' . $value->id . '">
    //                     <i class="fas fa-edit"></i>
    //                     </a>
    //                     <a class"btn btn-danger btn-sm" href="" onclick="removeRow(' . $value->id . ',\'/admin/menus/destroy\' ) ">

    //                     <i class="fas fa-trash"></i>
    //                     </a>
    //             </td>
    //             </tr>';
    //             unset($list[$key]);

    //             $htmla .= self::getMenus($list, $value->id, $char . ' ---- || ');
    //         }
    //     }
    //     return dd(1);
    // }

    public function getParentLoc($menu)
    {
        return DB::table('menus')->where([
            ['parent_id', '==', '0'],
            ['id', '!=', $menu->id],
        ])->orderByDesc('id')->get();
    }

    public function getList()
    {
        return DB::table('menus')->paginate(1);
    }

    public function create($request)
    {
        try {
            DB::table('menus')
                ->updateOrInsert([
                    'name' => (string) $request->input('name'),
                    'parent_id' => (int) $request->input('parent_id'),
                    'description' => (string) $request->input('description'),
                    'content' => (string) $request->input('content'),
                    'active' => (string) $request->input('active'),
                ]);

            session()->flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {
            session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function getAll()
    {
        return DB::table('menus')->get();
    }

    public function destroy($request)
    {
        $id = $request->input('id');

        $menu = DB::table('menus')->where('id', $id)->first();
        if ($menu) {
            return DB::table('menus')->where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }

    public function updateMenu($request, $id)
    {
        DB::table('menus')->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'parent_id' => $request->input('parent_id'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'active' => $request->input('active'),
            ]);
        Session::flash('success', 'Cập nhật danh mục thành công.');
        return true;
    }
}
