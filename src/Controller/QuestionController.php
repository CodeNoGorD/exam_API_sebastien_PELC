<?php

namespace App\Controller;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class QuestionController extends AbstractController
{
    #[Route('/api/up', name: 'app_question_up', methods: ['PATCH'])]
    public function up(Request $request, QuestionRepository $qr, EntityManagerInterface $em): Response
    {
        $requete = json_decode($request->getContent());
        $id = $requete->{"id"};

        $nbr = $qr->find($id)->getScore() + 1;
        $em->persist($qr->find($id)->setScore($nbr));
        $em->flush();

        return $this->json(['message' => 'Le score a été incrémenté']);
    }
    #[Route('/api/down', name: 'app_question_down', methods: ['PATCH'])]
    public function down(Request $request, QuestionRepository $qr, EntityManagerInterface $em): Response
    {
        $requete = json_decode($request->getContent());
        $id = $requete->{"id"};

        $nbr = $qr->find($id)->getScore() - 1;
        $em->persist($qr->find($id)->setScore($nbr));
        $em->flush();

        return $this->json(['message' => 'Le score a été décrementé']);
    }
}
