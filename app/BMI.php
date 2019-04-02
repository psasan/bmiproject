<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BMI extends Model
{
    //
    protected $table = 'bmi';
    protected $fillable = [
        'tanggal',
        'tinggi',
        'berat',
        'bmi',
        'id_user'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
