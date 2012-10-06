<?php
if($name == 'An Internal Error Has Occurred.'){
    $name = 'خطای داخلی رخ داده است.';
}
?>
<div class="holder404">
	<div class="mask404">
		<div class="error404">
			<div class="e404"><h1>500</h1></div>

			<div class="title_error">خطا</div>
			<div class="description_error">خطای داخلی رخ داده است. لطفا دوباره تلاش نمائید.</div>
            <?php echo $this->Html->link('بازگشت به خانه','/',array('class' => 'button green small')); ?>
		</div>
	</div>
</div>	