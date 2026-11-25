<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const ROLE_OWNER = 'owner';
    public const ROLE_DESAINER = 'desainer';

    public const STYLE_OPTIONS = [
        'Logo Esports',
        'Mascot',
        'Overlay Streamer',
        'Desain Jersey',
        'Poster & Banner',
        'Thumbnail',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'style_specializations',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'style_specializations' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function isOwner(): bool
    {
        return $this->role === self::ROLE_OWNER;
    }

    public function isDesainer(): bool
    {
        return $this->role === self::ROLE_DESAINER;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeDesainers($query)
    {
        return $query->where('role', self::ROLE_DESAINER);
    }
}
