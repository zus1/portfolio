<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property bool $active
 * @property string $created_at
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'active',
        'category_id',
        'image'
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
            if(
                $post->isDirty('image')
                && ($original = $post->getOriginal('image')) !== null
                && Storage::disk('public')->exists($original)
            ) {
                Storage::delete($original);
            }
        });
    }
}
