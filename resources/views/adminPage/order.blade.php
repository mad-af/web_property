@extends('adminPage/_layout')
@inject('commons', 'App\Helper\Commons')
@inject('method', 'App\Helper\Method')

@section('content')
  <h2 class="col h2 mb-4 text-gray-800 font-weight-bold">Pesanan</h2>

  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Gagal</strong> - {{ $errors->first() }}
  </div>
  @elseif(session('success'))
  <div class="alert alert-success" role="alert">
      <strong>Sukses</strong> - {{ session('success') }}
  </div>
  @endif

  <table class="table text-center" aria-describedby="list-order">
    <thead>
      <tr class="thead-dark">
        <th scope="col">Gambar</th>
        <th scope="col">Judul</th>
        <th scope="col">Username</th>
        <th scope="col">Metode Pembayaran</th>
        <th scope="col">Status</th>
        <th scope="col">Detail</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr style="background: #fdfdfe;">
        <td class="align-middle" >
          <img src="{{asset($item['property']['image'])}}" height="60em" width="75em" alt="image-property">
        </td>
        <td class="align-middle" >{{ $item['property']['title'] }}</td>
        <td class="align-middle" >{{ $item['user']['username'] }}</td>
        <td class="align-middle" >
          @if ($item['paymentMethod'] == 1)
          UTJ
          @else
          KPR
          @endif
        </td>
        <td class="align-middle" >
          @if ($item['status'] == 2)
          <span class="badge badge-secondary">PENDING</span>
          @elseif (!$item['success'])
          <span class="badge badge-danger">DITOLAK</span>
          @elseif ($item['success'])
          <span class="badge badge-success">DITERIMA</span>
          @endif
        </td>
        <td class="align-middle" >
          @if (!empty($item['proofImage']) || $item['paymentMethod'] == 1)
          <a href="" data-toggle="modal" data-target="{{ '#exampleModal'.$item['id'] }}">
            <em class="fas fa-chevron-right fa-lg"></em>
          </a>
          @else
          <a>
            <em class="fas fa-chevron-right fa-lg"></em>
          </a></span>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  @foreach ($data as $item)
  <div class="modal fade" id="{{ 'exampleModal'.$item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="d-flex">
            <div class="w-40 align-self-center">
              @if ($item['paymentMethod'] == 1)
              <img src="{{asset($item['property']['image'])}}" class="img-fluid" alt="image">
              @else
              <img src="{{asset($item['proofImage'])}}" class="img-fluid" alt="image">
              @endif
            </div>
            <div class="ml-5 w-60">
              <h5 class="text-success font-weight-bold">
                {{ $commons::PAYMENT_METHOD[$item['paymentMethod']] }}
                @if ($item['status'] == 2)
                <span class="badge badge-secondary">PENDING</span>
                @elseif ($item['success'])
                <span class="badge badge-success">DITERIMA</span>
                @elseif (!$item['success'])
                <span class="badge badge-danger">DITOLAK</span>
                @endif
              </h5>
              <div>
                <h6 class="font-weight-bold mb-0">Data Rumah</h6>
                <ul class="pl-4">
                  <li>judul   : {{ $item['property']['title'] }}</li>
                  <li>Alamat  : {{ $item['property']['address'] }}</li>
                  <li>Harga   : Rp.{{ $method::priceFormat($item['property']['price']) }}</li>
                </ul>

                <h6 class="font-weight-bold mb-0">Data Pembeli</h6>
                <ul class="pl-4">
                  <li>Nama      : {{ $item['user']['firstName'].' '.$item['user']['lastName'] }}</li>
                  <li>Username  : {{ $item['user']['username'] }}</li>
                  <li>Email     : {{ $item['user']['email'] }}</li>
                </ul>
                @if($item['paymentMethod'] == 1)
                <h6 class="font-weight-bold">Nilai UTJ <span class="lead">Rp.{{ $method::rupiah($item['prepayment']) }}</span></h6>
                @else
                <h6 class="font-weight-bold">Nilai Pinjaman <span class="lead">Rp.{{ $method::rupiah($item['paymentLoan']) }}</span></h6>
                <h6 class="font-weight-bold">Lama Pelunasan <span class="lead">{{ $commons::PAYMENT_TIMES[$item['paymentTimes']] }}</span></h6>
                <h6 class="font-weight-bold">Bank Pengajuan <span class="lead">{{ $commons::BANK_LOAN[$item['bank']] }}</span></h6> 
                @endif
                @if ($item['status'] != 3)
                <section class="mt-4">
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link active" id="{{ 'nav-accept'.$item['id'] }}-tab" data-toggle="tab" href="{{ '#nav-accept'.$item['id'] }}" role="tab" aria-controls="{{ 'nav-accept'.$item['id'] }}" aria-selected="true">Terima</a>
                    <a class="nav-link" id="{{ 'nav-reject'.$item['id'] }}-tab" data-toggle="tab" href="{{ '#nav-reject'.$item['id'] }}" role="tab" aria-controls="{{ 'nav-reject'.$item['id'] }}" aria-selected="false">Tolak</a>
                  </div>
                </section>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="{{ 'nav-accept'.$item['id'] }}" role="tabpanel" aria-labelledby="{{ 'nav-accept'.$item['id'] }}-tab">
                    <form action="{{ url('/admin/order/submission/'.$item['id']) }}" method="POST">
                      @method('PUT')
                      @csrf
                      <input type="hidden" class="form-control" name="success" value="1">
                      <input type="hidden" class="form-control" name="propertyId" value="{{ $item['propertyId'] }}">
                      <button type="submit" class="btn btn-success btn-user btn-block mt-2">
                        Terima Pengajuan
                      </button>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="{{ 'nav-reject'.$item['id'] }}" role="tabpanel" aria-labelledby="{{ 'nav-reject'.$item['id'] }}-tab">
                    <form action="{{ url('/admin/order/submission/'.$item['id']) }}" method="POST">
                      @method('PUT')
                      @csrf
                      <input type="hidden" class="form-control" name="success" value="0">
                      <input type="hidden" class="form-control" name="propertyId" value="{{ $item['propertyId'] }}">
                      <textarea name="description" class="form-control" placeholder="Sebutkan alasan menolak pengajuan" id="exampleFormControlTextarea1" rows="3" required></textarea>
                      <button type="submit" class="btn btn-danger btn-user btn-block mt-2">
                        Tolak Pengajuan
                      </button>
                    </form>
                  </div>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@endsection

<style>
  .titleCart {
    margin: 0;
  }
  .w-40 {
    width: 40% !important;
  }
  .w-60 {
    width: 60% !important;
  }
  li {
    list-style: none;
  }
</style>