<?php
//============================== strategy pattern ========================================
interface PasswordHashInterface{
    function hash($data);
}

class Md5hashEngine implements PasswordHashInterface{
    function hash($data){
        return md5($data);
    }
}
class Sha1hashEngine implements PasswordHashInterface{
    function hash($data){
        return sha1($data);
    } 
}
class NativehashEngine implements PasswordHashInterface{
    function hash($data){
        return password_hash($data,PASSWORD_BCRYPT);
    } 
}
class PasswordHasher{
    protected $hashingEngine;
    function __construct($data){
        $this->hashingEngine = $data;
    }
    function getHash($data){
        return $this->hashingEngine->hash($data);
    }
}

$password = "rayhan";

$md5 = new Md5hashEngine();
$sh1 = new Sha1hashEngine();
$native = new NativehashEngine();

 $ph = $passwordHasher = new PasswordHasher($md5);
 $ph2 = $passwordHasher = new PasswordHasher($sh1);
echo $ph->getHash($password);
echo "\n";
echo $ph2->getHash($password);