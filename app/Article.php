<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'body', 'published_at',
        'user_id'       // temporary !!!
    ];

    protected $dates = ['published_at'];

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>=', Carbon::now());
    }

    // Notice this convention! We have the word 'set' followed by the field name.
    // So if you are trying to manipulate a 'name' attribute use setNameAttribute()
    /**
     * Set the published_at attribute.
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
//        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        $this->attributes['published_at'] = Carbon::parse($date);   // will set time to midnight
    }

    /**
     * Get the published_at attribute.
     * @param $date
     * @return string
     */
    public function getPublishedAtAttribute($date)
    {
//        return new Carbon($date);
//        return (new Carbon($date))->format('Y-m-d');
        return Carbon::parse($date)->format('Y-m-d');   // now we can use in article/create form just $article->published_at without ->format('Y-m-d')
    }

    /**
     * An article is owned by a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tag associated with the given article
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a list of tag ids associated with the current article
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->toArray();
    }
}