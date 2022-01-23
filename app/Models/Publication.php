<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Publication extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;

    public const TYPE_SELECT = [
        'download' => 'Descarga',
        'link'     => 'Enlace',
    ];

    public const TARGET_SELECT = [
        '_self'  => 'En la misma ventana',
        '_blank' => 'En otra ventana',
    ];

    public $table = 'publications';

    public $filterable = [
        'id',
        'specialty.name',
        'name',
        'author',
        'type',
        'date',
        'created_at',
    ];

    public $orderable = [
        'id',
        'specialty.name',
        'name',
        'author',
        'type',
        'date',
        'published',
        'created_at',
    ];

    protected $appends = [
        'file',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'specialty_id',
        'name',
        'author',
        'content',
        'type',
        'link',
        'target',
        'date',
        'published',
    ];

    public function specialty()
    {
        return $this->belongsTo(PublicationSpecialty::class);
    }

    public function getTypeLabelAttribute($value)
    {
        return static::TYPE_SELECT[$this->type] ?? null;
    }

    public function getFileAttribute()
    {
        return $this->getMedia('publication_file')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getTargetLabelAttribute($value)
    {
        return static::TARGET_SELECT[$this->target] ?? null;
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
