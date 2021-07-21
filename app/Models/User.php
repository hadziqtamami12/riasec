<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany, HasOne};
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'password',
        'nim',
        'programstudi_id',
        'profile_image',
        'is_email_verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    # soft delete 
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relasi dengan tabel Role
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class,'role_users');
    }

    /**
     * proteksi halaman, dimana ketika membuka halaman yang tidak sesuai
     * role dari user maka akan dialihkan ke halaman lain
     */
    public function hasRole($role){
        return $this->roles()->where('name', $role)->count() == 1;
    }

    /**
     * Relasi User dengan ProgramStudi
     *  one(ProgramStudi) to many(User)
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function programstudi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    /**
     * Setting image profile
     * 
     * @return mixed
    */
    public function getImageAttribute()
    {
        return $this->profile_image;
    }

    /**
     * Relasi User dengan Tes
     *  one(user) to many(tes)
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tests(): HasMany
    {
        return $this->hasMany(TestKepribadian::class);
    }


    /**
     * Get the currentTest associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function currentTest(): HasOne
    {
        return $this->hasOne(TestKepribadian::class)->where('finished_at', null);
    }
}
