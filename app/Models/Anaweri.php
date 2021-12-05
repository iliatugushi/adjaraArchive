<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

use Carbon\Carbon;

class Anaweri extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    protected $guarded = ['id'];


    public function fond()
    {
        return $this->belongsTo(Fond::class);
    }

    public function getNameAttribute()
    {
        $column = "title";
        return $this->{$column};
    }
    public function sakmesTree()
    {
        return $this->hasMany(Sakme::class);
    }

    public function getIdentifikatorCleanAttribute()
    {
        $identifikator = $this->fond->identifikatorClean . '_' . $this->reference_code;
        return $identifikator;
    }
}
