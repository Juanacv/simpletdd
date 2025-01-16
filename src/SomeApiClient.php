<?php
namespace App\Src;

class SomeApiClient {

    private $baseUrl;

    public function __construct(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function post(string $endPoint, array $data) {
        return true;
    }
}

?>