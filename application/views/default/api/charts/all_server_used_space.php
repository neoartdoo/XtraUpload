<?php $rand = rand(); $total_space = $this->db->select_sum('size')->get('files')->row()->size;?>
var chart<?=$rand?> = new FusionCharts("<?=$base_url?>flash/charts/Pie3D.swf", "ChartId", "<?=$height?>", "<?=$width?>", "0", "0");chart<?=$rand?>.setDataXML("<chart caption='Servers >> Used Space' showPercentageValues='1'><?php foreach($servers->result() as $server){$server_space = $this->db->select_sum('size')->get_where('files', array('server' => $server->url))->row()->size;?><set label='<?=$server->name?>' value='<?=round($server_space / 1024);?>' /><?php }?></chart>");chart<?=$rand?>.render("chart_data");