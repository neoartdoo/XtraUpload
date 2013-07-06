<?php
if($this->session->userdata('id'))
{
?>
	<h3><?=$this->lang->line('global_welcome')?> <?=$this->session->userdata('username')?>!</h3>
	<ul class="sidemenu">
		<li>
			<a href="<?=site_url('user/manage')?>">
				<img src="<?=$base_url?>img/icons/options_16.png" class="nb" alt="" /> <?=$this->lang->line('global_manage')?>
			</a>
		</li>
		<li>
			<a href="<?=site_url('user/changePassword')?>">
				<img src="<?=$base_url?>img/icons/security_16.png" class="nb" alt="" /> <?=$this->lang->line('global_change')?>
			</a>
		</li>
		<li>
			<a href="<?=site_url('user/logout')?>">
				<img src="<?=$base_url?>img/icons/log_in_16.png" class="nb" alt="" /> <?=$this->lang->line('global_logout')?>
			</a>
		</li>
	</ul>
<?php
}
else
{
?> 
	<h3><?=$this->lang->line('global_member_login')?> </h3>
	<form action="<?=site_url('user/login')?>" method="post" class="loginform">
	<input type="hidden" name="submit" value="1">
	<p>
		<label for="username"><b><?=$this->lang->line('global_username')?> </b></label>
		<input style="background:2px center url(<?=$base_url?>img/icons/user_16.png) no-repeat transparent; padding-left:22px" type="text" id="username" name="username" />
		
		<label for="password"><b><?=$this->lang->line('global_password')?> </b></label>
		<input style="background:2px center url(<?=$base_url?>img/other/key_16.png) no-repeat transparent; padding-left:22px" type="password" id="password" name="password"  /><br /><br />
		<?=generateSubmitButton($this->lang->line('global_login'), $base_url.'img/icons/log_in_16.png', 'green')?><br />
		</p>
	</form>
	<ul class="sidemenu">
		<li>
			<a href="<?=site_url('user/forgotPassword')?>">
				<img src="<?=$base_url?>img/icons/help_16.png" class="nb" alt="" /> <?=$this->lang->line('global_forgot_pass')?>
			</a>
		</li>
		<li>
			<a href="<?=site_url('user/register')?>">
				<img src="<?=$base_url?>img/other/user-add_16.png" class="nb" alt="" /> <?=$this->lang->line('global_new_user')?>
			</a>
		</li>
	</ul>
<?php
}	
?>

<?=$this->xu_api->menus->getSubMenu();?>

<?php if($this->startup->site_config['show_recent_uploads']){?>
<h3><?=$this->lang->line('global_recently_uploaded_files')?></h3>
<ul class="sidemenu">
<?php 
$query = $this->files_db->getRecentFiles(5);
foreach($query->result() as $file)
{
	$links = $this->files_db->getLinks('', $file);
	?>	<li>
			<a href="<?=$links['down'];?>">
				<img src="<?=base_url().'img/files/'.$this->functions->getFileTypeIcon($file->type);?>" class="nb" alt="" />
				<?=$this->functions->elipsis($file->o_filename, 10);?>
			</a>
		</li>
	<?php
}
?>
</ul>
<?php }?>

<h3><?=$this->lang->line('global_footer_about')?></h3>
<p>
	<a href="http://xtrafile.com"><img src="<?=$base_url?>images/thumb.gif" width="50" height="50" alt="icon" class="float-left" /></a>
	<a href="http://xtrafile.com/products/xtraupload-v2/"><?=$this->lang->line('global_xtraupload_v2')?></a>
	<?=$this->lang->line('global_footer_about_text1')?> <a href="http://xtrafile.com/products/xtraupload-v2/"><?=$this->lang->line('global_xtraupload_v2')?></a> <?=$this->lang->line('global_footer_about_text2')?> <a href="http://www.codeigniter.com"><?=$this->lang->line('global_codeigniter')?></a> <?=$this->lang->line('global_footer_about_text3')?>
</p>

<?php
/*
if(stristr($this->uri->uri_string(),'/blog'))
{
?>
	<h3>Blog Navigation</h3>
	<ul class="sidemenu">
		<li><a class="home" href="<?=site_url('/blog/index')?>"><img src="<?=$base_url?>img/other/home2_16.png" class="nb" alt="" />Home</a></li>
		
		<li><h4>Recent Entries</h4></li>
		<?php foreach($this->blog_db->getRecentEntries(5) as $ent):?>
		<li>
			<a class="note" href="<?=site_url('/blog/view/'.$ent['id'].'/'.url_title($ent['title']))?>">
				<img src="<?=$base_url?>img/icons/comments_16.png" class="nb" alt="" /><?=$ent['title']?>
			</a>
		</li>
		<?php endforeach;?>

		<li><h4>Categories</h4></li>
		<?php foreach($this->blog_db->getCategories() as $cat):?>
		<li><a class="record" href="<?=site_url('/blog/category/'.$cat['name'])?>">
		<img src="<?=$base_url?>img/icons/tags_16.png" class="nb" alt="" /><?=ucwords($cat['name'])?>
		</a></li>
		<?php endforeach;?>
	</ul>
<?php
}
?>


<?php 
if(stristr($this->uri->uri_string(),'/news'))
{
?>
	<h3>News Navigation</h3>
	<ul class="sidemenu">
		<li><a class="home" href="<?=site_url('/news/index')?>"><img src="<?=$base_url?>img/other/home2_16.png" class="nb" alt="" />Home</a></li>
		
		<li><h4>Recent Entries</h4></li>
		<?php foreach($this->news_db->getRecentEntries(5) as $ent):?>
		<li>
			<a class="note" href="<?=site_url('/news/view/'.$ent['id'].'/'.url_title($ent['title']))?>">
				<img src="<?=$base_url?>img/icons/comments_16.png" class="nb" alt="" /><?=$ent['title']?>
			</a>
		</li>
		<?php endforeach;?>

		<li><h4>Categories</h4></li>
		<?php foreach($this->news_db->getCategories() as $cat):?>
		<li><a class="record" href="<?=site_url('/news/category/'.$cat['name'])?>">
		<img src="<?=$base_url?>img/icons/tags_16.png" class="nb" alt="" /><?=ucwords($cat['name'])?>
		</a></li>
		<?php endforeach;?>
	</ul>
<?php
}
*/
?>