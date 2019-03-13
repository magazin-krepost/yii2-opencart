<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class CategoryPathModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_category_path}}';
    }

    public function set($category)
	{
		$date = new \DateTime('today');

		$level = 0;
		$rows = $this->find()->where(['category_id' => $category['parent_id']])->all();

		foreach($rows as $row){
			
			$request = new $this;
			$request->category_id = (int)$category['category_id'];
			$request->path_id = (int)$row['path_id'];
			$request->level = $level;
			$request->save();

			$level++;
		}

		$request = new $this;
		$request->category_id = (int)$category['category_id'];
		$request->path_id = (int)$category['category_id'];
		$request->level = $level;
		$request->save();
		
	}

	public function get($parent_id){
		return $this->find()->where(['parent_id' => $parent_id])->all();
	}

} 