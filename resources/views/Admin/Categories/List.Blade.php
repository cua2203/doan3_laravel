


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
                            <h3>Danh sách loại sản phẩm</h3>
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{route('Admin.Categories.Create')}}" class="btn btn-primary" style="float: right;">Thêm mới</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                   
                    <table  id="table" class="table table-striped table-bordered " style="overflow-y:scroll ,width:100%,cellspacing:0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên loại sản phẩm</th>
                               
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key =>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->category_name}}</td>
                          
                                <td>
                                    <a href="{{route('Admin.Categories.Edit').'/'.$item->id}}" class="btn btn-primary">Sửa</a>
                                    <a href="{{route('Admin.Categories.Delete').'/'.$item->id}}" class="btn btn-danger">Xóa</a>
                               
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