


@extends('Admin/Layout/Admin')

@section('content')

<div class="main-content">
    @if(session()->has('msg'))
        <div class="alert alert-success" >
            {{ session()->get('msg') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header" style="margin-top: 15px;">
                    <div class="row">
                        <div class="col-md-6 ">
                            <h3>Danh sách đơn hàng</h3>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body">
                   
                    <table  id="table" class="table table-striped table-bordered " style="overflow-y:scroll ,width:100%,cellspacing:0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Phương thức thanh toán</th>
                                <th>Trạng thái</th>
                               
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $key =>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->Name}}</td>
                                <td>{{$item->Address}}</td>
                                <td>{{$item->Email}}</td>
                                <td>{{$item->Mobile}}</td>
                                <td>{{$item->PaymentMethod}}</td>
                                <td>{{$item->Status}}</td>
                          
                                <td>
                                    <a href="{{route('OrderDetail').'/'.$item->id}}" class="btn btn-primary">Chi tiết</a>
                                    <a  class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection