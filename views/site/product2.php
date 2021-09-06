<?php 
use yii\grid\GridView;

use yii\helpers\Html;
echo Html::a('Add product', ["add"], ['class'=>'btn btn-info']);

echo GridView::widget([
  'dataProvider'=>$dataProvider,
  'columns'=>[
    'id',
     'name',
     'price',
     'unit',
     ['class'=>'yii\grid\ActionColumn']
  ]
]);