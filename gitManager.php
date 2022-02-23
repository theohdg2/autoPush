<?php

namespace automatiquePush;

class gitManager
{
    public function getShellFileByRepoName(string $repoName,string $commit = "first push"):self{
        $content = file_get_contents("unSave.cmd");
        $content = str_replace(["{repo}","{commit}"],[$repoName,$commit],$content);
        $e = explode("git" ,$content);
        $txt = "";
        foreach ($e as $index => $cmd){
            if($index === 0){
                $txt .= $cmd;
            }else{
                $txt .= "git".$cmd;
            }
        }
        file_put_contents("gitSave.cmd",$txt);
        return $this;
    }
    public function executeShell():void{
        exec("gitSave.cmd");
    }
}