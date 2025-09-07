<?php namespace App\Controllers;
use App\Models\CardsModel; use CodeIgniter\HTTP\ResponseInterface;
class Board extends BaseController {
  public function index(){
    $m=new CardsModel();
    $plan=$m->where('type','task')->where('status','План')->findAll();
    $work=$m->where('type','task')->where('status','В работе')->findAll();
    $done=$m->where('type','task')->where('status','Готово')->findAll();
    return view('layout',['title'=>'Доска задач','content'=>view('board/index',[
      'cardsByColumn'=>['План'=>$plan,'В работе'=>$work,'Готово'=>$done]
    ])]);
  }
  public function create(){
    $m=new CardsModel(); $d=$this->request->getPost();
    $id=$m->insert(['type'=>'task','title'=>trim($d['title']??'Новая задача'),'description'=>trim($d['description']??''),
      'status'=>$d['status']??'План','assignee_id'=>0,'due_at'=>null,
      'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]);
    return $this->response->setJSON(['status'=>'ok','id'=>$id]);
  }
  public function move(){
    $id=(int)($this->request->getPost('card_id')??0); $st=$this->request->getPost('status');
    if(!$id||!$st){ return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)->setJSON(['status'=>'error']); }
    (new CardsModel())->update($id,['status'=>$st,'updated_at'=>date('Y-m-d H:i:s')]);
    return $this->response->setJSON(['status'=>'ok']);
  }
}