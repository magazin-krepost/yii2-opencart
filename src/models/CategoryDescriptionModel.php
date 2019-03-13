<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class CategoryDescriptionModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_category_description}}';
    }

    public function set($category)
	{
		$date = new \DateTime('today');

		$request = new $this;

		$request->category_id = $category['category_id'];

		if (isset($category['language_id'])) {
			$request->language_id = $category['language_id'];
		} else {
			$request->language_id = 1;
		}

		$request->name = $category['name'];

		if (isset($category['description'])) {
			$request->description = $category['description'];
		}
		
		if (isset($category['meta_title'])) {
			$request->meta_title = $category['meta_title'];
		} else {
			$request->meta_title = $category['name'];
		}

		if (isset($category['meta_description'])) {
			$request->meta_description = $category['meta_description'];
		}

		if (isset($category['meta_keyword'])) {
			$request->meta_keyword = $category['meta_keyword'];
		}

		if (isset($category['meta_h1'])) {
			$request->meta_h1 = $category['meta_h1'];
		}
		
		$request->save();
	}

	public function getByName($name){
		return $this->find()->where(['name' => $name])->asArray()->all();
	}

}