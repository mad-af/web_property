@extends('adminPage/_layout')

@section('content')
  <h2 class="col h2 mb-4 text-gray-800 font-weight-bold">Properti</h2>

  <div class="col">
    <a href="{{url('admin/property/add')}}" class="float-right btn btn-primary mb-3">Tambah Properti</a>
  </div>

  <table class="table text-center" aria-describedby="list-property">
    <thead>
      <tr class="thead-dark">
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr style="background: #fdfdfe;">
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr style="background: #fdfdfe;">
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr style="background: #fdfdfe;">
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
@endsection