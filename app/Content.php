<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model{
	
	protected $table = 'content';
    protected $fillable = ['title','content','state','created_by','updated_by'];

    public function Informe(){
        return $this->belongsToMany(Informe::class, 'info_content','content_id','informe_id');
    }

    public function ModelContent(){
		return $this->belongsTo(ModelContent::class);
	}
    	
}
