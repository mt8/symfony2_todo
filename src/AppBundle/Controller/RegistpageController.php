<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

class RegistpageController extends Controller
{
	/**
	 * @Route("/regist")
	 * @Method("get")
	 */
	public function indexAction()
	{
		$form = $this->createTaskForm();
		return $this->render('Registpage/index.html.twig',[
			'form' => $form->createView()
		]);
	}

	/**
	 * @Route("/regist")
	 * @Method("post")
	 */	
	public function indexPostAction( Request $request )
	{
		$form = $this->createTaskForm();
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$task = $form->getData();
			$em = $this->getDoctrine()->getManager();
			$em->persist($task);
			$em->flush();
			return $this->redirect($this->generateUrl('app_toppage_index'));
		}
		return $this->render('Registpage/index.html.twig',[
			'form' => $form->createView(),
		]);
		
	}
	
	private function createTaskForm()
	{
		return $this->createFormBuilder(new task())
				->add('name','text')
				->add('limitDate','date', ['format' => 'yMd'])
				->add('status','choice',['choices' => [ '未','中','済' ]])
				->add('submit', 'submit',['label'=>'保存'])
				->getForm();
	}
}
