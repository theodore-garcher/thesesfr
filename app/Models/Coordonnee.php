<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordonnee extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_etablissement';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_etablissement', 'longitude', 'latitude'];
    public $timestamps = false;
}
