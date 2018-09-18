<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TeamsController extends AbstractController
{
    /**
     * @Route("/teams", name="teams")
     */
    public function index()
    {
	    $response = new Response();
	    $string = <<<EOF
{
  "page": 1,
  "limit": 10,
  "pages": 1,
  "total": 1,
  "_links": {
    "self": {
      "href": "/artists/?page=1&paginate=10"
    },
    "first": {
      "href": "/artists/?page=1&paginate=10"
    },
    "last": {
      "href": "/artists/?page=1&paginate=10"
    }
  },
  "_embedded": {
    "items": [
      {
        "id": 1,
        "name": "Eminem",
        "biography": "Pure Awesomness",
        "featured": false,
        "published_at": "2014-01-25T00:00:00+0000"
      }
    ]
  }
}
EOF;

	    $response->setContent($string);
	    $response->headers->set('Content-Type', 'application/json');

	    return $response;
    }
}
