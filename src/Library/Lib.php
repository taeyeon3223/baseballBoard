<?php

namespace Eve\Library;

class Lib
{
    public static function msgAndBack($msg)
    {
        echo "<script>";
        echo "alert('{$msg}');";
        echo "history.back();";
        echo "</script>";
    }

    public static function msgAndGo($msg, $url)
    {
        echo "<script>";
        echo "alert('{$msg}');";
        echo "location.href='{$url}';";
        echo "</script>";
    }
}