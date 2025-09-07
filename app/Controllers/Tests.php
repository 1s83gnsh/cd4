<?php namespace App\Controllers;
use App\Models\TestsModel;
class Tests extends BaseController {
  public function index(){ $t=(new TestsModel())->orderBy('id','desc')->findAll();
    return view('layout',['title'=>'Тесты','content'=>view('tests/index',['tests'=>$t])]); }
}