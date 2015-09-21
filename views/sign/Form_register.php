<?php
use yii\widgets\ActiveForm;

?>

<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Register
            <small>from register</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/yii2basic/web/index.php?r=site%2Findex">Home</a>
            </li>
            <li class="active">Register</li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="well">
    <form class="form-horizontal" method="post">
    
        <div class="form-group <?= $s_fname ?>">
          <label  class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-10">
              <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
              <input type="text" class="form-control"  name="fname" placeholder="Name" value="<?= $v_fname ?>">
          </div>
        </div>
        <div class="form-group <?= $s_lname ?>">
          <label  class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="lname" placeholder="Last name" value="<?= $v_lname ?>">
          </div>
        </div> 
        <div class="form-group <?= $s_user ?>">
          <label  class="col-sm-2 control-label">User</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="user" placeholder="user" value="<?= $v_user ?>"> 
            <?php 
             if($s_user_db=='double') {
                 ?>
                 <h6 style="color: red">username นี้มีผู้อื่นใช้แล้ว</h6>
                 <?php
             }
             else if($s_user_db=='wrong') {
                 ?>
                 <h6 style="color: red">username นี้ใช้ไม่ได้</h6>
                 <?php
             }
            ?>
          </div>
        </div>        
        <div class="form-group <?= $s_pw1 ?>">
          <label for="inputPassword" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="pw1" placeholder="Password">
          </div>
        </div>
        <div class="form-group <?= $s_pw2 ?>">
          <label for="inputPassword" class="col-sm-2 control-label">Password confirm</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="pw2" placeholder="confirm assword">
          </div>
        </div>
        <div class="form-group">
          <label  class="col-sm-2 control-label">Sex</label>
          <div class="checkbox col-sm-2" >
            <label>
                <?php if($v_sex=='man') $define = 'checked="checked"';
                      else $define = '';
                ?>
                <input type="radio" name="sex" value="man" <?= $define ?> > man
            </label>              
         </div>
         <div class="checkbox col-sm-2" >
            <label>
                <?php if($v_sex=='woman') $define = 'checked="checked"';
                      else $define = '';
                ?>
                <input type="radio" name="sex" value="woman" <?= $define ?> > woman
            </label>              
         </div>
          
          <?php
            if($s_sex=='has-error') {
                ?>
          <h6 style="color: red">กรุณาระบุเพศ</h6>
                <?php
            }
          ?>
        </div>
        <div class="form-group <?= $s_email ?> ">
          <label  class="col-sm-2 control-label">E-mail</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" placeholder="email" value="<?= $v_email ?>">
            <?php 
             if($s_email_db=='double') {
                 ?>
                 <h6 style="color: red">email นี้มีผู้อื่นใช้แล้ว</h6>
                 <?php
             }
             else if($s_email_db=='wrong') {
                 ?>
                 <h6 style="color: red">email นี้ใช้ไม่ได้</h6>
                 <?php
             }
            ?>
          </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"></DIV>
            <div class="col-sm-10">
               
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">ข้อตกลงในการใ้ชงาน</button>
                <div class="checkbox col-sm-2" >
                    <label>
                        <input type="checkbox" name="check" value="1"> Accept
                    </label>              
                </div>
                <p style="color: red"><?= $s_accept ?></p>
                
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h2 class="modal-title" id="myModalLabel">ข้อกำหนดการให้บริการ</h2>
                        </div>
                            <div class="modal-body">
                                <div style="padding: 15px">
                                    <h3>คำนำ</h3>
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ยินดีต้อนรับสู่เว็บไซต์ Garena (ซึ่งต่อไปนี้เรียกว่า “เว็บไซต์”) โปรดอ่านข้อกำหนดการให้บริการต่อไปนี้โดยละเอียดก่อนใช้การงานเว็บไซต์นี้หรือทำการเปิดบัญชี Garena (ซึ่งต่อไปนี้เรียกว่า “บัญชี”) เพื่อให้คุณรับทราบถึงสิทธิและภาระผูกพันทางกฎหมายของคุณกับ Garena Interactive Holding Limited และบริษัทในกลุ่มและบริษัทในเครือ (ซึ่งต่อไปนี้โดยเอกเทศและรวมกันเรียกว่า “Garena”, “เรา”, “พวกเรา” หรือ “ของเรา”)</p><br>
                                        <h3>ความเป็นส่วนตัว</h3><br>
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ความเป็นส่วนตัวของคุณมีความสำคัญอย่างมากต่อเราที่ Garena เพื่อให้ปกป้องสิทธิของคุณได้ดียิ่งขึ้น เราได้จัดเตรียมนโยบายความเป็นส่วนตัวให้กับ Garena.com เพื่ออธิบายการปฏิบัติด้านความเป็นส่วนตัวของเราโดยละเอียด โปรดทบทวนนโยบายความเป็นส่วนตัวเพื่อทำความเข้าใจว่า Garena รวบรวมและใช้ข้อมูลที่เกี่ยวโยงกับบัญชีของคุณและ/หรือการใช้บริการของคุณอย่างไร ด้วยการใช้บริการหรือการยอมรับข้อกำหนดการให้บริการนี้ คุณยินยอมให้ Garena รวบรวม ใช้ เปิดเผย และหรือประมวลเนื้อหาและข้อมูลส่วนตัวของคุณตามที่อธิบายไว้ในนโยบายความเป็นส่วนตัว<br>
                                        ผู้ใช้ที่เข้าถึงข้อมูลส่วนตัวของผู้ใช้คนอื่น (ซึ่งต่อไปนี้เรียกว่า “ฝ่ายผู้รับ”) จะต้อง (i) ปฏิบัติตามกฎหมายคุ้มครองข้อมูลส่วนตัวที่เกี่ยวข้องทั้งหมด; (ii) ให้ผู้ใช้คนอื่น (ซึ่งต่อไปนี้เรียกว่า “ฝ่ายเปิดเผยข้อมูล”) ทำการถอดข้อมูลของเขา/เธอออกจากฐานข้อมูลของฝ่ายผู้รับได้; และ (iii) ให้ฝ่ายเปิดเผยข้อมูลทำการทบทวนข้อมูลที่ถูกรวบรวมเกี่ยวกับพวกเขาโดยฝ่ายผู้รับ</p><br>
                                    <H3>การอนุญาตแบบจำกัด</H3><br>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Garena ให้การอนุญาตแบบจำกัดแก่คุณเพื่อเข้าถึงและใช้บริการภายใต้ข้อตกลงและเงื่อนไขของข้อกำหนดการให้บริการนี้เพื่อใช้เป็นการส่วนตัวเท่านั้น การอนุญาตนี้ไม่ให้คุณใช้เพื่อการพานิชย์หรือการใช้งานต่อยอดใดๆ ของบริการ (รวมไปถึง แต่ไม่จำกัดเฉพาะ องค์ประกอบย่อยหรือเนื้อหาใดๆ) เนื้อหา เครื่องหมายการค้า เครื่องหมายบริการ ชื่อแบรนด์ โลโก้ และทรัพย์สินทางปัญญาอื่นที่เป็นกรรมสิทธิ์ทั้งหมดที่แสดงในเว็บไซต์ถือเป็นทรัพย์สินของ Garena และในบางกรณี ก็เป็นของบุคคลที่สามผู้ถือกรรมสิทธิ์ตามที่ถูกระบุไว้ในเว็บไซต์ ไม่มีสิทธิหรือไม่มีการอนุญาตที่ให้ไว้โดยทางตรงหรือโดยทางอ้อมแก่ฝ่ายใดๆ ที่ทำการเข้าถึงเว็บไซต์ เพื่อให้ใช้หรือทำซ้ำเนื้อหา เครื่องหมายการค้า เครื่องหมายบริการ ชื่อแบรนด์ โลโก้ และทรัพย์สินทางปัญญาอื่นที่เป็นกรรมสิทธิ์ดังกล่าว และไม่มีฝ่ายใดๆ ที่ทำการเข้าถึงเว็บไซต์จะสามารถอ้างสิทธิ กรรมสิทธิ์ หรือผลประโยชน์ใดๆ ได้ ด้วยการใช้งานหรือการเข้าถึงบริการ คุณยินยอมที่จะปฏิบัติตามกฎหมายลิขสิทธิ์ เครื่องหมายการค้า เครื่องหมายบริการ และกฎหมายที่เกี่ยวข้องอื่นๆ ทั้งหมดที่คุ้มครองบริการ เว็บไซต์ และเนื้อหาภายใน คุณยินยอมที่จะไม่คัดลอก แจกจ่าย ตีพิมพ์ซ้ำ ถ่ายทอด จัดแสดงต่อสาธารณะ แสดงต่อสาธารณะ แก้ไข ดัดแปลง เช่า ขาย หรือสร้างงานต่อยอดของส่วนใดๆ ของบริการ เว็บไซต์ และเนื้อหาภายใน นอกจากนี้ หากไม่มีความยินยอมเป็นลายลักษณ์อักษรจากเรา คุณยังไม่สามารถทำการจำลองหรือคัดลอกส่วนหนึ่งหรือทั้งหมดของเนื้อหาในเว็บไซต์นี้ไปไว้บนเซิร์ฟเวอร์อื่น หรือนำไปดป็นส่วนหนึ่งของเว็บไซต์อื่น ยิ่งกว่านั้น คุณยอมรับว่าคุณจะไม่ใช้โรบอท สไปเดอร์ หรืออุปกรณ์อัตโนมัติอื่น หรือกระบวนการทำด้วยมือเพื่อตรวจตราหรือคัดลอกเนื้อหาของเรา โดยไม่ได้รับความยินยอมเป็นลายลักษณ์อักษรจากเราก่อน (ความยินยอมดังกล่าวถือว่าได้ให้ไว้กับเทคโนโลยีเสิร์ชเอนจิ้นมาตรฐานที่ถูกใช้งานโดยเว็บไซต์ค้นหาทางอินเตอร์เน็ตเพื่อส่งผู้ใช้อินเตอร์เน็ตมายังเว็บไซต์นี้)<br>
                                       เรายินดีให้คุณเชื่อมโยงจากเว็บไซต์ของคุณมายังเว็บไซต์นี้ โดยเว็บไซต์ของคุณไม่ได้แสดงออกว่าได้รับการสนับสนุนโดยหรือมีความเชื่อมโยงกับ Garena คุณรับทราบว่า Garena อาจจะยกเลิกการให้บริการส่วนใดส่วนหนึ่งโดยไม่ต้องแจ้งให้ทราบได้ทุกเมื่อ ทั้งนี้ เป็นดุลยพินิจของ Garena แต่เพียงผู้เดียว</p><br>
                                    <h3>ซอฟท์แวร์</h3><br>
                                         <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เว้นแต่จะได้กำหนดไว้ในข้อตกลงอนุญาตให้ใช้สิทธิซึ่งแยกต่างหาก ซอฟท์แวร์ใดๆ ที่เราจัดเตรียมไว้ให้คุณในฐานะส่วนหนึ่งของบริการจะอยู่ภายใต้บทบัญญัติของข้อกำหนดการให้บริการนี้ ซอฟท์แวร์ได้ให้ไว้เพื่อการอนุญาตให้ใช้สิทธิ มิได้เป็นการขายแต่อย่างใด และ Garena สงวนสิทธิ์ทั้งหมดของซอฟท์แวร์ที่มิได้ระบุไว้ให้อนุญาตให้ใช้สิทธิได้อย่างชัดเจนโดย Garena สคริปท์หรือโค้ดของบุคคลที่สามใดๆ ที่เชื่อมโยงหรืออ้างอิงจากบริการ เป็นการอนุญาตให้คุณใช้สิทธิได้โดยบุคคลที่สามซึ่งถือครองสคริปท์หรือโค้ดดังกล่าว ไม่ใช่โดย Garena</p><br>
                                </div>
                            </DIV>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>                          
                        </div>
                        
                    </div>
                  </div>
                </div>
            </div>
        </div>   
         <div class="form-group">
            <div class="col-sm-2"></DIV>
            <div class="col-sm-10">
                
                <BUTTON type="submit" class="btn btn-primary" >Register</BUTTON>
            </DIV>
         </DIV>
    
    </FORM>
</div>
