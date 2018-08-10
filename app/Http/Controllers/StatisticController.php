<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class StatisticController extends Controller
{
    public function productByType() {
      $shopID = '10';
      if (session()->has('shopID')) {
        $shopID = session('shopID');
      }
      $client = new Client();
      $res = $client->get('localhost/smaapi/statistic/products.php?shop_id='.$shopID);
        $productStatistic = @\GuzzleHttp\json_decode($res->getBody());
      return view('Pages.Statistics.Index', compact('productStatistic'));
    }

    public function revenue() {
      $shopID = '10';
      if (session()->has('shopID')) {
        $shopID = session('shopID');
      }
      $client = new Client();
      $res = $client->get('localhost/smaapi/statistic/sold.php?shop_id='.$shopID);
      $revenueStatistic = json_decode($res->getBody());
      return view('Pages.Statistics.Revenue', compact('revenueStatistic'));
    }
}
