<?php
// defined('BASEPATH') or exit('No direct script access allowed');
class Firebase
{
  public $url = 'https://m2bwholesale-219d4.firebaseio.com/';
  public function get_where($table, $w)
  {
    $r = array();
    $all = $this->get($table);
    // var_dump($all);
    // die();
    foreach ($all as $k => $v) {
      $find = 1;
      foreach ($w as $k1 => $v1) {
        if (!isset($v[$k1])) {
          $find = 0;
        } else if ($v1 != $v[$k1] && $find) {
          $find = 0;
        }
      }
      if ($find) {
        $v['fkey'] = $k;
        $r[] = $v;
      }
    }
    return $r;
  }
  public function update($table, $data)
  {
    $url = $this->url . "/" . $table . ".json";
    // die($url);
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "PUT",
      CURLOPT_POSTFIELDS => json_encode($data),
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: 4fc025b1-5e1a-eb4e-b09a-3f0f94e8895d"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return 0;
    } else {
      return json_decode($response, true);
    }
  }
  public function insert($table, $data)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url = $this->url . "/" . $table . ".json",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($data),
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: 4fc025b1-5e1a-eb4e-b09a-3f0f94e8895d"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return 0;
    } else {
      return json_decode($response, true);
    }
  }
  public function get($table)
  {
    $curl = curl_init();
    $url = $this->url . "/" . $table . ".json?print=pretty";
    // die($url);
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: 207eca99-0a52-4ee4-969c-937bbcbe357b"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return 0;
    } else {
      return json_decode($response, true);
    }
  }
}
