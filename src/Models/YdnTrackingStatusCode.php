<?php

namespace Ocean\Tracking\Models;

use Illuminate\Database\Eloquent\Model;

class YdnTrackingStatusCode extends Model {
    protected $table = 'ydn_tracking_status_codes';

    public $timestamps = false;
    
    protected $fillable = [
        'code','status','status_cn','remarks'
    ];
}