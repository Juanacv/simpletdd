<?php
use PHPUnit\Framework\TestCase;
use App\Src\ApiService\ApiService;
use App\Src\SomeApiClient;
use PHPUnit\Framework\TestStatus\Success;

class ApiServiceTest extends TestCase {

    protected $apiService;

    public function testApiReturnSuccess() {
        $apiClientMock = $this->createMock(SomeApiClient::class);

        $apiClientMock->expects($this->once())
        ->method('post')
        ->with('/endpoint',['key'=>2])
        ->willReturn(['status'=>'SUCCESS','id'=>123]);
        
        $apiService = new ApiService($apiClientMock);

        $result = $apiService->performAction(['key'=>2]);
        $this->assertTrue($result['success']);
        $this->assertEquals(123,$result['id']);
    }

    public function testApiReturnError() {
        $apiClientMock = $this->createMock(SomeApiClient::class);

        $apiClientMock->expects($this->once())
        ->method('post')
        ->with('/endpoint',['key'=>21])
        ->willReturn(['status'=>'ERROR','message'=>'Client Id not valid']);
        
        $apiService = new ApiService($apiClientMock);

        $result = $apiService->performAction(['key'=>21]);
        $this->assertFalse($result['success']);
        $this->assertEquals('Client Id not valid',$result['message']);
    }

    public function testApiReturnException() {
        $apiClientMock = $this->createMock(SomeApiClient::class);

        $apiClientMock->expects($this->once())
        ->method('post')
        ->with('/endpoint',['key'=>21])
        ->willReturn(['status'=>'UNEXPECTED','message'=>'Unexpected Error']);
        
        $apiService = new ApiService($apiClientMock);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Unexpected response from API');
        $result = $apiService->performAction(['key'=>21]);
    }
}


?>