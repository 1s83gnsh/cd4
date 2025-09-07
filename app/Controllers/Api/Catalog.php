<?php namespace App\Controllers\Api;
use App\Controllers\BaseController; use App\Models\ProductsModel;
class Catalog extends BaseController {
  public function import(){
    $d=$this->request->getJSON(true); $items=$d['items']??[]; $m=new ProductsModel(); $n=0;
    foreach($items as $it){
      $ex=$m->where('sku',$it['sku']??'')->first();
      $row=[ 'sku'=>$it['sku']??'','name'=>$it['name']??'','uom'=>($it['uom']??'шт'),'price'=>($it['price']??0),
             'config_1c'=>($it['config_1c']??'Retail'),'code_1c'=>($it['code_1c']??null),'guid_1c'=>($it['guid_1c']??null),'active'=>1 ];
      if($ex) $m->update($ex['id'],$row); else $m->insert($row); $n++;
    }
    return $this->response->setJSON(['status'=>'ok','imported'=>$n]);
  }
}