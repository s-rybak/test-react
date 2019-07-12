<?php

namespace App\Controller\Api;

use App\Resource\ApiSuccessResponceResource;
use App\Service\ContactServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactsController extends AbstractFOSRestController
{

    /**
     * @var ContactServiceInterface
     */
    private $service;

    public function __construct(ContactServiceInterface $contactService)
    {


        $this->service = $contactService;
    }

    /**
     * Get service status.
     *
     * @return View
     *
     * @Rest\Get("/status")
     */
    public function status(): View
    {
        return $this->view(["status" => "OK"], Response::HTTP_OK, ['Access-Control-Allow-Origin' => "*"]);

    }

}
