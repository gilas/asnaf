<script>
function checkAll($this, $count) {
	$this = $($this);
	if ($this.attr('checked') == 'checked') {
		for ($i = 0; $i < $count; $i++) {
			$('#cb' + $i).attr('checked', 'checked')
		}
	}
	else {
		for ($i = 0; $i < $count; $i++) {
			$('#cb' + $i).attr('checked',false)
		}
	}
}

function submitbutton($action){
    $id = new Array()
    $('.has-cb').each(function(){
        $cb = $(this).children('input[type:checkbox]')
        if($cb.attr('checked') == 'checked'){
            $id.push($cb.val())
        }
    })
    if($id.length == 0){
        return;            
    }
    switch($action){
        case 'delete':
            if(confirm('آیا مطمئن هستید ؟')){
                $.post('<?php echo $this->Html->url(array('action' => 'delete')) ?>',{'id':$id.toString()},function(data){
                    if(data == true){
                        window.location.reload()    
                    }else{
                        alert(data)
                    }
                     
                })
            }
            break;
        case 'edit':
                $first = $id.shift()
                window.location.href = '<?php echo $this->Html->url(array('action' => 'edit')); ?>/'+$first
            break;
            
    }
}
$(function(){
    if($('.ordering').length){
        $('.ordering[rel=up]').each(function(){
            $('<span/>').addClass('text').text('انتقال به بالا').appendTo(this)
        })
        $('.ordering[rel=down]').each(function(){
            $('<span/>').addClass('text').text('انتقال به پایین').appendTo(this)
        })
    }
    $('.ordering[rel]').click(function(){
        $rel = $(this).attr('rel')
        $id = $(this).attr('id')
        $.get('<?php echo $this->Html->url(array('action' => 'ordering'))  ?>/'+$id+'/'+$rel,function(data){
            if(data == true){
                window.location.reload()    
            }else{
                alert(data)
            }
        })
    })
    $('.published').click(function(){
        $this = $(this)
        $id = $this.attr('id')
        $rel = $this.attr('rel')
        $action = 'publish'
        if($this.attr('action')){
            $action = $this.attr('action')
        }
        $this.attr('rel','loading')
        switch($rel){
            case 'published':
                $.get('<?php echo $this->Html->url(array('action' => 'index')) ?>/'+$action+'/'+$id+'/off',function(data){
                    if(data == true){
                        $this.attr('rel','unpublished')
                    }
                })
                break;
            case 'unpublished':
                $.get('<?php echo $this->Html->url(array('action' => 'index')) ?>/'+$action+'/'+$id,function(data){
                    if(data == true){
                        $this.attr('rel','published')
                    }
                })
                break;
        }
    })
})
</script>