<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Str;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class HomeController extends Controller
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
    }
    public function View_Mail(){
        return view('mail');
   }
    public function Send_Mail()
    {
          Mail::send('test',[],function($mail){
            $mail->to('phamcua670@gmail.com');
            $mail->from('pcua0064@gmail.com');
            $mail->subject('testmail');

        });
    }


    public function Index(Request $request)
    {
        $total=0;
        $cart = $request->session()->get('cart', []);
        foreach($cart as $item){
            $total +=  $item['quantity'];
        }

        $List_products = $this->product->limit(5)->get();
        $List_products2 = $this->product->limit(3)->get();
        $brand =Brand::all();
   
        return view ('Home.Home',['products' => $List_products,'brand'=>$brand,'product2'=>$List_products2,'total'=>$total]);
    }

    public function Detail_product(string $id)
    {
        $product = $this->product::find($id);
        $List_product = $this->product->limit(5)->get();
        $filteredProducts = $List_product->except($id)->values();
       //dd($product);
      
        return view ('Home.Product',['products' => $product,'List_product'=>$filteredProducts]);
    }

    public function Get_Product_Paging(Request $request)
    {
        $category = $this->category::all();
        $brand =$this->brand::all();

        $perPage = 2; // Số lượng bản ghi trên mỗi trang
        $sortColumn = $request->input('sort_column', 'id'); // Trường sắp xếp mặc định
        $sortDirection = $request->input('sort_direction', 'asc'); // Hướng sắp xếp mặc 
        $searchTerm=  $request->searchTerm;
         $data = Product::where('product_name', 'like', '%' . $searchTerm . '%')
        ->orderBy($sortColumn, $sortDirection)
        ->paginate($perPage)->withQueryString();

        if(empty($searchTerm)){
            $data=Product::orderBy($sortColumn, $sortDirection) ->paginate($perPage)->withQueryString() ;
        };
        $data->appends([
            'sort_column' => $sortColumn,
            'sort_direction' => $sortDirection,
            'search' => $searchTerm
        ]);  
        return view('Home.Store', compact('data', 'sortColumn', 'sortDirection', 'searchTerm','category','brand'));
    }

    public function Get_Product_Sorting(Request $request)
    {
        $category = $this->category::all();
        $brand =$this->brand::all();
        $perPage = $request->show ?? 3; // Số lượng bản ghi trên mỗi trang
        $sortBy = $request->sortby ?? 'latest';
        $search=$request->search??'';

        $data=Product::where('product_name', 'like', '%' . $search . '%');

        switch($sortBy){
            case 'latest':
                 $data=$data->orderByDesc('id');
            break;
            case 'oldest':
                $data=$data->orderBy('id');
           break;
            case 'name-ascending':
                 $data=$data->orderBy('product_name');
            break;
            case 'name-descending':
                 $data=$data->orderByDesc('product_name');
            break;
            case 'price-ascending':
                 $data=$data->orderBy('price');
            break;
            case 'price-descending':
                 $data=$data->orderByDesc('price');
            break;
            default:
                  $data=$data->orderBy('id');
        }
        $data =$this->filter($data,$request);

        $data= $data->paginate($perPage);
        

        $data->appends(['sort-by'=>$sortBy,'show'=>$perPage]);

        return view('Home.Store', compact('data', 'perPage','sortBy','category','brand','search'));
    }

    public function Get_Product_By_Category(Request $request, string $id)
    {
        $category = $this->category::all();
        $brand =$this->brand::all();
        $perPage = $request->show ?? 3; // Số lượng bản ghi trên mỗi trang
        $sortBy = $request->sortby ?? 'latest';
       
        $data = Product::where('category_id', '=' ,$id);
        switch($sortBy){
            case 'latest':
                 $data=$data->orderBy('id');
            break;
            case 'oldest':
                $data=$data->orderByDesc('id');
           break;
            case 'name-ascending':
                 $data=$data->orderBy('product_name');
            break;
            case 'name-descending':
                 $data=$data->orderByDesc('product_name');
            break;
            case 'price-ascending':
                 $data=$data->orderBy('price');
            break;
            case 'price-descending':
                 $data=$data->orderByDesc('price');
            break;
            default:
                  $data=$data->orderBy('id');
        }
        $data =$this->filter($data,$request);

        $data= $data->paginate($perPage);
        

        $data->appends(['sort-by'=>$sortBy,'show'=>$perPage]);

        return view('Home.Store', compact('data', 'perPage','sortBy','category','brand'));
    }

    public function filter($data, Request $request ){
        $brand = $request->brand??[];
        $brand_ids = array_keys($brand);
        $data = $brand_ids != null ? $data->whereIn('id',$brand_ids) : $data;
        return $data;

    }


}
