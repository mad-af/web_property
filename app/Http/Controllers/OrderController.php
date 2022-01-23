<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helper\Commons;

use App\Models\Order;
use App\Models\Property;

class OrderController extends Controller {
    // VIEW
    public function cartView (Request $req) {        
        $data = []; $blade = '';
        if (in_array(Auth::user()->role, [2, 3])) {
            $query = Order::where("status", '!=', 1)->with(['property', 'user'])->orderBy('id', 'DESC')->get();
            $data = [
                'data' => $query
            ];
            $blade = 'adminPage.order';
        }
        else {
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
            $blade = 'userPage.cart';
        }

        return view($blade, $data);
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
            'paymentMethod' => ['nullable', 'integer'],
            'prepayment' => ['nullable', 'integer'],
            'prepaymentMin' => ['nullable', 'integer'],
            'bank' => ['nullable', 'integer'],
            'paymentLoan' => ['nullable', 'integer'],
            'paymentLoanMin' => ['nullable', 'integer'],
            'paymentLoanMax' => ['nullable', 'integer'],
            'paymentTimes' => ['nullable', 'integer'],
            'paymentSalary' => ['nullable', 'integer'],
            'proofImage' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);

        if ((!empty($payload['prepayment']) && !empty($payload['prepaymentMin']) && $payload['prepayment'] < $payload['prepaymentMin']) ||
            (!empty($payload['paymentLoan']) && ($payload['paymentLoan'] < $payload['paymentLoanMin'] || $payload['paymentLoan'] > $payload['paymentLoanMax']))) {
            return back()->withErrors('Pengajuan harus sesaui dengan ketentuan.');
        }

        $massage = 'Pengajuan berhasil dibuat.';
        $massageErr = 'Gagal mengajukan pembelian.';
        if (empty($payload['proofImage'])) { 
            $payload['status'] = 2;
        }
        else {
            $path = 'images/proof/';
            $imageName = sha1(time()).'.'.$payload['proofImage']->extension();
            $payload['proofImage']->move(public_path($path), $imageName);
            $payload['proofImage'] = $path.$imageName;
            $massage = 'Pengajuan berhasil diperbarui.';
            $massageErr = 'Gagal memperbarui pengajuan.';
        }
        unset($payload['prepaymentMin']);
        unset($payload['paymentLoanMin']);
        unset($payload['paymentLoanMax']);

        try {
            Order::where('id', $orderId)->update($payload);
        } catch (\Throwable $th) {
            return back()->withErrors($massageErr);
        }
        return back()->withSuccess($massage)->with('submissionCreated', $orderId);
    }

    public function submissionOrderAdmin ($orderId, Request $req) {
        $payload = $req->validate([
            'success' => ['required', 'boolean'],
            'description' => ['nullable'],
            'propertyId' => ['required']
        ]);

        $payload['status'] = 3;
        $propertyId = $payload['propertyId'] ;
        unset($payload['peropertyId']);

        $updateQuery = [
            'success' => false,
            'description' => 'Mohon maaf kami harus menolak pesanan anda dikarenakan, properti yang anda inginkan telah terjual.',
            'status' => 3
        ];
        
        try {
            if ($payload['success']) {
                Property::where('id', $propertyId)->update(['sold' => true]);
                Order::where('propertyId', $propertyId)->where('id', '!=', $orderId)->update($updateQuery);
            }
            Order::where('id', $orderId)->update($payload);
        } catch (\Throwable $th) {
            return back()->withErrors('Gagal memperbarui pesanan.');
        }
        return back()->withSuccess('Pesanan berhasil diperbarui');
    }
}
