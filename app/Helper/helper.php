<?php

namespace App\Helper;

use phpDocumentor\Reflection\Types\AbstractList;

class helper
{
    public static function menu($menu, $parent_id = 0, $char = ''){
        $html = '';
        foreach ($menu as $key => $m){
            if($m->parent_id == $parent_id){
                $html .='
                    <tr>
                        <td>'.$m->id.'</td>
                        <td>'.$char.$m->name.'</td>
                        <td>'. self::status($m->status) .'</td>
                        <td>'.$m->updated_at.'</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/menu/edit/'. $m->id .'">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="#"
                                onclick="removeRow('. $m->id .', \'/admin/menu/destroy\')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                ';
                unset($menu[$key]);
                $html .= self::menu($menu, $m->id, $char .'___');
            }
        }
        return $html;
    }
    public static function status($status = 0){
        return $status == 0 ?
                    '<span class="badge bg-danger">
                        Chưa Kích Hoạt
                    </span>' :
                    '<span class="badge bg-success">
                        Đã Kích Hoạt
                    </span>';
    }
}
