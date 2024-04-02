<?php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Application\Services\LoginService;
use App\Domain\Contracts\UserRepositoryInterface;
use App\Domain\Contracts\LoginActionRepositoryInterface;
use App\Application\DTOs\LoginDTO;

class LoginServiceTest extends TestCase {
    private $userRepositoryMock;
    private $loginActionRepositoryMock;
    private $loginService;

    protected function setUp(): void {
        parent::setUp();

        $this->userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $this->loginActionRepositoryMock = $this->createMock(LoginActionRepositoryInterface::class);
        $this->loginService = new LoginService($this->userRepositoryMock, $this->loginActionRepositoryMock);
    }

    public function testLoginSuccess() {
        $this->userRepositoryMock->method('findByCredentials')->willReturn(new \App\Domain\Entities\User);
        $this->loginActionRepositoryMock->expects($this->once())->method('logAction')->with($this->equalTo('user@example.com'), $this->equalTo(true));

        $loginDTO = new LoginDTO('user@example.com', 'password');
        $result = $this->loginService->login($loginDTO);

        $this->assertNotNull($result);
    }

    public function testLoginFailure() {
        $this->userRepositoryMock->method('findByCredentials')->willReturn(null);
        $this->loginActionRepositoryMock->expects($this->once())->method('logAction')->with($this->equalTo('user@example.com'), $this->equalTo(false));

        $loginDTO = new LoginDTO('user@example.com', 'wrongpassword');
        $result = $this->loginService->login($loginDTO);

        $this->assertNull($result);
    }
}
