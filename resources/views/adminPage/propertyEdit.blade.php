@extends('adminPage/_layout')

@section('content')
  <h2 class="col h2 mb-4 text-gray-800 font-weight-bold">Detail Properti</h2>

  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Gagal</strong> - {{ $errors->first() }}
  </div>
  @endif

  <form action="{{url('/admin/property/add')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- GAMBAR PROPERTI -->
    <div class="card mb-3">
      <div class="card-header">
        Gambar Properti
      </div>
      <div class="card-body">
        <div class="custom-file">
          <input name="image" type="file" class="custom-file-input" id="customFile" required >
          <label class="custom-file-label" for="customFile">Upload foto properti</label>
        </div>
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
            <input name="title" value="{{ $data['title'] }}" type="text" class="form-control" placeholder="Nama atau judul properti" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Harga Properti</label>
            <input name="price" value="{{ $data['price'] }}" type="number" class="form-control" placeholder="Masukan harga (Rupiah)" required>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Alamat</label>
            <input name="address" value="{{ $data['address'] }}" type="text" class="form-control" placeholder="Masukan alamat" required>
          </div>
          <div class="col-md-3 mb-3">
            <label>Status</label>
            <select name="status" class="custom-select" required>
              <option value="" selected disabled hidden>Pilih status</option>
              @for ($i = 0; $i < count($homeStatus); $i++)
                @if ($data['status'] == $i) 
                <option selected value="{{ $i }}">{{ $homeStatus[$i] }}</option>
                @else 
                <option value="{{ $i }}">{{ $homeStatus[$i] }}</option>
                @endif
              @endfor
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label>Kategori</label>
            <select name="category" class="custom-select" required>
              <option value="" selected disabled hidden>Pilih kategori</option>
              @for ($i = 0; $i < count($homeCategory); $i++)
                @if ($data['category'] == $i) 
                <option selected value="{{ $i }}">{{ $homeCategory[$i] }}</option>
                @else 
                <option value="{{ $i }}">{{ $homeCategory[$i] }}</option>
                @endif
              @endfor
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
            <select name="bedRoom" class="custom-select" required>
              <option value="" selected disabled hidden>Pilih jumlah kamar tidur</option>
              @for ($i = 0; $i < count($bedRoom); $i++)
                @if ($data['bedRoom'] == $i) 
                <option selected value="{{ $i }}">{{ $bedRoom[$i] }}</option>
                @else 
                <option value="{{ $i }}">{{ $bedRoom[$i] }}</option>
                @endif
              @endfor
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label>Pemanas</label>
            <select name="heating" class="custom-select" required>
              <option value="" selected disabled hidden>Pilih jumlah pemanas</option>
              @for ($i = 0; $i < count($heating); $i++)
                @if ($data['heating'] == $i) 
                <option selected value="{{ $i }}">{{ $heating[$i] }}</option>
                @else 
                <option value="{{ $i }}">{{ $heating[$i] }}</option>
                @endif
              @endfor
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Kamar Mandi</label>
            <select name="bathRoom" class="custom-select" required>
              <option value="" selected disabled hidden>Pilih jumlah kamar mandi</option>
              @for ($i = 0; $i < count($bathRoom); $i++)
                @if ($data['bathRoom'] == $i) 
                <option selected value="{{ $i }}">{{ $bathRoom[$i] }}</option>
                @else 
                <option value="{{ $i }}">{{ $bathRoom[$i] }}</option>
                @endif
              @endfor
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label>Ukuran Panjang</label>
            <input name="length" value="{{ $data['length'] }}" type="number" class="form-control" placeholder="Masukan ukuran panjang (meter)" required>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Tempat Parkir</label>
            <select name="parkingLot" class="custom-select" required>
              <option value="" selected disabled hidden>Pilih jumlah parkir</option>
              @for ($i = 0; $i < count($parkingLot); $i++)
                @if ($data['parkingLot'] == $i) 
                <option selected value="{{ $i }}">{{ $parkingLot[$i] }}</option>
                @else 
                <option value="{{ $i }}">{{ $parkingLot[$i] }}</option>
                @endif
              @endfor
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label>Ukuran Panjang</label>
            <input name="width" value="{{ $data['width'] }}" type="number" class="form-control" placeholder="Masukan ukuran lebar (meter)" required>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Deskripsi Properti</label>
          <textarea name="description" class="form-control" placeholder="Deskripsikan properti anda" id="exampleFormControlTextarea1" rows="3" required>{{ $data['description'] }}</textarea>
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
            <select name="subSalaryId" class="custom-select" required>
              <option value="" selected disabled hidden>Pilih gaji per bulan</option>
              @foreach ($salary as $item)
                @if ($data['subSalaryId'] == $item['id']) 
                <option selected value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @else 
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label>Tipe Rumah</label>
            <select name="subHomeFurnitureId" class="custom-select" required>
              <option value="" selected disabled hidden>Pilih Perabotan Rumah</option>
              @foreach ($houseType as $item)
                @if ($data['subHomeFurnitureId'] == $item['id']) 
                <option selected value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @else 
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endif
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Anggota Keluarga</label>
            <select name="subFamilyMemberId" class="custom-select" required>
              <option value="" selected disabled hidden>Pilih jumlah Anggota Keluarga</option>
              @foreach ($familyMember as $item)
                @if ($data['subFamilyMemberId'] == $item['id']) 
                <option selected value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @else 
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endif
              @endforeach
            </select>
          </div>
        </div>

      </div>
    </div>

    <div class="col">
      <button type="submit" class="float-right btn btn-primary mb-3">Update Properti</button>
    </div>
  </form>

@endsection