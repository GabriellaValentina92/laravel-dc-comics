<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    //vengono compilati solo i campi inseriti nel fillable il resto viene lasciato null ma nn da errore (se vogliamo fare il metodo corto)
    //protected $fillable = ['title', 'description', 'series', 'type', 'price']; 
}
