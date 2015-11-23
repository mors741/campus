    <div class="col-sm-2 col-md-2">
        <form action="" method="post" enctype="form-data" id="js-upload-form" >
            <div id="upload" style="background-image: url('<?php echo $user_data['picture'] ?>'); background-size: cover; width:100px; height:100px;"  class="img-rounded" >
            </div>	
            <div class="control-group form-group" style="margin-left: 40px">
                <span class="btn btn-default btn-file"> Выбрать
                    <input type="file"  id="js-upload-files"  name="datafile" onchange="fileUpload(this.form, '../campus/lib/upload_file.php', 'upload')" />
                </span>
            </div>
        </form>
    </div>
    <div class="col-sm-8 col-md-6">
        <fieldset>
            <legend>Смена Пароля</legend>
            <div class="control-group form-group">
                <label  id="password-error" class="error valid" generated="true" style="display:none"></label>
                <br/>
                <label for="password">Старый пароль</label>
                <div class="form-group">
                    <input type="password" id="password" class="form-control"  placeholder="Старый пароль"/>
                </div>
            </div>
            <form id="check_passwd" action="../campus/lib/update_pass.php" method="POST">
                <div class="control-group form-group">
                    <label for="passwd">Новый пароль</label>
                    <div class="form-group">
                        <input type="password" disabled="true" id="passwd" name="passwd" class="form-control"  placeholder="Новый пароль"/>
                        <input type="hidden" id="submit_pass" value="Сохранить" />
                        <div id="passwd_new">
                        </div>  
                    </div>
                </div>
            </form>
        </fieldset>
        <br/>
        <fieldset>
            <legend> Ф.И.О.</legend>
            <div class="control-group form-group">
                <label  id="name-error" class="error" generated="true" style="display:none"></label>
                <br/>
                <label for="surname">Фамилия</label>
                <div class="form-group">
                    <div id="surname" class="editable"><?php echo $user_data['surname'] ?></div>
                </div>
            </div>
            <div class="control-group form-group">
                <label for="name">Имя</label>
                <div class="form-group">
                    <div id="name" class="editable"><?php echo $user_data['name'] ?> </div>
                </div>
            </div>
            <div class="control-group form-group">
                <label for="patronymic">Отчество</label>
                <div class="form-group">
                    <div id="patronymic" class="editable"><?php echo $user_data['patronymic'] ?> </div>
                </div>
            </div>
        </fieldset>
        <br/>
                                             
 <?php
    if ($user_data['role'] == 'local' || $user_data['role'] == 'campus') {
        $gender = $user_data['gender'];
        $bdate=$user_data['bdate'];
        echo <<<_EOT
	<fieldset>
            <legend>Дополнительная информация</legend>				
            <div class="control-group form-group">
                <label for="gender">Пол</label>
		<div class="form-group">
                    <div id="gender" class="editable_select">$gender</div>
                    <br/>
                </div>
            </div>
            <div class="control-group form-group">
		<label for="birthday">Дата рождения</label>
		<div class="form-group">
                    <div class="input-group date" id="datetimepicker2">
			<input type="text" class="form-control" name="bdate" id="bdate" value="$bdate" />
			<span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
			</span>
                    </div>
                    <label  id="bdate_save" class="error" generated="true" style="display:none"></label>
                    <br/>
		</div>
            </div>
        </fieldset>
_EOT;
    }
    ?>
        <br/>
        <fieldset>
            <legend>Связь с Вами</legend>
            <div class="control-group form-group">
                <label for="contact">Контакты</label>
                <div class="form-group">
                    <div class="editable_contact" id="contacts"><?php echo $user_data['contacts']?></div>
                    <div id="contact_save"></div>
                    <br/>
                </div>
            </div>                               
<?php
    if ($user_data['home'] != '0' && $user_data['role'] != 'staff') {
        $room = $user_data['room'];
        $home = $user_data['home'];
        echo <<<_EOT
            <div class="control-group form-group">
                <label for="address">Адрес (корпус):</label>
                <div class="form-group">
                    <div id="home" name="home" class="editable_address" >$home</div>
                    <br/>	
                </div>
            </div>
            <div class="control-group form-group">
                <label for="room">Номер комнаты (квартиры)</label>
		<div class="form-group">
                    <div id="room" class="editable_room">$room</div>
		</div>
                <br/>
                <label  id="room-error" class="error valid" generated="true" style="display:none"></label>
            </div>
_EOT;
    }
    ?>
        </fieldset>
        <br/>
        <button type="" onclick="document.location.reload()" class="btn btn-primary">Обновить информацию</button>
    </div>