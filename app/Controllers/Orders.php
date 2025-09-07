<?php namespace App\Controllers;
use App\Models\OrdersModel;
class Orders extends BaseController {
  public function index(){ $o=(new OrdersModel())->orderBy('id','desc')->findAll();
    return view('layout',['title'=>'Заказы (1С)','content'=>view('orders/index',['orders'=>$o])]); }
}