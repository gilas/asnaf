<?php
$crumbs = $this->Html->getCrumbs('&ac;','صفحه اصلی');
if(empty($crumbs)){
    return;
}
$crumbs = explode('&ac;',$crumbs);
?>
<div id="breadcrumbs">
<?php 
foreach($crumbs as $k => $crumb){
    if(isset($crumbs[$k + 1])){
        echo $crumb . ' » ';
    }else{
        echo $crumb;
    }
} 
?>
</div>