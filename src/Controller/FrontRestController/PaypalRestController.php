<?php 

namespace App\Controller\FrontRestController;

use App\Controller\AbfFrontAbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class PaypalRestController
 * @package App\RestController
 * @Route(path="/api/paypal")
 */
class PaypalRestController extends AbfFrontAbstractController {

    /**
     * @Route(path="/create", methods={"GET"} )
     * @return JsonResponse
     */
    public function createOrder() : JsonResponse {

        $response = new JsonResponse();

        $response->headers->set('Content-Type', 'application/json');
        // Allow all websites
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $users = array(
            [
                'id' => 1,
                'data' => 'Sow Brahim'
            ],
            [
                'id' => 2,
                'data' => 'Hanma Baki'
            ]
        );

        $response->setData($this->buildRequestBody());


        return $response;

    }

    private static function buildRequestBody()
    {
        return array(
            'intent' => 'CAPTURE',
            'application_context' =>
                array(
                    'return_url' => 'https://example.com/return',
                    'cancel_url' => 'https://example.com/cancel'
                ),
            'purchase_units' =>
                array(
                    0 =>
                        array(
                            'amount' =>
                                array(
                                    'currency_code' => 'USD',
                                    'value' => '220.00'
                                )
                        )
                )
        );
    }


}