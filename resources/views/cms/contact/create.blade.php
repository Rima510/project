
@extends('cms.parent')
@section('title','category create')
@section('page-big-title','category')
@section('page-main-title','categories')
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
            <h3 class="card-title">Category Create</h3>
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
            <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="card-body">
              <div class="form-group">
                <label for="name">name </label>
                <input type="text" class="form-control" name="name"  placeholder="Enter name">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
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
