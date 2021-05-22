<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Application\Actions\Action;
use App\Domain\User\Service\CreateUserService;
use App\Domain\User\Service\GetUserService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class GetUserAction extends Action
{
    /**
     * @var GetUserService
     */
    protected $getUserService;

    /**
     * @param LoggerInterface $logger
     * @param GetUserService $getUserService
     */
    public function __construct(LoggerInterface $logger,
                                GetUserService $getUserService
    ) {
        parent::__construct($logger);
        $this->getUserService = $getUserService;
    }

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {

        $user = $this->getUserService->getUser($this->resolveArg("guid"));
        return $this->respondWithData($user);
    }
}
