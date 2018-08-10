<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class EmployeeController extends Controller
{
    public function getRegister() {
      return view('Pages.Register');
    }

    public function postRegister(Request $req)
    {
      $client = new Client();
      $client->post(
        'http://localhost/smaapi/register/index.php',
        [
          'form_params' => [
            'shop_name' => $req->shopName,
            'shop_type' => $req->shopType,
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
          ]
        ]
      );
      return redirect()->route('login');
    }

  /**
   * @param Request $req
   */
  public function postLogin(Request $req) {
      $client = new Client();
      $res = $client->post(
        'http://localhost/smaapi/login/index2.php',
        [
          'form_params' => [
            'email' => $req->email,
            'password' => $req->password,
          ]
        ]
      );
      $data = \GuzzleHttp\json_decode($res->getBody());
      $shop_id = $data->shop_id;
      $role = $data->employee_type_id;
      $email = $data->email;
      $id = $data->id;
      $picture = $data->picture;
      $req->session()->put('shopID',$shop_id);
      $req->session()->put('role',$role);
      $req->session()->put('email',$email);
      $req->session()->put('id',$id);
      $req->session()->put('avatar',$picture);

      return redirect()->route('home');
  }

  public function index() {
    $client = new Client();
    $shopID = session()->has('shopID') ? session('shopID') : '1';
    $res = $client->get('localhost/smaapi/employee/index2.php?shop_id='.$shopID);
    $employees = \GuzzleHttp\json_decode($res->getBody());
    return view('Pages.Employee.List', compact('employees'));
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

    $shopID = '1';
    if (session()->has('shopID')) {
      $shopID = session('shopID');
    }
    $client->post(
      'http://localhost/smaapi/employee/create2.php',
      [
        'form_params' => [
          'shop_id' => $shopID,
          'name' => $req->name,
          'picture_name' => $fileNameToStore,
          'email' => $req->email,
          'password' => $req->password,
          'phone' => $req->phone,
          'address' => $req->address,
          'gender' => $req->gender,
        ]
      ]
    );
    return redirect(route('listEmployee'));
  }

  public function editEmployee(Request $req) {
    $client = new Client();
    $shopID = '1';
    if (session()->has('shopID')) {
      $shopID = session('shopID');
    }
    $res = $client->get('http://localhost/smaapi/employee/index2.php?id='.$req->id.'&shop_id='.$shopID);
    $employee = \GuzzleHttp\json_decode($res->getBody());
    return view('Pages.Employee.Edit', compact('employee'));
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
      'http://localhost/smaapi/employee/restore_multi_field.php',
      [
        'form_params' => [
          'id' => $req->id,
          'name' => $req->name,
          'picture_name' => $fileNameToStore,
          'address' => $req->address,
          'gender' => $req->gender,
          'phone' => $req->phone,
        ]
      ]
    );

    return redirect(route('listEmployee'));
  }

  public function logout(Request $req) {
    session()->flush();
    return redirect()->route('login');
  }
}
