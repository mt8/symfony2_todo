<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\task;

class LoadTaskData implements FixtureInterface, ContainerAwareInterface {
	
	
	private $container;
	
	public function setContainer(ContainerInterface $container = null) {
		$this->container = $container;
	}
	
	public function load(ObjectManager $manager) {
		
		$task1 = new task();
		$task1->setName('あれ');
		$task1->setLimitDate( new \Datetime('2017/03/31'));
		$task1->setStatus('0');
		$manager->persist($task1);
		
		$task2 = new task();
		$task2->setName('これ');
		$task2->setLimitDate( new \Datetime('2017/03/01'));
		$task2->setStatus('1');
		$manager->persist($task2);
		
		$task3 = new task();
		$task3->setName('それ');
		$task3->setLimitDate( new \Datetime('2017/02/28'));
		$task3->setStatus('2');
		$manager->persist($task3);
		
		$manager->flush();
		
	}
	
}