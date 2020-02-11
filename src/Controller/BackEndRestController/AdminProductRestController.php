<?php

namespace App\Controller\BackEndRestController;

use App\Controller\AbfFrontAbstractController;
use App\Repository\ProductRepository;
use App\Services\Logger\AbfLoggerService;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class GroupAnnotation
 * @package App\RoutingAnnotations
 * @Route(path="/admin/api/products")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminProductRestController extends AbfFrontAbstractController {

    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(AbfLoggerService $logger, ProductRepository $productRepository) {
        parent::__construct($logger);
        $this->productRepository = $productRepository;
    }

    /**
     * @Route(path="/", methods={"GET"} )
     * @return JsonResponse
     */
    public function getProducts() : JsonResponse {

        $products = $this->productRepository->findAll();

        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setData($products);

        return $response;

    }

}


