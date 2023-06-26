<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct( )
    {
        $this->middleware('auth');
    }
    //
    public function Index()
    {
        $categories = Category::all();
        return view ('Admin.Categories.List',['categories' => $categories]);
    }

    public function Create()
    {
        return view('Admin.Categories.Create');
    }
    public function Store(Request $request)
    {
        $data = $request->all();
        $brand = new Category();
        $brand->category_name = $data['category_name'];
        
        $brand->save();
        session()->flash('msg', 'Thêm dữ liệu thành công!');

        return redirect()-> route('Admin.Categories.List');
    }

    public function Edit(string $id)
    {
        $categories = Category::find($id);
        return view('Admin.Categories.Edit',['categories' => $categories]);
    }

    public function Update(Request $request,string $id){
        Category::find($id)->update([
            'category_name'=> $request->category_name,
         
        ]);
        session()->flash('msg', 'Cập nhật dữ liệu thành công!');
        return redirect()-> route('Admin.Categories.List');
    }

    public function Delete(string $id){
        Category::find($id)->delete();
        session()->flash('msg', 'Xóa dữ liệu thành công!');
        return redirect()-> route('Admin.Categories.List');
       
    }
}
