<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string name
 * @property string $email
 * @property string $avatar
 * @property bool $about
 * @property array $roles
 * @property string $created_at
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'about'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'roles' => 'array',
        ];
    }

    public function hasRole(string $role): bool
    {
        return in_array($role, $this->roles);
    }

    public function hasAnyRoles(array $roles): bool
    {
        return array_intersect($roles, $this->roles) !== [];
    }

    public function hasAllRoles(array $roles): bool
    {
        return array_intersect($roles, $this->roles) === $roles;
    }

    protected static function booted(): void
    {
        static::updating(function (User $user) {
            if(
                $user->isDirty('avatar')
                && ($original = $user->getOriginal('avatar')) !== null
                && Storage::disk('public')->exists($original)
            ) {
                Storage::delete($original);
            }
        });
    }
}
