<?php
namespace Ocean\Tracking\Response;

/**
 * Class RegisterTrackingResponse
 *
 * Represents and validates the response of a tracking registration request.
 */
class RegisterTrackingResponse extends BaseResponse {

  /**
   * Validates the response body.
   *
   * @throws \Exception If the response indicates failure.
   */
  public function validate(): void{
    $body = $this -> getBody();
    if(!isset($body['success']) || $body['success'] !== true){
      throw new \Exception($this -> getMessage(), 1);
    }
  }

  /**
   * Retrieves the result data from the response.
   *
   * @return array
   */
  public function getResults(): array{
    return $this -> getBody()['result'] ?? [];
  }

  /**
   * Retrieves the list of error items, if any.
   *
   * @return array|null
   */
  public function getItems(): array{
    return $this -> getBody()['items'] ?? [];
  }

  /**
   * Compiles error messages from the response results.
   *
   * @return string A semicolon-separated string of error messages.
   */
  public function getErrorMesssages(): string{
    $errors = [];
    foreach ($this -> getResults() as $result) {
      if($result['message']){
        $errors[]= $result['referenceno'] . '=>' . $result['message'];
      }
    }
    return !empty($errors) ? implode(';',$errors) : '';
  }

  /**
   * Checks whether the response contains error items.
   *
   * @return bool
   */
  public function hasErrors():bool{
    return !empty($this -> getItems());
  }


}