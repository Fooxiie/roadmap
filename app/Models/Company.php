<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'address',
        'city',
        'country',
        'phone',
        'email',
        'website',
        'logo',
    ];

    /**
     * Get the users that belong to the company.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
} 