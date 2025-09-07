<?php namespace App\Controllers;
class Help extends BaseController {
    public function index(){
        $pages=[['id'=>1,'title'=>'Как создать задачу','content'=>'+ Задача → заполнить форму'],['id'=>2,'title'=>'Как пройти тест','content'=>'Раздел Тесты → выбрать тест']];
        return view('layout',['title'=>'Справка','content'=>view('help/index',['pages'=>$pages])]);
    }
}