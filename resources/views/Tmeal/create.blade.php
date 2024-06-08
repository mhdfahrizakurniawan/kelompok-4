@extends('layout.master')
@section('titel')
Halaman tambah 
@endsection

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Mealtype</h3>
              </div>
              <form action='/Tmeal' method='POST'>
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>nama</label>
                    <input name='type_name' type="text" class="form-control" placeholder="isi nama mealtype">
                  </div>
                </div>
                @error('type_name')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="zmdi zmdi-block-alt"></i> pemberitahuan!</h5>
                    {{ $message }}
                </div>
                @enderror
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection