<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class CategoryStoreModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_category_to_store}}';
    }

    public function set($category)
	{
		$date = new \DateTime('today');

		$request = new $this;

		$request->category_id = $category['category_id'];
		$request->store_id = $category['store_id'];
		
		$request->save();
	}

} 