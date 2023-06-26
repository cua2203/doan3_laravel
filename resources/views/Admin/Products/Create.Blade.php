@extends('Admin/Layout/Admin')

@section('content')


<div class="main-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header" style="margin-top: 15px;">
                    <div class="row">
                        <div class="col-md-6 ">
                            <h5>Thêm sản phẩm</h5>
                            <a href="{{route('Admin.Products.List')}}">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('Admin.Products.Store')}}" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Tên sản phẩm</strong>
                                    <input type="text" name="name" class="form-control">
                                </div>
    
                                
    
                                <div class="form-group">
                                    <strong>Thương hiệu</strong>
                                    <select name="brand_id" class="form-control">
                                        @foreach ($brands as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="form-group">
                                    <strong>Thương hiệu</strong>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <strong>Mô tả</strong>
                                    <textarea  name="description" id="noidung"class="ckeditor form-control" ></textarea>
                                </div>

                                

                               

    
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Giá bán</strong>
                                    <input type="text" name="price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <strong>Ảnh</strong>
                                    <input type="file" class="form-control" name="image_url">
                                </div>
                               
                                <div class="form-group">
                                    <strong>Ram</strong>
                                    <input type="text" name="ram" class="form-control">
                                </div>

                                <div class="form-group">
                                    <strong>Bộ nhớ</strong>
                                    <input type="text" name="storage" class="form-control">
                                </div>

                                <div class="form-group">
                                    <strong>Dung lượng pin</strong>
                                    <input type="text" name="battery" class="form-control">
                                </div>

                                <div class="form-group">
                                    <strong>Cpu</strong>
                                    <input type="text" name="cpu" class="form-control">
                                </div>
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