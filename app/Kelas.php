<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "kelas";

    protected $fillable = [
        'kelas'
    ];

    public function jadwal() 
    {
        return $this->hasMany('App\Jadwal_mapel','kelas_id', 'id');
    }
    
    public function absensi() 
    {
        return $this->hasMany('App\Absensi','kelas_id', 'id');
    }
    public function Siswa() 
    {
        return $this->hasMany('App\Siswa','kelas_id', 'id');
    }

}
