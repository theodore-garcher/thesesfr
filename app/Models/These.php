<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class These extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_these';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_these', 'auteur', 'titre', 'id_auteur', 'directeur', 'directeur_np', 'id_directeur', 'etablissement_soutenance', 'id_etablissement', 'discipline', 'statut', 'date_premiere_inscription', 'date_soutenance', 'langue', 'accessible_online', 'publi_thesesfr', 'maj_thesesfr'];

    public $timestamps = false;
}
