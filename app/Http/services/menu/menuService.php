<?php

namespace App\Http\services\menu;

use App\Models\menu;
use Illuminate\Support\Facades\Session;

class menuService
{
    public function getParents(){
        return menu::where('parent_id', 0)->get();
    }

    public function getAll(){
        return menu::orderByDesc('id')->paginate(20);
    }

    public function create($request){
        try{
            menu::create([
               'name' => (string) $request->input('name'),
               'parent_id' => (int) $request->input('parent_id'),
               'description' => (string) $request->input('description'),
               'content' => (string) $request->input('content'),
               'status' => (int) $request->input('status'),
            ]);
            Session::flash('success', 'Tạo Danh Mục Thành Công');
        } catch (\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request){
        $id = (int) $request->input('id');
        $menu = menu::where('id', $id)->first();
        if($menu){
            return menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }

    public function update($id, $request){
//        $id->fill($request->input());
        if($request->input('parent_id') != $id->id){
            $id->parent_id = (int) $request->input('parent_id');
        }
        $id->name = (string) $request->input('name');
        $id->description = (string) $request->input('description');
        $id->content = (string) $request->input('content');
        $id->status = (int) $request->input('status');
        $id->save();

        Session::flash('success', 'Cập Nhật Danh Mục Thành Công!');
        return true;
    }
}
