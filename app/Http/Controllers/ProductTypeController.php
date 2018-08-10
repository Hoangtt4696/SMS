<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;

class ProductTypeController extends Controller
{
  public function index()
  {
    $shopID = '10';
    if (session()->has('shopID')) {
      $shopID = session('shopID');
    }
    $client = new Client();
    $res = $client->get('localhost/smaapi/product_type/index2.php?shop_id='.$shopID);
    $productTypes = \GuzzleHttp\json_decode($res->getBody());
    return view('Pages.ProductType.List', compact('productTypes'));
  }

  public function create(Request $req) {
    $fileNameToStore = '';
    if($req->hasFile('picture')) {
      $image = $req->file('picture');
      $filenameWithExt = $image->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $image->getClientOriginalExtension();

      $fileNameToStore = $filename . '_' . time() . '.' . $extension;

      $image->storeAs('', $fileNameToStore);
    }
    $client = new Client();

    $shopID = '10';
    if (session()->has('shopID')) {
      $shopID = session('shopID');
    }
    $client->post(
      'http://localhost/smaapi/product_type/create2.php',
      [
        'form_params' => [
          'shop_id' => $shopID,
          'name' => $req->name,
          'picture_name' => $fileNameToStore,
        ]
      ]
    );

    return redirect(route('listProductType'));
  }

  public function restore(Request $req)
  {
    $client = new Client();
    $picture = '';
    $path = $req->picture;
    if ($path !== 'undefined') {
      $path = $path->store('');
      $picture = $path;
    }
    $updated_date = Carbon::now();
    $res = $client->post(
      'http://localhost/smaapi/product_type/restore_multi_field.php',
      [
        'form_params' => [
          'id' => $req->id,
          'name' => $req->name,
          'picture_name' => $picture,
          'updated_date' => $updated_date->toDateTimeString()
        ]
      ]
    );
    return $res;
  }
}
