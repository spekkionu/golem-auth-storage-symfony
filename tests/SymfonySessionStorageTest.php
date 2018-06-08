<?php
namespace Golem\Auth\Storage\SymfonySession\Test;

use Golem\Auth\Storage\SymfonySessionStorage;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;

class SymfonySessionStorageTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Session
     */
    private $session;

    /**
     * @var SymfonySessionStorage
     */
    private $storage;

    public function setUp()
    {
        $this->session = new Session(new MockArraySessionStorage());
        $this->storage = new SymfonySessionStorage($this->session, 'namespace');
    }

    public function test_storing_and_reading()
    {
        $this->storage->store(1);
        $this->assertEquals(1, $this->storage->read());
    }

    public function test_checking_if_data_exists()
    {
        $this->assertFalse($this->storage->exists());
        $this->storage->store(1);
        $this->assertTrue($this->storage->exists());
    }

    public function test_clearing_data()
    {
        $this->storage->store(1);
        $this->assertTrue($this->storage->exists());
        $this->storage->clear();
        $this->assertFalse($this->storage->exists());
    }

    public function test_reading_returns_null_when_there_is_no_data()
    {
        $this->assertNull($this->storage->read());
    }
}
