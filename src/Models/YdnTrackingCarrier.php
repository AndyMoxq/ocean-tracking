<?php

namespace Ocean\Tracking\Models;

use Illuminate\Database\Eloquent\Model;

class YdnTrackingCarrier extends Model
{
    protected $table = 'ydn_tracking_carriers';

    protected $fillable = [
        'code',
        'name_cn',
        'name_en',
        'remark'
    ];
}