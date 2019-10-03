<?php

declare(strict_types=1);

namespace Marussia\Logger;

class Log
{
    protected $filePath;

    protected $mode

    public function __construct(string $filePath, bool $rewrite = true)
    {
        $this->filePath = $filePath;
        $this->mode = $rewrite;
    }

    public function write(string $message) : void
    {
        if ($this->mode) {
            $logFile = fopen($this->filePath . '.log', 'x');
        } else {
            $logFile = fopen($this->filePath . '.log', 'a');
        }

        fwrite($logFile, $message);
        fclose($logFile);
    }

    public function read() : string
    {
        return file_get_contents($this->filePath);
    }
}
