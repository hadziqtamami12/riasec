<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramStudi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['program_studi','slug','backgroundColor','borderColor','pointBorderColor'];
    
    # soft delete 
    protected $dates = ['deleted_at'];
    
    /**
     * Relasi User dengan ProgramStudi
     *  one(programstudi) to many(user)
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
