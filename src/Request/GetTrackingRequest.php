<?php
namespace Ocean\Tracking\Request;

use Illuminate\Support\Facades\Http;
use Ocean\Tracking\Response\GetTrackingResponse;

class GetTrackingRequest extends OceanTracking {
    public const END_POINT = '/api/v1/bookingv3-liner';
    public function getTracking(string $carriercd,string $referenceno,string $keyid= null,string $pol=null,string $dtp=null){
        $data = $this -> getData();
        $data[]=[
            'keyid' => $keyid,
            'carriercd' => $carriercd,
            'referenceno' => $referenceno,
            'pol' => $pol,
            'dtp' => $dtp
        ];
        $this -> setData($data);
        return $this;
    }

    public function getTrackings(array $trackings){
        $data = $this -> getData();
        foreach ($trackings as $tracking) {
          $data[]=$tracking;
        }
        $this -> setData($data);
        return $this;
    }

    public function validate(){
      //
    }
    
    public function post(){

      $this->validate();
      $query = [
        'companyid' => $this -> getCompanyId(),
        'token' => $this -> getToken()
      ];
      $url = $this -> getBaseUrl() . self::END_POINT . '?' . http_build_query($query);
      $body['data'] = json_encode($this -> getData());
      $res = Http::asForm()->post($url,$body);
      return GetTrackingResponse::format($res->json());
    }
}