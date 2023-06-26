


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
                            <h3>Danh sách sản phẩm</h3>
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{route('Admin.Products.Create')}}" class="btn btn-primary" style="float: right;">Thêm mới</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                   
                    <table  id="table" class="table table-striped table-bordered " style="overflow-y:scroll ,width:100%,cellspacing:0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th style="width: 20%">Tên sản phẩm</th>
                                <th>Giá bán</th>
                                <th>Ảnh</th>
                                <th>Loại sản phẩm</th>
                                <th>Thương hiệu</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key =>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->product_name}}</td>
                                <td>{{number_format($item->price)}}đ</td>
                                <td><img style="width:160px" src="{{ URL::to('uploads/Product/'.$item->image_url) }}"></td>
                               
                                <td>{{$item->category->category_name}}</td>
                                <td>{{$item->brand->brand_name}}</td>
                                <td>
                                    <a href="{{route('Admin.Products.Edit').'/'.$item->id}}" class="btn btn-primary">Sửa</a>
                                    <a href="{{route('Admin.Products.Delete').'/'.$item->id}}" class="btn btn-danger">Xóa</a>
            
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