<?php

namespace App\Http\Services;

use App\Helper\Commons;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Http\Repositories\Eloquent\AreaEloquent;
use App\Http\Repositories\Eloquent\SubEloquent;
use App\Http\Repositories\Eloquent\PropertyEloquent;

class PropertyService
{
  private $areaEloquent;
  private $subEloquent;
  private $propertyEloquent;
  public function __construct()
  {
    $this->areaEloquent = new AreaEloquent();
    $this->subEloquent = new SubEloquent();
    $this->propertyEloquent = new PropertyEloquent();
  }

  // VIEW
  public function listPropertyView()
  {
    $query = [];
    $blade = "";
    if (Auth::user()->role == 1) {
      $query = $this->propertyEloquent->find(['sold', '!=', true], ['id', 'DESC']);
      $blade = 'userPage.property';
    } else {
      $query = $this->propertyEloquent->find([], ['id', 'DESC']);
      $blade = 'adminPage.property';
    }

    foreach ($query as $key => $item) {
      $query[$key]['bedRoom'] = Commons::BED_ROOM[$item['bedRoom']];
      $query[$key]['bathRoom'] = Commons::BATH_ROOM[$item['bathRoom']];
    }

    $data = ['data' => $query];
    return view($blade, $data);
  }

  public function addPropertyView()
  {
    $subData = $this->subEloquent->aggregate()->get()->groupBy('attribute')->toArray();
    $data = [
      "homeStatus" => Commons::HOME_STATUS,
      "homeCategory" => Commons::HOME_CATEGORY,
      "bedRoom" => Commons::BED_ROOM,
      "bathRoom" => Commons::BATH_ROOM,
      "parkingLot" => Commons::PARKING_LOT,
      "heating" => Commons::HEATING
    ];
    $wilayah['area'] = $this->areaEloquent->find([]);
    $data = array_merge($data, $subData, $wilayah);
    return view('adminPage.propertyAdd', $data);
  }

  public function detailPropertyView($propertyId, $edit)
  {
    $data = [];
    $view = "";
    $query = $this->propertyEloquent->findOne(['id', $propertyId]);

    if (Auth::user()->role == 1) {
      $query['bedRoom'] = Commons::BED_ROOM[$query['bedRoom']];
      $query['bathRoom'] = Commons::BATH_ROOM[$query['bathRoom']];
      $query['parkingLot'] = Commons::PARKING_LOT[$query['parkingLot']];
      $query['heating'] = Commons::HEATING[$query['heating']];

      $data = ['data' => $query];
      $view = 'userPage.propertyDetail';
    } else {
      $subData = $this->subEloquent->aggregate()->get()->groupBy('attribute')->toArray();
      $data = [
        'data' => $query,
        "homeStatus" => Commons::HOME_STATUS,
        "homeCategory" => Commons::HOME_CATEGORY,
        "bedRoom" => Commons::BED_ROOM,
        "bathRoom" => Commons::BATH_ROOM,
        "parkingLot" => Commons::PARKING_LOT,
        "heating" => Commons::HEATING,
        "area" => $this->areaEloquent->find([], [])
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
  public function addPropertyAction($payload)
  {
    $path = 'images/property/';
    $imageName = sha1(time()) . '.' . $payload['image']->extension();
    $payload['image']->move(public_path($path), $imageName);
    $payload['image'] = $path . $imageName;

    try {
      $this->propertyEloquent->insert($payload);
    } catch (\Throwable $th) {
      return back()->withErrors('Anda gagal membuat properti.');
    }
    return redirect('/admin/property')->withSuccess('Properti berhasil dibuat.');
  }

  public function editPropertyAction($propertyId, $payload)
  {
    if (!empty($payload['image'])) {
      $path = 'images/property/';
      $imageName = sha1(time()) . '.' . $payload['image']->extension();
      $payload['image']->move(public_path($path), $imageName);
      $payload['image'] = $path . $imageName;
    }

    try {
      $this->propertyEloquent->update(['id', $propertyId], $payload);
    } catch (\Throwable $th) {
      return back()->withErrors('Anda gagal membuat properti.');
    }
    return redirect('/admin/property')->withSuccess('Properti berhasil dibuat.');
  }

  public function deletePropertyAction($propertyId)
  {
    try {
      $imagePath = $this->propertyEloquent->aggregate()->where('id', $propertyId)->select('image')->first()->image;
      File::delete($imagePath);

      $this->propertyEloquent->delete(['id', $propertyId]);
    } catch (\Throwable $th) {
      return back()->withErrors('Anda gagal menghapus properti.');
    }
    return redirect('/admin/property')->withSuccess('Properti telah dihapus.');
  }
}
