<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarea extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tareas';

    protected $fillable = [
        'usuario_id',
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'archivos',
        'estado',
        'prioridad',
        'responsable',
    ];

    protected $dates = [
        'fecha_inicio',
        'fecha_fin',
    ];

    protected $casts = [
        'fecha_inicio'      => 'date:Y-m-d',
        'fecha_fin'         => 'date:Y-m-d',
        'archivos'          => 'array',
    ];

    public function usuario(){
        return $this->belongsTo(User::class,'usuario_id','id');
    }
}
