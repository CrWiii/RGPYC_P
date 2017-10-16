<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model{
	protected $table = 'documento';

	public function Ramo(){
            return $this->belongsToMany(Ramo::class, 'documento_ramo', 'documento_id' ,'ramo_id');
      }

      public function Informe(){
            return $this->belongsToMany(Informe::class, 'informe_documento', 'documento_id','informe_id');
      }

      public function InfoDoc(){
            return $this->belongsTo(InfoDoc::class);
    }

}