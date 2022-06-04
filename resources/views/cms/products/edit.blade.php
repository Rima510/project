
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
          @if ($errors->any())
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
         @endif
          <form action="{{ route('products.update' ,$product->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Category </label>
                    <select class="form-control" name="subcategory_id">
                        <option value="">select the subcotegory</option>
                        @foreach ($subcategories as $subcategory )
                        <option value="{{ $subcategory->id }}" >{{ $subcategory->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                <label for="name">name </label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}"  placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="name">Price </label>
                <input type="text" class="form-control" name="price" value="{{ $product->price }}"  placeholder="Enter name">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Enter ...">{{ $product->description }}</textarea>
              </div>

              <div class="form-group">
                <label>image</label>
                <input type="file" name="image" class="form-control image" >
              </div>




            <div class="card-footer">
                <button type="submit"  class="btn btn-primary">Submit</button>


            </div>
          </form>
        </div>
       </div>
      </div>
    </div>
 </div>
</section>

@endsection

