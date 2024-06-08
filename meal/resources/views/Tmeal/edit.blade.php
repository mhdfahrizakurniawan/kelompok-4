@extends('layout.master')

@section('titel')
Halaman Edit
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Meal Type</h3>
    </div>
    <form action="/Tmeal/{{$menu->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input name='type_name' type="text" class="form-control" value="{{ old('type_name', $menu->type_name) }}" placeholder="Isi nama mealtype">
            </div>
        </div>
        @error('type_name')
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="zmdi zmdi-block-alt"></i> Pemberitahuan!</h5>
            {{ $message }}
        </div>
        @enderror
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
