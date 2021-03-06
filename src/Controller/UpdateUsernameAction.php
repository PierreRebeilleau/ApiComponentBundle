<?php

namespace Silverback\ApiComponentBundle\Controller;

use Silverback\ApiComponentBundle\Repository\User\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Silverback\ApiComponentBundle\Exception\InvalidEntityException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\ConstraintViolationInterface;

class UpdateUsernameAction
{
    private $userRepository;
    private $entityManager;

    public function __construct(
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/update_username", name="update_username", methods={"post"})
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $data = \json_decode($request->getContent(), true);
        $username = $data['username'];
        $token = $data['token'];
        $user = $this->userRepository->findOneBy([
            'newUsername' => $username,
            'usernameConfirmationToken' => $token
        ]);
        if (null === $user) {
            $currentUser = $this->userRepository->findOneBy([
                'username' => $username
            ]);
            if ($currentUser) {
                return new JsonResponse([], Response::HTTP_OK);
            }
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }
        try {
            $user
                ->setUsername($user->getNewUsername())
                ->setNewUsername(null)
                ->setUsernameConfirmationToken(null)
            ;
            $this->entityManager->flush();
            return new JsonResponse([], Response::HTTP_OK);
        } catch (InvalidEntityException $exception) {
            $errors = [];
            /** @var ConstraintViolationInterface $error */
            foreach ($exception->getErrors() as $error) {
                $errors[] = $error->getMessage();
            }
            return new JsonResponse($errors, Response::HTTP_BAD_REQUEST);
        }
    }
}
