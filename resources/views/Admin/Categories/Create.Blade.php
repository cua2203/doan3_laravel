@extends('Admin/Layout/Admin')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header" style="margin-top: 15px;">
                    <div class="row">
                        <div class="col-md-6 ">
                            <h5>Thêm loại sản phẩm</h5>
                            <a href="{{route('Admin.Categories.List')}}">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('Admin.Categories.Store')}}" method="post">

                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Tên loại sản phẩm</strong>
                                <input type="text" name="category_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <strong>Mô tả</strong>
                                <textarea  name="description" id="noidung"class="ckeditor form-control" ></textarea>
                            </div>

                        </div>
                    
                        @csrf
                        <button type="submit" class="btn btn-success mt-2">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection