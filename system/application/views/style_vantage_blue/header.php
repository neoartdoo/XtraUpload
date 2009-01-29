<?php
if(!isset($headerTitle))
{
	$headerTitle = '';
}
else
{
	$headerTitle .= ' '.$this->startup->site_config['title_separator'].' ';
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xml:lang="en" >
<head>
	<title><?php echo $headerTitle.$this->startup->site_config['sitename']?></title>
	
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
	<meta name="author" content="Matthew Glinski - xtrafile.com" />
	<meta name="description" content="Site Description Here" />
	<meta name="keywords" content="keywords, here" />
	<meta name="robots" content="index, follow, noarchive" />
	<meta name="googlebot" content="noarchive" />
	<link rel="shortcut icon" href="<?=$base_url?>favicon.ico" />
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $base_url?>css/main.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $base_url?>css/style_vantage_blue/style_vantage_blue.css" />

	<!--[if lte IE 6]> 
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $base_url?>css/ie6.css" />
	<![endif]-->
	
	<script type="text/javascript">
	function ___imageClose(){return '<?php echo site_url('images/lightbox-btn-close.gif')?>';}
	function ___imageLoading(){return '<?php echo site_url('images/loading.gif')?>';}
	function ___baseUrl(){return '<?php echo $base_url?>';}
	function ___siteUrl(){return '<?php echo $base_url.$this->config->config['index_page']?>/';}
	</script>
	<script src="<?php echo $base_url?>js/main.php" type="text/javascript"></script>
	<?php if(stristr($this->uri->uri_string(),'/home') && !stristr($this->uri->uri_string(),'/admin'))
	{
		?>
		<script src="<?php echo $base_url?>js/upload.js" type="text/javascript"></script>
		<?php 
	}
	?>
	
	<?php if(stristr($this->uri->uri_string(),'/upload/url') && !stristr($this->uri->uri_string(),'/admin'))
	{
		?>
		<script src="<?php echo $base_url?>js/url.js" type="text/javascript"></script>
		<?php 
	}
	?>
	
</head>
<body dir="<?php echo $this->lang->line('global_language_direction')?>">
<!-- wrap starts here -->
<div id="wrap">

	<!--header starts-->
	<div id="header">			
				
		<h1 id="logo-text"><?php echo $this->startup->site_config['sitename']?></h1>		
		<p id="slogan"><?php echo $this->startup->site_config['slogan']?></p>	
		
		<!--
		<div id="top-menu">
			<p><a href="index.html">rss feed</a> | <a href="index.html">contact</a> | <a href="index.html">login</a></p>
		</div>	
		-->		
				
	<!--header ends-->					
	</div>
		
	<!-- navigation starts-->	
	<div id="nav">
		<ul>
			<?php echo $this->xu_api->menus->getMainMenu();?>
			<?php if($this->startup->group_config->admin){?>
			<li<?php if(substr($this->uri->uri_string(), 0, 6) == '/admin'){?> id="current"<?php }?>>
					<a href="<?php echo site_url('admin/home')?>"><img src="<?php echo $base_url.'img/other/admin_16.png'?>" class="nb" alt="" /><?php echo $this->lang->line('global_links_admin')?></a>
				</li>
			<?php }?>	
		</ul>
	<!-- navigation ends-->	
	</div>
	
	<!-- content starts -->
	<div id="content">
	
		<div id="main">
			