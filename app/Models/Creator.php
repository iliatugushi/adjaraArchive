<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

use Carbon\Carbon;

class Creator extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    protected $guarded = ['id'];

    public function getMegzuriAttribute()
    {
        if (!empty($this->getMedia('megzurebi')->first())) {
            $picture = $this->getMedia('megzurebi')->last()->getUrl();
        } else {
            $picture = null;
        }
        return $picture;
    }
    public function getNameAttribute()
    {
        $column = "authorised_form_of_name";
        return $this->{$column};
    }


    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function archive()
    {
        return $this->belongsTo(Archive::class);
    }
    public function fondsTree()
    {
        return $this->hasMany(Fond::class);
    }
}
