<?php
    session_start();
	$id = $_SESSION["id"];
	if(!empty($id)) {
?>
<header class="major">
						<h2><?php echo AVIANCA_WELCOME_INTRO; ?></h2>
						<p>Charts Jeppesen</p>
					</header>
<script language="JavaScript" type="text/javascript">
document.write(unescape('%3C%69%66%72%61%6D%65%20%73%72%63%3D%22%2E%2F%63%68%61%72%74%73%5F%6A%65%70%70%65%73%65%6E%2E%70%68%70%22%20%62%6F%72%64%65%72%3D%22%30%22%20%77%69%64%74%68%3D%22%31%30%30%25%22%20%68%65%69%67%68%74%3D%22%39%30%30%70%78%22%3E%3C%2F%69%66%72%61%6D%65%3E'));
</script>
	<?php } else { header("Location: ./index.php?page=nosession"); } ?>
