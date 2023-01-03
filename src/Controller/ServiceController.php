<?php

namespace SPA\Controller;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
// use SPA\Core\Application\Command\AddService;
// use SPA\Core\Application\Query\FindAllServices;
use SPA\Core\Domain\Entity\Service;

class ServiceController
{
    /**
     * @var AddService
     */
    private $addServiceCommand;

    /**
     * @var FindAllServices
     */
    private $findAllServicesQuery;

    // /**
    //  * ServiceController constructor.
    //  *
    //  * @param AddService      $addServiceCommand
    //  * @param FindAllServices $findAllServicesQuery
    //  */
    // public function __construct(AddService $addServiceCommand, FindAllServices $findAllServicesQuery)
    // {
    //     $this->addServiceCommand = $addServiceCommand;
    //     $this->findAllServicesQuery = $findAllServicesQuery;
    // }

    /**
     * ServiceController constructor.
     *
     * @param AddService      $addServiceCommand
     * @param FindAllServices $findAllServicesQuery
     */
    public function __construct(FindAllServices $findAllServicesQuery)
    {
        $this->findAllServicesQuery = $findAllServicesQuery;
    }

    // /**
    //  * @param Request  $request
    //  * @param Response $response
    //  *
    //  * @return Response
    //  */
    // public function addService(Request $request, Response $response): Response
    // {
    //     $body = $request->getParsedBody();
    //     $Service = $this->addServiceCommand->execute($body['title'], $body['description']);

    //     return $response->withStatus(201, sprintf('Service id %s created', $Service->getId()));
    // }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function listServices(Response $response): Response
    {
        $Services = $this->findAllServicesQuery->execute();
        $ServiceData = array_map(function (Service $Service) {
            return $Service->toArray();
        }, $Services);
        $payload = json_encode($ServiceData);
        $response->getBody()->write($payload);

        return $response->withHeader('Content-Type', 'application/json');
    }
}
