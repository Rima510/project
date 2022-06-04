
@extends('cms.parent')
@section('title','Socila Media create')
@section('page-big-title','Setting')
@section('page-main-title',' ')
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
            <h3 class="card-title">Socail Media Setting</h3>
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
            <form action="{{ route('social-store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Facebook </label>
                    <input type="text" class="form-control" name="facebook"  placeholder="Enter Link">
                  </div>
                  <div class="form-group">
                    <label for="name">Twitter </label>
                    <input type="text" class="form-control" name="twitter"  placeholder="Enter Link">
                  </div>
                  <div class="form-group">
                    <label for="name">Linked in </label>
                    <input type="text" class="form-control" name="linkedin"  placeholder="Enter Link">
                  </div>
                  <div class="form-group">
                    <label for="name">Whatsapp </label>
                    <input type="text" class="form-control" name="whatsapp"  placeholder="Enter Number ">
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
