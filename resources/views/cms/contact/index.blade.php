@extends('cms.parent')
@section('title', 'Contact-us')
@section('page-big-title','contact-us')
@section('page-main-title','Contact-us')
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
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Created At</th>

        </tr>
      </thead>
      <tbody>
          @foreach ($contacts as $contact )
      <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ @$contact->name }}</td>
          <td>{{ $contact->email }}</td>
          <td>{{ $contact->subject }}</td>
          <td>{{ $contact->message }}</td>


          <td>{{ $contact->created_at }}</td>

          <!-- <td>
              <a href="{{ route('categories.edit',$contact->id) }}" class="btn btn-info"> <i class="fas fa-edit"> </i></a>
              <a href="{{ route('categories.delete',$contact->id )}}"  class="btn btn-danger"><i class="fas fa-trash"></i></a>
          </td> -->
      </tr>
          @endforeach


      </tbody>
    </table>
  </div>
@endsection
@section('scripts')
  <script>
      function confirmDestroy(id, reference){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                destroy(id, reference);

            }
          });
      }
      function destroy(id, reference) {
        //JS axios
        axios.delete('/admin/categories/'+id)
            .then(function (response) {
            // handle success
            console.log(response);
            reference.closest('tr').remove();
            showMessage(response.data);
            })
            .catch(function (error) {
            // handle error
            console.log(error);
            showMessage(error.response.data);
            })
      }
      function showMessage(data) {
        Swal.fire({
            icon: data.icon,
            title: data.title,
            showConfirmButton: false,
            timer: 1500
          });
      }
  </script>
@endsection
