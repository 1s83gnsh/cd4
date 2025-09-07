<?php namespace App\Models;
use CodeIgniter\Model;
class CardsModel extends Model {
  protected $table='cards'; protected $primaryKey='id'; protected $returnType='array'; protected $allowedFields=['*']; }
