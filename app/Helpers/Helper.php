<?php

namespace App\Helpers;


class Helper
{



    public static function listMenu($list, $parent_id = 0, $char = '')
    {
        $listMenu = '';
        foreach ($list as $key => $value) {
            if ($value->active == 1) {
                $activeMenu = '<label style="color: green;">On </label>';
            } else {
                $activeMenu = '<label style="color: red;">Off </label>';
            }

            if ($value->parent_id == $parent_id) {
                $listMenu .= '<tr id="listMenu_' . $value->id . '">    
                <td>' . $char . $value->name . '</td>
                <td>'  . $value->description . '</td>
                <td>' . $value->content . '</td>
                <td>' . $activeMenu . '
                <a href="/admin/menus/updateActive/' . $value->id . '">  
                <i class="fas fa-retweet" ></i></a></td>
                <td> 
                    <a class"btn btn-primary btn-sm" href="/admin/menus/edit/' . $value->id . '">
                    <i class="fas fa-edit"></i></a>
                    <a class"btn btn-danger btn-sm" href="#"  onclick="removeMenu(' . $value->id . ' )">
                    <i class="fas fa-trash"></i></a>
                </td></tr>';
                unset($list[$key]);
                $listMenu .= self::listMenu($list, $value->id, $char . ' ---- || ');
            }
        }
        return $listMenu;
    }
    public static function listMenuProduct($menus, $parent_id = 0, $char = '')
    {
        $listMenu = '';
        foreach ($menus as $key => $value) {

            if ($value->parent_id == 0) {
                $selected = 'disabled';
            } else {
                $selected = '';
            }

            if ($value->parent_id == $parent_id) {
                $listMenu .= ' <option  value="' . $value->id . '" ' . $selected . '>' . $char . $value->name . '</option>';
                unset($menus[$key]);
                $listMenu .= self::listMenuProduct($menus, $value->id, $char . ' ---- || ');
            }
        }
        return $listMenu;
    }
    public static function listMenuProductEdit($menus, $id, $parent_id = 0, $char = '')
    {

        $listMenu = '';
        foreach ($menus as $key => $value) {

            if ($value->parent_id == 0) {
                $selected = 'disabled';
            } else {
                $selected = '';
            }

            if ($value->id === $id) {
                $selected_Parent = 'selected=""';
            } else {
                $selected_Parent = '';
            }
            if ($value->parent_id == $parent_id) {
                $listMenu .= ' <option ' . $selected_Parent . ' value="' . $value->id . '" ' . $selected . '>' . $char . $value->name . '</option>';
                unset($menus[$key]);
                $listMenu .= self::listMenuProductEdit($menus, $id, $value->id, $char . ' ---- || ');
            }
        }
        return $listMenu;
    }




    public static function listproduct($products, $menu)
    {

        $html0 = '';



        foreach ($products as $value) {

            if ($value->active == 1) {
                $htmlc = '<label id="' . $value->id . '"   src="' . $value->active . '"  style="color: green;">On </label>';
            } else {
                $htmlc = '<label id="' . $value->id . '"   src="' . $value->active . '"  style="color: red;">Off </label>';
            }
            $duongdan = '';
            $duongdan .= '/public/uploads/products/' . $value->image . '';
            $html0 .= '<tr >
                    <td>' . $value->name . '</td>
                <td>' . $value->menu->name . '</td>
                
                <td>' . $value->description . '</td>
                <td>' . $value->content . '</td>
                <td>' . $value->price . '</td>
                <td>' . $value->price_sale . '</td>
                <td>' . $value->qty . '</td>
                <td><a href="' . $value->image . '" target="_blank">
                <img src="' . $value->image . '" alt="' . $value->image . '" height="100" width="100">
                </a>
                <a href="/admin/products/editproductimage/' . $value->id . '"">Ảnh</a>
                </td>
                
                <td>' . $htmlc . '
               
                <a onclick="updateActive(' . $value->id . ',' . $value->active . ');">  
                <i class="fas fa-retweet" style="color:blue; cursor: pointer;  align-items: center;" alt="' . $value->id . '" ></i>
            
                </a></td>
                <td> 
                        <a class="btn btn-primary btn-sm" href="/admin/products/editproduct/' . $value->id . '">
                        <i class="fas fa-edit"></i>
                        </a>
                        <a  class="btn btn-danger btn-sm" style="color:blue; cursor: pointer;" onclick="deleteProduct(' . $value->id . ')" ' . $value->id . '" ">
                        
                        <i id="hoverdi" class="fas fa-trash"></i>
                        </a>
                </td>
    </tr>';
        }
        // 
        return $html0;
    }
}
