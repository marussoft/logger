<?php

declare(strict_types=1);

namespace Marussia\Logger;

class Log
{
    protected $filePath;

    protected $rewriteMode;

    public function __construct(string $filePath, bool $rewriteMode = true)
    {
        $this->filePath = $filePath;
        $this->rewriteMode = $rewriteMode;
    }

    public function write(string $message) : void
    {
        if ($this->rewriteMode) {
            $logFile = fopen($this->filePath . '.log', 'w');
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
