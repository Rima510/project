@extends('cms.parent')
@section('title', 'Subcategories')
@section('page-big-title','subcategory')
@section('page-main-title','subcategories')
@section('page-sub-title','index')
@section('styles')

@endsection
@section('content')
<div class="card-body table-responsive p-0" style="word-break: break-all" >
    <table class="table table-hover text-nowrap border">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Category</th>
          <th>Descripions</th>

          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($subcategories as $subcategory )
      <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $subcategory->name }}</td>
          <td>{{ @$subcategory->category->name }}</td>
          <td>{{ $subcategory->description }}</td>


          <td>{{ $subcategory->created_at }}</td>
          <td>
                <form action="{{ route('subcategories.delete',$subcategory->id) }}" method="POST">



                <a href="{{ route('subcategories.edit',$subcategory->id) }}" class="btn btn-info"> <i class="fas fa-edit"> </i></a>


                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>

      </tr>
          @endforeach


      </tbody>
    </table>
  </div>
@endsection 
