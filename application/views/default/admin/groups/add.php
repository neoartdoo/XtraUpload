<h2 style="vertical-align:middle"><img src="<?=base_url().'img/icons/user_group_32.png'?>" class="nb" alt="" /> Group - Add</h2><br />
<?=generateLinkButton('Manage Groups', site_url('admin/group/view'), base_url().'img/icons/back_16.png')?><br />
<form action='<?=site_url('admin/group/add')?>' id="user_group" method="post">
	<h3>Add New Group</h3>
    <p>
		<?php 
		foreach($group as $name => $value)
		{
			if($name == 'id' or $name == 'status') {continue;}
			?>
				<label style="font-weight:bold" for="<?=$name?>">
					<?=$real_name[$name]?> 
					<img src="<?=$base_url?>/img/icons/about_16.png" style="cursor:pointer" onclick="$('#d_<?=$name?>').slideToggle()" class="nb" />
				</label>
			<?php
				
			if($real_type[$name] == 'yesno')
			{
				?>
				<input type="radio" name="<?=$name?>" value="1" size="50" /> Yes<br />
				<input type="radio" name="<?=$name?>" value="0" size="50" /> No<br />
				<?php
			}
			else if($real_type[$name] == 'allowdeny')
			{
				?>
				<input type="radio" name="<?=$name?>" value="1" size="50" /> Allow<br />
				<input type="radio" name="<?=$name?>" value="0" size="50" /> Deny<br />
				<?php
			}
			else if(is_array($real_type[$name]))
			{
				?>
				<select name="<?=$name?>">
					<?php
					foreach($real_type[$name] as $a_key => $a_val)
					{
						?>
						<option value="<?=$a_key?>"><?=$a_val?></option>
						<?php
					}
					?>
				</select>
				<?php
			}
			else if($real_type[$name] == 'area')
			{
				?>
				<textarea name="<?=$name?>" rows="4" cols="40" ></textarea>
				<?php
			}
			else
			{
				?>
				<input type="text" name="<?=$name?>" size="50" /><br />
				<?php
			}
			?>
			<span style="display:none; text-decoration:underline; font-weight:bold" id="d_<?=$name?>"><?=$real_descr[$name]?></span><br />
			<?php
		}
		echo '<br />';
		echo generateSubmitButton('Add New Group', base_url().'img/icons/add_16.png', 'green')
		?><br />
    </p>
</form>