@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Create a new product</h1>

                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Product name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="featured">Product image</label>
                            <input type="file"  class="form-control-file" name="featured">
                        </div>
                        <div class="form-group">
                            <label for="title">Product price</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                        <div class="form-group">
                            <label for="title">Product description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        
                        
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection