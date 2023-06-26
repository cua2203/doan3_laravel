<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Brand;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function viewCart(Request $request)
    {
        $total=0;
        $cart = $request->session()->get('cart', []);

        foreach($cart as $item){
            $total += $item['price'] * $item['quantity'];
        }
        $brand =Brand::all();
        
        // Lấy thông tin sản phẩm trong giỏ hàng
        return view('Home.Cart',['cart' => $cart,'total'=>$total,'brand'=>$brand]);

        
    }
    public function addToCart(Request $request,string $id)
    {
        $p=Product::find($id);
        // dd($p);
        $product = [
            'id' => $id,
            'name' => $p->product_name,
            'image'=>$p->image_url,
            'quantity' =>1,
            'price' => $p->price,
        ];

        $cart = $request->session()->get('cart', []); // Lấy giỏ hàng từ session

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($cart[$product['id']])) {
            // Nếu tồn tại, cập nhật số lượng
            $cart[$product['id']]['quantity'] += 1;
        } else {
            // Nếu chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
            $cart[$product['id']] = $product;
        }
        $request->session()->put('cart', $cart); // Lưu giỏ hàng mới vào session

        // session()->flash('msg', 'Thêm sản phẩm vào giỏ hàng thành công!');
        return redirect()-> route('Home');
    }

    public function removeItem(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $request->session()->put('cart', $cart); // Cập nhật giỏ hàng mới vào session

            // Thông báo thành công
            // session()->flash('msg', 'Đã xóa sản phẩm khỏi giỏ hàng !');
            return redirect()-> route('ViewCart');
        }

        // Sản phẩm không tồn tại trong giỏ hàng
        // session()->flash('msg', ' Sản phẩm không tồn tại trong giỏ hàng !');
        return redirect()-> route('ViewCart');
    }
    
    public function IncreaseQuantity(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
            $request->session()->put('cart', $cart); // Cập nhật giỏ hàng mới vào session
            return redirect()-> route('ViewCart');
    
            
        }
    }
    public function DecreaseQuantity(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);
    
        if (isset($cart[$id])) {
            if($cart[$id]['quantity']>1){
                $cart[$id]['quantity'] -= 1;

            }
            $request->session()->put('cart', $cart); // Cập nhật giỏ hàng mới vào session
            return redirect()-> route('ViewCart');
        }
    }

    public function PlayOrder(Request $request){
        $cart = $request->session()->get('cart', []);

        $order=new Order();
        $order->Name = $request->firstname . $request->lastname ;
        $order->Address = $request->address;
        $order->Mobile = $request->tel;
        $order->Email = $request->email;
        $order->PaymentMethod = $request->payment;
        $order->save();

        $order_latest = Order::latest()->first();
        $id_latest = $order_latest->id;
        foreach($cart as $item){
            $order_detail=new OrderDetail();
            $order_detail->order_id=$id_latest;
            $order_detail->product_id=$item['id'];
            $order_detail->quantity = $item['quantity'];
            $order_detail->save();
        }

        $request->session()->put('cart', []);
        return redirect()-> route('Home');
           

    }

  


}
