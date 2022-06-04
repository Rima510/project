@extends('cms.parent')
@section('title', 'Products')
@section('page-big-title','product')
@section('page-main-title','products')
@section('page-sub-title','index')
@section('styles')

@endsection
@section('content')
<div class="card-body table-responsive p-0" style="word-break: break-all" >
    <table class="table table-hover text-nowrap border">
      <thead>
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Category</th>
          <th>Subcategory</th>
          <th>Name</th>
          <th>Price</th>
           <th>Descripions</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($products as $product )
      <tr>
          <td>{{ $loop->iteration }}</td>


          <td>


                <img class="  img-bordered-sm"   src="{{ $product->image_path  }}" width="80" height="65" alt="User Image">


            </td>
            <td>{{$product->subcategory->category->name }}</td>
          <td>{{ $product->subcategory->name }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->price }}</td>
          <td>{{ $product->description }}</td>


          <td>{{ $product->created_at }}</td>
          <td>
            <form action="{{ route('products.delete',$product->id) }}" method="POST">



                <a href="{{ route('products.edit',$product->id) }}" class="btn btn-info"> <i class="fas fa-edit"> </i></a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
      </tr>
          @endforeach

      </tbody>
    </table>
       {{-- Pagination --}}
       <div class="d-flex justify-content-center">
        <div class="small">
        {!! $products->links() !!}
        </div>

    </div>

  </div>
@endsection
@section('scripts')

    <script>
        function productDestroy(id, reference) {
            confirmDestroy('/admin/products', id, reference);
        }
    </script>
@endsection
