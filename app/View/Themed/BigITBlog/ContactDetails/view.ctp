<?php
$this->set('title_for_layout', $contactDetail['ContactDetail']['title']);
$this->Html->addCrumb($contactDetail['ContactDetail']['title']);
?>
<div class="one-fourth">
	<h4><?php echo $contactDetail['ContactDetail']['title']; ?></h4>
    <div class="information">
    <label>مدیریت :</label>
    <span><?php echo $contactDetail['ContactDetail']['manager']; ?></span>
    </div>
    <div class="information">
        <label>همراه :</label>
        <span><?php echo $contactDetail['ContactDetail']['mobile']; ?></span>
    </div>
    <div class="information">
        <label>سامانه پیام کوتاه :</label>
        <span><?php echo $contactDetail['ContactDetail']['sms_center']; ?></span>
    </div>
	<div class="clear"></div>
</div>
<div class="three-fourths last">
		<h4>ارسال پیام</h4>
		<?php
            echo $this->Form->create('ContactDetail',array('id' => 'contactForm','inputDefaults' => array('div' => 'input-block')));
            echo $this->Form->input('name',array('label'=>'نام'));
            echo $this->Form->input('email',array('label'=>'پست الکترونیک',));
            echo $this->Form->input('website',array('label'=>'وب سایت'));
            echo $this->Form->input('content',array('label'=>'متن','cols'=>'30','rows'=>'15' , 'div' => 'textarea-block'));
            echo $this->Form->end(array('class' => 'submit clear-fix', 'label' => 'ارسال'));
        ?>
</div>
<script>
    $(function(){
        $.validator.setDefaults({
        	errorClass : "alert-input-error",
            errorElement : "div",
        });
        $("#contactForm").validate({
        	rules: {
        		"data[ContactDetail][name]": {
        			"required": true
        		},
        		"data[ContactDetail][email]": {
  		            "required": true,
        			"email": true
        		},
        		"data[ContactDetail][website]": {
        			"url": true
        		},
        		"data[ContactDetail][content]": {
        			"required": true,
        			"minlength": 20
        		}
        	},
        	messages: {
        		"data[ContactDetail][name]": {
        			"required": "ورود نام الزامی است"
        		},
        		"data[ContactDetail][email]": {
        		     "required": "ورود ایمیل الزامی است", 
        			"email": "فرمت ایمیل صحیح نمی باشد."
        		},
        		"data[ContactDetail][website]": {
        			"url": "فرمت وب سایت صحیح نمی باشد"
        		},
        		"data[ContactDetail][content]": {
        			"required": "ورود متن الزامی است",
        			"minlength": "متن نظر حداقل باید شامل 20 کاراکتر باشد"
        		}
        	}
        });
    })
</script>
<style>
    .information{
        margin-bottom: 33px;
        border-bottom: 1px #EEE dashed;
    }
    .information label{
        display: block;
    }
    .information span{
        color: #000;
        padding-right: 20px;
    }
</style>