<?php

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class OrderLine
{
	/**
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;
	
	/**
	 * @ManyToOne(targetEntity="ShopOrder")
	 * @JoinColumn(nullable=false)
	 * @var ShopOrder
	 */
	private $shopOrder;
	
	/**
	 * @ManyToOne(targetEntity="Article")
	 * @JoinColumn(nullable=false)
	 * @var Aritcle
	 */
	private $article;
	
	/**
	 * @Column(type="integer")
	 * @var integer
	 */
	private $position;
	
	public function __construct(ShopOrder $shopOrder, Article $article, $position)
	{
		$this->shopOrder = $shopOrder;
		$this->article = $article;
		$this->position = $position;
	}
	
	/**
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @return ShopOrder
	 */
	public function getShopOrder()
	{
		return $this->shopOrder;
	}
	
	/**
	 * @return Article
	 */
	public function getArticle()
	{
		return $this->article;
	}
	
}
