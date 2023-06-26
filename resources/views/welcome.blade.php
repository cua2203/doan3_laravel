@extends('Admin/Layout/Admin')
 

@section('content')

    

    <div class="main-content">
        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
         @endif
         
         <div class="row">

            <h3>Đây là trang quản trị</h3>
                           
         </div>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header" style="margin-top: 15px;">
                        <div class="row">
                        </div>
                    </div>
                    <div class="card-body">
                       
                        <table   class="table   " >
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th style="width: 20%">Tên sản phẩm</th>
                                    <th>Giá bán</th>
                                    <th>Ảnh</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topProducts as $key =>$item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->product_name}}</td>
                                    <td>{{number_format($item->price)}}đ</td>
                                    <td><img style="width:160px" src="{{ URL::to('uploads/Product/'.$item->image_url) }}"></td>
                                    <td>{{$item->total_quantity}}</td>
                                </tr>
                                @endforeach
                            </tbody>
    
                        </table>
                    </div>
                </div>
            </div>
            <div class="cpl-md-6 col-lg-6">
                <form action="{{route('HotSale')}}">
                    <select name="month" onchange="this.form.submit()">
                        <option {{request('month')=='1'?'selected':''}}  value="1">1</option>
                        <option {{request('month')=='2'?'selected':''}} value="2">2</option>
                        <option {{request('month')=='3'?'selected':''}} value="3">3</option>
                        <option {{request('month')=='4'?'selected':''}} value="4">4</option>
                        <option {{request('month')=='5'?'selected':''}} value="5">5</option>
                        <option {{request('month')=='6'?'selected':''}} value="6">6</option>
                        <option {{request('month')=='7'?'selected':''}} value="7">7</option>
                        <option {{request('month')=='8'?'selected':''}} value="8">8</option>
                    </select>
                    <input type="text" name="year" onchange="this.form.submit()" value="{{ request('year') ? request('year') : '2023'}}">
                    <label>Doanh thu : {{number_format($newgfhsf)}}đ</label>
                </form>
                

            </div>
        </div>
    </div>

@endsection