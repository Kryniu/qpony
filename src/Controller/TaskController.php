<?php


namespace App\Controller;


use App\Form\SequenceNumberType;
use App\Service\SequenceNumberService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TaskController
 * @package App\Controller
 * @Route("/task")
 */
class TaskController extends AbstractController
{
    /**
     * @Route("/sequence_number")
     * @param Request $request
     * @param SequenceNumberService $sequenceNumberService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sequenceNumber(Request $request, SequenceNumberService $sequenceNumberService): Response
    {
        $form = $this->createForm(SequenceNumberType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $result = $sequenceNumberService->getMaxNumbers($form->getData());

            return $this->render('SequenceNumber/result.html.twig', [
                'result' => $result
            ]);
        }

        return $this->render('SequenceNumber/form.html.twig', [
            'form' => $form->createView()
        ]);
    }
}