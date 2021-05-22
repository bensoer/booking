<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Application\Actions\Action;
use App\Domain\User\Service\CreateUserService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class CreateUserAction extends Action
{
    /**
     * @var CreateUserService
     */
    protected $createUserService;

    /**
     * @param LoggerInterface $logger
     * @param CreateUserService $createUserService
     */
    public function __construct(LoggerInterface $logger,
                                CreateUserService $createUserService
    ) {
        parent::__construct($logger);
        $this->createUserService = $createUserService;
    }

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $user = $this->createUserService->createUser(
            $this->request->getParsedBody()
        );

        return $this->respondWithData(["guid" => $user->getGuid()]);
    }
}
