<?php namespace App\Controllers;
class Projects extends BaseController {
    public function index(){
        $projects=[['id'=>1,'name'=>'Интеграция 1С','description'=>'Обмен заказами','stages'=>[['id'=>1,'name'=>'Анализ','status'=>'Готово'],['id'=>2,'name'=>'Разработка','status'=>'В работе']]]];
        return view('layout',['title'=>'Проекты и этапы','content'=>view('projects/index',['projects'=>$projects])]);
    }
}