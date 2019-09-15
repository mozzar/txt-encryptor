<?php
/**
 * Created by PhpStorm.
 * User: darkmafy
 * Date: 15.09.19
 * Time: 02:15
 */

class Crypt
{
    public function encrypt($string){
        $string = rtrim(base64_encode($string));
        return $string;
    }

    public function decrypt($string){
        $string = rtrim(base64_decode($string));

        return $string;
    }
//openssl crypt and caesar
/*
 * todo
    private function caesar_code_encrypt($string, $offset){


        return $caesar_encrypted;
    }
    private function caesar_code_decrypt($string, $offset){
        return $caesar_decrypt;
    }*/

}