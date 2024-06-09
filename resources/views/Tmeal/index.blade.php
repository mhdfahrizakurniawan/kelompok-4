@extends('layout.master')
@section('titel')
halaman MealType
@endsection

@section('content')

@push('scripts')
<script src="{{asset ('/Template/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset ('/Template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
  <script>
    $(function () {
        $("#example1").DataTable();
    });
  </script>
@endpush

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
@endpush
@section('content')

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h3 class="card-title">Tabel data Cast</h3>
    
  </div>
  <div class="card-body">
  
    <table class="table table-bordered" id="example1">
      <thead style="text-align: center">
        <tr>
          <th style="width: 10px">no</th>
          <th>nama</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody >
       @forelse($menu as $key=>$item)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$item->type_name}}</td>
          <td class="d-flex justify-content-center align-items-center">
            <a class="btn btn-primary btn-sm" style="margin-right: 20px" >
            show</a>
            <a href="/Tmeal/{{$item->id}}/edit" class="btn btn-info btn-sm">
            edit</a>
            <form action="{{ route('Tmeal.destroy', $item->id) }}" method="POST" style="margin-left: 20px">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                Delete
              </button>
            </form>
          </td>
          @empty
          <tr>
              <td colspan="3">No meal types found.</td>
          </tr>
        </tr>
        @endforelse
      </tbody>
    </table>
    @auth
        
    @endauth
  </div>
</div>

@endsection