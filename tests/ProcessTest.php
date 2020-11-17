<?php

declare(strict_types=1);

namespace DavidLienhard;

use \PHPUnit\Framework\TestCase;
use \DavidLienhard\Process\Process;

class ProcessTest extends TestCase
{
    /**
     * @covers \DavidLienhard\Process\Process::start()
    */
    public function testCannotStartProcessWithoutCommand(): void
    {
        $this->expectException(\ArgumentCountError::class);
        $this->assertIsInt(Process::start());
    }

    /**
     * @covers \DavidLienhard\Process\Process::start()
    */
    public function testCanStartProcess(): void
    {
        $this->assertIsInt(Process::start("sleep 60"));
    }



    /**
     * @covers \DavidLienhard\Process\Process::check()
    */
    public function testCannotCheckProcessWithoutPid(): void
    {
        $this->expectException(\ArgumentCountError::class);
        $this->assertIsInt(Process::check());
    }

    /**
     * @covers \DavidLienhard\Process\Process::check()
    */
    public function testCannotCheckProcessWithStringAsPid(): void
    {
        $this->expectException(\TypeError::class);
        $this->assertIsInt(Process::check("test"));
    }

    /**
     * @covers \DavidLienhard\Process\Process::check()
    */
    public function testCheckOfNonExistingProcessReturnsFalse(): void
    {
        $this->assertFalse(Process::check(99999));
    }

    /**
     * @covers \DavidLienhard\Process\Process::check()
    */
    public function testCanCheckProcess(): void
    {
        $process = Process::start("sleep 60");
        $this->assertIsInt($process);
        $this->assertTrue(Process::check($process));
    }



    /**
     * @covers \DavidLienhard\Process\Process::kill()
    */
    public function testCannotKillProcessWithoutPid(): void
    {
        $this->expectException(\ArgumentCountError::class);
        $this->assertIsInt(Process::kill());
    }

    /**
     * @covers \DavidLienhard\Process\Process::kill()
    */
    public function testCannotKillProcessWithStringAsPid(): void
    {
        $this->expectException(\TypeError::class);
        $this->assertIsInt(Process::kill("test"));
    }

    /**
     * @covers \DavidLienhard\Process\Process::kill()
    */
    public function testCanKillProcess(): void
    {
        $process = Process::start("sleep 60");
        $this->assertIsInt($process);
        $this->assertTrue(Process::kill($process));
    }
}
