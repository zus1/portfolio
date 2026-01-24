<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $phone
 * @property string $social
 * @property string $subject
 * @property string $message
 * @property string $created_at
 */
class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'social',
        'message',
        'name',
        'subject'
    ];
}
