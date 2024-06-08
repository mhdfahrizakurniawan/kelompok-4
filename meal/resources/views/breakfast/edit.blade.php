@extends('layout.master')

@section('title')
Edit Data Breakfast
@endsection

@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Edit Data Breakfast</h3>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('breakfast.update', $breakfast->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" value="{{ $breakfast->nama }}" required>
      </div>

      <div class="form-group">
        <label for="descripsi">Deskripsi</label>
        <textarea name="descripsi" class="form-control" id="descripsi" required>{{ $breakfast->descripsi }}</textarea>
      </div>

      <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" name="harga" class="form-control" id="harga" value="{{ $breakfast->harga }}" required>
      </div>

      <div class="form-group">
        <label for="meal_id">Menu</label>
        <select name="meal_id" class="form-control" id="meal_id" required>
          @foreach($meals as $meal)
            <option value="{{ $meal->id }}" {{ $meal->id == $breakfast->meal_id ? 'selected' : '' }}>{{ $meal->type_name }}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('breakfast.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>

@endsection
