<?php 

namespace SoipoServices\Assimp2Amc\Tests\Feature;

use SoipoServices\Assimp2Amc\Contracts\Assimp2Amc;
use SoipoServices\Assimp2Amc\Tests\TestCase;
use Symfony\Component\Process\Exception\ProcessSignaledException;
use Symfony\Component\Process\Process;

class Assimp2AmcCommandTest extends TestCase {

    public function test_assimp2amc_executable(){

        $this->assertEquals(true,true);
        //$this->artisan('assimp2amc asrc/ExampleModelData/851e122f30504b90ae495fe567342936.obj');


        $process = Assimp2Amc::run('src/ExampleModelData/851e122f30504b90ae495fe567342936.obj',false,true);

        try{
            $process->run();
            $this->assertTrue($process->isSuccessful());
        }catch(ProcessSignaledException $e){
            $this->fail($e->getMessage());
        }
    
    }
}