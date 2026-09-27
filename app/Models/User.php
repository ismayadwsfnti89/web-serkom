<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;   // opsional

class User extends Authenticatable
{
    // use HasUuids;  // kalau mau auto-generate UUID

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_user', 'nama', 'username', 'password', 'role',
    ];

    protected $hidden = ['password'];

    public function isAdmin(): bool
    {
        return $this->role === 'admin';     // ← lowercase
    }

    public function isOperator(): bool
    {
        return $this->role === 'operator';  // ← lowercase
    }
}
