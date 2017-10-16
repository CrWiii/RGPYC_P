<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoSolicitado extends Model
{
   	protected $table = 'documentos_solicitados';
    
    public $fillable = [
       'route'
      ,'informe_documento_id'
      ,'state'
      ,'created_by'
      ,'updated_by'
      ,'created_at'
      ,'updated_at'
      ];


      public function Informe(){
            return $this->belongsTo(Informe::class, 'informe_documento','documento_id', 'informe_id');
      }
}
