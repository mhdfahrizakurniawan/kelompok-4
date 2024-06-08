@extends('layout.master')

@section('title')
Edit Data Lunch
@endsection

@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Edit Data Lunch</h3>
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

    <form action="{{ route('lunch.update', $lunch->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" value="{{ $lunch->nama }}" required>
      </div>

      <div class="form-group">
        <label for="descripsi">Deskripsi</label>
        <textarea name="descripsi" class="form-control" id="descripsi" required>{{ $lunch->descripsi }}</textarea>
      </div>

      <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" name="harga" class="form-control" id="harga" value="{{ $lunch->harga }}" required>
      </div>

      <div class="form-group">
        <label for="meal_id">Menu</label>
        <select name="meal_id" class="form-control" id="meal_id" required>
          @foreach($meals as $meal)
            <option value="{{ $meal->id }}" {{ $meal->id == $lunch->meal_id ? 'selected' : '' }}>{{ $meal->type_name }}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('lunch.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>

@endsection
