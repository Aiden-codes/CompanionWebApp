<?php

class Database 
{
    private static $db = null;
    private static $dsn = 'mysql:host=127.0.0.1;dbname=attendance_monitor';
    private static $user = 'root';
    private static $password = '';

    public static function getDatabase() 
    {
        if(is_null(self::$db))
        {
            try 
            {
                self::$db = new PDO(self::$dsn, self::$user, self::$password);
            }
            catch (PDOException $e)
            {
                die('Connection failed.');
            }
            return  self::$db;
        }
    }

    public function recordAttendance($db, $week, $module, $sid) 
    {
        // inserts values from the dropdown into the notification table 
        // no need to filter/prepare since input is dropdown (guaranteed int value in range)
        $db->query("UPDATE attendance $week = 1 WHERE module = $module AND sid = $sid");
    }
}


