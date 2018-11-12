<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Page
 *
 * @property int $id
 * @property string $name
 * @property string $name_h1
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $content
 * @property string $status
 * @property int $is_deletable
 * @property string $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereIsDeletable($value)
 * @mixin \Eloquent
 */
class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'name',
        'name_h1',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'content',
        'status',
        'is_deletable',
        'slug',
        'created_at',
        'updated_at'
    ];

}
