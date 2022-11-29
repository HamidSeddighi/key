<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (\Illuminate\Http\Request $request) {

    if ($request->session()->has("shift_key")){
        $is_shift_on = $request->session()->get("shift_key");
    }else{
        $is_shift_on = false;
    }

    if ($is_shift_on){
        $buttons = new collection(range(65 , 90));
    }else{
        $buttons = new collection(range(97 , 122));
    }

    if ($request->session()->has("current_text")){
        $passed_content = $request->session()->get("current_text");
    }else{
        $passed_content = "Please be comfortable to write your text down here!";
    }

    return view('index')->with(compact("passed_content" ,"buttons" , "is_shift_on"));
});




Route::post("/submit-key" , function (\Illuminate\Http\Request $request){
    $space = " ";
   if ($request->get("pressed_key") == "Shift"){
       if ($request->session()->has("shift_key")){
           $is_shift_on = $request->session()->get("shift_key");
       }else{
           $is_shift_on = false;
       }

       $request->session()->put("shift_key" , !$is_shift_on);
       $result = $request->get("content_container");
   }else if ($request->get("pressed_key") == "Enter"){
       $result = $request->get("content_container")  . " " . "\n";
   }else if ($request->get("pressed_key") == "Space"){
       $result = $request->get("content_container")  . " ". $space;
   }else{
       $result = $request->get("content_container") . $request->get("pressed_key");
   }

   $request->session()->put("current_text" , $result);
   return redirect()->back();
});