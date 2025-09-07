<?php

namespace App\Controllers;

class Home extends BaseController

{
  public function index() : string
  {
            return view('layout', [
            'title'   => 'Главная',
            'content' => view('home')
        ]);

      }
}