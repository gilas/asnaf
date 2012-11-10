<?php
if($name == 'Not Found'){
    $name = 'آدرس درخواستی یافت نشد.';
}
?>
<div class="holder404">
	<div class="mask404">
		<div class="error404">
			<div class="e404"><h1>404</h1></div>

			<div class="title_error"><?php echo $name; ?></div>
			<div class="description_error">آدرس درخواستی یافت نشد. لطفا از لینک های داخل صفحات استفاده نمائید</div>
            <?php echo $this->Html->link('بازگشت به خانه','/',array('class' => 'button green small')); ?>
		</div>
	</div>
</div>	