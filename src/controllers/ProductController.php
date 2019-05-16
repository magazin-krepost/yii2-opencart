<?php
namespace matroskin92\opencart\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use matroskin92\opencart\models\ProductModel as ProductModel;
use matroskin92\opencart\models\ProductMultistoreModel as ProductMultistoreModel;
use matroskin92\opencart\models\ProductDescriptionModel as DescriptionModel;
use matroskin92\opencart\models\ProductImageModel as ImageModel;
use matroskin92\opencart\models\ProductStoreModel as StoreModel;
use matroskin92\opencart\models\ProductAnalogModel as ProductAnalog;
use matroskin92\opencart\models\ProductBusinessru as ProductBusinessru;

class ProductController {

	public function get($product_id){

		$model_product = new ProductModel();
		return $model_product->get($product_id);
		
	}

	public function getBusinessruId($product_id){

		$model_businessru = new ProductBusinessru();
		$result = $model_businessru->getGoodId($product_id);

		return $result['good_id'];

	}

	public function getByBusinessruId($good_id){

		$model_businessru = new ProductBusinessru();
		$result = $model_businessru->getProductId($good_id);

		if ( !empty($result) ){
			return $this->get($result['product_id']);
		} else {
			return NULL;
		}

	}

	public function getProductIdFromBusinessruId($good_id){

		$model_businessru = new ProductBusinessru();
		$result = $model_businessru->getProductId($good_id);

		if ( !empty($result) ){
			return $result['product_id'];
		} else {
			return NULL;
		}

	}

	public function getBySku($sku){
		$model_product = new ProductModel();
		return $model_product->getBySku($sku);
	}

	public function getByName($name, $option = NULL){

		$model_description = new DescriptionModel();
		$products = ArrayHelper::index(
						$model_description->getByName($name), 
						'product_id'
					);

		if ($option === NULL) {
			
			return $products;
			
		} elseif ($option === 'full') {

			foreach($products as $product_id => $product){
				$products[$key] = array_merge($product, $this->get($product_id));
			}

			return $products;

		}

	}

	public function getAll($column = 'product_id'){

		$model_product = new ProductModel();
		return ArrayHelper::index(
			$model_product->getAll(), 
			$column
		);

	}

	public function set($product){

		$model_product = new ProductModel();
		$model_description = new DescriptionModel();
		$model_image = new ImageModel();
		$model_store = new StoreModel();

		$product['product_id'] = $model_product->set($product);
		$model_description->set($product);
		$model_image->set($product);
		$model_store->set($product);
		
		return $product['product_id'];

	}

	public function update($product){

		$model_product = new ProductModel();
		return $model_product->upd($product);

	}

	public function multistore($product){

		$model_multistore = new ProductMultistoreModel();
		return $model_multistore->set($product);

	}

	public function getMultistoreSum($product_id){
		$model_multistore = new ProductMultistoreModel();
		return $model_multistore->getSum($product_id);
	}

	public function clearMultistore(){
		$model_multistore = new ProductMultistoreModel();
		return $model_multistore->clear();
	}

	public function setAnalog($product_id, $analog_id){
		$model_analog = new ProductAnalog();
		$model_analog->set($product_id, $analog_id);
	}

	public function clearAnalog(){
		$model_analog = new ProductAnalog();
		$model_analog->clear();
	}

	public function setBusinessruId($product){
		$model_businessru = new ProductBusinessru();
		$model_businessru->set(array(
			'product_id' => $product['product_id'],
			'good_id' => $product['good_id']
		));

	}
	
}

?>