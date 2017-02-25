<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

class EditpageController extends Controller
{
	/**
	 * @Route("/{id}/edit")
	 * @ParamConverter("task", class="AppBundle:task")
	 * @Method("get")
	 */
	public function indexAction( $task )
	{
		$form = $this->createTaskForm($task);
		return $this->render('Editpage/index.html.twig',[
			'form' => $form->createView(),
			'task' => $task,
		]);
	}

	/**
	 * @Route("/{id}/edit")
	 * @ParamConverter("task", class="AppBundle:task")
	 * @Method("post")
	 */	
	public function indexPostAction( Request $request, task $task )
	{
		$form = $this->createTaskForm($task);
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->flush();
			return $this->redirect($this->generateUrl('app_toppage_index'));
		}
		
	}
	
	private function createTaskForm( $task )
	{
		return $this->createFormBuilder($task)
				->add('name','text')
				->add('limitDate','date', ['format' => 'yMd'])
				->add('status','choice',['choices' => [ '未','中','済' ]])
				->add('submit', 'submit',['label'=>'保存'])
				->getForm();
	}
}
