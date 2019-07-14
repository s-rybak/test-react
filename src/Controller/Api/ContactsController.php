<?php

namespace App\Controller\Api;

use App\Service\ContactServiceInterface;
use App\Validator\ValidatorFactoryInterface;
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
    /**
     * @var ValidatorFactoryInterface
     */
    private $validator;

    public function __construct(
        ContactServiceInterface $contactService,
        ValidatorFactoryInterface $validator
    )
    {
        $this->service = $contactService;
        $this->validator = $validator;
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

    /**
     * Get contact list
     *
     * @param Request $request
     * @return View
     *
     * @throws \App\Exceptions\ValidatorNotFoundException
     * @Rest\Get("/getList")
     */
    public function getList(Request $request)
    {

        $req = $this->validator->get("GetListValidator")->validate($request->query->all());

        if ($req->isValid()) {

            return $this->view($req->getData(), Response::HTTP_OK, ['Access-Control-Allow-Origin' => "*"]);


        }

        return $this->view(['error' => "not valid"], Response::HTTP_OK, ['Access-Control-Allow-Origin' => "*"]);

    }

    /**
     * Add new contact
     *
     * @return View
     *
     * @Rest\Get("/add")
     */
    public function add(Request $request)
    {


    }

    /**
     * Edit contact
     *
     * @return View
     *
     * @Rest\Get("/edit")
     */
    public function edit(Request $request)
    {


    }

    /**
     * Delete contact
     *
     * @return View
     *
     * @Rest\Get("/delete")
     */
    public function delete(Request $request)
    {


    }

}
