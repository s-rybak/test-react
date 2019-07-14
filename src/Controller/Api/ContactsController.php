<?php

namespace App\Controller\Api;

use App\Api\Response\ResponseBuilder;
use App\Api\Transformer\ContactResourseTransformer;
use App\Api\Transformer\EmptyResourseTransformer;
use App\Service\ContactServiceInterface;
use App\Transformer\ArrayToContactDTOTransformer;
use App\Transformer\ContactsCollectionToEntitiesPackDTO;
use App\Validator\Factory\ValidatorFactoryInterface;
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

            $reqData = $req->getData();

            return $this->view(
                ResponseBuilder::getInstance(new ContactResourseTransformer())
                    ->setEntities(
                        (new ContactsCollectionToEntitiesPackDTO(
                            $this->service->list($reqData['page'], $reqData['perpage']),
                            $reqData['page'], $reqData['perpage']
                        ))
                            ->transform()
                            ->setTotal($this->service->count())
                    )
                    ->getResponse()
                    ->setStatus("success")
                    ->setMessage("Contact list"),

                Response::HTTP_OK);

        }

        return $this->view(
            ResponseBuilder::getInstance(new EmptyResourseTransformer())
                ->getResponse()
                ->setLinks([
                    'self' => [
                        'href' => '/api/getList',
                    ],
                ])
                ->setMessage("Request is not valid. {$req->getMessage()}")
                ->setStatus('error'),
            Response::HTTP_BAD_REQUEST);

    }

    /**
     * Add new contact
     *
     * @param Request $request
     * @return View
     *
     * @throws \App\Exceptions\ValidatorNotFoundException
     * @Rest\Post("/add")
     */
    public function add(Request $request)
    {

        $req = $this->validator->get("AddContactRequestValidator")->validate(
            $request->request->all() + $request->files->all()
        );

        if ($req->isValid()) {

            return $this->view(
                ResponseBuilder::getInstance(new ContactResourseTransformer())
                    ->setEntity(
                        $this->service->create(
                            (new ArrayToContactDTOTransformer($req->getData()))
                                ->transform()
                        )
                    )
                    ->getResponse()
                    ->setMessage("Contact created")
                    ->setStatus('success'),
                Response::HTTP_OK);

        }

        return $this->view(
            ResponseBuilder::getInstance(new EmptyResourseTransformer())
                ->getResponse()
                ->setLinks([
                    'self' => [
                        'href' => '/api/add',
                    ],
                ])
                ->setMessage("Request is not valid. {$req->getMessage()}")
                ->setStatus('error'),
            Response::HTTP_BAD_REQUEST);


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
