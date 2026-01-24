<?php

namespace App\Models;

use App\Traits\RemoveOldFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $url
 * @property bool $active
 * @property string $created_at
 */
class Post extends Model
{
    use HasFactory, RemoveOldFile;

    protected $fillable = [
        'title',
        'description',
        'active',
        'category_id',
        'image',
        'url',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    protected static function booted(): void
    {
        static::updating(function (Post $post) {
            self::removeOldFile($post, 'image');
        });
    }
}
