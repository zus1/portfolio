<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;

class ImageRule implements ValidationRule
{
    private const array ALLOWED_MIME_TYPES = [
        'image/png',
        'image/jpg',
        'image/jpeg'
    ];

    public function __construct(
        private readonly int $maxSize, //bytes
        private readonly int $maxWidth,
        private readonly int $maxHeight,
        private readonly float $allowedRatio,
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

        $this->validateSize($file, $fail);
        $this->validateMimeType($file, $fail);
        $this->validateDimensions($file, $fail);
    }

    public function validateSize(UploadedFile $file, Closure $fail): void
    {
        if($file->getSize() > $this->maxSize) {
            $fail(sprintf('Max allowed size is %d', $this->maxSize));
        }
    }
    private function validateMimeType(UploadedFile $file, Closure $fail): void
    {
        $mime = $file->getMimeType();

        if(!in_array($mime, self::ALLOWED_MIME_TYPES, true)) {
            $fail(sprintf('Invalid mime type %s', $mime));
        }
    }

    private function validateDimensions(UploadedFile $file, Closure $fail): void
    {
        if(($dimensions = $file->dimensions()) === null) {
            $fail('File must be a image');
        }

        //$dimensions[0] = width, $dimensions[1] = height
        if($dimensions[0] > $this->maxWidth || $dimensions[1] > $this->maxHeight) {
            $fail(sprintf('Dimensions mismatch, max allowed: %s', implode('x', [$this->maxWidth, $this->maxHeight])));
        }

        if ((float)($dimensions[1] / $dimensions[0]) !== $this->allowedRatio) {
            $fail(sprintf('Width and height ration must be %d', $this->allowedRatio));
        }
    }
}
