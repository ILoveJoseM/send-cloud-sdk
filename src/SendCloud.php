<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2019-12-03
 * Time: 16:52
 */

namespace JoseChan\SendCloud\Sdk;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Uri;
use JoseChan\Base\Sdk\BaseSdk;

/**
 * 应用Sdk
 * Class AppSdk
 * @package JoseChan\App\Sdk
 */
class SendCloud extends BaseSdk
{

    public function __construct(Client $client, $config)
    {
        parent::__construct($client, $config);
    }

    /**
     * 获取uri对象
     * @return Uri
     */
    private function getUri()
    {
        $scheme = $this->getConfig("send_cloud.scheme", "http");
        $host = $this->getConfig("send_cloud.host", "api.sendcloud.net");
        $port = $this->getConfig("send_cloud.port", "80");

        return (new Uri())->withScheme($scheme)->withHost($host)->withPort($port);
    }

    /**
     * 获取应用token
     * @param String $api_user
     * @param String $api_key
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get(String $api_user, String $api_key)
    {

        $uri = $this->getUri();

        $data = [
            "apiUser" => $api_user,
            "apiKey" => $api_key
        ];

        $uri = $uri->withPath("/apiv2/userinfo/get")
            ->withQuery(http_build_query($data));


        return $this->client->request("GET", (string)$uri);
    }
}