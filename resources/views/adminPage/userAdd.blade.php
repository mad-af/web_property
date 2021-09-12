@extends('adminPage/_layout')

@section('content')
  <h2 class="col h2 mb-4 text-gray-800 font-weight-bold">Membuat Properti</h2>

  <form action="">
    <!-- INFO PENTING PROPERTI -->
    <div class="card mb-3">
      <div class="card-header">
        Info Penting Properti
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Nama Depan</label>
            <input type="text" class="form-control" placeholder="Masukan nama depan" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Harga Belakang</label>
            <input type="text" class="form-control" placeholder="Masukan nama belakang" required>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-9 mb-3">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Masukan email" required>
          </div>
          <div class="col-md-3 mb-3">
            <label>Peran</label>
            <select class="custom-select" required>
              <option value="" selected disabled hidden>Pilih peran</option>
              <option value="ruko">Ruko</option>
              <option value="rumah">Rumah</option>
              <option value="tanah">Tanah</option>
            </select>
          </div>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" placeholder="Masukan username" required>
        </div>

      </div>
    </div>

    <div class="col">
      <button type="submit" class="float-right btn btn-primary mb-3">Buat Properti</button>
    </div>
  </form>

@endsection