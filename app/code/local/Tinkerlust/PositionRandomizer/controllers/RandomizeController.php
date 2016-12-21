<?php 	
	class Tinkerlust_PositionRandomizer_RandomizeController extends Mage_Core_Controller_Front_Action
	{
		public function nowAction(){
			try {
				Mage::helper('positionrandomizer')->randomize();
				echo 'success.';
			}
			catch (Mage_Core_Exception $e){
				$e->getMessage();
			}
			
		}
	}
?>