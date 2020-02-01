<?php 

namespace App\Controller\FrontEndController;

use App\Controller\AbfFrontAbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/products")
 * @return \Symfony\Component\HttpFoundation\Response
 */
class ProductController extends AbfFrontAbstractController {

    /**
     * @Route(path="/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index() {

        $this->logger->info($this, "Index paypal controller");

        return $this->render('front-end/products/index.html.twig');
    }

    /**
     * @Route(path="/list")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function list() {

        $this->logger->info($this, "Index paypal controller");

        return $this->render('front-end/products/list.html.twig');
    }


}