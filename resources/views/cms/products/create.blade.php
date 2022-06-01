
@extends('cms.parent')
@section('title','Products create')
@section('page-big-title','Products')
@section('page-main-title','Products')
@section('page-sub-title','create')
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
            <h3 class="card-title">Products Create</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
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
          <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Subcategory </label>
                    <select class="form-control" name="category_id">
                        <option value="">select the Subcategory</option>
                        @foreach ($subcategories as $subcategory )
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                <label for="name">name </label>
                <input type="text" class="form-control" name="name"  placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for=" ">Prcie </label>
                <input type="text" class="form-control" name="price"  placeholder="Enter prcie">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
              </div>

              <div class="form-group">
                <label>image</label>
                <input type="file" name="image" class="form-control" >
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
