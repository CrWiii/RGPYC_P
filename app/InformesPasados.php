<?php 
namespace App;
use Illuminate\Database\Eloquent\Model;

class InformesPasados extends Model{
	protected $table = 'informes_pasados';

	protected $fillable = [
		'route'
		,'tipo_informe_id'
        ,'num_informe'
        ,'caso_id'
        ,'state'
        ,'created_by'
        ,'updated_by'
	];

	public function Caso(){
		return $this->belongsTo(Caso::class);
	}
	
	public function TipoInforme(){
            return $this->belongsTo(TipoInforme::class);
      }

}