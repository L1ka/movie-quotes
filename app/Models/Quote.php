<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;


class Quote extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = ['id'];
    protected $with = ['movie'];
    public $translatable = ['quote'];

    public function movie(): BelongsTo
    {
      return $this->BelongsTo(Movie::class);
    }
}
