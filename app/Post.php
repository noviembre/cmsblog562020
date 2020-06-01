<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates =['published_at'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    #--- new accessor for date attribute
    public function getDateAttribute($value)
    {
        return is_null($this->published_at) ? 'sin fecha' : $this->published_at->diffForHumans();
    }



    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    #------- view post from today to yesterday (no futures) -------
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now() );
    }



    #--- new accessor for call image
    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        #--- if image is not null
        if ( ! is_null($this->image))
        {
            $imagePath = public_path() . "/app/img/" . $this->image;
            #---- and if file exists in the server
            if (file_exists($imagePath))
                $imageUrl = asset("/app/img/" . $this->image);
        }

        return $imageUrl;
    }

    public function scopePopular($query)
    {
        return $query->orderBy('view_count', 'desc');
    }

    public function getImageThumbUrlAttribute($value)
    {
        $imageUrl = "";

        if ( ! is_null($this->image))
        {
            $ext       = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/app/img/" . $thumbnail;
            if (file_exists($imagePath)) $imageUrl = asset("app/img/" . $thumbnail);
        }

        return $imageUrl;
    }



    /*
   |--------------------------------------------------------------------------
   | Backend | blog
   |--------------------------------------------------------------------------
   |
   | views/backend/blog
   |
   |
   */

    #====== blog | index =======================================================
    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/Y";
        if ($showTimes) $format = $format . " H:i:s";
        return $this->created_at->format($format);
    }

    public function publicationLabel()
    {
        if ( ! $this->published_at) {
            return '<small class="badge badge-warning">Draft</small>';
        }
        elseif ($this->published_at && $this->published_at->isFuture()) {
            return '<small class="badge badge-info">Schedule</small>';
        }
        else {
            return '<small class="badge badge-success"> Published</small>';
        }
    }
}