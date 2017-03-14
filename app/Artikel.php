<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    //
    Protected $table 		= 'artikel';
    Protected $primarykey	= 'id_artikel';
    Protected $fillable		= ['slug_judul','judul','isi'];
    //mematikan fungsi auto increment
    Public $incrementing	= false;
}
