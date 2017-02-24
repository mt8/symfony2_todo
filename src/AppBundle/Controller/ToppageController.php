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
		$tasks = [
			[
				'name' => 'あれ'
			],
			[
				'name' => 'それ'
			],
			[
				'name' => 'これ'
			],			
		];
		return $this->render('Toppage/index.html.twig',['tasks' => $tasks]);
	}
}
