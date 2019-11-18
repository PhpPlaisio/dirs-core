<?php
declare(strict_types=1);

namespace Plaisio\Dirs;

use SetBased\Exception\LogicException;

/**
 * Abstract parent class for all pages.
 */
class CoreDirs implements Dirs
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The root directory of the project.
   *
   * @var string
   */
  private $root;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * CoreDirs constructor.
   *
   * @param string $root The root directory of the project. Will be replaced with the real path.
   */
  public function __construct(string $root)
  {
    $realpath = realpath($root);
    if (!is_string($realpath))
    {
      throw new LogicException("Unable to resolve root path '%s'", $root);
    }

    $this->root = $realpath;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the directory for (web) assets.
   *
   * @return string
   */
  public function assetsDir(): string
  {
    return $this->root.'/www';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the directory for executable commands.
   *
   * @return string
   */
  public function binDir(): string
  {
    return $this->root.'/bin';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the directory for configuration files.
   *
   * @return string
   */
  public function configDir(): string
  {
    return $this->root.'/etc';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the error directory.
   *
   * @return string
   */
  public function errDir(): string
  {
    return $this->root.'/var/err';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the directory for lock files.
   *
   * @return string
   */
  public function lockDir(): string
  {
    return $this->root.'/var/lock';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function logDir(): string
  {
    return $this->root.'/var/log';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the root directory of the (web) application.
   *
   * @return string
   */
  public function rootDir(): string
  {
    return $this->root;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the directory for temporary files.
   *
   * @return string
   */
  public function tmpDir(): string
  {
    return $this->root.'/var/tmp';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the directory for variable data files.
   *
   * @return string
   */
  public function varDir(): string
  {
    return $this->root.'/var';
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
