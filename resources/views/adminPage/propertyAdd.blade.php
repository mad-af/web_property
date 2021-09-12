@extends('adminPage/_layout')

@section('content')
  <h2 class="col h2 mb-4 text-gray-800 font-weight-bold">Membuat Properti</h2>

  <form action="">
    <!-- GAMBAR PROPERTI -->
    <div class="card mb-3">
      <div class="card-header">
        Gambar Properti
      </div>
      <div class="card-body">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile" required>
          <label class="custom-file-label" for="customFile">Upload foto properti</label>
        </div>
      </div>
    </div>

    <!-- INFO PENTING PROPERTI -->
    <div class="card mb-3">
      <div class="card-header">
        Info Penting Properti
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Nama Properti</label>
            <input type="text" class="form-control" placeholder="Nama atau judul properti" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Harga Properti</label>
            <input type="text" class="form-control" placeholder="Masukan harga (Rupiah)" required>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Alamat</label>
            <input type="text" class="form-control" placeholder="Masukan alamat" required>
          </div>
          <div class="col-md-3 mb-3">
            <label>Status</label>
            <select class="custom-select" required>
              <option value="" selected disabled hidden>Pilih status</option>
              <option value="coba">Dijual</option>
              <option value="coba">Disewakan</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label>Status</label>
            <select class="custom-select" required>
              <option value="" selected disabled hidden>Pilih kategori</option>
              <option value="coba">Ruko</option>
              <option value="coba">Rumah</option>
              <option value="coba">Tanah</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <!-- SPESIFIKASI PROPERTI -->
    <div class="card mb-3">
      <div class="card-header">
        Spesifikasi Properti
      </div>
      <div class="card-body">
      <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Kamar Tidur</label>
            <select class="custom-select" required>
              <option value="" selected disabled hidden>Pilih jumlah kamar tidur</option>
              <option value="coba">Dijual</option>
              <option value="coba">Disewakan</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label>Pemanas</label>
            <select class="custom-select" required>
              <option value="" selected disabled hidden>Pilih jumlah pemanas</option>
              <option value="coba">Dijual</option>
              <option value="coba">Disewakan</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Kamar Mandi</label>
            <select class="custom-select" required>
              <option value="" selected disabled hidden>Pilih jumlah kamar mandi</option>
              <option value="coba">Dijual</option>
              <option value="coba">Disewakan</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label>Ukuran Panjang</label>
            <input type="text" class="form-control" placeholder="Masukan ukuran panjang (meter)" required>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Tempat Parkir</label>
            <select class="custom-select" required>
              <option value="" selected disabled hidden>Pilih jumlah parkir</option>
              <option value="coba">Dijual</option>
              <option value="coba">Disewakan</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label>Ukuran Panjang</label>
            <input type="text" class="form-control" placeholder="Masukan ukuran lebar (meter)" required>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Deskripsi Properti</label>
          <textarea class="form-control" placeholder="Deskripsikan properti anda" id="exampleFormControlTextarea1" rows="3" required></textarea>
        </div>

      </div>
    </div>

  
    <!-- KATEGORI PROPERTI -->
    <div class="card mb-3">
      <div class="card-header">
        Kategori Properti
      </div>
      <div class="card-body">
      <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Gaji</label>
            <select class="custom-select" required>
              <option value="" selected disabled hidden>Pilih gaji per bulan</option>
              <option value="coba">Dijual</option>
              <option value="coba">Disewakan</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label>Pemanas</label>
            <select class="custom-select" required>
              <option value="" selected disabled hidden>Pilih Perabotan Rumah</option>
              <option value="coba">Dijual</option>
              <option value="coba">Disewakan</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Kamar Mandi</label>
            <select class="custom-select" required>
              <option value="" selected disabled hidden>Pilih jumlah Anggota Keluarga</option>
              <option value="coba">Dijual</option>
              <option value="coba">Disewakan</option>
            </select>
          </div>
        </div>

      </div>
    </div>

    <div class="col">
      <button type="submit" class="float-right btn btn-primary mb-3">Buat Properti</button>
    </div>
  </form>

@endsection