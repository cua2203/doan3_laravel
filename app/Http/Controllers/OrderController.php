<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function __construct( )
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $order = Order::all();
        return view('Admin.Order.List',['order'=> $order]);
    }

    public function Detail($id)
    {
        $order = Order::find($id);
       
        $detail = OrderDetail::where('order_id',$id)->get();
        
        $total=0;
        foreach($detail as $item ){
            $total += $item->product->price * $item->quantity;
                
        }
      
        return view('Admin.Order.Detail',['order'=> $order,'detail'=>$detail,'total'=>$total]);
    }

    public function Update($id,Request $request)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();

        return redirect()-> route('ListOrder');
    }

    public function HotSale(Request $request){

            $month = $request->month ?? 5;
            $year = $request->year ?? 2023;

            $topProducts = DB::table('order_details')
            ->select('order_details.product_id', 'products.product_name','products.price','products.image_url', DB::raw('SUM(order_details.quantity) as total_quantity'))
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->groupBy('order_details.product_id', 'products.product_name','products.price','products.image_url')
            ->orderBy('total_quantity', 'desc')
            ->limit(5)
            ->get();

            $newgfhsf = Order::getRevenueByDate($month,$year);
         
            return view('welcome',['topProducts'=> $topProducts,'newgfhsf'=>$newgfhsf]);

    }


}
