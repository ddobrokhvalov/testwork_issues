<h1><?if(Controller_user::authorized() && Controller_user::is_admin()):?>Редактирование<?else:?>Просмотр<?endif?> задачи</h1>
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
	
	
	
	$(document).ready(function(){
		$("#issue_form").submit(function(){
			return validate_form();
		});
		
		$("#issue_form .required").change(function(){
			if($(".error_input").size()){
				validate_form();
			}
		});
	});
</script>

	<?if(Controller_user::authorized() && Controller_user::is_admin()):?>
		<p>
			<form method="POST" enctype="multipart/form-data" id="issue_form">
				<table>
					<tr>
						<td>Пользователь</td>
						<td><?=$data["username"]?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?=$data["email"]?></td>
					</tr>
					<tr>
						<td>Текст задачи</td>
						<td><textarea name="text" rows="10" cols="45" class="required" id="issue_text"><?=$data["text"]?></textarea></td>
					</tr>
					<tr>
						<td>Картинка</td>
						<td><img src="<?=$data["image"]?>"></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="checkbox" id="completed" name="completed"  value="1" <?if($data["status"]):?>checked="checked"<?endif;?>> <label for="completed">выполнена</label>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="save" class="submit" value="Сохранить"></td>
					</tr>
				</table>
			</form>
		</p>
	<?else:?>
		<p>
			<form method="POST" enctype="multipart/form-data" id="issue_form">
				<table>
					<tr>
						<td>Пользователь</td>
						<td><?=$data["username"]?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?=$data["email"]?></td>
					</tr>
					<tr>
						<td>Текст задачи</td>
						<td><?=$data["text"]?></td>
					</tr>
					<tr>
						<td>Картинка</td>
						<td><img src="<?=$data["image"]?>"></td>
					</tr>
					<tr>
						<td>Статус</td>
						<td><?=($data["status"]?"выполнена":"выполняется")?></td>
					</tr>
				</table>
			</form>
		</p>
	<?endif;?>
	<a href="/issues/">Вернуться</a>
