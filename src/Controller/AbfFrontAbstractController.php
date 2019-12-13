<?php

namespace App\Controller;

use App\Services\Logger\AbfLoggerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AbfFrontAbstractController extends AbstractController {

    protected $logger;

    public function __construct(AbfLoggerService $logger) {
        $this->logger = $logger;
    }

}