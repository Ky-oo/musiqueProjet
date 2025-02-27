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
        var_export($groups, true);
        return $this->render('group/index.html.twig', [
            'groups' => $groups,
        ]);
    }

    #[Route('/group/add', name: 'app_group_show')]
    public function add(EntityManagerInterface $entityManager): Response
    {
        $group = new Group();
        $group->setName('Group 1');
        $group->setArtists(['Artist 1', 'Artist 2']);
        $group->setPopularSongs(['Song 1', 'Song 2 (Ahah Blur reference)']);
        $entityManager->persist($group);
        $entityManager->flush();
        return new Response('Group was created');
    }

}
