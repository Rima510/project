
@extends('cms.parent')
@section('title','subcategory create')
@section('page-big-title','subcategory')
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
            <h3 class="card-title">Subcategory Create</h3>
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
            <form action="{{ route('subcategories.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Category </label>
                    <select class="form-control" name="category_id">
                        <option value="">select the cotegory</option>
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
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
@section('scripts')
<script>
function store() {
    axios.post('/admin/subcategories',{
        name:document.getElementById('name').value,
        category_id:document.getElementById('category_id').value,
        description:document.getElementById('description').value,
        status:document.getElementById('status').checked,
    }).then(function (response) {
            // handle success
            console.log(response);
            document.getElementById('create-form').reset();
            toastr.success(response.data.message);
            window.location.href = '/admin/subcategories/create';
        }).catch(function (error) {
            // handle error
            console.log(error);
            toastr.error(error.response.data.message);
        })

}
</script>
@endsection
