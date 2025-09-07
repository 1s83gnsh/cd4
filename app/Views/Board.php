<?php namespace App\Controllers;
use CodeIgniter\HTTP\ResponseInterface;

class Board extends BaseController
{
    private function demoCards(){
        return [
            'План'=>[ ['id'=>1,'title'=>'Пример задачи','description'=>'Проверка перетаскивания'] ],
            'В работе'=>[ ['id'=>2,'title'=>'Импорт из 1С','description'=>'Каталог JSON'] ],
            'Готово'=>[]
        ];
    }

    public function index()
    {
        $cardsByColumn = $this->demoCards();
        return view('layout',[
            'title'=>'Доска задач',
            'content'=>view('board/index',['cardsByColumn'=>$cardsByColumn])
        ]);
    }

    public function create(){ return $this->response->setJSON(['status'=>'ok','id'=>999]); }

    public function move()
    {
        $cardId = (int)($this->request->getPost('card_id') ?? 0);
        $status = $this->request->getPost('status');
        if(!$cardId || !$status){
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                                  ->setJSON(['status'=>'error','message'=>'Неверные параметры']);
        }
        return $this->response->setJSON(['status'=>'ok']);
    }
}
