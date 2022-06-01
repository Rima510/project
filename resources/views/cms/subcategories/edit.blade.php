
@extends('cms.parent')
@section('title','subcategory edit')
@section('page-big-title','subcategory')
@section('page-main-title','categories')
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
            <h3 class="card-title">Edit Subcategory</h3>
          </div>
          <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('subcategories.update' ,$subcategory->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category </label>
                        <select class="form-control" name="category_id">
                            <option value="">select the cotegory</option>
                            @foreach ($categories as $category )
                            <option value="{{ $category->id }}" {{ $subcategory->id == $category->id ? 'selected' :'' }} >{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>
                <div class="form-group">
                    <label for="name">name </label>
                    <input type="text" class="form-control" name="name" value="{{ $subcategory->name }}"  placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Enter ...">{{ $subcategory->description }}</textarea>
                </div>


                <div class="card-footer">
                <button type="submit"   class="btn btn-primary">Submit</button>

                </div>
            </form>
        </div>
       </div>
      </div>
    </div>
   </div>
</section>

@endsection
