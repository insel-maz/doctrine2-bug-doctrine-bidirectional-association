<?php

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class ShopOrder
{
	/**
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;
	
	/**
	 * @OneToMany(targetEntity="OrderLine", mappedBy="shopOrder", cascade={"all"}, orphanRemoval=true)
	 * @var Collection
	 */
	private $orderLines;
	
	public function __construct()
	{
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
	 * @return OrderLine[]
	 */
	public function getOrderLines()
	{
		return $this->orderLines->toArray();
	}
	
	/**
	 * @return OrderLine
	 */
	public function createOrderLine(Article $article)
	{
		$position = $this->orderLines->count() + 1;
		$orderLine = new OrderLine($this, $article, $position);
		// create bidirectional association
		$this->orderLines->add($orderLine);
		$article->addOrderLine($orderLine);
		return $orderLine;
	}

	/**
	 * @return void
	 */
	public function deleteOrderLine(OrderLine $orderLine)
	{
		$this->orderLines->removeElement($orderLine);
		$orderLine->getArticle()->removeOrderLine($orderLine);
	}
	
}
