<?php 
class Tinkerlust_PositionRandomizer_Model_Categoryproduct extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('positionrandomizer/categoryproduct');
    }

    public function randomize_products_position()
    {	
    	
    	//get number of products, to generate random numbers
    	$ids = Mage::getModel('catalog/product')->getCollection()->getAllIds();	
    	$num_of_products = sizeof($ids);
		
    	$status = $this->getResource()->populate_product_with_random_position($num_of_products);
        
        if ($status) {
            //reindex catalog_category_product index
            Mage::log("Product position randomized, reindexing...");
            $catalog_category_product_index = Mage::getModel('index/indexer')->getProcessByCode('catalog_category_product');
            $catalog_category_product_index->reindexAll();

            //log success
            Mage::log("reindexing category_product DONE.");
        }
        //if failed, don't bother to do anything, but write in log.
        else Mage::log('FAILED to randomized product position');  	
    }
}
?>