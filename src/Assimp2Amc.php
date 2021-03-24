<?php

namespace SoipoServices\Assimp2Amc;

use Symfony\Component\Process\Process;

class Assimp2Amc
{
    private string $bash,$executable;

    public function __construct(string $bash,string $executable) {
        $this->bash = $bash;
        $this->executable = $executable;
    }

    public function run(string $obj, bool $toBin = false,bool  $debug = false): ?Process
    {

        $command = [$this->bash.$this->executable, '-c', $obj];

        if ($toBin) {
            $command = [$this->bash.$this->executable, '-c', '--amc', $obj];
        }

        $process = new Process($command);

        if ($debug) {
            $process->start();

            foreach ($process as $type => $data) {
                if ($process::OUT === $type) {
                    echo "\nRead from stdout: " . $data;
                } else { // $process::ERR === $type
                    echo "\nRead from stderr: " . $data;
                }
            }
        }


        $process->run();

        return $process;
    }
}
