<?php

namespace automatiquePush;

class directoryScan
{
    private $realName;

    public function verifyAll():bool{
        $scan = scandir("T:\Pocketmine-MP\allPlugin\phar");
        array_shift($scan);
        array_shift($scan);
        foreach ($scan as $index =>$fileName){
            $re = explode("_",$fileName)[0];
            if($this->directoryExist($re)) {
                $this->realName[$index] = $re;
            }else{
                echo "nop ".$fileName." <br/>";
                return false;
            }
        }
        return true;
    }

    public function directoryExist(string $fileName):bool{
        if(is_dir("T:\Pocketmine-MP\allPlugin\directory\\".$fileName)){
            return true;
        }else{
            return false;
        }
    }

    public function getAll():array{
        return $this->realName ?? [];
    }
}