<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKepribadian extends Model
{
    use HasFactory;
    protected $fillable = [
        'namatipe',
        'slug',
        'keterangan_tipe',
        'julukan_tipe',
        'deskripsi_tipe',
        'arti_sukses',
        'saran_pengembangan',
        'kebahagiaan_tipe',
        'image_tipe'
    ];

    # menambahkan metode pengakses baru untuk mendapatkan gambar
    public function getImageAttribute()
    {
        return $this->image_tipe;
    }
    
    /**
     * Relasi one to many
     * tipekepribadian > ciri kepribadian
     */ 
    public function ciriTipekeps()
    {
        return $this->hasMany(TipekepCiri::class, 'tipekep_id');
    }
    /**
     * Relasi one to many
     * tipekepribadian > kelebihantipe
     */
    public function kelebihanTipekeps()
    {
        return $this->hasMany(TipekepKelebihan::class, 'tipekep_id');
    }
    /**
     * Relasi one to many
     * tipekepribadian > kekurangantipe
     */
    public function kekuranganTipekeps()
    {
        return $this->hasMany(TipekepKekurangan::class, 'tipekep_id');
    }
    /**
     * Relasi one to many
     * tipekepribadian > saranprofesi
     */
    public function profesiTipekeps()
    {
        return $this->hasMany(TipekepProfesi::class, 'tipekep_id');
    }
    /**
     * Relasi one to many
     * tipekepribadian > partneralami
     */
    public function partnerTipekeps()
    {
        return $this->hasMany(TipekepPartner::class, 'tipekep_id');
    }

    /**
     * Hubungkan dengan tes yang pernah dilakukan
    */
    public function tests()
    {
        return $this->hasMany(TestKepribadian::class, 'tipekep_id');
    }
}
