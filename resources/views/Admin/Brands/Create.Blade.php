@extends('Admin/Layout/Admin')

@section('content')


<div class="main-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header" style="margin-top: 15px;">
                    @if (Session::has('msg'))
                    <div class="alert alert-success">
                        {{Session::get('msg')}}
                    </div>
                @endif
                    <div class="row">
                        <div class="col-md-6 ">
                            <h5>Thêm thương hiệu</h5>
                            <a href="{{route('Admin.Brands.List')}}">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('Admin.Brands.Store')}}" method="post" enctype="multipart/form-data">

                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Tên thương hiệu</strong>
                                <input type="text" name="name" class="form-control">
                            </div>
                          

                            <div class="form-group">
                                <strong>Ảnh</strong>
                                <input type="file" class="form-control" name="image">
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