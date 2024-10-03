<?php

namespace app\src\Application\UseCase;

use app\src\Application\UseCase\Request\CreateApplicationFormRequest;
use app\src\Application\UseCase\Response\CreateApplicationFormResponse;
use app\src\Domain\Entity\ApplicationForm;
use app\src\Domain\Entity\Status;
use app\src\Domain\Repository\ApplicationFormInterface;
use app\src\Domain\Repository\StatusInterface;
use app\src\Domain\ValueObject\Email;
use app\src\Domain\ValueObject\Message;
use app\src\Domain\ValueObject\Name;
use Exception;

class CreateApplicationForm
{
    private ApplicationFormInterface $repositoryApplicationForm;
    private StatusInterface $repositoryStatus;

    public function __construct(ApplicationFormInterface $repositoryApplicationForm, StatusInterface $repositoryStatus)
    {
        $this->repositoryApplicationForm = $repositoryApplicationForm;
        $this->repositoryStatus = $repositoryStatus;
    }

    /**
     * @throws Exception
     */
    public function __invoke(CreateApplicationFormRequest $request): CreateApplicationFormResponse
    {
        $status = $this->repositoryStatus->findByName(new Name(Status::IN_WORK));
        $applicationForm = new ApplicationForm(
            new Email($request->email),
            new Message($request->message),
            $status
        );
        $this->repositoryApplicationForm->save($applicationForm);

        return new CreateApplicationFormResponse(
            $applicationForm->getId(),
            $applicationForm->getStatus()->getName()->getValue()
        );
    }
}
