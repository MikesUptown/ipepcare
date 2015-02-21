/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


(function( $ ){

  /* applies the tpl (a selector of a template) to the data and puts it as the html of the object
   * it triggers two events
   * assign (to be able to alter the data) 
   * render (after the html has been added to the dom) to allow jquery event initialisations
   * options.method = html (or after or before or any html injection jquery method
   *
   */

$(document).ready(function(){

   
$("a[rel^='prettyPhoto']").prettyPhoto();
   
   

});
})( jQuery );

