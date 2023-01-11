<?php

namespace App\Models;

use App\Enums\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    public const ROLES = [
        Role::USER,
        Role::ADMIN,
        Role::ASSISTANT,
        Role::AUTHOR,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Scope
     */
    public function scopeIsAuthor($query)
    {
        return $query->where('role', Role::AUTHOR);
    }

    /**
     * Relation
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id', 'id');
    }

    public function article_access()
    {
        return $this->belongsToMany(Article::class, 'article_access', 'user_id', 'author_id', relatedKey: 'author_id')->withPivot('author_id');
    }


    /**
     * etc
     */
    public function is_admin() // all access
    {
        return in_array($this->role, [
            Role::ADMIN,
        ]);
    }

    public function is_assistant()
    {
        return in_array($this->role, [
            Role::ASSISTANT,
        ]);
    }

    public function is_author()
    {
        return $this->role == Role::AUTHOR;
    }

    public function is_user()
    {
        return $this->role == Role::USER;
    }
}
