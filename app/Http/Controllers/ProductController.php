<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductController extends Controller
{
  public function index()
  {
    $client = new Client();
    $shopID = '10';
    if (session()->has('shopID')) {
      $shopID = session('shopID');
    }
    $res = $client->get('localhost/smaapi/product/index.php?shop_id='.$shopID);
    $products = \GuzzleHttp\json_decode($res->getBody());
    return view('Pages.Product.List', compact('products'));
  }

  public function newProduct() {
    $client = new Client();
    $shopID = '10';
    if (session()->has('shopID')) {
      $shopID = session('shopID');
    }
    $res = $client->get('localhost/smaapi/product_type/index2.php?shop_id='.$shopID);
    $productTypes = \GuzzleHttp\json_decode($res->getBody());
    return view('Pages.Product.New', compact('productTypes'));
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
      'http://localhost/smaapi/product/create2.php',
      [
        'form_params' => [
          'shop_id' => $shopID,
          'name' => $req->name,
          'picture_name' => $fileNameToStore,
          'product_type_name' => $req->productType,
          'price' => $req->price,
          'description' => $req->description,
          'amount' => $req->amount,
          'author' => $req->author,
          'publish_year' => $req->publishYear,
        ]
      ]
    );

    return redirect(route('listProduct'));
  }

  public function editProduct(Request $req) {
    $client = new Client();
    $shopID = '10';
    if (session()->has('shopID')) {
      $shopID = session('shopID');
    }
    $res = $client->get('localhost/smaapi/product/find_by_id.php?id='.$req->id.'&shop_id='.$shopID);
    $res2 = $client->get('localhost/smaapi/product_type/index2.php?shop_id='.$shopID);
    $productTypes = \GuzzleHttp\json_decode($res2->getBody());
    $product = \GuzzleHttp\json_decode($res->getBody());
    return view('Pages.Product.Edit', compact('product', 'productTypes'));
  }

  public function restore(Request $req) {
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
    $client->post(
      'http://localhost/smaapi/product/restore_multi_field.php',
      [
        'form_params' => [
          'id' => $req->id,
          'name' => $req->name,
          'picture_name' => $fileNameToStore,
          'product_type' => $req->productType,
          'price' => $req->price,
          'description' => $req->description,
          'amount' => $req->amount,
          'author' => $req->author,
          'publish_year' => $req->publishYear,
        ]
      ]
    );

    return redirect(route('listProduct'));
  }
}
