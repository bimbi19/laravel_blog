<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    Protected $table 		= 'crud';
    Protected $primarykey	= 'id';
    Protected $fillable		= ['slug_judul','judul','isi'];
    //mematikan fungsi auto increment
    Public $incrementing	= false;
    //Public $timestamps		= false;
    
}

