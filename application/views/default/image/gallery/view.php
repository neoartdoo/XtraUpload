<h2 style="vertical-align:middle"><img src="<?=base_url().'img/other/images_32.png'?>" class="nb" alt="" /> <?=$this->lang->line('image_gallys_view_header') ?></h2>
<h3><?=$this->lang->line('image_gallys_view_1') ?><?=$gall->name?></h3>
<pre><code><?=$gall->descr?></code></pre>
<div id="gall">
	<?php foreach($gall_imgs->result() as $image){?>
		<a href="<?=$image->direct?>" title="<?=$this->lang->line('image_gallys_view_2') ?><a href='<?=str_replace('image/show', 'files/get', $image->view)?>' target='_blank'><?=str_replace('image/show', 'files/get', $image->view)?></a>" class="thickbox" rel="gal_<?=$id?>"><img src="<?=$image->thumb?>" alt="preview"  /></a>
	<?php }?>
</div>