<?php

class VarBridge{
    private static $counter = 0;
    private static $data = [];
    private static $last_insert = '';

    public static function setter($value, string $name = ''){
        if($name == ''){
            $name = self::$counter;
            self::$counter++;
        }
        self::$data[$name] = $value;
        self::$last_insert = $name;
        return $name;
    }

    public static function getter(string $name){
        if(self::isin($name)){
            return self::$data[$name];
        }else{
            return false;
        }
    }

    public static function last_insert_key(){
        return self::$last_insert;
    }

    public static function auto_numbering_reset(){
        self::$counter = 0;
    }

    public static function release_all(){
        self::$data = [];
    }

    public static function release_specific(string $name){
        unset(self::$data[$name]);
    }

    public static function isin(string $name){
        if(array_key_exists($name, self::$data)){
            return true;
        }else{
            return false;
        }
    }
}