<?php
/**
 * @author: jaimz
 * @copyright:
 * @date: 4/21/14
 * @time: 11:39 AM
 */

namespace Vertigolabs\Canon\Traits;

use Doctrine\ORM\Mapping as ORM;
trait Timestamps
{
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="created_at", type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="updated_at", type="datetime", nullable=true)
	 */
	private $updatedAt;

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


	/**
	 * Set createdAt
	 *
	 * @param \DateTime $createdAt
	 * @return mixed
	 */
	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * Get createdAt
	 *
	 * @return \DateTime
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	/**
	 * Set updatedAt
	 *
	 * @param \DateTime $updatedAt
	 * @return mixed
	 */
	public function setUpdatedAt($updatedAt)
	{
		$this->updatedAt = $updatedAt;

		return $this;
	}

	/**
	 * Get updatedAt
	 *
	 * @return \DateTime
	 */
	public function getUpdatedAt()
	{
		return $this->updatedAt;
	}
} 