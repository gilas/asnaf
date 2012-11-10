 <div class="center-wrap">
    <div class="companyIdentity">
       <a href="page-template-homepage-jquery.html">Logo</a>
    </div>
    <!-- END companyIdentity -->
    <!-- START Main Navigation -->
    <nav>
        <?php 
        echo $this->Menu->getMenu('1', false, 'current-menu-item');
        ?>
    </nav>
    <!-- END Main Navigation -->
 </div>
 <!-- END center-wrap -->