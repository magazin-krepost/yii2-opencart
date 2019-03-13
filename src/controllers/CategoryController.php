<?php
namespace matroskin92\opencart\controllers;

use yii\helpers\ArrayHelper;
use matroskin92\opencart\models\CategoryModel 				as Category;
use matroskin92\opencart\models\CategoryDescriptionModel 	as Description;
use matroskin92\opencart\models\CategoryPathModel 			as Path;
use matroskin92\opencart\models\CategoryStoreModel 			as Store;
use matroskin92\opencart\models\ProductCategoryModel 		as ProductCategory;

class CategoryController {

	public function get($name){

		$model_description = new Description();
		return $model_description->getByName($name);

	}

	public function set($category){

		$model_category = new Category();
		$model_description = new Description();
		$model_path = new Path();
		$model_store = new Store();

		$category['category_id'] = $model_category->set($attr);
		$model_description->set($category);
		$model_path->set($category);
		$model_store->set($category);

		return $category['category_id'];

	}

	public function setProduct($product_id, $category_id){

		$model_product = new ProductCategory();

		$model_product->set($product_id, $category_id);

	}

	public function getProduct($product_id){

		$model_product = new ProductCategory();
		return $model_product->get($product_id);

	}
	
}

?>