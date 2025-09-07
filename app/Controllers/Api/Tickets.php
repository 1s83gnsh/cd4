<?php namespace App\Controllers\Api;
use App\Controllers\BaseController; use App\Models\TicketsModel;
class Tickets extends BaseController {
  public function export(){ $items=(new TicketsModel())->select('id,title,code_1c,guid_1c')->findAll(); return $this->response->setJSON(['items'=>$items]); }
  public function update(){
    $d=$this->request->getJSON(true); $items=$d['items']??[]; $m=new TicketsModel(); $u=0;
    foreach($items as $it){ if(!isset($it['code_1c'])) continue; $t=$m->where('code_1c',$it['code_1c'])->first(); if(!$t) continue;
      if(isset($it['status'])){ $m->update($t['id'],['status'=>$it['status']]); $u++; } }
    return $this->response->setJSON(['status'=>'ok','updated'=>$u]);
  }
}