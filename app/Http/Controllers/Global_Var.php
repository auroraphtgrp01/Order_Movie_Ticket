<?php

namespace App\Http\Controllers;

class Global_Var
{
    public static $globalVar;

    public static function setGlobalVar($value)
    {
        self::$globalVar = $value;
    }

    public static function getGlobalVar()
    {
        return self::$globalVar;
    }
}
