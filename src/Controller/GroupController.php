<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Group;

final class GroupController extends AbstractController
{
    #[Route('/group', name: 'app_group')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $groups = $entityManager->getRepository(Group::class)->findAll();

        return $this->render('group/index.html.twig', [
            'groups' => $groups,
        ]);
    }

}
