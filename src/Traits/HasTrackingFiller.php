<?php
namespace Ocean\Tracking\Traits;

use Ocean\Tracking\Models\YdnTracking;
use Illuminate\Support\Facades\DB;

trait HasTrackingFiller
{
    public function updateOrCreate(array $data): YdnTracking
    {
        return DB::transaction(function () use ($data) {
            if (!isset($data['keyid'])) {
                throw new \InvalidArgumentException(($data['referenceno'] ?? '') . '缺少 keyid 字段，请确认响应数据是否正常');
            }

            $tracking = YdnTracking::updateOrCreate([
                'keyid' => $data['keyid']
            ], $data);

            if (!empty($data['lstcarriage'])) {
                $tracking->carriages()->forceDelete();
                foreach ($data['lstcarriage'] as $carriage) {
                    $tracking->carriages()->create($carriage);
                }
            }

            if (!empty($data['lstlinertrackingctnrinfo'])) {
                $tracking->containers()->each(function ($container) {
                    $container->status()->delete();
                });
                $tracking->containers()->forceDelete();
                foreach ($data['lstlinertrackingctnrinfo'] as $ctnr) {
                    $container = $tracking->containers()->create($ctnr);
                    if (isset($ctnr['lstLinertrackingStatus']) && is_array($ctnr['lstLinertrackingStatus'])) {
                        foreach ($ctnr['lstLinertrackingStatus'] as $status) {
                            $container->status()->create($status);
                        }
                    }
                }
            }

            return $tracking->load('carriages','containers','containers.status');
        });
    }
}