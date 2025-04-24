<?php

namespace Ocean\Tracking\Models;

use Illuminate\Database\Eloquent\Model;

class YdnTrackingStatu extends Model
{
    protected $table = 'ydn_tracking_status';

    public $timestamps = false;

    protected $hidden=[
        'id','ydn_tracking_ctnrinfo_id'
    ];

    protected $casts = [
        'statustime' => 'datetime',
        'updatetime' => 'datetime',
        'createtime' => 'datetime',
    ];

    protected $fillable = [
        'keyid',
        'fkeyid',
        'blno',
        'statuscd',
        'statedescription',
        'statedescription_en',
        'statustime',
        'statusplace',
        'statusplacecd',
        'statusplace_cn',
        'vslname',
        'voy',
        'isest',
        'cancelid',
        'sourcecd',
        'updatetime',
        'createtime',
        'transportation',
        'transportationcd'
    ];
}