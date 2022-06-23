<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PropertyService;

class PropertyController extends Controller {
    private $service;
    function __construct()
    {
        $this->service = new PropertyService();
    }
    // VIEW
    public function listPropertyView () {
        return $this->service->listPropertyView();
    }

    public function addPropertyView () {
        return $this->service->addPropertyView();
    }

    public function detailPropertyView ($propertyId, Request $req) {
        $edit = $req->validate(['edit' => ['nullable']]);

        return $this->service->detailPropertyView($propertyId, $edit);
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

        return $this->service->addPropertyAction($payload);
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
            'subFamilyMemberId' => ['nullable', 'integer'],
            'subAreaId' => ['nullable', 'integer']
        ],[
            'address.max' => 'Alamat harus kurang dari 50 karakter',
            'image.max' => 'Gambar harus kurang dari 2mb'
        ]);

        return $this->service->editPropertyAction($propertyId, $payload);
    }

    public function deletePropertyAction ($propertyId) {
        return $this->service->deletePropertyAction($propertyId);
    }
}
