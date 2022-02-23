<?php
namespace automatiquePush;

require_once "./createRepo.php";
require_once "./directoryScan.php";
require_once "./gitManager.php";

$dscan= new directoryScan();
if($dscan->verifyAll()){
    foreach ($dscan->getAll() as $fName) {
        if (!(new createRepo())->repoExist($fName)) {
            (new createRepo())->createRepo($fName);
            (new gitManager())->getShellFileByRepoName($fName)->executeShell();
        }
    }
}
