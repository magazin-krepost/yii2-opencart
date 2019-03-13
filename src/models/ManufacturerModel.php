<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class ManufacturerModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_manufacturer}}';
    }

    public function get($manufacturer_id){

    	return $this->find()->where(['manufacturer_id' => $id])->asArray()->one(); 
    	
    }

    public function getByName($name){

        return $this->find()->where(['name' => $name])->asArray()->one(); 
        
    }

    public function set($manufacture){

        $request = new $this;

        $request->name = $manufacture['name'];

        if (isset($manufacture['image'])){
            $request->image = $manufacture['image'];
        }
        
        $request->save();

        return $request->manufacturer_id;
        
    }

	
}