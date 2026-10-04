<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class User extends Authenticatable
{
    use HasUuids;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_user', 'nama', 'username', 'password', 'role',
    ];

    protected $hidden = ['password'];

    /**
     * Kasih tahu Laravel kalau primary key-nya bukan 'id'
     */
    public function getAuthIdentifierName()
    {
        return 'id_user';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isOperator(): bool
    {
        return $this->role === 'operator';
    }
}