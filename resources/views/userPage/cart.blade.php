@extends('userPage/_subLayout')
@inject('method', 'App\Helper\Method')

@section('title')
Keranjang
@endsection

@section('contents')

<section class="ftco-section" id="property">
  <div class="container">
    
  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Gagal</strong> - {{ $errors->first() }}
  </div>
  @elseif(session('success'))
  <div class="alert alert-success" role="alert">
      <strong>Sukses</strong> - {{ session('success') }}
  </div>
  @endif

    <div>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          @if (empty(session('submissionCreated')))
          <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Keranjang</a>
          <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pengajuan</a>
          @else
          <a class="nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Keranjang</a>
          <a class="nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Pengajuan</a>
          @endif
          <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Riwayat</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        @if (empty(session('submissionCreated')))
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        @else
        <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        @endif
          @foreach ($cart as $item)
          <div class="card mt-2">
            <div class="card-body d-flex justify-content-between">
              <div class="d-flex">
                <img src="{{asset($item['property']['image'])}}" height="120em" width="150em" alt="image-property">
                <div class="ml-3">
                  <h5 class="font-weight-bold text-success title titleCart">
                    {{ $item['property']['title'] }}
                  </h5>
                  <span>{{ $item['property']['address'] }}</span>
                  <div class="mt-1">
                    <h4 >Rp. {{ $method::rupiah($item['property']['price']) }}</h4>
                  </div>
                </div>
              </div>
              <div class="align-self-center">
                <button class="btn btn-success" data-toggle="modal" data-target="{{ '#exampleModal'.$item['id'] }}">Ajukan Pembelian</button>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @if (empty(session('submissionCreated')))
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        @else
        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        @endif
          @foreach ($submission as $item)
            <div class="card mt-2">
              <div class="card-body d-flex justify-content-between">
                <div class="d-flex">
                  <img src="{{asset($item['property']['image'])}}" height="120em" width="150em" alt="image-property">
                  <div class="ml-3">
                    <h5 class="font-weight-bold text-success title titleCart">
                      {{ $item['property']['title'] }}
                    </h5>
                    <span>{{ $item['property']['address'] }}</span>
                    <div class="mt-1">
                      <h4 >Rp. {{ $method::rupiah($item['property']['price']) }}</h4>
                    </div>
                  </div>
                </div>
                <div class="align-self-center">
                  <button class="btn btn-success" id="{{ 'submission'.$item['id'] }}" data-toggle="modal" data-target="{{ '#submissionModal'.$item['id'] }}">Lihat Detail</button>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          @foreach ($history as $item)
            <div class="card mt-2">
              <div class="card-body d-flex justify-content-between">
                <div class="d-flex">
                  <img src="{{asset($item['property']['image'])}}" height="120em" width="150em" alt="image-property">
                  <div class="ml-3">
                    <h5 class="font-weight-bold text-success title titleCart">
                      {{ $item['property']['title'] }}
                    </h5>
                    <span>{{ $item['property']['address'] }}</span>
                    <div class="mt-1">
                      <h4 >Rp. {{ $method::rupiah($item['property']['price']) }}</h4>
                    </div>
                  </div>
                </div>
                <div class="align-self-center">
                  @if ($item['success'])
                  <span class="badge badge-success mr-4">DITERIMA</span>
                  @elseif (!$item['success'])
                  <span class="badge badge-danger mr-4">DITOLAK</span>
                  @endif
                  <button class="btn btn-success" data-toggle="modal" data-target="{{ '#historyModal'.$item['id'] }}">Lihat Detail</button>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

@foreach ($cart as $item)
<div class="modal fade" id="{{ 'exampleModal'.$item['id'] }}" tabindex="-1" aria-labelledby="{{ 'exampleModalLabel'.$item['id'] }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengajuan Pembelian Properti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="d-flex">
          <div class="w-40 align-self-center">
            <img src="{{asset($item['property']['image'])}}" class="img-fluid" alt="image-property">
            <h6 class="font-weight-bold text-success title text-center mt-2">
              {{ $item['property']['title'] }}
            </h6>
          </div>
          <div class="ml-3 w-60">
            <h5 class="font-weight-bold">
              Metode Pembayaran
            </h5>
            <div>
              <section>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-link active" id="{{ 'nav-cash'.$item['id'] }}-tab" data-toggle="tab" href="{{ '#nav-cash'.$item['id'] }}" role="tab" aria-controls="{{ 'nav-cash'.$item['id'] }}" aria-selected="true">Tunai</a>
                  <a class="nav-link" id="{{ 'nav-loan'.$item['id'] }}-tab" data-toggle="tab" href="{{ '#nav-loan'.$item['id'] }}" role="tab" aria-controls="{{ 'nav-loan'.$item['id'] }}" aria-selected="false">KPR</a>
                </div>
              </section>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="{{ 'nav-cash'.$item['id'] }}" role="tabpanel" aria-labelledby="{{ 'nav-cash'.$item['id'] }}-tab">
                  <p class="mt-2 mb-2">
                    Sebagai tanda keseriusan dan bukti komitmen memesan terhadap unit properti tersebut, maka silahkan untuk mengisi Uang Tanda Jadi (UTJ) minimal 30% dari harga properti.
                  </p>
                  <p>
                    min: Rp.{{ $method::rupiah($method::prepayment($item['property']['price'])) }}
                  </p>
                  <form action="{{ url('/user/order/submission/'.$item['id']) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" class="form-control" name="paymentMethod" value="1">
                    <input type="hidden" class="form-control" name="prepaymentMin" value="{{ $method::prepayment($item['property']['price']) }}">
                    <input type="number" class="form-control" name="prepayment" placeholder="Uang Tanda Jadi (UTJ)" required>
                    <input type="number" class="form-control" name="paymentSalary" placeholder="Misal 9000000">
                    <button type="submit" class="btn btn-primary btn-user btn-block mt-2">
                      Ajukan Uang Tanda Jadi
                    </button>
                  </form>
                </div>
                <div class="tab-pane fade" id="{{ 'nav-loan'.$item['id'] }}" role="tabpanel" aria-labelledby="{{ 'nav-loan'.$item['id'] }}-tab">
                  <p class="mt-2 mb-2">
                    Kredit kepemilikan rumah (KPR) mengisi beberapa persyaratan sebagai berikut.
                  </p>
                  <form action="{{ url('/user/order/submission/'.$item['id']) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" class="form-control" name="paymentMethod" value="2">
                    <input type="hidden" class="form-control" name="paymentLoanMin" value="{{ $method::loanPaymentMin($item['property']['price']) }}">
                    <input type="hidden" class="form-control" name="paymentLoanMax" value="{{ $item['property']['price'] }}">
                    <input type="number" class="form-control mb-2" name="paymentLoan" placeholder="Masukkan nilai KPR" required>
                    <input type="number" class="form-control" name="paymentSalary" placeholder="Misal 9000000">
                    <select class="form-control mb-2" name="paymentTimes" required>
                      <option value="" selected disabled hidden>Pilih Waktu</option>
                      @for ($i = 1; $i < count($paymentTimes); $i++)
                      <option value="{{ $i }}">{{ $paymentTimes[$i] }}</option>
                      @endfor
                    </select>
                    <select class="form-control mb-2" name="bank" required>
                      <option value="" selected disabled hidden>Pilih Bank Yang Akan Di Ajukan</option>
                      @for ($i = 1; $i < count($bank); $i++)
                      <option value="{{ $i }}">{{ $bank[$i] }}</option>
                      @endfor
                    </select>
                    <button type="submit" class="btn btn-primary btn-user btn-block mt-2">
                      Ajukan Kredit Kepemilikan Rumah
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($submission as $item)
<div class="modal fade" id="{{ 'submissionModal'.$item['id'] }}" tabindex="-1" aria-labelledby="{{ 'submissionModalLabel'.$item['id'] }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="submissionModalLabel">Pembelian Properti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if (!empty($item['proofImage']) || $item['paymentMethod'] == 1)
          <p>
            Terimakasih telah mempercayai kami, silahkan tunggu selama 3x24 jam hari kerja. akan segera kami proses
          </p>
          <p>
            Apabila status pengajuan belum berganti dalam kurun waktu yang telah di tentukan silahkan menghubungi pihak kami di (314)21121.
          </p>
        @elseif ($item['paymentMethod'] == 2)
        <p>
          Silahkan unggah foto KTP anda agar pengajuan Kredit kepemilikan rumah (KPR) anda, dapat segera kami proses.
        </p>
        <form action="{{ url('/user/order/submission/'.$item['id']) }}" method="post" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="custom-file">
            <input type="file" name="proofImage" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Masukkan Gambar Bukti</label>
          </div>
          <button type="submit" class="btn btn-primary btn-user btn-block mt-2">
            Upload Gambar Bukti
          </button>
        </form>
        @endif
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($history as $item)
<div class="modal fade" id="{{ 'historyModal'.$item['id'] }}" tabindex="-1" aria-labelledby="{{ 'historyModalLabel'.$item['id'] }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="historyModalLabel">Pembelian Properti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if ($item['success'])
        <p>
          Selamat pengajuan anda telah kami terima, dalam 3x24 hari kerja kami akan segera menghubungi anda untuk memenuhi syarat-syarat yang berlaku terimakasih.
        </p>
        @else
        <p>
          {{ $item['description'] }}
        </p>
        @endif
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
</style>

@if (!empty(session('submissionCreated')))
<script>
  window.onload = function() {
    document.getElementById("{{ 'submission'.$submission[0]['id'] }}").click();
  }
</script>
@endif