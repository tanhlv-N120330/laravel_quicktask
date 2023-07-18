<?php

namespace App\Models;

use App\Models\Scopes\UserIsActiveScope;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->BelongsToMany(Role::class)
            ->withTimestamps();
    }

    protected function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    protected function setUsernameAttribute($value)
    {
        $this->attributes['username'] = Str::slug($value);
    }

    public function scopeIsAdmin($query)
    {
        return $query->where('is_admin', true);
    }

    protected static function booted()
    {
        static::addGlobalScope(new UserIsActiveScope);
    }
}
