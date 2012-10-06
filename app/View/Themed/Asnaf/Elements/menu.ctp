<?php 
echo $this->Menu->getMenu('1', false, 'current-menu-item');
?>
<div class="search-top">
	<form onsubmit="if($('input[name=q]').val()) return true;return false;" action="<?php echo $this->Html->url(array('controller' => 'contents', 'action' => 'search', 'admin' => false)) ?>" class="inline-search">
		<fieldset>
			<input type="text" name="q" value="<?php echo @$this->request->query['q'] ?>" />
			<input type="submit" />
		</fieldset>
	</form>
</div>
<div class="clear"></div>