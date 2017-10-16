<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoGenerado extends Model
{
     protected $table = 'documentos_generados';

      public $fillable = [
       'tipo_doc_generado'
      ,'informe_id'
      ,'num_carta'
      ,'generated_at'
      ,'state'
      ,'created_by'
      ,'updated_by'
      ,'created_at'
      ,'updated_at'
      ];

      public function Informe(){
            return $this->belongsTo(Informe::class);
      }
}
