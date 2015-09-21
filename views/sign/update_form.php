<?php
use yii\helpers\Html;  

///session
$session = Yii::$app->session;
$session->open();
if($session['session_id'] != session_id()) {
    header('Location:/yii2basic/web/index.php?r=sign%2Flogin');
    die();
}
?>

<h1>Update From</h1>
<hr>
<ol class="breadcrumb">
    <li><a href="/yii2basic/web/index.php?r=sign%2Fprofile">Profile</a>
    </li>
    <li class="active">Blog Home One</li>
</ol>
<div class="row" >
    <span class="col-sm-8">
        <div class="well">
            <form class="form-horizontal" name="form_1"  method="post">

                <div class="form-group ">
                  <label  class="col-sm-2 control-label">First Name</label>
                  <div class="col-sm-8">
                      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />                      
                      <input type="text" class="form-control"  name="fname" id="fname" placeholder="Name" value="<?= $sign->fname ?>">
                      
                  </div>
                  <div class="col-sm-2" >
                      <div id="div_fname"></div>
                  </div>
                </div>
                <div class="form-group ">
                  <label  class="col-sm-2 control-label">Last Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" value="<?= $sign->lname ?>">
                  </div>
                  <div class="col-sm-2" >
                      <div id="div_lname"></div>
                  </div>
                </div> 
                <div class="form-group ">
                  <label  class="col-sm-2 control-label">User</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="user" id='user' placeholder="user" value="<?= $sign->user_id ?> "disabled>          
                  </div>
                  <div class="col-sm-2" >
                      <div id="div_fname"></div>
                  </div>
                </div>        

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Sex</label>
                  <div class="checkbox col-sm-2" >
                    <label>
                        <?php if($sign->sex =='man') $define = 'checked="checked"';
                                else $define = '';
                          ?>
                        <input type="radio" name="sex" disabled value="man" <?= $define ?>> man
                    </label>              
                 </div>
                 <div class="checkbox col-sm-2" >
                    <label>
                        <?php if($sign->sex=='woman') $define = 'checked="checked"';
                                else $define = '';
                          ?>
                        <input type="radio" name="sex" disabled value="woman" <?= $define ?>> woman
                    </label>              
                 </div>
                </div>
                <div class="form-group  ">
                  <label  class="col-sm-2 control-label">E-mail</label>
                  <div class="col-sm-8">
                      <input type="text"  class="form-control" id="mail" name="email"  placeholder="email" value="<?= $sign->email ?>">
                  </div>
                  <div class="col-sm-2" >
                      <div id="div_mail"></div>
                      <input type="hidden" id="ogn_mail" value="<?= $sign->email ?>" >
                  </div>
                </div>

                 <div class="form-group">
                    <div class="col-sm-2"></DIV>
                    <div class="col-sm-10">

                        <button type="button" id="save" class="btn btn-primary"  >save</button>
                    </DIV>
                 </DIV>

            </FORM>
        </div>
    </span >
    <span class="col-sm-4 ">
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#" data-toggle="modal" data-target="#myModal" >Chang password</a>
                        </li>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Chang Password</h4>
                                </div>
                                <div class="modal-body">
                                  
                                  <div class="row">
                                      <table>
                                          <tr>
                                              <td class="col-sm-4">
                                                  <strong>Old Password:</strong>
                                              </td>
                                              <td class="col-sm-4">
                                                  <input type="password" id="ognPassword">
                                              </td>
                                              <td class="col-sm-4">
                                                  <div id="div_ognPassword"></div>
                                              </td>
                                          
                                          </tr>
                                           <tr>
                                              <td class="col-sm-4">
                                                  <strong>New Password:</strong>
                                              </td>
                                              <td class="col-sm-4">
                                                  <input type="password" id="newPassword1">
                                              </td>
                                              <td class="col-sm-4">
                                                  <div id="div_newPassword1"></div>
                                              </td>
                                          </tr>
                                           <tr>
                                              <td class="col-sm-4">
                                                  <strong>Confirm Password:</strong>
                                              </td>
                                              <td class="col-sm-4">
                                                  <input type="password" id="newPassword2">
                                              </td>
                                              <td class="col-sm-4">
                                                  <div id="div_newPassword2"></div>
                                              </td>
                                          </tr>
                                          
                                      </table>
                                  </div>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button  type="button" class="btn btn-default" data-dismiss="modal" id="changPassword" disabled="">save</button>
                                </div>
                                 
                              </div>

                            </div>
                          </div>
                    </ul>
                </div>
                
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
    </span>
</div>
<!--
<button id="txtbutton" >test</button>
<div id="msgtest"></div>
-->


<script type="text/javascript">
    $(function() {


        $("#txtbutton").click(function() {
           
          $.ajax({
                url: 'index.php?r=sign/sample',
                type: 'post',
                data: {searchname:"Ratcha" , searchby:"test"},
                success: function (data) {
                   alert(data.search);
                }
            });
          //alert("txtbutton");  
        });
        $("#fname").keyup(function(){
            
            $.ajax({
                url: 'index.php?r=sign/fname_check',
                type: 'post',
                data: {fname:$("#fname").val()},
                success: function (data) {
                   //alert(data.fname);
                   $("#div_fname").html(data.fname);
                   if(data.cancle==1) {
                       document.getElementById('save').disabled = true;
                   }else {
                       document.getElementById('save').disabled = false;
                   }
                }
            });
        });
        $("#lname").keyup(function(){
            
            $.ajax({
                url: 'index.php?r=sign/lname_check',
                type: 'post',
                data: {lname:$("#lname").val()},
                success: function (data) {
                   //alert(data.fname);
                   $("#div_lname").html(data.lname);
                   if(data.cancle==1) {
                       document.getElementById('save').disabled = true;
                   }else {
                       document.getElementById('save').disabled = false;
                   }               
                }
            });
        });
        $("#mail").keyup(function(){
            
            $.ajax({
                url: 'index.php?r=sign/email_check',
                type: 'post',
                data: {mail:$("#mail").val(),ogn_mail:$("#ogn_mail").val()},
                success: function (data) {
                   //alert(data.mail2);
                   $("#div_mail").html(data.mail);
                   if(data.cancle==1) {
                       document.getElementById('save').disabled = true;
                   }else {
                       document.getElementById('save').disabled = false;
                   }               
                }
            });
        });
        $("#save").click(function(){
            $.ajax({
                url: 'index.php?r=sign/save_database',
                type: 'post',
                data: {mail:$("#mail").val(),
                       lname:$("#lname").val(),
                       fname:$("#fname").val(),
                       
                      },
                success: function (data) {
                   alert("บันทึกข้อมูลเรียบร้อย");               
                }
            });
        });
        $("#ognPassword").keyup(function(){
            
            
            $.ajax({
                url: 'index.php?r=sign/ogn_password',
                type: 'post',
                data: {ognPassword:$("#ognPassword").val()},
                success: function (data) {
                   //alert(data.cancle);
                   //$("#div_mail").html(data.mail);
                   if(data.cancle==1) {
                       $("#div_ognPassword").html("<font color='red'>password ไม่ถูกต้อง</font>");
                       document.getElementById('changPassword').disabled = true;
                   }else {
                       $("#div_ognPassword").html("<font color='green'>password ถูกต้อง</font>");
                       document.getElementById('changPassword').disabled = false;
                   }             
                }
            });
        });
        $("#newPassword2").keyup(function(){
            
            
            $.ajax({
                url: 'index.php?r=sign/new_password',
                type: 'post',
                data: {newPassword1:$("#newPassword1").val(),
                       newPassword2:$("#newPassword2").val()
                      },
                success: function (data) {
                   //alert(data.cancle);
                   //$("#div_mail").html(data.mail);
                   if(data.cancle==1) {
                       $("#div_newPassword2").html("<font color='red'>password ไม่ตรงกัน</font>");
                       document.getElementById('changPassword').disabled = true;
                   }else {
                       $("#div_newPassword2").html("<font color='green'>password ใช้ได้</font>");
                       document.getElementById('changPassword').disabled = false;
                   }             
                }
            });
        });
        $("#changPassword").click(function(){
            //alert("บันทึกเรียบร้อย");
            $.ajax({
                url: 'index.php?r=sign/chang_password',
                type: 'post',
                data: {newPassword1:$("#newPassword1").val()},
                success: function (data) {
                   alert("บันทึกเรียบร้อย");  
                }
            });
        });
        
    });
</script>
