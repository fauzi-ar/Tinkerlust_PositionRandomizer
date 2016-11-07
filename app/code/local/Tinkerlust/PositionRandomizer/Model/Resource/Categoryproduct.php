<?php 
class Tinkerlust_PositionRandomizer_Model_Resource_Categoryproduct extends Mage_Core_Model_Resource_Db_Abstract{
	protected function _construct(){
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

	public function populate_product_with_random_position($num_of_products){

		$write = Mage::getSingleton('core/resource')->getConnection('core_write');
		$table = $this->getMainTable();
		$column = 'position';
		$min_number = 100000;

		$max_random_value = $num_of_products > $min_number ? $num_of_products : $min_number;

		$query = "update $table set $column = CAST(RAND() * $max_random_value AS UNSIGNED)";

		try {
			$write->query($query);
			return true;
		} catch (Exception $e) {
    		Mage::printException($e);
    		return false;
		}    		
		
	}	
}

?>