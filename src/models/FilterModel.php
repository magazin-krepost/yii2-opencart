<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class FilterModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_filter}}';
    }

    public function set($filter_group_id)
	{
		$request = new $this;

		$request->filter_group_id = $filter_group_id;
		$request->sort_order = 0;

		$request->save();

		return $request->filter_id;
	}

} 