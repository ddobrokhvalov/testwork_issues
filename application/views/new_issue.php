<h1>Новая задача</h1>
<script type="text/javascript">
	
	function validate_form(){
		validated = true;
		$("#issue_form .required").each(function(){
			if(!$(this).val()){
				$(this).addClass("error_input");
			}else{	
				$(this).removeClass("error_input");
			}
		});
		if($(".error_input").size()){
			validated = false;
		}
		return validated;
	}
	
	function preview_form(){
		var uploadfile = $("#uploadimage").val();
		file = new FormData();
		file.append( 'file', $('input[type=file]')[0].files[0] );
		file.append( 'user_id', $("select[name='user_id']").val() );
		var data = $("form").serialize();
		$.ajax({
            type: "POST",
            processData: false,
            contentType: false,
            url: document.location+"",
            data:  file, 
        })
        .done(function( html ) {
            jdata = JSON.parse(html);
			$(".preview_container .pre_username").html("<b>Имя пользователя:</b> "+jdata.username);
			$(".preview_container .pre_email").html("<b>Email пользователя:</b> "+jdata.email);
			$(".preview_container .pre_text").html("<b>Текст задачи:</b><br> "+$("#issue_form #issue_text").val());
			$(".preview_container .pre_img").html("<b>Картинка:</b><br> "+jdata.img);
        });
	}
	
	$(document).ready(function(){
		$("#issue_form").submit(function(){
			return validate_form();
		});
		$("#issue_form .preview").click(function(){
			if(validate_form()){
				preview_form();
			}
		});
		$("#issue_form .required").change(function(){
			if($(".error_input").size()){
				validate_form();
			}
		});
	});
</script>
<div class="preview_container">
	<div class="pre_username">
	</div>
	<div class="pre_email">
	</div>
	<div class="pre_text">
	</div>
	<div class="pre_img">
	</div>
</div>
<p>
	<form method="POST" enctype="multipart/form-data" id="issue_form">
		<table>
			<tr>
				<td>Пользователь</td>
				<td>
					<select name="user_id">
						<?foreach($data["users"] as $user):?>
							<option value="<?=$user["id"]?>"><?=$user["username"]?></option>
						<?endforeach;?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Текст задачи</td>
				<td><textarea name="text" rows="10" cols="45" class="required" id="issue_text"></textarea></td>
			</tr>
			<tr>
				<td>Картинка</td>
				<td><input type="file" name="img" accept="image/jpeg,image/png,image/gif" class="required" id="uploadimage"></td>
			</tr>
			<tr>
				<td><input type="button" name="preview" class="preview" value="Предпросмотр"></td>
				<td><input type="submit" name="submit" class="submit" value="Создать"></td>
			</tr>
		</table>
	</form>
</p>
<?if(Controller_user::authorized()):?>
	<a href="/issues/">Вернуться</a>
<?endif;?>