<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

use Carbon\Carbon;

class Fond extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    protected $guarded = ['id'];


    public function creator()
    {
        return $this->belongsTo(Creator::class);
    }
    public function archive()
    {
        return $this->belongsTo(Archive::class);
    }

    public function getNameAttribute()
    {
        $column = "title";
        return $this->{$column};
    }

    public function anaweris()
    {
        return $this->hasMany(Anaweri::class);
    }
    public function anawerisTree()
    {
        return $this->hasMany(Anaweri::class);
    }

    public function getIdentifikatorCleanAttribute()
    {
        $id = 'GE_';
        if (!empty($this->archive->IdentifikatorClean)) {
            $id .=  $this->archive->IdentifikatorClean;
        }
        if (!empty($this->creator->identifier)) {
            $id .= '_' . $this->creator->identifier . '_';
        }

        $identifikator =  $id . $this->reference_code;
        return $identifikator;
    }
}
