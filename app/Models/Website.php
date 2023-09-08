<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Website extends Model
{
    use HasFactory;

    /**
     * timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['name', 'domain'];

    /**
     * Get all of the post for the Website
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * The user that belong to the Website
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'website_subscribtions', 'webbdite_id', 'user_id');
    }
}
