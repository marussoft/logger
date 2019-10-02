<?php

declare(strict_types=1);

namespace Marussia\Logger;

class Log
{
    protected $filePath;

    protected $opened = false;

    protected $mode

    public function __construct(string $filePath, bool $rewrite = true)
    {
        $this->filePath = $filePath;
        $this->mode = $rewrite;
    }

    public function write(string $message) : void
    {
        if ($this->mode && $this->opened === false) {
            $logFile = fopen($this->filePath . '.log', 'x');
        } else {
            $logFile = fopen($this->filePath . '.log', 'a');
        }

        fwrite($logFile, $message);
        fclose($logFile);
        $this->opened = true;
    }

    public function read() : string
    {

    }
}
