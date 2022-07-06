<?php

use common\models\ContactUs;
use common\models\Hamkorlar;
use common\models\Mijozlar;
use common\models\Portfolio;
use yii\bootstrap4\Html;
use yii\helpers\Url;
$this->title = 'Dashboard';
$this->params['title'] = 'dashboard';

?>



    <div class="box box-success box-header">
        <?php

        if(Yii::$app->user->can('admin')){
            echo "<h1 class=\"display-1\">Assalom alaykum admin</h1>";
        }

        elseif(Yii::$app->user->can('user')){
            echo "<h1 class=\"display-1\">Assalom alaykum foydalanuvchi</h1>";
        }

        else{
            echo "<h1 class=\"display-1\">Assalom alaykum mehmon</h1>";
        }

        ?>
    </div>




