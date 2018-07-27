<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraans'; 
    // protected $primaryKey = 'id_kendaraan'; Misal kita memakai nama id_kendaraan
    public $incrementing = false; // defaultnya true
    //public $timestamps = false; //Jika kita tidak ingin menggunakan kedua kolom created_at dan updated_at
    protected $fillable = [
        'nama_kendaraan', 'jenis_kendaraan', 'buatan', 'user_id', 'created_at', 'updated_at'
    ];


    /**
     * Untuk mendapatkan data users yang berelasi dengan kendaraan.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
