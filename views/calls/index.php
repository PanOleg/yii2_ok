<?php
/* @var $this yii\web\View */

use yii\captcha\Captcha;

$this->title = 'Tree';

function print_branch($parent, $tree) {
    echo '<ul>';
    $result = array_filter($tree, function($innerArray) use ($parent) {

        return ($innerArray['parent'] === $parent);
    });
    if (!empty($result))
        foreach ($result as $key => $value) {
            echo '<li> <a data-toggle="modal" data-target="#ModalCaptcha" class="modal_href">' . $value['id'];

            print_branch($value['id'], $tree);
            echo '</a></li>';
        }

    echo '</ul>';
}
?>
<div>
    <ul>
        <?php print_branch(0, $tree); ?>
    </ul>
</div>

<div id="ModalCaptcha" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="close_modal" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Captcha</h4>
            </div>
            <div class="modal-body">
                <p id="capcha"><?php echo Captcha::widget(['name' => 'captcha',]);?> </p>
                <p id="randImg"> </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="GetImageFromGiphy">Продолжить</button>
            </div>
        </div>

    </div>
</div>
<script>
    var getImageFromGiphy = "<?php echo Yii::$app->urlManager->createUrl(['site/getimagefromgiphy']); ?>";
</script>