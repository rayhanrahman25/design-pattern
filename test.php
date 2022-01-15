<?php
 interface PassWordHashing{
     function hash($data);
 }
 class Md5hasingEngine implements PassWordHashing{
    function hash($data){
        return md5($data);
    }
 }
 class Sh1hasingEngine implements PassWordHashing{
    function hash($data){
        return sha1($data);
    }
 }
 class NativehasingEngine implements PassWordHashing{
    function hash($data){
        return password_hash($data,PASSWORD_BCRYPT);
    }
 }

 class HasingEngine{
     protected $hasingengine;
    function __construct(PassWordHashing $hasingengine){
         $this->hasingengine = $hasingengine;
    }

    function getHash($data){
       return $this->hasingengine->hash($data);
    }
 }
$password = "rayhan";
 $md5 = new Md5hasingEngine;
 $sha1 = new Sh1hasingEngine;
 $NE = new NativehasingEngine;
 $HE = new HasingEngine($md5);
 echo $HE->getHash($password);
 echo "\n";
 $HE = new HasingEngine($sha1);
 echo $HE->getHash($password);
 echo "\n";
 $HE = new HasingEngine($NE);
 echo $HE->getHash($password);



