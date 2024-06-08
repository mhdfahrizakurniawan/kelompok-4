@extends('layout.master')

@section('title')
Halaman Dinner
@endsection

@section('content')

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
@endpush

@push('scripts')
<script src="{{ asset('/Template/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/Template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(function () {
        $("#example1").DataTable();
    });
</script>
@endpush

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h3 class="card-title">Tabel Data Dinner</h3>
  </div>
  <div class="card-body">
    <div class="new" style="margin-bottom:5px">
      <a href="{{ route('dinner.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <table class="table table-bordered" id="example1">
      <thead style="text-align: center">
        <tr>
          <th style="width: 10px">No</th>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th>Harga</th>
          <th>Menu</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @if($dinner->isEmpty())
            <tr>
                <td colspan="6" class="text-center">No Dinner data found.</td>
            </tr>
        @else
            @foreach($dinner as $key => $dinner)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $dinner->nama }}</td>
                    <td>{{ $dinner->descripsi }}</td>
                    <td>{{ $dinner->harga }}</td>
                    <td>{{ $dinner->meal ? $dinner->meal->type_name : 'No meal associated' }}</td>
                    <td class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('dinner.show', $dinner->id) }}" class="btn btn-primary btn-sm" style="margin-right: 20px">Show</a>
                        <a href="{{ route('dinner.edit', $dinner->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <form action="{{ route('dinner.destroy', $dinner->id) }}" method="POST" style="margin-left: 20px">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div>

@endsection
