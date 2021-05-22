<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Application\Actions\Action;
use App\Domain\User\Service\CreateUserService;
use App\Domain\User\Service\GetAllUserService;
use App\Domain\User\Service\GetUserService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class GetAllUserAction extends Action
{
    /**
     * @var GetAllUserService
     */
    protected $getAllUserService;

    /**
     * @param LoggerInterface $logger
     * @param GetAllUserService $getAllUserService
     */
    public function __construct(LoggerInterface $logger,
                                GetAllUserService $getAllUserService
    ) {
        parent::__construct($logger);
        $this->getAllUserService = $getAllUserService;
    }

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $users = $this->getAllUserService->getAllUsers();
        return $this->respondWithData($users);
    }
}
