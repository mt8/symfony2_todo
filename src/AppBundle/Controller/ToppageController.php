<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ToppageController extends Controller
{
	/**
	 * @Route("/")
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();
		$taskRepository = $em->getRepository('AppBundle:task');
		$tasks = $taskRepository->findBy([], ['limitDate' => 'ASC']);
		return $this->render('Toppage/index.html.twig',['tasks' => $tasks]);
	}
}
