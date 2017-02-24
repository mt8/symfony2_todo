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
				'name' => 'あれ', "limit_date" => '2017/03/31', "status" => '0'
			],
			[
				'name' => 'これ', "limit_date" => '2017/03/01', "status" => '1'
			],
			[
				'name' => 'それ', "limit_date" => '2017/02/28', "status" => '2'
			],			
		];
		return $this->render('Toppage/index.html.twig',['tasks' => $tasks]);
	}
}
