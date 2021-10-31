<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helper\Commons;
use App\Helper\Method;

use App\Models\Sub;
use App\Models\Property;

class FindHomeController extends Controller {

	public function findHomeView () {
		$data = Sub::get()->groupBy('attribute')->toArray();
		if (Auth::check()) {
			return view('userPage.findHome', $data);
		}
		return view('webPage.findHome', $data);
	}

	public function findHomeAction (Request $req) {
		$payload = $req->validate([
			'salary' => ['required', 'integer', 'min:1000000'],
			'subHomeFurnitureId' => ['required', 'integer'],
			'subFamilyMemberId' => ['required', 'integer']
		]);

		$salary = $payload['salary'];
		$payload['subSalaryId'] = Method::salarySub($salary);
		unset($payload['salary']); 

		$sub = [];
		foreach ($payload as $value) {
			array_push($sub, $value);
		}
			
		try {
			$propertyId = $this->fuzzyMCDM($sub);

			$property = Property::whereIn('id', $propertyId)->get();
			foreach ($property as $value) {
				$value['bedRoom'] = Commons::BED_ROOM[$value['bedRoom']];
				$value['bathRoom'] = Commons::BATH_ROOM[$value['bathRoom']];
			}
		} catch (\Throwable $th) {
			return back()->withErrors('Gagal find home, segera hubungi developer');
		}
		
		$payload['salary'] = $salary;
		return back()->withInput($payload)->with('property-find-home', $property);
	}
	
	public function fuzzyMCDM ($payload) {
		$category = [];
		$sub = Sub::whereIn('id', $payload)->get();
		foreach ($sub as $value) {
			array_push($category, $value['x']);
		}

		$property = Property::where('sold', false)->get()->toArray();
		
		$propertiId = [];
		$properti_subId = [];
		foreach ($property as $propertiArg) {
			$temp = [
				'subSalaryId' => $propertiArg["subSalaryId"],
				'subHomeFurnitureId' => $propertiArg["subHomeFurnitureId"],
				'subFamilyMemberId' => $propertiArg["subFamilyMemberId"]
			];
			array_push($properti_subId, $temp);
			array_push($propertiId, $propertiArg["id"]);
		}

		$properti_sub = [];
		foreach($properti_subId as $properti_subIdArg) {
			$temp = [];
			foreach ($properti_subIdArg as $value) {
				array_push($temp, $value);
			}
			$sub = Sub::whereIn('id', $temp)->get();
			array_push($properti_sub, $sub);
		}

		$propertiData = [];
		foreach($properti_sub as $value){
			$temp = [];
			foreach($value as $v) {
				array_push($temp, $v['x']);
			}
			array_push($propertiData, $temp);
		}

		// PENGGABUNGAN ANTARA DATA PROPERTI DENGAN CRITERIA
		$data_penggabungan = [];
		foreach ($propertiData as $value) {
			$temp = [];
			$value = array_map('intval', $value);
			foreach ($value as $y => $values) {
				if ($values > $category[$y]) {
					array_push($temp, $values);
				}
				else if ($values < $category[$y]) {
					array_push($temp, $category[$y]);
				}
				else {
					array_push($temp, $values);
				}
			}
			array_push($data_penggabungan, $temp);
		}

		// CONVERT BENEFICIAL & NON-BENEFICIAL
		$data_convert = [];
		foreach ($data_penggabungan as $value) {
			$temp = [];
			$attribute = ['salary', 'houseType', 'familyMember'];
			foreach ($value as $key => $values) {
				$att = $this->attribute_n($attribute[$key]);
				$max = max($att); $min = min($att);
				if ($key == 0) {
					$x = $min / $values;
					array_push($temp, $x);
				}
				else {
					$x = $values / $max;
					array_push($temp, $x);
				}
			}
			array_push($data_convert, $temp);
		}

		// AVERAGE DATA
		$data_average = [];
		foreach ($data_convert as $value) {
			$temp = array_sum($value) / count($value);
			array_push($data_average, $temp);
		}
		define('AVERAGE', $data_average);
		rsort($data_average);

		$indexArr = [];
		for ($i=0; $i<3; $i++) {
			$temp = array_search($data_average[$i], AVERAGE);
			array_push($indexArr, $temp);
		}
		
		$data = [
			$propertiId[$indexArr[0]],
			$propertiId[$indexArr[1]],
			$propertiId[$indexArr[2]]
		];
		return $data;
	}

	public function attribute_n($att)  {
		$data = [];
		$att = Sub::where('attribute', $att)->get()->toArray();
		foreach ($att as $value) {
			array_push($data, $value['x']);
		}
		return $data;
	}

	public function findHome(Request $req){
		$finder = Property::where('title', $req->inputFormCari)->orWhere('title', 'like', '%'.$req->inputFormCari.'%')->get();
		return response($finder, 200);
	}
}
