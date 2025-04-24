<?php
namespace Ocean\Tracking\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Ocean\Tracking\Models\YdnTrackingCarrier;
use Ocean\Tracking\Response\RegisterTrackingResponse;

/**
 * Class RegisterTrackingRequest
 *
 * Handles the registration of ocean tracking records with the remote API.
 *
 * @package Ocean\Tracking
 */
class RegisterTrackingRequest extends OceanTracking {
  public const END_POINT = '/api/v1/bookingsv2';


  /**
   * 添加单条追踪记录
   *
   * @param string $carriercd 承运人代码
   * @param string $referenceno 提单号或追踪号
   * @param string|null $keyid 唯一ID（默认自动生成）
   * @param string|null $pol 装港
   * @param string|null $ctnrno 箱号
   * @return $this
   */
  public function setTracking(string $carriercd , string $referenceno , string $keyid = null , string $pol = null , string $ctnrno = null){
    $data = $this -> getData();
    $data[] = [
      'keyid' => $keyid ?? Str::uuid(),
      'carriercd' => $carriercd,
      'referenceno' => $referenceno,
      'pol' => $pol,
      'ctnrno' => $ctnrno
    ];
    $this -> setData($data);
    return $this;
  }

  /**
   * 批量添加追踪记录
   *
   * @param array $trackings 包含追踪信息的数组，每个元素需包含 carriercd 与 referenceno 字段
   * @return $this
   */
  public function setTrackings(array $trackings): static{
    $data = $this -> getData();
    foreach ($trackings as $tracking) {
      $data[] = $tracking;
    }
    $this -> setData($data);
    return $this;
  }

  /**
   * 校验数据格式是否合法，包括是否存在和船东代码是否支持
   *
   * @throws \Exception 验证失败时抛出异常
   * @return void
   */
  private function validate(): void{
    $carriercds = YdnTrackingCarrier::pluck('code')->toArray();
    $data= $this -> getData();
    $msg = '';
    foreach ($data as $index => $tracking) {
      if(empty($tracking['carriercd'])){
        $msg .= "第" . ($index + 1) ."个 carriercd必填\n";
      }
      if(empty($tracking['referenceno'])) {
        $msg .= "第" . ($index + 1) ."个 referenceno必填\n";
      }
      if(!in_array($tracking['carriercd'],$carriercds)){
        $msg .= $tracking['referenceno'] . ',暂不支持船东代码:'  . $tracking['carriercd'] .",支持清单：https://apifox.com/apidoc/shared/90022aad-5dcf-404a-ad50-86b46d1178d6/doc-2247034\n";
      }
    }
    if($msg) throw new \Exception($msg, 1);
  }

  /**
   * 发送追踪注册请求到远程 API
   *
   * @return RegisterTrackingResponse 响应对象
   * @throws \Exception 当校验失败或 API 响应异常时抛出
   */
  public function post(): RegisterTrackingResponse{
    $this->validate();
    $query = [
      'companyid' => $this -> getCompanyId(),
      'token' => $this -> getToken()
    ];
    $url = $this -> getBaseUrl() . self::END_POINT . '?' . http_build_query($query);
    $body['data'] = json_encode($this -> getData());
    $res = Http::asForm()->post($url,$body);
    return RegisterTrackingResponse::format($res -> json());
  }



}