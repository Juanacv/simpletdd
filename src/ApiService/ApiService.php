<?php
namespace App\Src\ApiService;

class ApiService {

    private $apiClient;

    public function __construct($apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function performAction(array $data) 
    {
        $response = $this->apiClient->post('/endpoint', $data);

        if ($response['status'] === 'SUCCESS') {
            return ['success'=>true, 'id'=>$response['id']];
        }
        elseif ($response['status'] === 'ERROR') {
            return ['success'=>false, 'message'=>$response['message']];
        }
        else {
            throw new \RuntimeException('Unexpected response from API');
        }
    }

}

?>