<?php
drupal_add_js(drupal_get_path('module', 'ipepcare01participant') .'/ipepcare01participant.js');

<script src="script.js" type="text/javascript" >

jQuery(function(){
    jQuery('[id*="timeEntry"]').show().closest('div').hide();
});

</script>

?>