<h1>Задачи</h1>
<p>
<?if(count($data)):?>
	<table class="sortable">
	<thead>
	<tr>
		<td><a href="/issues/?sortby=username&ord=<?=(($_GET["sortby"] == "username" && $_GET["ord"] == "asc")?"desc":"asc")?><?if($_GET["page_num"]){echo "&page_num=".$_GET["page_num"];}?>">Пользователь</a></td>
		<td><a href="/issues/?sortby=email&ord=<?=(($_GET["sortby"] == "email" && $_GET["ord"] == "asc")?"desc":"asc")?><?if($_GET["page_num"]){echo "&page_num=".$_GET["page_num"];}?>">е-mail</a></td>
		<td>Текст задачи</td>
		<td>Картинка</td>
		<td><a href="/issues/?sortby=status&ord=<?=(($_GET["sortby"] == "status" && $_GET["ord"] == "asc")?"desc":"asc")?><?if($_GET["page_num"]){echo "&page_num=".$_GET["page_num"];}?>">Статус</a></td>
	</tr>
	</thead>
	<tbody>
	<?foreach($data["issues"] as $row):?>
		<tr>
			<td><?=$row["username"]?></td>
			<td><?=$row["email"]?></td>
			<td><a href="/issues/view/<?=$row["id"]?>/"><?=$row["text"]?></a></td>
			<td><img src="<?=$row["image"]?>" class="min_img"></td>
			<td><?=($row["status"]?"выполнена":"выполняется")?></td>
		</tr>
	<?endforeach;?>
	</tbody>
	</table>
<?else:?>
	Задачи не найдены.
<?endif;?>

</p>
<p>
<?for($i = 1; $i<=$data["page_count"]; $i++){?>
	<a href="/issues/?sortby=<?=$_GET["sortby"]?$_GET["sortby"]:"id"?>&ord=<?=$_GET["ord"]?$_GET["ord"]:"asc"?>&page_num=<?=$i?>"><?=$i?></a>
<?}?>
</p>	
<?//if(Controller_user::authorized()):?>
	<?//if(!Controller_user::is_admin()):?>
		<a href="/issues/new/">Новая задача</a>
	<?//endif;?>
<?//endif;?>
