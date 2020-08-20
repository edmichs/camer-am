<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
   protected $table = "zonegeo";
   protected $primaryKey = 'ID';
	public $timestamps = false;
}
