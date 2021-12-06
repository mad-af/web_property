<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helper\Commons;
use App\Models\Area;
use App\Models\Sub;
use App\Models\Property;

use File;

class PropertyController extends Controller {
    // VIEW
    public function listPropertyView () {
        $query = []; $blade = "";
        if (Auth::user()->role == 1) {
            $query = Property::where('sold', '!=', true )->orderBy('id', 'DESC')->get()->toArray();
            $blade = 'userPage.property';
        }
        else {
            $query = Property::orderBy('id', 'DESC')->get()->toArray();
            $blade = 'adminPage.property';
        }
        
        foreach ($query as $key => $item) {
            $query[$key]['bedRoom'] = Commons::BED_ROOM[$item['bedRoom']];
            $query[$key]['bathRoom'] = Commons::BATH_ROOM[$item['bathRoom']];
        }

        $data = [ 'data' => $query ];
        return view($blade, $data);
    }

    public function addPropertyView () {
        $subData = Sub::get()->groupBy('attribute')->toArray();
        $data = [
            "homeStatus" => Commons::HOME_STATUS,
            "homeCategory" => Commons::HOME_CATEGORY,
            "bedRoom" => Commons::BED_ROOM,
            "bathRoom" => Commons::BATH_ROOM,
            "parkingLot" => Commons::PARKING_LOT,
            "heating" => Commons::HEATING
        ];
        $wilayah['area'] = Area::get()->toArray();
        $data = array_merge($data, $subData, $wilayah);
        // dd($data);
        return view('adminPage.propertyAdd', $data);
    }

    public function detailPropertyView ($propertyId, Request $req) {
        $edit = $req->validate(['edit' => ['nullable']]);

        $data = []; $view = "";
        $query = Property::where('id', $propertyId)->first();

        if (Auth::user()->role == 1) {
            $query['bedRoom'] = Commons::BED_ROOM[$query['bedRoom']];
            $query['bathRoom'] = Commons::BATH_ROOM[$query['bathRoom']];
            $query['parkingLot'] = Commons::PARKING_LOT[$query['parkingLot']];
            $query['heating'] = Commons::HEATING[$query['heating']];

            $data = [ 'data' => $query ];
            $view = 'userPage.propertyDetail';
        }
        else {
            $subData = Sub::get()->groupBy('attribute')->toArray();
            $data = [ 
                'data' => $query,
                "homeStatus" => Commons::HOME_STATUS,
                "homeCategory" => Commons::HOME_CATEGORY,
                "bedRoom" => Commons::BED_ROOM,
                "bathRoom" => Commons::BATH_ROOM,
                "parkingLot" => Commons::PARKING_LOT,
                "heating" => Commons::HEATING,
            ];
            $data = array_merge($data, $subData);

            $view = 'adminPage.propertyDetail';
        }


        if ($edit) {
            return view('adminPage.propertyEdit', $data);
        }

        return view($view, $data);
    }

    
    // ACTION
    public function addPropertyAction (Request $req) {
        $payload = $req->validate([
            'title' => ['required', 'unique:properties'],
            'price' => ['required', 'integer'],
            'address' => ['required', 'max:50'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'status' => ['required', 'integer'],
            'category' => ['required', 'integer'],
            'bedRoom' => ['required', 'integer'],
            'bathRoom' => ['required', 'integer'],
            'parkingLot' => ['required', 'integer'],
            'heating' => ['required', 'integer'],
            'length' => ['required', 'integer'],
            'width' => ['required', 'integer'],
            'description' => ['required'],
            'subSalaryId' => ['required', 'integer'],
            'subHomeFurnitureId' => ['required', 'integer'],
            'subFamilyMemberId' => ['required', 'integer'],
            'subAreaId' => ['required']
        ],[
            'address.max' => 'Alamat harus kurang dari 50 karakter',
            'title.unique' => 'Judul telah digunakan!',
            'image.max' => 'Gambar harus kurang dari 2mb'
        ]);

            $path = 'images/property/';
            $imageName = sha1(time()).'.'.$payload['image']->extension();
            $payload['image']->move(public_path($path), $imageName);
            $payload['image'] = $path.$imageName;
        // dd($payload);
        try {
            Property::create($payload);
        } catch (\Throwable $th) {
            return back()->withErrors('Anda gagal membuat properti.');
        }
        return redirect('/admin/property')->withSuccess('Properti berhasil dibuat.');
    }

    public function editPropertyAction ($propertyId, Request $req) {
        $payload = $req->validate([
        'title' => ['nullable', /*'unique:properties'*/],
            'price' => ['nullable', 'integer'],
            'address' => ['nullable', 'max:50'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'status' => ['nullable', 'integer'],
            'category' => ['nullable', 'integer'],
            'bedRoom' => ['nullable', 'integer'],
            'bathRoom' => ['nullable', 'integer'],
            'parkingLot' => ['nullable', 'integer'],
            'heating' => ['nullable', 'integer'],
            'length' => ['nullable', 'integer'],
            'width' => ['nullable', 'integer'],
            'description' => ['nullable'],
            'subSalaryId' => ['nullable', 'integer'],
            'subHomeFurnitureId' => ['nullable', 'integer'],
            'subFamilyMemberId' => ['nullable', 'integer']
        ],[
            'address.max' => 'Alamat harus kurang dari 50 karakter',
            // 'title.unique' => 'Judul telah digunakan!',
            'image.max' => 'Gambar harus kurang dari 2mb'
        ]);

        if (!empty($payload['image'])) {
            $path = 'images/property/';
            $imageName = sha1(time()).'.'.$payload['image']->extension();
            $payload['image']->move(public_path($path), $imageName);
            $payload['image'] = $path.$imageName;
        }

        try {
            Property::where('id', $propertyId)->update($payload);
        } catch (\Throwable $th) {
            return back()->withErrors('Anda gagal membuat properti.');
        }
        return redirect('/admin/property')->withSuccess('Properti berhasil dibuat.');
    }

    public function deletePropertyAction ($propertyId) {
        try {
            $property = Property::where('id', $propertyId);
            $imagePath = $property->select('image')->first()->image;
            File::delete($imagePath);

            $property->delete();
        } catch (\Throwable $th) {
            return back()->withErrors('Anda gagal menghapus properti.');
        }
        return redirect('/admin/property')->withSuccess('Properti telah dihapus.');
    }
}
