<?php
namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord{
  public function attributeLabels(){
    return[
      'id'=>'id',
      'name'=>'name',
      'unit'=>'unit',
      'price'=>'price',
      'image'=>'image'
    ];
  }

  public function rules(){
    return [
      [['name', 'price', 'unit'], 'required']
    ];

  }

}