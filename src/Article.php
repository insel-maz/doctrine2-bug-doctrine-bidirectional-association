<?php

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Article
{
	/**
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;
	
	/**
	 * @Column(type="string")
	 */
	private $name;
	
	/**
	 * @OneToMany(targetEntity="OrderLine", mappedBy="article")
	 * @var Collection
	 */
	private $orderLines;
	
	public function __construct($name)
	{
		$this->name = $name;
		$this->orderLines = new ArrayCollection();
	}
	
	/**
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * @return OrderLine[]
	 */
	public function getOrderLines()
	{
		return $this->orderLines->toArray();
	}
	
	/**
	 * @return void
	 */
	public function addOrderLine(OrderLine $orderLine)
	{
		$this->orderLines->add($orderLine);
	}

	/**
	 * @return void
	 */
	public function removeOrderLine(OrderLine $orderLine)
	{
		$this->orderLines->removeElement($orderLine);
	}
	
}
