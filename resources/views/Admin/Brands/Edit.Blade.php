@extends('Admin/Layout/Admin')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header" style="margin-top: 15px;">
                    <div class="row">
                        <div class="col-md-6 ">
                            <h5>Sửa thương hiệu</h5>
                            <a href="{{route('Admin.Brands.List')}}">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('Admin.Brands.Update').'/'.$brand->id}}" method="post">

                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Tên thương hiệu</strong>
                                <input type="text" name="name" class="form-control" value="{{old('name') ?? $brand ->name}}">
                            </div>
                            <div class="form-group">
                                <strong>Ảnh</strong>
                                <input type="file" name="image" class="form-control" >
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