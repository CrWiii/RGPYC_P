<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model{
	protected $table = 'media';

	public $fillable = [
		'title',
		'album_name',
		'route',
	    'media_type',
	    'state',
	    'created_by',
	    'updated_by',
	    'created_at',
	    'updated_at'
	];

}
