@extends('layout.master')

@section('title')
Detail Lunch
@endsection

@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Detail Lunch</h3>
  </div>
  <div class="card-body">
    <div class="form-group">
      <label for="nama">Nama:</label>
      <p>{{ $lunch->nama }}</p>
    </div>

    <div class="form-group">
      <label for="descripsi">Deskripsi:</label>
      <p>{{ $lunch->descripsi }}</p>
    </div>

    <div class="form-group">
      <label for="harga">Harga:</label>
      <p>{{ $lunch->harga }}</p>
    </div>

    <div class="form-group">
      <label for="meal_id">Menu:</label>
      <p>{{ $lunch->meal->type_name }}</p>
    </div>

    <a href="{{ route('lunch.index') }}" class="btn btn-secondary">Kembali</a>
  </div>
</div>

@endsection
