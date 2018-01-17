<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::get('/updateProfile', function () {
  return view('testfirebase');
});

Route::get('/testfirebase', function () {

  $data = ['name' => 'Anucha' , 'surname' => 'Hongtrakulchai'];

  Firebase::update('/Users/profile/obj01/',$data);

  $result = Firebase::get('/Users/profile/obj01/');

  $decode_result = json_decode($result, true);

  return $decode_result['name'];

});

Route::get('/testfirebase2', function () {

  $data = ['name' => 'Pornpimon' , 'surname' => 'Kwanyen', 'age' => '21', 'birth' => '22-02-1996', 'prefix' => 'Miss', 'profile_status' => 'yes', 'sodier' => 'no', 'std_id' => '2' ];

  $result = Firebase::set('/Users/profile/obj02', $data);

  $decode_result = json_decode($result, true);

  return $decode_result;

});

Route::get('/testfirebase3', function () {

  $result = Firebase::get('/Users/profile/');

  $decode_result = json_decode($result, true);

  return $decode_result;

});

Route::get('/testfirebase4', function () {

  $result = Firebase::get('/Users/profile/');

  $decode_result = json_decode($result, true);

  foreach ($decode_result as $key => $value) {
    # code...
    if($value['std_id']=='2'){
      return $key;
    }
  }
});


Route::get('/testfirebase5', function () {

  // $data = ['Users' => ['profile' => [['name' => 'Pornpimon' , 'surname' => 'Kwanyen', 'age' => '21', 'birth' => '22-02-1996', 'prefix' => 'Miss', 'profile_status' => 'yes', 'sodier' => 'no', 'std_id' => '1' ]]]];

  $data = ['name' => 'Pornpimon' , 'surname' => 'Kwanyen', 'age' => '21', 'birth' => '22-02-1996', 'prefix' => 'Miss', 'profile_status' => 'yes', 'sodier' => 'no', 'std_id' => '1' ];

  $result = Firebase::push('/Users/profile/', $data);

  $decode_result = json_decode($result, true);

  return $decode_result;

});
