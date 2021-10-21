@extends('adminPage/_layout')

@section('content')
  <h2 class="col h2 mb-4 text-gray-800 font-weight-bold">Detail Properti</h2>

  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Gagal</strong> - {{ $errors->first() }}
  </div>
  @endif

  <div class="row col justify-content-end">
    <a href="{{url('admin/property/'.$data['id'].'?edit=true')}}" class="float-right ml-2 btn btn-primary mb-3">Edit Properti</a>
    <form action="{{url('/admin/property/'.$data['id'].'/delete')}}" method="POST">
      @method('DELETE')
      @csrf
      <button type="submit" class="nav-link ml-2 btn btn-outline-danger">
        <span>Delete Properti</span>
      </button>
    </form>
  </div>

  <form action="{{url('/admin/property/add')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- GAMBAR PROPERTI -->
    <div class="card mb-3">
      <div class="card-header">
        Gambar Properti
      </div>
      <div class="card-body">
        <img src="{{ asset($data['image']) }}" class="rounded mt-3" height="100em" width="120em" alt="image-property">
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
            <input name="title" value="{{ $data['title'] }}" type="text" class="form-control" placeholder="Nama atau judul properti" required readonly>
          </div>
          <div class="col-md-6 mb-3">
            <label>Harga Properti</label>
            <input name="price" value="{{ $data['price'] }}" type="number" class="form-control" placeholder="Masukan harga (Rupiah)" required readonly>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Alamat</label>
            <input name="address" value="{{ $data['address'] }}" type="text" class="form-control" placeholder="Masukan alamat" required readonly>
          </div>
          <div class="col-md-3 mb-3">
            <label>Status</label>
            @for ($i = 0; $i < count($homeStatus); $i++)
              @if ($data['status'] == $i) 
              <input  value="{{ $homeStatus[$i] }}" type="text" class="form-control" readonly>
              @endif
            @endfor
            
          </div>
          <div class="col-md-3 mb-3">
            <label>Kategori</label>
            @for ($i = 0; $i < count($homeCategory); $i++)
              @if ($data['category'] == $i) 
              <input value="{{ $homeCategory[$i] }}" type="text" class="form-control" readonly>
              @endif
            @endfor
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
            @for ($i = 0; $i < count($bedRoom); $i++)
              @if ($data['bedRoom'] == $i) 
              <input value="{{ $bedRoom[$i] }}" type="text" class="form-control" readonly>
              @endif
            @endfor
          </div>
          <div class="col-md-6 mb-3">
            <label>Pemanas</label>
            @for ($i = 0; $i < count($heating); $i++)
              @if ($data['heating'] == $i) 
              <input value="{{ $heating[$i] }}" type="text" class="form-control" readonly>
              @endif
            @endfor
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Kamar Mandi</label>
            @for ($i = 0; $i < count($bathRoom); $i++)
              @if ($data['bathRoom'] == $i) 
              <input value="{{ $bathRoom[$i] }}" type="text" class="form-control" readonly>
              @endif
            @endfor
          </div>
          <div class="col-md-6 mb-3">
            <label>Ukuran Panjang</label>
            <input name="length" value="{{ $data['length'] }}" type="number" class="form-control" placeholder="Masukan ukuran panjang (meter)" required readonly>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Tempat Parkir</label>
            @for ($i = 0; $i < count($parkingLot); $i++)
              @if ($data['parkingLot'] == $i) 
              <input value="{{ $parkingLot[$i] }}" type="text" class="form-control" readonly>
              @endif
            @endfor
          </div>
          <div class="col-md-6 mb-3">
            <label>Ukuran Lebar</label>
            <input name="width" value="{{ $data['width'] }}" type="number" class="form-control" placeholder="Masukan ukuran lebar (meter)" required readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Deskripsi Properti</label>
          <textarea name="description" class="form-control" placeholder="Deskripsikan properti anda" id="exampleFormControlTextarea1" rows="3" required readonly>{{ $data['description'] }}</textarea>
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
            @foreach ($salary as $item)
              @if ($data['subSalaryId'] == $item['id']) 
              <input value="{{ $item['name'] }}" type="text" class="form-control" readonly>
              @endif
            @endforeach
          </div>
          <div class="col-md-6 mb-3">
            <label>Tipe Rumah</label>
            @foreach ($houseType as $item)
              @if ($data['subHomeFurnitureId'] == $item['id']) 
              <input value="{{ $item['name'] }}" type="text" class="form-control" readonly>
              @endif
            @endforeach
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Anggota Keluarga</label>
            @foreach ($familyMember as $item)
              @if ($data['subFamilyMemberId'] == $item['id']) 
              <input value="{{ $item['name'] }}" type="text" class="form-control" readonly>
              @endif
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </form>

@endsection