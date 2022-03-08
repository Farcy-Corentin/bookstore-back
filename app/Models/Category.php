<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $isResearched
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function books(): hasMany
    {
        return $this->hasMany(Book::class);
    }
}
