<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CommentController extends Controller
{
     /**
     * @Route("/list")
     */
    public function listAction()
    {
        $comments = $this->getDoctrine()
            ->getRepository('AppBundle:Comment')
            ->findAll();
//         var_dump($comments);
        return $this->render('Lists/list.html.twig', [
            'comments' => $comments,
        ]);
       
    }

}