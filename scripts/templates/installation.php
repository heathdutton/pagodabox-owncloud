<? die('-'.getcwd().'-'); ?>
<input type='hidden' id='hasMySQL' value='<?php echo $_['hasMySQL'] ?>'></input>
<input type='hidden' id='hasSQLite' value='<?php echo $_['hasSQLite'] ?>'></input>
<input type='hidden' id='hasPostgreSQL' value='<?php echo $_['hasPostgreSQL'] ?>'></input>
<input type='hidden' id='hasOracle' value='<?php echo $_['hasOracle'] ?>'></input>
<form action="index.php" method="post">
<input type="hidden" name="install" value="true" />
	<?php if(count($_['errors']) > 0): ?>
	<ul class="errors">
		<?php foreach($_['errors'] as $err): ?>
		<li>
			<?php if(is_array($err)):?>
				<?php print $err['error']; ?>
				<p class='hint'><?php print $err['hint']; ?></p>
			<?php else: ?>
				<?php print $err; ?>
			<?php endif; ?>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
	<?php if(!$_['secureRNG']): ?>
	<fieldset style="color: #B94A48; background-color: #F2DEDE; border-color: #EED3D7; border-style:solid; border-radius: 5px; border-width:1px; padding:0.5em;">
		<legend><strong><?php echo $l->t('Security Warning');?></strong></legend>
		<span><?php echo $l->t('No secure random number generator is available, please enable the PHP OpenSSL extension.');?></span>
		<br/>
		<span><?php echo $l->t('Without a secure random number generator an attacker may be able to predict password reset tokens and take over your account.');?></span>
	</fieldset>
	<?php endif; ?>
	<?php if(!$_['htaccessWorking']): ?>
	<fieldset style="color: #B94A48; background-color: #F2DEDE; border-color: #EED3D7; border-style:solid; border-radius: 5px; border-width:1px; padding:0.5em;">
		<legend><strong><?php echo $l->t('Security Warning');?></strong></legend>
		<span><?php echo $l->t('Your data directory and your files are probably accessible from the internet. The .htaccess file that ownCloud provides is not working. We strongly suggest that you configure your webserver in a way that the data directory is no longer accessible or you move the data directory outside the webserver document root.');?></span>
	</fieldset>
	<?php endif; ?>
	<fieldset>
		<legend><?php echo $l->t( 'Create an <strong>admin account</strong>' ); ?></legend>
		<p class="infield">
			<label for="adminlogin" class="infield"><?php echo $l->t( 'Username' ); ?></label>
			<input type="text" name="adminlogin" id="adminlogin" value="<?php print OC_Helper::init_var('adminlogin'); ?>" autocomplete="off" autofocus required />
		</p>
		<p class="infield">
			<label for="adminpass" class="infield"><?php echo $l->t( 'Password' ); ?></label>
			<input type="password" name="adminpass" id="adminpass" value="<?php print OC_Helper::init_var('adminpass'); ?>" required />
		</p>
	</fieldset>

	<div class="buttons"><input type="submit" value="<?php echo $l->t( 'Finish setup' ); ?>" /></div>
</form>
