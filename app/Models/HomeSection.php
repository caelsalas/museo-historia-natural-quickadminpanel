<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSection extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'home_sections';

    public $orderable = [
        'id',
        'meta_title',
        'meta_title_en',
        'meta_description',
        'meta_description_en',
        'info_schedule',
        'info_schedule_en',
        'info_address',
        'info_address_en',
        'info_tickets',
        'info_tickets_en',
        'created_at',
    ];

    public $filterable = [
        'id',
        'meta_title',
        'meta_title_en',
        'meta_description',
        'meta_description_en',
        'info_schedule',
        'info_schedule_en',
        'info_address',
        'info_address_en',
        'info_tickets',
        'info_tickets_en',
        'created_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'meta_title',
        'meta_title_en',
        'meta_description',
        'meta_description_en',
        'info_schedule',
        'info_schedule_en',
        'info_address',
        'info_address_en',
        'info_tickets',
        'info_tickets_en',
    ];

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
