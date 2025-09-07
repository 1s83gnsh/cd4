<?php namespace App\Controllers\Api;
use App\Controllers\BaseController; use App\Models\KbArticlesModel;
class Knowledge extends BaseController {
  public function search(){ $q=trim($this->request->getGet('q')??''); if($q==='') return $this->response->setJSON(['items'=>[]]);
    $items=(new KbArticlesModel())->like('title',$q)->select('id,title')->findAll(20); return $this->response->setJSON(['items'=>$items]); }
}