<?php

namespace Ocean\Tracking\Models;

use Illuminate\Database\Eloquent\Model;

class YdnTrackingCarriage extends Model
{
    protected $table = 'ydn_tracking_carriages';
    public $timestamps = false;

    protected $hidden = [
      'id','ydn_tracking_id'
    ];

    protected $fillable = [
        'ydn_tracking_id',
        'vslname',
        'voy',
        'pol',
        'pod',
        'polcd',
        'podcd',
        'etd',
        'eta',
        'atd',
        'ata',
        'sno',
        'type',
    ];

    protected $casts = [
        'etd' => 'datetime',
        'eta' => 'datetime',
        'atd' => 'datetime',
        'ata' => 'datetime',
    ];

}