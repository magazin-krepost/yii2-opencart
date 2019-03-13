<?php
namespace matroskin92\opencart\controllers;

// use yii\helpers\ArrayHelper;
use matroskin92\opencart\models\FilterModel 				as Filter;
use matroskin92\opencart\models\FilterDescriptionModel 		as FilterDescription;
use matroskin92\opencart\models\FilterGroupModel 			as Group;
use matroskin92\opencart\models\FilterGroupDescriptionModel	as GroupDescription;
use matroskin92\opencart\models\ProductFilterModel 			as ProductFilter;

class FilterController {

	public function getFilter($name, $filter_group_id){

		$model_filter_description = new FilterDescription;
		return $model_filter_description->getByName($name, $filter_group_id);
	}

	public function getFilterGroup($name){

		$model_group_description = new GroupDescription;
		return $model_group_description->getByName($name);

	}

	public function setFilter($name, $filter_group_id){

		$model_filter = new Filter;
		$model_filter_description = new FilterDescription;

		$filter_id = $model_filter->set($filter_group_id);
		$model_filter_description->set($filter_id, $filter_group_id, $name);

		return $filter_id;

	}

	public function setFilterGroup($name){

		$model_group = new Group;
		$model_group_description = new GroupDescription;

		$filter_group_id = $model_group->set();
		$model_group_description->set($filter_group_id, $name);

		return $filter_group_id;

	}

	public function setProduct($product_id, $filter_id){

		$model_product = new ProductFilter();
		$model_product->set($product_id, $filter_id);

	}
	
	
}

?>