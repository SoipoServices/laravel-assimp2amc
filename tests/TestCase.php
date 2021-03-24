<?php 
namespace SoipoServices\Assimp2Amc\Tests;

use SoipoServices\Assimp2Amc\Assimp2AmcServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
      Assimp2AmcServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
  }
}