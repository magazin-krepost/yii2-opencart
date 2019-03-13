<?php
namespace matroskin92\opencart\controllers;

use yii\helpers\ArrayHelper;
use matroskin92\opencart\models\ManufacturerModel 		as Manufacturer;
use matroskin92\opencart\models\ManufacturerStoreModel	as Store;
use matroskin92\opencart\models\ProductModel			as Product;

class ManufacturerController {

	public function get($name){

		$model_description = new Manufacturer();
		return $model_description->getByName($name);

	}

	public function set($manufacture){

		$model_manufacturer = new Manufacturer();
		$model_store = new Store();

		$manufacturer['manufacturer_id'] = $model_manufacturer->set($manufacture);
		$model_store->set($manufacturer);

		return $manufacturer['manufacturer_id'];
	}

	public function setProduct($manufacturer_id, $product_id){

		$model_product = new Product();

		$model_product->upd(array(
			'product_id' => $product_id,
			'manufacturer_id' => $manufacturer_id
		));

	}


}

?>