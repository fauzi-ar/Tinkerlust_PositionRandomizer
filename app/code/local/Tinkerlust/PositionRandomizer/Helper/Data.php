<?php 
	class Tinkerlust_PositionRandomizer_Helper_Data extends Mage_Core_Helper_Abstract{		
		function randomize(){
			$categoryproduct = Mage::getModel('positionrandomizer/categoryproduct');
			$categoryproduct->randomize_products_position();
		}
	}
 ?>