<?php

namespace App\Services\Logger;

use Psr\Log\LoggerInterface;

class AbfLoggerService {

    private $format = "Y-m-d H:i:s";
    private $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function info($object, $message) {
        $this->logger->info(date($this->format) . " " . get_class($object) . " : " . $message);
    }

    public function debug($object, $message) {
        $this->logger->debug(date($this->format) . " " . get_class($object) . " : " . $message);
    }

    public function error($object, $message) {
        $this->logger->error(date($this->format) . " " . get_class($object) . " : " . $message);
    }

}