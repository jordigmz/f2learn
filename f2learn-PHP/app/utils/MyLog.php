<?php
namespace f2learn\app\utils;

use Exception;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MyLog
{
    private Logger $log;
    private int $level;

    /**
     * @param string $filename
     * @param int $level
     */
    private function __construct(string $filename, int $level)
    {
        $this->level = $level;
        $this->log = new Logger('name');
        $this->log->pushHandler(
            new StreamHandler($filename, $this->level)
        );
    }

    /**
     * @param string $filename
     * @param int $level
     * @return MyLog
     */
    public static function load(string $filename, int $level) : MyLog
    {
        return new MyLog($filename, $level);
    }

    /**
     * @param string $message
     */
    public function add(string $message) : void
    {
        $this->log->log($this->level, $message);
    }
}