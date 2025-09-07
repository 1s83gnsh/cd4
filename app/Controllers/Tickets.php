<?php namespace App\Controllers;
use App\Models\TicketsModel;
class Tickets extends BaseController {
  public function index(){ $t=(new TicketsModel())->orderBy('id','desc')->findAll();
    return view('layout',['title'=>'Обращения','content'=>view('tickets/index',['tickets'=>$t])]); }
}