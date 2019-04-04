<?php
namespace matroskin92\opencart\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use matroskin92\opencart\models\ProductModel as ProductModel;
use matroskin92\opencart\models\ProductMultistoreModel as ProductMultistoreModel;
use matroskin92\opencart\models\ProductDescriptionModel as DescriptionModel;
use matroskin92\opencart\models\ProductImageModel as ImageModel;
use matroskin92\opencart\models\ProductStoreModel as StoreModel;

class ProductController {

	public function get($product_id){

		$model_product = new ProductModel();
		return $model_product->get($product_id);
		
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

	public function clearMultistore(){
		$model_multistore = new ProductMultistoreModel();
		return $model_multistore->clear();
	}


	
}

?>