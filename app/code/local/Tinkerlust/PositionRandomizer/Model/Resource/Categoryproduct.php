<?php 
class Tinkerlust_PositionRandomizer_Model_Resource_Categoryproduct extends Mage_Core_Model_Resource_Db_Abstract
{
	protected function _construct()
	{
		$this->_init('positionrandomizer/categoryproduct','category_id');
	}

	//not used anymore
	/*public function assign_new_position($product_id,$position){

		//database write adapter 
		$write = Mage::getSingleton('core/resource')->getConnection('core_write');
		$table = $this->getMainTable();
		$write->update($table,array("position" => $position),"product_id = $product_id");	
		
		return true;		
	}*/

	public function populate_product_with_random_position($num_of_products)
	{
		$write = Mage::getSingleton('core/resource')->getConnection('core_write');
		$table = $this->getMainTable();
		$table2= Mage::getSingleton('core/resource')->getTableName('catalog/product');
		$min_number = 100000;
		$max_random_value = $num_of_products > $min_number ? $num_of_products : $min_number;

		//$query = "update $table set $column = CAST(RAND() * $max_random_value AS UNSIGNED)";

		$query = "update $table c join $table2 p on c.product_id = p.entity_id 
					set c.position = CAST(RAND() * $max_random_value + 5000 AS UNSIGNED) where p.sku not like '5%';";

		$query2 = "update $table c join $table2 p on c.product_id = p.entity_id 
					set c.position = CAST(RAND() * 5000 AS UNSIGNED) where p.sku like '5%';";

		try 
		{
			$write->query($query);
			$write->query($query2);
			return true;
		} 
		catch (Exception $e) 
		{
    		Mage::printException($e);
    		return false;
		}    		
	}	
}
?>