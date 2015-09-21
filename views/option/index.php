<?php
///session
$session = Yii::$app->session;
$session->open();
if($session['session_id'] != session_id() and $session['status'] != 'member') {
    header('Location:/yii2basic/web/index.php?r=sign%2Flogin');
    die();
}
?>

<html
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-4 col-md-3" >
            <table class="table table-hover">
                <thead>
                        <tr>
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><strong><h1>Option</h1></strong></div>
                                </div>
                        </tr>
                </thead>
                <tr>

                    <td><a href="/yii2basic/web/index.php?r=option%2Fview_travel"><i class="fa fa-tree fa-5x"></i>&nbsp<strong>Travel</strong></a></td>
                        <td>

                           <i class="fa fa-cog fa-spin fa-3x "></i>

                        </td>
                </tr>	
                <tr>

                    <td><i class="fa fa-home fa-5x"></i>&nbsp<strong>Hotel</strong></td>
                        <td>

                            <i class="fa fa-cog fa-spin fa-3x "></i>

                        </td>
                </tr>
                <tr>

                    <td><i class="fa fa-apple fa-5x"></i>&nbsp<strong>Restaurant</strong></td>
                        <td>

                            <i class="fa fa-cog fa-spin fa-3x "></i>

                        </td>
                </tr>
                <tr>

                    <td><a href="/yii2basic/web/index.php?r=option%2Fview_member"><i class="fa fa-users fa-5x"></i>&nbsp<strong>Member</strong></a></td>
                        <td>

                           <i class="fa fa-cog fa-spin fa-3x "></i>

                        </td>

                </tr>

            </table>
        </div>
    </div>
</div>
</body>
</html>


