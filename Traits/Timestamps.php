<?php
/**
 * @author: jaimz
 * @copyright:
 * @date: 4/21/14
 * @time: 11:39 AM
 */

namespace Vertigolabs\Canon\Traits;

trait Timestamps
{
	public function touchCreatedAt()
	{
		if (!property_exists($this,'createdAt')) {
			throw new \BadMethodCallException('Entities implementing the Timestamp trait must have a createdAt property');
		}
		if (method_exists($this,'setCreatedAt')) {
			$this->setCreatedAt(new \DateTime());
			return $this;
		}
		$this->createdAt = new \DateTime();
		return $this;
	}

	public function touchUpdatedAt()
	{
		if (!property_exists($this,'updatedAt')) {
			throw new \BadMethodCallException('Entities implementing the Timestamp trait must have a updatedAt property');
		}
		if (method_exists($this,'setUpdatedAt')) {
			$this->setUpdatedAt(new \DateTime());
			return $this;
		}
		$this->updatedAt = new \DateTime();
		return $this;
	}
} 