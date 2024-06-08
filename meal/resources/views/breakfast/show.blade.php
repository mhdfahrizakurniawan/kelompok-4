@extends('layout.master')

@section('title')
Detail Breakfast
@endsection

@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Detail Breakfast</h3>
  </div>
  <div class="card-body">
    <div class="form-group">
      <label for="nama">Nama:</label>
      <p>{{ $breakfast->nama }}</p>
    </div>

    <div class="form-group">
      <label for="descripsi">Deskripsi:</label>
      <p>{{ $breakfast->descripsi }}</p>
    </div>

    <div class="form-group">
      <label for="harga">Harga:</label>
      <p>{{ $breakfast->harga }}</p>
    </div>

    <div class="form-group">
      <label for="meal_id">Menu:</label>
      <p>{{ $breakfast->meal->type_name }}</p>
    </div>

    <a href="{{ route('breakfast.index') }}" class="btn btn-secondary">Kembali</a>
  </div>
</div>

@endsection
