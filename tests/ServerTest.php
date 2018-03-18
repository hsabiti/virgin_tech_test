<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use VIRGIN\Server;
use VIRGIN\Database;

final class RomanNumeralsGenerateTest extends TestCase
{
    public function testName(): void
    {
    	$server = new Server(\VIRGIN\Database::getInstance());

		$this->assertEquals(
            'AFRICA',
            $server->Name()
        );
        
    }

    public function testApplications(): void
    {
        $server = new Server(\VIRGIN\Database::getInstance());

        $this->assertEquals(
            'Ubuntu',
            $server->Applications()[1]['name']
        );

    }

    public function testVersion(): void
    {
        $server = new Server(\VIRGIN\Database::getInstance());

        $this->assertEquals(
            2016,
            $server->Version(3)
        );

    }
    public function testOwnerEmail(): void
    {
        $server = new Server(\VIRGIN\Database::getInstance());

        $this->assertEquals(
            'web@virginmedia.com',
            $server->OwnerEmail()
        );

    }
}