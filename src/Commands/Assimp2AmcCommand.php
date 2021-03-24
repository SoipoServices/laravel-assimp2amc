<?php

namespace SoipoServices\Assimp2Amc\Commands;


use Illuminate\Console\Command;
use SoipoServices\Assimp2Amc\Contracts\Assimp2Amc;

class Assimp2AmcCommand extends Command
{
    public $signature = 'assimp2amc:run {path} {--bin}';

    public $description = 'Can check if all files for the 3d model are present in a folder and compile any 3d model to a .aam format';

    public function handle()
    {
    
        $path = $this->argument('path');
        Assimp2Amc::run($path,$this->option('bin'),true);
    }
}
