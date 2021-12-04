@extends('adminPage/_layout')

@section('content')
  <h2 class="col h2 mb-4 text-gray-800 font-weight-bold">Properti Wilayah</h2>

  <div class="col">
    <a href="#" id="addWilayah" class="float-right btn btn-primary mb-3">Tambah Wilayah</a>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Wilayah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formWilayah" method="post">
            <div class="form-group">
              <label for="namaWilayah">Nama Wilayah</label>
              <input type="text" class="form-control" id="namaWilayah" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" form="formWilayah" class="btn btn-primary">Simpan Wilayah</button>
        </div>
      </div>
    </div>
  </div>

  <table class="table text-center" aria-describedby="list-property">
    <thead>
      <tr class="thead-dark">
        <th scope="col">Nomor</th>
        <th scope="col">Nama Wilayah</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($areaData as $item)
        <tr style="background: #fdfdfe;">
          <td>{{$number}}</td>
          <td>{{$item->name_area}}</td>
        </tr>   
      @endforeach
    </tbody>
  </table>
@endsection