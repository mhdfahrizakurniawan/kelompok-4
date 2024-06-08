@extends('layout.master')

@section('title')
Detail Dinner
@endsection

@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Detail Dinner</h3>
  </div>
  <div class="card-body">
    <div class="form-group">
      <label for="nama">Nama:</label>
      <p>{{ $dinner->nama }}</p>
    </div>

    <div class="form-group">
      <label for="descripsi">Deskripsi:</label>
      <p>{{ $dinner->descripsi }}</p>
    </div>

    <div class="form-group">
      <label for="harga">Harga:</label>
      <p>{{ $dinner->harga }}</p>
    </div>

    <div class="form-group">
      <label for="meal_id">Menu:</label>
      <p>{{ $dinner->meal->type_name }}</p>
    </div>

    <a href="{{ route('dinner.index') }}" class="btn btn-secondary">Kembali</a>
  </div>
</div>

@endsection
