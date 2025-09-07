<?php namespace App\Controllers\Api;
use App\Controllers\BaseController; use App\Models\OrdersModel;
class OneC extends BaseController {
  public function exportOrder(){
    $id=(int)($this->request->getJSON(true)['order_id']??0);
    $o=(new OrdersModel())->find($id);
    if(!$o) return $this->response->setJSON(['status'=>'error','message'=>'Заказ не найден']);
    return $this->response->setJSON(['status'=>'ok','payload'=>['id'=>$o['id'],'code_1c'=>$o['code_1c'],'guid_1c'=>$o['guid_1c']]]);
  }
  public function updateOrder(){
    $d=$this->request->getJSON(true); $code=$d['code_1c']??null;
    if(!$code) return $this->response->setJSON(['status'=>'error','message'=>'code_1c обязателен']);
    $m=new OrdersModel(); $o=$m->where('code_1c',$code)->first(); if(!$o) return $this->response->setJSON(['status'=>'error','message'=>'Заказ не найден']);
    $u=[]; if(isset($d['status'])) $u['status']=$d['status']; if(isset($d['paid_total'])) $u['paid_total']=$d['paid_total'];
    if($u) $m->update($o['id'],$u); return $this->response->setJSON(['status'=>'ok']);
  }
}