		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2><?php echo AVIANCA_LOGIN_FORM; ?></h2>
						<p><?php echo AVIANCA_LOGIN_FORM_INFO; ?></p>
					</header>

<!-- Text -->
<section>	
<form method="post" action="./login.php">
								<div class="row uniform 50%">
									<div class="12u$">
										<input type="text" name="user" id="user" value="" onclick="this.value='AVA'" placeholder="<?php echo AVIANCA_LOGIN_ONE; ?>" />
									</div>
									<div class="12u$">
										<input type="password" name="password" id="password" value="" placeholder="<?php echo AVIANCA_LOGIN_TWO; ?>" />
									</div>
									<div class="12u$">
										<ul class="actions">
											<li><input type="submit" value="<?php echo AVIANCA_LOGIN_FORM; ?>" class="special" /></li>
											<li><a href="./?page=recover_password" class="button"><?php echo AVIANCA_LOGIN_THIRD; ?></a></li>
										</ul>
									</div>
								</div>
							</form>
						
</section>

</div>
</section>