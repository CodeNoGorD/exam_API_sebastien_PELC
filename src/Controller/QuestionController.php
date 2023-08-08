<?php

namespace App\Controller;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class QuestionController extends AbstractController
{
    #[Route('/api/up', name: 'app_question_up')]
    public function up(Question $question, SerializerInterface $serializer, QuestionRepository $qr, EntityManagerInterface $em): Response
    {
        $id = json_decode($qr->getId());
        return $id;
    }
}
