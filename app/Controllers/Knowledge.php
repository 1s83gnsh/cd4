<?php namespace App\Controllers;
use App\Models\KbArticlesModel;
class Knowledge extends BaseController {
  public function index(){ $a=(new KbArticlesModel())->orderBy('id','desc')->findAll();
    return view('layout',['title'=>'База знаний','content'=>view('knowledge/index',['articles'=>$a])]); }
}