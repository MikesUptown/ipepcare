(function($) {
    $(document).ready(function() {
        
            $('#delete-filters').click(function() {
                
                 window.location = location.protocol +$('#urlforfilters').val();
              });
              
               $('#filters').click(function() {
                    var filteradd= "";
                   if ($('#urlforfilters').val()!='') {
                       filteradd= "&";
                   } else {
                       filteradd= "?";
                   }
                   
                   if ($('#study_id_filter').val()!='') {
                       filteradd = filteradd + "studyid="+$('#study_id_filter').val() + "&";
                   }
                   
                   if ($('#pharmacist_filter').val()!='') {
                       filteradd = filteradd + "pharmacist="+$('#pharmacist_filter').val();
                   }
                   
                    if ($('#physician_filter').val()!='') {
                       filteradd = filteradd + "physician="+$('#physician_filter').val();
                   }
                   
                   window.location = location.protocol+$('#urlforfilters').val() +filteradd;
              
                
              });
    });
})(jQuery);