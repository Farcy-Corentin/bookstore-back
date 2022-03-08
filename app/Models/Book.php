<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int category_id
 * @property string $title
 * @property string $author
 * @property string $description
 * @property string $slug
 * @property DateTime $isRead
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
