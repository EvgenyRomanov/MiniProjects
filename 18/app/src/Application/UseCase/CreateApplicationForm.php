<?php

namespace app\src\Application\UseCase;

use app\src\Application\UseCase\Request\CreateApplicationFormRequest;
use app\src\Application\UseCase\Response\CreateApplicationFormResponse;
use app\src\Domain\Entity\ApplicationForm;
use app\src\Domain\Repository\ApplicationFormInterface;
use app\src\Domain\ValueObject\Email;
use app\src\Domain\ValueObject\Message;
use Exception;

class CreateApplicationForm
{
    private ApplicationFormInterface $repository;

    public function __construct(ApplicationFormInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws Exception
     */
    public function __invoke(CreateApplicationFormRequest $request): CreateApplicationFormResponse
    {
        $applicationForm = new ApplicationForm(new Email($request->email), new Message($request->message));
        $this->repository->save($applicationForm);

        return new CreateApplicationFormResponse($applicationForm->getId());
    }
}
