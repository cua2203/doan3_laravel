<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Brand;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandsController extends Controller
{
    public function __construct( )
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $brands = Brand::all();
        //dd($brands);
        return view ('Admin.Brands.List',['brands' => $brands]);
    }
    public function create()
    {
        return view('Admin.Brands.Create');
    }
    public function store(Request $request)
    {
        $get_image=$request-> file('image');
        if($get_image){
            $new_image = $get_image->getClientOriginalName();
            if(file_exists('uploads/'.$new_image)){
                unlink('uploads/'.$new_image);
            }
            $get_image->move('uploads/', $new_image);
            $brand = new Brand();
            $brand->brand_name = $request['name'];
            $brand->image = $new_image;
            $brand->save();
            session()->flash('msg', 'Lưu dữ liệu thành công!');
            return redirect()->route('Admin.Brands.List');
        }
        session()->flash('msg', 'Lưu giữ liệu không thành công');
        return redirect()-> route('Admin.Brands.Create');
    }

    public function Edit(string $id)
    {
        $brand = Brand::find($id);
        return view('Admin.Brands.Edit',['brand' => $brand]);
    }

    public function Update(Request $request,string $id){
        Brand::find($id)->update([
            'brand_name'=> $request->name,

        ]);
        return redirect()-> route('Admin.Brands.List');
    }
    public function Delete(string $id){
        Brand::find($id)->delete();
        session()->flash('msg', 'Xóa dữ liệu thành công!');
        return redirect()-> route('Admin.Brands.List');
       
    }
    
}
