@extends('adminPage/_layout')

@section('content')
  <h2 class="col h2 mb-4 text-gray-800 font-weight-bold">Properti</h2>

  @if(session('success'))
  <div class="alert alert-success" role="alert">
    <strong>Sukses</strong> - {{ session('success') }}
  </div>
  @endif

  <div class="col">
    <a href="{{url('admin/property/add')}}" class="float-right btn btn-primary mb-3">Tambah Properti</a>
  </div>

  <div class="table-responsive">
    <table class="table text-center" aria-describedby="list-property">
      <thead>
        <tr class="thead-dark">
          <th scope="col">Image</th>
          <th scope="col">Judul</th>
          <th scope="col">Harga</th>
          <th scope="col">Alamat</th>
          <th scope="col">Kategori</th>
          <th scope="col">Status</th>
          <th scope="col">Detail</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr style="background: #fdfdfe;">
          <td class="align-middle" >
            <img src="{{asset($item['image'])}}" height="60em" width="75em" alt="image-property">
          </td>
          <td class="align-middle" >{{ $item['title'] }}</td>
          <td class="align-middle" >{{ $item['price'] }}</td>
          <td class="align-middle" >{{ $item['address'] }}</td>
          <td class="align-middle" >
            @if ($item['category'] == 0)
              <span>Rumah</span>
            @elseif ($item['category'] == 1)
              <span>Tanah</span>
            @else
              <span>Ruko</span>
            @endif
          </td> 
          <td class="align-middle" >
            <h5>
              @if ($item['status'] == 0)
                <span class="badge badge-success">Dijual</span>
              @else
                <span class="badge badge-warning">Disewakan</span>
              @endif
            </h5>
          </td>
          <td class="align-middle" >
            <a href="{{url('/admin/property/'.$item['id'])}}">
              <em class="fas fa-chevron-right fa-lg"></em>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
@endsection 

<style>
  td {
    he
  }
</style>