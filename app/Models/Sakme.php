<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

use Carbon\Carbon;

class Sakme extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    protected $guarded = ['id'];


    public function anaweri()
    {
        return $this->belongsTo(Anaweri::class);
    }
    public function getNameAttribute()
    {
        $column = "title";
        return $this->{$column};
    }
    public function files()
    {
        return $this->hasMany(File::class);
    }
    public function filesTree()
    {
        return $this->hasMany(File::class);
    }

    public function getIdentifikatorCleanAttribute()
    {
        $identifikator = $this->anaweri->identifikatorClean . '_' . $this->reference_code;
        return $identifikator;
    }
}
