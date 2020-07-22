<?php

namespace App\Controller;

use App\Services\Logger\AbfLoggerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AbfFrontAbstractController extends AbstractController {

    protected $logger;

    protected $data;

    public function __construct(AbfLoggerService $logger) {
        $this->logger = $logger;

        $this->data = [];

        $this->logger->info($this, "AbfFrontAbstractController constructeur");

    }

    public function renderCustomView($view) {
        if ($this->getUser()) {
            $this->data['user'] = [
                'username' => $this->getUser()->getUserName()
            ];
        } else {
            $this->data['user'] = null;
        }

        $this->logger->info($this, "Data send to view " . json_encode($this->data));

        return $this->render($view, $this->data);
    }

}