<?php
declare(strict_types=1);

namespace Plaisio\Dirs\Test;

use PHPUnit\Framework\TestCase;
use Plaisio\Dirs\CoreDirs;
use Plaisio\Dirs\Dirs;

/**
 * TestCases for class CoreDirs.
 */
class CoreDirsTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The Dirs objects.
   *
   * @var Dirs
   */
  private $dirs;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Tests config dir.
   */
  public function testAssetsDir(): void
  {
    $dir = $this->dirs->assetsDir();
    self::assertStringNotContainsString('..', $dir);
    self::assertStringNotContainsString('/./', $dir);
    self::assertEquals($this->dirs->rootDir().'/www', $dir);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Tests bin dir.
   */
  public function testBinDir(): void
  {
    $dir = $this->dirs->binDir();
    self::assertStringNotContainsString('..', $dir);
    self::assertStringNotContainsString('/./', $dir);
    self::assertEquals($this->dirs->rootDir().'/bin', $dir);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test config dir.
   */
  public function testConfigDir(): void
  {
    $dir = $this->dirs->configDir();
    self::assertStringNotContainsString('..', $dir);
    self::assertStringNotContainsString('/./', $dir);
    self::assertEquals($this->dirs->rootDir().'/etc', $dir);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Tests error dir.
   */
  public function testErrDir(): void
  {
    $dir = $this->dirs->errDir();
    self::assertStringNotContainsString('..', $dir);
    self::assertStringNotContainsString('/./', $dir);
    self::assertEquals($this->dirs->varDir().'/err', $dir);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Tests lock dir.
   */
  public function testLockDir(): void
  {
    $dir = $this->dirs->lockDir();
    self::assertStringNotContainsString('..', $dir);
    self::assertStringNotContainsString('/./', $dir);
    self::assertEquals($this->dirs->varDir().'/lock', $dir);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Tests log dir.
   */
  public function testLogDir(): void
  {
    $dir = $this->dirs->logDir();
    self::assertStringNotContainsString('..', $dir);
    self::assertStringNotContainsString('/./', $dir);
    self::assertEquals($this->dirs->varDir().'/log', $dir);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test root directory is realpath.
   */
  public function testRoot(): void
  {
    $dir = $this->dirs->rootDir();
    self::assertStringNotContainsString('..', $dir);
    self::assertStringNotContainsString('/./', $dir);
    self::assertStringEndsNotWith('/', $dir);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Tests tmp dir.
   */
  public function testTmpDir(): void
  {
    $dir = $this->dirs->tmpDir();
    self::assertStringNotContainsString('..', $dir);
    self::assertStringNotContainsString('/./', $dir);
    self::assertEquals($this->dirs->varDir().'/tmp', $dir);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Tests bin dir.
   */
  public function testVarDir(): void
  {
    $dir = $this->dirs->varDir();
    self::assertStringNotContainsString('..', $dir);
    self::assertStringNotContainsString('/./', $dir);
    self::assertEquals($this->dirs->rootDir().'/var', $dir);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Creates a Dir object.
   */
  protected function setUp(): void
  {
    $this->dirs = new CoreDirs(__DIR__.'/..');
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
