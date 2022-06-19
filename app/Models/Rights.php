<?php

namespace App\Models;



class Rights
{
    static public $right = true;

    /**
     * @return false|string
     */
    static public function getDate(){
        return date('Y-m-d');
    }

    /**
     * @return false|string
     */
    static public function getTime(){
        $forward  = mktime(date("H")+6);
        return date('H:i', $forward);
    }

    /**
     * check time rights
     * @param string $date
     * @param string $time
     * @return bool
     */
    static public function checkR(string $date, string $time){

        if (self::getDate() === $date){

            if (self::getTime() < $time){
                self::$right = true;
            }else {
                self::$right = false;
            }
        }else if (self::getDate() > $date){
            self::$right = false;
        }

        return self::$right;
    }
}

