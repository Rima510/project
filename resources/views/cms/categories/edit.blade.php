
@extends('cms.parent')
@section('title','category edit')
@section('page-big-title','category')
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
            <h3 class="card-title">Category Edit</h3>
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
            <form action="{{ route('categories.update' ,$category->id)}}" method="POST">
            @csrf
            @method('PUT')

                <div class="card-body">
                <div class="form-group">
                    <label for="name">name </label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}"  placeholder="Enter name">
                </div>

                <div class="card-footer">
                   <button type="submit"  class="btn btn-primary">update</button>



                </div>
            </form>
        </div>
       </div>
      </div>
    </div>
   </div>
</section>

@endsection
@section('scripts')
<script>
function update(id) {
    axios.put('/admin/categories/'+id,{
        name:document.getElementById('name').value,
        description:document.getElementById('description').value,
        status:document.getElementById('status').checked,
    }).then(function (response) {
            // handle success
            console.log(response);
           window.location.href ='/admin/categories';
            toastr.success(response.data.message);
        }).catch(function (error) {
            // handle error
            console.log(error);
            toastr.error(error.response.data.message);
        })

}
</script>
@endsection
