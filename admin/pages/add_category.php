<div class="body">
	<h2><?php echo $lang['add_category'] ?></h2>

	<?php 
		if(isset($_SESSION['add']))
		{
			echo $_SESSION['add'];
			unset($_SESSION['add']);
		}
	?>

	<form method="post" action="">
		<div class="input-group">
			<span class="input-label"><?php echo $lang['title'] ?> (<?php echo $lang['english'] ?>)</span> 
			<input type="text" name="title_en" placeholder="Կատեգորիայի անվանումը անգլերեն լեզվով" required="true" class="half">
		</div>
		<div class="input-group">
			<span class="input-label"><?php echo $lang['title'] ?> (<?php echo $lang['armenian'] ?>)</span> 
			<input type="text" name="title_np" placeholder="Կատեգորիայի անվանումը հայերեն լեզվով" class="half">
		</div>
		<div class="input-group">
			<span class="input-label"><?php echo $lang['title'] ?> (<?php echo $lang['chinese'] ?>)</span> 
			<input type="text" name="title_cn" placeholder="Կատեգորիայի անվանումը չիներեն լեզվով" class="half">
		</div>
		<div class="input-group">
			<span class="input-label"><?php echo $lang['is_active'] ?></span>
			<input type="radio" name="is_active" value="Yes"> <?php echo $lang['yes'] ?>
			<input type="radio" name="is_active" value="No"> <?php echo $lang['no'] ?>
		</div>
		<div class="input-group">
			<span class="input-label"><?php echo $lang['include_in_menu'] ?></span>
			<input type="radio" name="include_in_menu" value="Yes"> <?php echo $lang['yes'] ?>
			<input type="radio" name="include_in_menu" value="No"> <?php echo $lang['no'] ?>
		</div>

		<div class="input-group">
			<span class="input-label">
				<input type="submit" name="submit" value="<?php echo $lang['add_category'] ?>" class="btn-primary btn-sm">
			</span>
		</div>
		<br>
	</form>
	
	<?php 
		if(isset($_POST['submit']))
		{
			//echo "Click";
			$title_en = $obj->sanitize($conn,$_POST['title_en']);
			$title_hy = $obj->sanitize($conn,$_POST['title_hy']);
			$title_cn = $obj->sanitize($conn,$_POST['title_cn']);
			$is_active = $_POST['is_active'];
			$include_in_menu = $_POST['include_in_menu'];
			$created_at = date('Y-m-d H:i:s');

			$tbl_name = 'tbl_categories';

			$data= "
				title_en = '$title_en',
				title_hy = '$title_hy',
				title_cn = '$title_cn',
				is_active = '$is_active',
				include_in_menu = '$include_in_menu',
				created_at = '$created_at'
			";

			$query = $obj->insert_data($tbl_name,$data);

			$res = $obj->execute_query($conn,$query);

			if($res==true)
			{
				//Կատեգորիան հաջողությամբ ավելացվել է
				$_SESSION['add'] = "<div class='success'>".$lang['add_success']."</div>";
				header('location:'.SITEURL.'admin/index.php?page=categories');
			}
			else
			{
				//Չհաջողվեց ավելացնել կատեգորիա
				$_SESSION['add'] = "<div class='error'>".$lang['add_fail']."</div>";
				header('location:'.SITEURL.'admin/index.php?page=add_category');
			}
		}
	?>
</div>