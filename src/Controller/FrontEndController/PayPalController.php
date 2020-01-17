<?php

namespace App\Controller\FrontEndController;

use App\Controller\AbfFrontAbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/paypal")
 * @return \Symfony\Component\HttpFoundation\Response
 */
class PayPalController extends AbfFrontAbstractController {

    private $clientKey = "AQR4PDcURVeSjKXS0BvwY9tLkvJFImt8oIBH6drbTo_cwB27rwGHzO7tEIEVH2D2eaJtTuCxKkD9D6sx";
    private $secretKey = "EKUNT9sAN2csvBMJboqVMXNkH-FeAtv_PUhbWwum3LPjeArdU0Sk-p2uztfBP17eNbhjrIMOKAg1ipaE";

    /**
     * @Route(path="/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index() {

        $this->logger->info($this, "Index paypal controller");

        return $this->render('front-end/paypal/index.html.twig');
    }

}