<?php 
class Tinkerlust_PositionRandomizer_Model_Observer
{
	public function __construct()
    {
    }
	    
	public function randomize()
	{	
		$categoryproduct = Mage::getModel('positionrandomizer/categoryproduct');
		$categoryproduct->randomize_products_position();
	}
}
?>