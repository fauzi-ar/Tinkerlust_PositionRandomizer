<?php 	
	class Tinkerlust_PositionRandomizer_RandomizeController extends Mage_Core_Controller_Front_Action
	{
		public function nowAction(){
			Mage::helper('positionrandomizer')->randomize();
		}
	}
?>