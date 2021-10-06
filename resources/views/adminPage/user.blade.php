@extends('adminPage/_layout')

@section('content')
  <h2 class="col h2 mb-4 text-gray-800 font-weight-bold">User</h2>

  <div class="col">
    <a href="{{url('admin/user/add')}}" class="float-right btn btn-primary mb-3">Tambah User</a>
  </div>

  <table class="table text-center" aria-describedby="list-property">
    <thead>
      <tr class="thead-dark">
        <th scope="col">Nama</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Peran</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr style="background: #fdfdfe;">
        <td>{{ $item['firstName'].' '.$item['lastName'] }}</td>
        <td>{{ $item['username'] }}</td>
        <td>{{ $item['email'] }}</td>
        <td>
          @if ($item['role'] == 1)
            <span>User</span>
          @elseif ($item['role'] == 2)
            <span>Admin</span>
          @else
            <span>Super Admin</span>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection