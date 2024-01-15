<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaUpakara extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ta_upakara';
    protected $primaryKey = 'id_upakara';

    protected $fillable = [
        'hari_id',
        'pebayuh',
        'sedahan_ngurah',
        'genah',
        'ket',
        'created_by'
    ];

}
