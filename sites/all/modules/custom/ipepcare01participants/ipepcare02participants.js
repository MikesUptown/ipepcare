<?php
drupal_add_js(drupal_get_path('ipepcare01participants', 'ipepcare01participants') .'/ipepcare01participants.js');

<script src="script.js" type="text/javascript" >

jQuery(function(){
    jQuery('[id*="timeEntry"]').show().closest('div').hide();
});

</script>

?>