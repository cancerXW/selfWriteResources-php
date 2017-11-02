<?php
/**
 * 网络请求
 */

/**
 * 网络请求
 * @param $url 请求网址
 * @param $params 请求参数
 * @param $headers 请求头信息
 * @param bool $string 是否按字符串的格式返回,默认返回整个网页
 * @param bool $post 是否post请求,默认get
 * @return mixed|string
 */
function net_request($url, $params, $headers, $string = false, $post = false)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22');
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    if ($string) {
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    } else {
        curl_setopt($curl, CURLOPT_HEADER, true);
    }
    if ($post) {
        $method = 'POST';
        if (is_array($params) || is_object($params)) {
            $params = http_build_query($params);
        }
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
    } else {
        $method = 'GET';
        $url .= '?' . http_build_query($params);
    }
    if (strpos("a$url", 'https://') === 1) {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    $result = curl_exec($curl);
    if ($result == false) {
        $result = curl_error($curl);
    }
    curl_close($curl);
    return $result;
}
