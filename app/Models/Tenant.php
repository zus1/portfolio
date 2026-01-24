<?php

namespace App\Models;

use App\Traits\RemoveOldFile;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email
 * @property string $phone
 * @property string $socials
 * @property string $logo
 * @property string $cv
 * @property bool $active
 */
class Tenant extends Model
{
    use HasFactory, RemoveOldFile;

    protected $fillable = [
        'email',
        'phone',
        'socials',
        'logo',
        'active',
        'cv',
    ];

    protected function casts(): array
    {
        return [
            'socials' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::updating(function (Tenant $tenant) {
            static::removeOldFile($tenant, 'logo');
            static::removeOldFile($tenant, 'cv');
        });
    }

    protected function socials(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => json_decode($value, true),
            set: fn(string $value) => $value
        );
    }
}
