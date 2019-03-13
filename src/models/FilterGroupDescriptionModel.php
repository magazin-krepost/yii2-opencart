<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class FilterGroupDescriptionModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_filter_group_description}}';
    }

    public function set($filter_group_id, $name)
	{
		$request = new $this;

		$request->filter_group_id = $filter_group_id;
		$request->language_id = 1;
		$request->name = $name;

		$request->save();
	}

	public function getByName($name)
	{
		return $this->find()->where(['name' => $name])->asArray()->one();
	}

} 