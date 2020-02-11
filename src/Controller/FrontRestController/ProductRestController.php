<?php

namespace App\Controller\FrontRestController;

use App\Controller\AbfFrontAbstractController;
use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Services\Logger\AbfLoggerService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use function MongoDB\BSON\toJSON;

/**
 * Class ProductRestController
 * @package App\RestController
 * @Route(path="/api")
 */
class ProductRestController extends AbfFrontAbstractController {

    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(AbfLoggerService $logger, ProductRepository $productRepository)
    {
        parent::__construct($logger);
        $this->productRepository = $productRepository;
    }

    /**
     * @Route(path="/products", methods={"GET"})
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

    /**
     * @Route(path="/products", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function createProduct(Request $request) : JsonResponse {

        $data = json_decode($request->getContent(), true);

        $product = new Product();
        $product->setName($data['name']);
        $product->setDescription($data['description']);
        $product->setPrice($data['price']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($product);
        $entityManager->flush();

        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setData($product);

        return $response;

    }

}