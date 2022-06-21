<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\Menu\MenuService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }



    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm danh mục mới',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public  function  store(CreateFormRequest $request)
    {
        $this->menuService->create($request);
        return redirect()->back();
    }

    public function show()
    {
        return view('admin.menu.list', [
            'title' => 'Danh sách các danh mục',
            'list' => $this->menuService->getAll()
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'code' => 200,
                'message' => 'Xóa danh mục thành công.'
            ]);
        } else {
            return response()->json([
                'code' => 500,
                'message' => 'Xóa danh mục không thành công.'
            ]);
        }
    }

    public function editMenu($id)
    {
        $menu = DB::table('menus')->where('id', $id)->get();
        // return dd($menu[0]->name);
        return view('admin.menu.edit', [
            'title' => ' Chỉnh sửa danh mục: ' . $menu[0]->name,
            'menu' => $menu[0],
            'getParent' => $this->menuService->getParentLoc($menu[0]),
        ]);
    }
    public function updateMenu(CreateFormRequest $request, $id)
    {

        $menu = DB::table('menus')->where('id', $id)->get();
        $id = $menu[0]->id;
        $result = $this->menuService->updateMenu($request, $id);
        if ($result) {
            return redirect('admin/menus/list');
        }
        return redirect('admin/menus/edit/' . $menu->id);
    }

    public function updateActive($id)
    {
        $menu = DB::table('menus')->where('id', $id)->get();

        if ($menu[0]->active == 1) {
            DB::table('menus')->where('id', $menu[0]->id)
                ->update(['active' => 0]);
        } else {
            DB::table('menus')->where('id', $menu[0]->id)
                ->update(['active' => 1]);
        }
        return redirect()->back();
    }
}
