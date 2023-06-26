<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    protected $product;
    protected $brand;
    protected $category;

    public function __construct(Product $product,Brand $brands,Category $categories )
    {
        $this->product = $product;
        $this->brand = $brands;
        $this->category = $categories;
        $this->middleware('auth');
    }
   
    
    public function index()
    {
        $List_products = $this->product->getProductsWithCategoryAndBrand();
        return view ('Admin.Products.List',['products' => $List_products]);
    }
    public function create()
    {
        $brands = $this->brand::pluck('brand_name', 'id');
        $categories=$this->category::pluck('category_name', 'id');
        return view('Admin.Products.Create',['brands' => $brands,'categories' =>$categories]);
    }

    public function store(Request $request)
    {

        $get_image=$request-> file('image_url');
        if($get_image){
            $new_image = $get_image->getClientOriginalName();
            if(file_exists('uploads/Product/'.$new_image)){
                unlink('uploads/Product/'.$new_image);
            }
            $get_image->move('uploads/Product/', $new_image);

            $this->product->product_name = $request['name'];
            $this->product->description = $request['description'];
            $this->product->price = $request['price'];
            $this->product->brand_id = $request['brand_id'];
            $this->product->category_id = $request['category_id'];
            $this->product->image_url=$new_image;
            $this->product->ram=$request['ram'];
            $this->product->storage=$request['storage'];
            $this->product->battery=$request['battery'];
            $this->product->cpu=$request['cpu'];
            $this->product->save();
            session()->flash('msg', 'Lưu dữ liệu thành công!');
            return redirect()-> route('Admin.Products.List');
        }
       
        session()->flash('msg', 'Lưu dữ liệu không thành công!');
        return redirect()-> route('Admin.Products.Create');
            


        

 
    }

    public function Edit(string $id)
    {
        $brands = $this->brand::pluck('brand_name', 'id');
        $categories=$this->category::pluck('category_name', 'id');
        $product = $this->product::find($id);
        return view('Admin.Products.Edit',['product' => $product,'brands' => $brands,'categories' =>$categories]);
    }

    public function Update(Request $request,string $id){
        
        $this->product::find($id)->update([
            'product_name'=> $request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'ram'=>$request->ram,
            'storage'=>$request->storage,
            'battery'=>$request->battery,
            'cpu'=>$request->cpu,

        ]);
        session()->flash('msg', 'Sửa dữ liệu thành công!');
        return redirect()-> route('Admin.Products.List');
    }
    public function Delete(string $id){
        $this->product::find($id)->delete();
        session()->flash('msg', 'Xóa dữ liệu thành công!');
        return redirect()-> route('Admin.Products.List');
       
    }
}
