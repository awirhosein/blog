<?php

namespace App\Models;

use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Article extends Model
{
    use HasFactory, SoftDeletes;

    public const STATUS_TYPES = [
        ArticleStatus::DRAFT,
        ArticleStatus::PUBLISHED,
        ArticleStatus::ARCHIVED,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'author_id',
        'image',
        'content',
        'status',
    ];

    /**
     * Relation
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
