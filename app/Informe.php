<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $table = 'informe';


    public $fillable = [
       'tipo_informe_id'
      ,'num_informe'
      ,'informacion_general'
      ,'lugar_siniestro'
      ,'ocurrencia'
      ,'inspeccion'
      ,'investigaciones'
      ,'danos'
      ,'causas'
      ,'cobertura'
      ,'reclamo_asegurado'
      ,'reserva'
      ,'medidas_control'
      ,'recomendaciones'
      ,'poliza_cobertura'
      ,'situacion_actual'
      ,'anexos'
      ,'subtitulo'
      ,'caso_id'
      ,'state'
      ,'enviar_copia_poliza' 
      ,'enviar_num_siniestro'
      ,'nf_comentario'
      ,'generated_at'
      ,'route'

      ];

      public function Caso(){
            return $this->belongsTo(Caso::class);
      }
      
      public function Images(){
            return $this->belongsToMany(Images::class, 'informe_imagen', 'informe_id', 'image_id');
      }

      public function TipoInforme(){
            return $this->belongsTo(TipoInforme::class);
      }
      public function Content(){
            return $this->belongsToMany(Content::class, 'info_content','informe_id','content_id');
      }
      public function Documento(){
            return $this->belongsToMany(Documento::class, 'informe_documento','informe_id', 'documento_id');
      }

       public function InfoDoc(){
            return $this->belongsTo(InfoDoc::class);
    }

    public function DocumentoGenerado(){
            return $this->hasMany(DocumentoGenerado::class);
    }

    public function DocumentoSolicitado(){
            return $this->belongsToMany(DocumentoSolicitado::class, 'informe_documento','informe_id', 'documento_id');
    }
}
