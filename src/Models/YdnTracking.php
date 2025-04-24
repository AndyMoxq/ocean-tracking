<?php

namespace Ocean\Tracking\Models;

use Illuminate\Database\Eloquent\Model;

class YdnTracking extends Model
{
    protected $table = 'ydn_tracking';

    public $timestamps = false;

    protected $casts = [
        'stsptime' => 'datetime',
        'fcgitime' => 'datetime',
        'cggitime' => 'datetime',
        'cloadtime' => 'datetime',
        'cytctime' => 'datetime',
        'gitmtime' => 'datetime',
        'passtime' => 'datetime',
        'lobdtime' => 'datetime',
        'dlpttime' => 'datetime',
        'trsptime' => 'datetime',
        'etapld' => 'datetime',
        'dschtime' => 'datetime',
        'stcstime' => 'datetime',
        'rcvetime' => 'datetime',
        'currentnodetime' => 'datetime',
        'updatetime' => 'datetime',
        'createtime' => 'datetime',
        'endtime' => 'datetime',
        'tmpstime' => 'datetime',
        'datatime' => 'datetime',
    ];
    protected $fillable = [
        'keyid',
        'localkeyid',
        'blprefix',
        'blno',
        'bkgno',
        'trfsno',
        'ctnrno',
        'bkgvolumn',
        'plr',
        'plrcd',
        'pol',
        'polcd',
        'dtp',
        'dtpcd',
        'pld',
        'pldcd',
        'stsptime',
        'stspplace',
        'fcgitime',
        'cggitime',
        'cloadtime',
        'cytctime',
        'cytcplace',
        'gitmtime',
        'gitmplace',
        'passtime',
        'passplace',
        'ispass',
        'ispreload',
        'lobdtime',
        'lobdplace',
        'dlpttime',
        'dlptplace',
        'etdpol',
        'trsptime',
        'trspplace',
        'etapld',
        'dschtime',
        'dschplace',
        'terminalpld',
        'terminaldtp',
        'pickupreference',
        'railcode',
        'sealno',
        'csize',
        'ctype',
        'stcstime',
        'stcsplace',
        'rcvetime',
        'rcveplace',
        'currentnode',
        'currentnodetime',
        'currentnodeplace',
        'depotcd',
        'depot',
        'terminalcd',
        'terminal',
        'vslname',
        'voy',
        'carriercd',
        'carrier',
        'updatetime',
        'createtime',
        'declarationno',
        'referenceno',
        'isctnr',
        'currentvslname',
        'currentvoy',
        'companycd',
        'endtime',
        'isendforce',
        'tmpstime',
        'istmps',
        'datatime'
    ];

    public function carriages()
    {
        return $this->hasMany(YdnTrackingCarriage::class);
    }

    public function containers()
    {
        return $this->hasMany(YdnTrackingCtnrinfo::class);
    }

    public function currentNode(){
        return $this -> hasOne(YdnTrackingStatusCode::class,'code','currentnode');
    }
}