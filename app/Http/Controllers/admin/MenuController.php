<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\menu;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\services\menu\menuService;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(menuService $menuService){
        $this->menuService = $menuService;
    }

    public function create(){
        return view('admin.menu.add',[
            'title' => 'Thêm Danh Mục Mới',
            'parents' => $this->menuService->getParents()
        ]);
    }
    public function store(CreateFormRequest $request){
        $this->menuService->create($request);
        return redirect()->back();
    }
    public function index(){
        return view('admin.menu.list', [
            'title' => 'Danh Sách Danh Mục Mới Nhất',
            'menu' => $this->menuService->getAll()
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công!'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

    public function show(menu $id){
        return view('admin.menu.edit', [
            'title' => 'Chỉnh Sửa Danh Mục '.$id->name,
            'menu' => $id,
            'parents' => $this->menuService->getParents()
        ]);
    }
    public function update(menu $id, CreateFormRequest $request){
        $this->menuService->update($id, $request);
        return redirect('/admin/menu/list');
    }
}
