<?php

namespace automatiquePush;

class createRepo
{
    private string $token;

    public function __construct(string $token= "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")
    {
        $this->token = $token;
    }

    public function createRepo(string $reponame,string $description = "",bool $auto_init = false,bool $private = false):bool{
        $ch = curl_init("https://api.github.com/user/repos");
        curl_setopt_array($ch,[
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => json_encode([
                "name" => $reponame,
                "description" => $description,
                "auto_init" => $auto_init,
                "private" => $private,
            ]),
            CURLOPT_HTTPHEADER => [
                "Authorization: token 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"
            ],
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36'
        ]);
        curl_exec($ch);
        return true;
    }
    public function repoExist(string $reponame):bool{
        $ch = curl_init("https://api.github.com/repos/theohdg2/$reponame");
        curl_setopt_array($ch,[
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => [
                "Authorization: token ".$this->token
            ],
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36'
        ]);
        $result = json_decode(curl_exec($ch));
        if(isset($result->documentation_url)){
            return false;
        }else{
            return true;
        }
    }

    public function del(string $fName)
    {
        $ch = curl_init("https://api.github.com/repos/theohdg2/$fName");
        curl_setopt_array($ch,[
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => 1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => [
                "Authorization: token ".$this->token
            ],
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36'
        ]);
        $re = curl_exec($ch);
    }
}