<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Soal extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['soal','pernyataanA','pernyataanB'];
    # soft delete 
    protected $dates = ['deleted_at'];
    /**
     * Join tabel Pernyataan 
     */
    public function jawabA()
    {
        return $this->hasOne(Pernyataan::class, 'id', 'pernyataanA');
    }

    public function jawabB()
    {
        return $this->hasOne(Pernyataan::class, 'id', 'pernyataanB');
    }
}
