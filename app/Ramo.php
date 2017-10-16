<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Ramo extends Model{
    protected $table = 'ramo';

    public $fillable = [
        'area_id',
        'description',
        'state',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function Area(){
        return $this->belongsTo(Area::class);
    }

    public function Caso(){
        return $this->belongsTo(Caso::class);
    }

    public function Documento(){
            return $this->belongsToMany(Documento::class, 'documento_ramo','ramo_id','documento_id');
      }

    public function CoberturaModel(){
        return $this->belongsTo(CoberturaModel::class);
    }

}
