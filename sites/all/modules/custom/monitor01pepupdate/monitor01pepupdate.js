<?php
drupal_add_js(drupal_get_path('module', 'monitor01pepupdate') .'/monitor01pepupdate.js');

<script src="script.js" type="text/javascript" >

jQuery(function(){
    jQuery('[id*="timeEntry"]').show().closest('div').hide();
});

</script>

?>