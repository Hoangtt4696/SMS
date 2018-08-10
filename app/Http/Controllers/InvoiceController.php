<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class InvoiceController extends Controller
{
    public function index() {
      $shopID = '1';
      if (session()->has('shopID')) {
        $shopID = session('shopID');
      }
      $client = new Client();
      $res = $client->get('localhost/smaapi/invoice/index.php?shop_id='.$shopID);
      $invoices = \GuzzleHttp\json_decode($res->getBody());
      return view('Pages.Invoice.List', compact('invoices'));
    }

    function newCustomer() {
      $client = new Client();
      $res = $client->get('localhost/smaapi/customer/index.php');
      $invoices = \GuzzleHttp\json_decode($res->getBody());
      return view('Pages.Invoice.Customer', compact('invoices'));
    }

    public function postCustomer(Request $req) {
      $idCus = $req->idCustomer;
      $client = new Client();
      $shopID = '1';
      if (session()->has('shopID')) {
        $shopID = session('shopID');
      }
      $res = $client->get('localhost/smaapi/product/index.php?shop_id='.$shopID);
      $products = \GuzzleHttp\json_decode($res->getBody());

      return view('Pages.Invoice.New', compact('idCus', 'products'));
    }
}
