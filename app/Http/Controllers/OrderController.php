<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helper\Commons;

use App\Models\Order;

class OrderController extends Controller {
    // VIEW
    public function cartView () {
        $userId = Auth::user()->id;
        $query = Order::where("userId", $userId)->with('property')->orderBy('id', 'DESC')->get();

        $cart = []; $submission = []; $history = [];
        foreach ($query as $value) {
            if ($value['status'] == 1) { array_push($cart, $value); }
            else if ($value['status'] == 2) { array_push($submission, $value); }
            else {  array_push($history, $value); }
        }

        $data = [
            'cart' => $cart,
            'submission' => $submission,
            'history' => $history,
            'bank' => Commons::BANK_LOAN,
            'paymentTimes' => Commons::PAYMENT_TIMES
        ];
        return view('userPage.cart', $data);
    }

    // ACTION
    public function addOrderProperty ($propertyId) {
        $userId = Auth::user()->id;
        $query = Order::where('propertyId', $propertyId)->where("userId", $userId)->first();
        if(!empty($query)) {
            return back()->withErrors('Properti sudah ada di keranjang.');
        }

        $data = [
            'userId' => $userId,
            'propertyId' => $propertyId,
            'status' => 1
        ];
        
        try {
            Order::create($data);
        } catch (\Throwable $th) {
            return back()->withErrors('Anda gagal membuat order.');
        }
        return redirect('/user/cart')->withSuccess('Order berhasil dibuat.');
    }

    public function submissionOrderProperty ($orderId, Request $req) {
        $payload = $req->validate([
            'paymentMethod' => ['required', 'integer'],
            'prepayment' => ['nullable', 'integer'],
            'prepaymentMin' => ['nullable', 'integer'],
            'bank' => ['nullable', 'integer'],
            'paymentLoan' => ['nullable', 'integer'],
            'paymentLoanMin' => ['nullable', 'integer'],
            'paymentLoanMax' => ['nullable', 'integer'],
            'paymentTimes' => ['nullable', 'integer'],
        ]);

        $send = [
            'submissionCreated' => $orderId,
        ];
        return back()->withSuccess('Pengajuan berhasil dibuat.')->with($send);

        // if ((!empty($payload['prepayment']) && !empty($payload['prepaymentMin']) && $payload['prepayment'] < $payload['prepaymentMin']) ||
        //     (!empty($payload['paymentLoan']) && ($payload['paymentLoan'] < $payload['paymentLoanMin'] || $payload['paymentLoan'] > $payload['paymentLoanMax']))) {
        //     return back()->withErrors('Pengajuan harus sesaui dengan ketentuan.');
        // }

        // $payload['status'] = 2;
        // unset($payload['prepaymentMin']);
        // unset($payload['paymentLoanMin']);
        // unset($payload['paymentLoanMax']);

        // try {
        //     Order::where('id', $orderId)->update($payload);
        // } catch (\Throwable $th) {
        //     dd($th);
        //     return back()->withErrors('Anda gagal mengajukan pembelian.');
        // }
        // return back()->withSuccess('Pengajuan berhasil dibuat.');
    }
}
