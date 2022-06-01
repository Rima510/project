
@extends('cms.parent')
@section('title','Products edit')
@section('page-big-title','Products')
@section('page-main-title','Products')
@section('page-sub-title','edit')
@section('styles')

@endsection
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Products Edit</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="create-form">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Category </label>
                    <select class="form-control" name="" id="category_id">
                        <option value="">select the cotegory</option>
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}" {{ $product->subcategory_id == $category->id ? 'selected' :''  }}>{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Subcategory </label>
                    <select class="form-control" name="" id="subcategory_id">
                        <option value="">select the subcotegory</option>
                        @foreach ($subcategories as $subcategory )
                        <option value="{{ $subcategory->id }}" {{ $product->subcategory_id ==$subcategory->id ? 'selected' :'' }}>{{ $subcategory->name }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                <label for="name">name </label>
                <input type="text" class="form-control" id="name" value="{{ $product->name }}"  placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="name">Price </label>
                <input type="text" class="form-control" id="name" value="{{ $product->price }}"  placeholder="Enter name">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" id="description" rows="3" placeholder="Enter ...">{{ $product->description }}</textarea>
              </div>

              <div class="form-group">
                <label>image</label>
                <input type="file" id="img" class="form-control image" >
              </div>

              <div class="form-group">
                <img src="{{url(Storage::url($product->img))}}" style="width: 100px" class="img-thumbnail image-preview" alt="">
            </div>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="status">
                    <label class="custom-control-label" for="status">Visible</label>
                </div>
            </div>

            <div class="card-footer">
              {{--  <button type="button" onclick="store()" class="btn btn-primary">Submit</button>  --}}

              <a href="#" onclick="performEdit()"  class="btn btn-info">submit</i></a>

            </div>
          </form>
        </div>
       </div>
      </div>
    </div>
 </div>
</section>

@endsection

