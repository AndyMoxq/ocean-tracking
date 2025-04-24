<?php

namespace Ocean\Tracking\Models;

use Illuminate\Database\Eloquent\Model;
use Ocean\Tracking\Models\YdnTrackingStatu;

class YdnTrackingCtnrinfo extends Model
{
    protected $table = 'ydn_tracking_ctnrinfos';
    public $timestamps = false;

    protected $hidden=[
        'id','ydn_tracking_id'
    ];

    protected $fillable = [
        'keyid',
        'fkeyid',
        'ctnrno',
        'blno',
        'sealno',
        'csize',
        'ctype',
        'pkgs',
        'gwgt',
        'currentnode',
        'currentnodetime',
        'createtime',
        'updatetime'
    ];

    protected $casts = [
        'lstLinertrackingStatus' => 'array',
        'currentnodetime' => 'datetime',
        'createtime' => 'datetime',
        'updatetime' => 'datetime',
    ];

    public function status()
    {
        return $this->hasMany(YdnTrackingStatu::class, 'ydn_tracking_ctnrinfo_id', 'id');
    }
}