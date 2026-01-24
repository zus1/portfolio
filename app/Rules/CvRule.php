<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;

class CvRule implements ValidationRule
{
    public function __construct(
        private readonly int $maxSize = 2097152,
        private readonly array $allowedMimeTypes = ['application/pdf'],
    ){
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /** @var UploadedFile $file */
        $file = $value;

        if($file->getSize() > $this->maxSize) {
            $fail(sprintf('Max cv size can not exceed %d bytes', $this->maxSize));
        }
        if(!in_array($file->getMimeType(), $this->allowedMimeTypes, true)) {
            $fail(sprintf('Invalid file type. Allowed are: %s)', implode(',', $this->allowedMimeTypes)));
        }
    }
}
