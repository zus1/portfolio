<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

trait RemoveOldFile
{
    private static function removeOldFile(Model $model, string $attribute): void
    {
        if(
            $model->isDirty($attribute)
            && ($original = $model->getOriginal($attribute)) !== null
            && Storage::disk('public')->exists($original)
        ) {
            Storage::delete($original);
        }
    }
}
