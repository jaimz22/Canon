<?php
/**
 * @author: jaimz
 * @copyright:
 * @date: 4/21/14
 * @time: 11:33 AM
 */

namespace Vertigolabs\Canon\EventSubscribers;


use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Vertigolabs\Canon\Traits\Timestamps;

class TimestampsSubscriber implements EventSubscriber
{
	public function prePersist(LifecycleEventArgs $args)
	{
		$object = $args->getObject();
		if (in_array(Timestamps::class,class_uses($object))) {
			$object->touchCreatedAt();
			$object->touchUpdatedAt();
		}
	}

	public function preUpdate(LifecycleEventArgs $args)
	{
		$object = $args->getObject();
		if (in_array(Timestamps::class,class_uses($object))) {
			$object->touchUpdatedAt();
		}
	}

	public function getSubscribedEvents()
	{
		return [
			Events::prePersist,
			Events::preUpdate,
		];
	}
} 