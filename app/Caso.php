<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model{
      
      protected $table = 'caso';

      public $fillable = [
            //  'area_id'  
            // ,'num_ajuste' /* Autogenerado */
            // ,'num_siniestro_cia' /* DONE */
            // ,'num_siniestro_broker' /* DONE */
            // ,'fecha_siniestro' /* DONE */
            // ,'fecha_denuncia'
            // ,'fecha_asignacion'
            // ,'cia_id' /* DONE */
            // ,'broker_id' /* DONE */
            // ,'asegurado_id' /* DONE */
            // ,'tercero_afectado_id'
            // ,'num_poliza' /* DONE */
            // ,'ramo_id' /* DONE */
            // ,'tipo_siniestro_id' /* DONE */
            // ,'causa_siniestro_id'
            // ,'ubigeo_id'
            // ,'descripcion_siniestro' /* DONE */
            // ,'moneda'
            // ,'deducible'
            // ,'monto_reclamo'
            // ,'reserva_inicial'
            // ,'ajustador_asignado'
            // ,'ejecutivo_aseguradora_id' /* DONE */
            // ,'ejecutivo_broker_id' /* DONE */
            // ,'num_portal_cia'
            // ,'fecha_primer_contacto'
            // ,'inspeccion_coordinada' /* DONE */
            // ,'fecha_inspeccion' /* DONE */
            // ,'fecha_informe_basico'
            // ,'fecha_informe_preliminar'
            // ,'fecha_informe_complementario'
            // ,'fecha_solicitud'
            // ,'fecha_entrega'
            // ,'num_documentos_pendientes'
            // ,'gestion_asegurado'
            // ,'recordatorios'
            // ,'pasos_seguir'
            // ,'fecha_comentarios'
            // ,'fecha_iforme_final'
            // ,'monto_indemnizable'
            // ,'estado_reclamo'
            // ,'fecha_check_list'
            // ,'observaciones' 
            // ,'honorarios'
            // ,'gastos'
            // ,'fecha_factura'
            "num_ajuste",
            "notifier_type_id",
            "notifier_id" ,
            "notifier_mean_id",
            "notifier_date",
            "confirming_who_name",
            "confirming_who_id",
            "confirming_position",
            "confirming_mean_id",
            "confirming_date",
            "cia_id",
            "broker",
            "broker_id",
            "inspector_id",
            "num_poliza",
            "tipo_poliza_id",
            "vigencia_poliza",
            "vigencia_poliza_end",
            "ejecutivo_aseguradora_name",
            "ejecutivo_aseguradora_id",
            "ejecutivo_broker_name",
            "ejecutivo_broker_id",
            "ejecutivo_aseguradora_telefono",
            "ejecutivo_broker_telefono",
            "ejecutivo_aseguradora_correo",
            "ejecutivo_broker_correo",
            "num_siniestro_cia",
            "num_siniestro_broker",
            "contratante_name",
            "contratante_id",
            'giro_negocio',
            "contact_contratante_name",
            "contact_contratante_id",
            "asegurado_name",
            "asegurado_id",
            "contact_contratante_telefono",
            "fecha_siniestro",
            "contact_contratante_email",
            "lugar_siniestro",
            "ubigeo_name",
            "ubigeo_id",
            "descripcion_siniestro",
            "ramo_id",
            "tipo_siniestro_id",
            "ajustador_asignado_id",
            "tipo_ajuste_id",
            "fecha_coordinacion_inspeccion",
            "direccion_inspeccion",
            "fecha_programada_inspeccion",
            "fecha_realizacion_inspeccion",
            "direccion_referencia",
            "contact_inspeccion_name",
            "contact_inspeccion_id",
            "contact_inspeccion_telefono",
            'empresa_tranporte',
            'placa_rodaje',
            'unidad_nombre',
            'nombre_conductor',
            'num_lincencia',
            'categoria_vencimiento',
            'seguridad',
            'nombre_dni',
            'nombre_mar',
            'bandera',
            'clasificacion',
            'autoguedad',
            'club_pi',
            'representante_mar',
            'num_bl',
            'gestor_correo',
            'gestor_telefono',
            'gestor_ajustador',
            'nombre_linea',
            'representante_area',
            'alamacen_aliado',
            'responsable_id',
            'moneda',
            'num_awb',
            'fecha_solicitud_documento',
            'estado_id',
            'motivo_sininspeccion',
            'observaciones_temp',
            'gestion_documentacion',
            'pasos_seguir_seg',
            'ultima_actuacion',
            'otros_comentarios',
            'reserva_text',
            "fecha_convenio",
            'monto_text',
            'fecha_recep_convenio_f',      
      ];
      public function Cia(){
            return $this->belongsTo(Cia::class);
      }
      public function Ramo(){
            return $this->belongsTo(Ramo::class);
      }
      public function Persona(){
            return $this->belongsTo(Persona::class);
      }
	public function Area(){
		return $this->belongsTo(Area::class);
	}
	public function Broker(){
		return $this->belongsTo(Broker::class,'broker_id','id');
	}
	public function Asegurado(){
		return $this->belongsTo(Asegurado::class);
	}
	public function TipoSiniestro(){
		return $this->belongsTo(TipoSiniestro::class);
	}
	public function CausaSiniestro(){
		return $this->belongsTo(CausaSiniestro::class);
	}
	public function Ubigeo(){
		return $this->belongsTo(Ubigeo::class);
	}
      public function Informe(){
            return $this->hasMany(Informe::class);
      }
      public function InformesPasados(){
            return $this->hasMany(InformesPasados::class);
      }
      public function Ajustador(){
            return $this->belongsTo(Ajustador::class,'ajustador_asignado_id','id');
      }
      public function Firmas(){
            return $this->belongsToMany(Firma::class,'firma','caso_id','persona_id');
      }
      public function Inspector(){
            return $this->belongsTo(Persona::class);     
      }
      public function Clausula(){
            return $this->hasMany(Clausula::class);
      }
      public function Cobertura(){
            return $this->hasMany(Cobertura::class);
      }
      public function Notifier(){
            return $this->belongsTo(Notifier::class,'notifier_id','id');
      }
      public function Confirming(){
            return $this->belongsTo(Confirming::class,'confirming_who_id','id');
      }
      public function Responsable(){
            return $this->belongsTo(Responsable::class,'responsable_id','id');
      }
      public function EjecutivoAseguradora(){
            return $this->belongsTo(EjecutivoAseguradora::class,'ejecutivo_aseguradora_id','id');
      }
      public function EjecutivoBroker(){
            return $this->belongsTo(EjecutivoBroker::class,'ejecutivo_broker_id','id');
      }
      public function ContactoContratante(){
            return $this->belongsTo(ContactoContratante::class,'contact_contratante_id','id');
      }
      public function ContactoInspeccion(){
            return $this->belongsTo(ContactoInspeccion::class, 'contact_inspeccion_id','id');
      }
      public function Equipo(){
            return $this->hasMany(Equipo::class);
      }
      public function NotifierType(){
            return $this->belongsTo(NotifierType::class);
      }
      public function TipoPoliza(){
            return $this->belongsTo(TipoPoliza::class);
      }
      public function TipoTransporte(){
            return $this->belongsTo(TipoTransporte::class);
      }
       public function Estado(){
            return $this->belongsTo(Estado::class);
      }
      public function TercerAfectado(){
            return $this->hasMany(TercerAfectado::class);
      }
      public function Mean(){
            return $this->belongsTo(Mean::class, 'notifier_mean_id','id');
      }
      public function DetalleMercaderia(){
            return $this->hasMany(DetalleMercaderia::class);
      }
      public function Registrador(){
            return $this->belongsTo(Registrador::class,'created_by','id');
      }
      public function UltimoModificador(){
            return $this->belongsTo(UltimoModificador::class,'updated_by','id');
      }
      public function VitacoraEspera(){
            return $this->hasMany(VitacoraEspera::class);
      }
      public function Vitacora(){
            return $this->hasMany(Vitacora::class);
      }
      public function VitacoraGastos(){
            return $this->hasMany(VitacoraGastos::class);
      }
      public function VitacoraSeguimiento(){
            return $this->hasMany(VitacoraSeguimiento::class);
      }
      public function DocumentoSolicitado(){
            return $this->hasMany(DocumentoSolicitado::class);
      }
      static function getCasosInspFinSinIB($ConFiltro){
            $result = Caso::join('informe','informe.caso_id','=','caso.id')
                  ->join('broker','broker.id','=','caso.broker_id')
                  ->join('cia','cia.id','=','caso.cia_id')
                  ->join('area','area.id','=','caso.area_id')
                  ->selectRaw('caso.id caso_id,
                                    area.description area,
                                    caso.area_id,
                                    num_ajuste,
                                    asegurado_name,
                                    broker.description broker_name,
                                    cia.nombre_comercial cia_name,
                                    caso.created_by,
                                    caso.updated_by,
                                    caso.created_at,
                                    caso.updated_at,
                                    DATEDIFF(hour, caso.fecha_iforme_final, GETDATE()) as diff_hours,
                                    DATEDIFF(day, caso.fecha_iforme_final, GETDATE()) as diff_days')
            ->where('caso.id','>',155)
            ->where('informe.tipo_informe_id',1)
            ->whereIN('caso.estado_id',[1,2,3])
            ->WhereNotNull('caso.fecha_iforme_final')
            ->WhereNull('informe.generated_at')
            ->orderBy('caso.id')
            ->with('Registrador','UltimoModificador')
            ->get();
            $casos = $result->filter(function($value, $key) use ($ConFiltro){
                  if($ConFiltro){
                        return $value->diff_hours > 48;
                  }else{
                        return $value->diff_hours;
                  }
            });
            return $casos->all();      
      }
}