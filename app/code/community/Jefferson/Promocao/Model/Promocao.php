<?php

/**
 * 
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * @category    Jefferson
 * @package     Jefferson_Promocao
 * @author		Jefferson Batista Porto <jefferson.b.porto@gmail.com>
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 */

	class Jefferson_Promocao_Model_Promocao extends Mage_Core_Model_Abstract {
		
			protected $_product = null;
			protected $categoryCurrent = null;
			
			
			protected function _construct()
		    {
		        $this->_init('promocao/promocao');
		        self::getCategoryCurrent();
		    } 
		    
			public function getCategoryCurrent(){
				$this->categoryCurrent =  Mage::registry('current_category')->getId();
				return $this->categoryCurrent;
			}
			
			public function getDataProducts(){
				
				$this->_product = Mage::getModel('catalog/product')
				->getCollection()
				->joinField('category_id', 'catalog/category_product', 'category_id', 'product_id = entity_id', null, 'left')
				->addAttributeToSelect('*')
				->addAttributeToFilter('set_promotion', array('in'=>"1"))
				->addAttributeToFilter('category_id', array('in'=> array($this->categoryCurrent)))
				->load();
				
				foreach($this->_product as $item);
				
				if ($item) 
				{
					return $this->_product;
					
				}else{
					return false;
				}
				
			}
		
		
	}
?>