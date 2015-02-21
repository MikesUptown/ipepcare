<?php
/**
 * @file
 * Zen theme's implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   - view-mode-[mode]: The view mode, e.g. 'full', 'teaser'...
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 *   The following applies only to viewers who are registered users:
 *   - node-by-viewer: Node is authored by the user currently viewing the page.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $pubdate: Formatted date and time for when the node was published wrapped
 *   in a HTML5 time element.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content. Currently broken; see http://drupal.org/node/823380
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see zen_preprocess_node()
 * @see template_process()
 */
?>

<!--style= "background: red" style="background: #FF9900"-->
<div id="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
		
  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    
    <header>
	  
	  <?php print_r(array_keys($content)); ?>   
      <?php print render($title_prefix); ?>
      
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      
      <?php print render($title_suffix); ?>

      <?php if ($display_submitted): ?>
      	<p class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </p>
      <?php endif; ?>

      <?php if ($unpublished): ?>
        <p class="unpublished"><?php print t('Unpublished'); ?></p>
      <?php endif; ?>
    
    </header>
  <?php endif; ?>
  
  <?php
    // We hide the comments and links now so that we can render them later.
    //hide($content['comments']);
    //hide($content['links']);
    //print render($content);
  ?>

  <!--<?php print render($content['links']); ?>-->
  <!--<?php print render($content['comments']); ?>-->
  
  <script>
	function myFunction()
	{
		alert("PEP Care form is submitted");
	}
  </script>
  
  <style media="screen" type="text/css">

	.content{width: 100%;/*background:#FF9900;border-style:solid;*/font-style:helvetica;font-size:12px;}
	
	.contact_info{float:left;width: 100%;margin-top:2%;margin-left:2%;}
	.contact_title{float:left;margin-top:-10px;font-size:16px;color:#4C4C4C;}
	.contact_background{float:left;width: 100%;margin-top:-30px}
	
	/*Pharmacist*/
	.pharmacist_contact{width:30%;float:left;}
	.pharmacist{width:92%;height:50px;font-size:14px;padding-left:10px;color:#F4F4F4;background:#FE3D1C;}
	.pharmacist_01{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	.pharmacist_02{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	.pharmacist_03{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	
	/*Physician*/
	.physician_contact{width:30%;float:left;}
	.physician{width:92%;height:50px;font-size:14px;padding-left:10px;color:#F4F4F4;background:#FE3D1C;}
	.physician_01{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	.physician_02{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	
	/*Research Team*/
	.research_contact{width:30%;float:left;}
	.research_team{width:92%;height:50px;font-size:14px;padding-left:10px;color:#F4F4F4;background:#FE3D1C;}
	.research_team_01{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	.research_team_02{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	.research_team_03{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	
	
  </style>

  <div class="content"<?php print $content_attributes;?>>
  	
  	<div class="contact_info"> 
  		<p class="contact_title">This is Dashboard to search Study Forms.This below content will be changed.</p>
  		<div class="contact_background">
 
  			<div class="pharmacist_contact">
  				
  				<p class="pharmacist">Pharmacists: </p>	
  				<p class="pharmacist_01">	
  					Quick Rx Pharmacy</br>
  					(Wash. Heights)</br>
  					27 Audubon Ave.</br>
					SP: Richard Balcharan</br>
					646-448-4848</br>
					<a href="richard.balcharan@gmail.com">richard.balcharan@gmail.com</a>
				</p>
				
				<p class="pharmacist_02">	
  					Boca Pharmacy</br>
					514 Willis Ave.</br>
					SP: Brenda Johnson</br>
					718-292-7979</br>
					<a href="brjohnson514@gmail.com">brjohnson514@gmail.com</a>
				</p>
				
				<p class="pharmacist_03">	
  					Quick Rx Pharmacy (E. Harlem)</br>
					1875 Lexington Ave.</br>
					SP: Jennifer Haley</br>
					212-410-0911</br>
					<a href="jenharley@ymail.com">jenharley@ymail.com</a>
				</p>
  				
  			</div>
 
  			<div class="physician_contact">
  				
  				<p class="physician">Physicians: </p>
  				<p class="physician_01">	
  					Silvia Amesty</br>
					Young Men’s Clinic</br>
					212-304-7213</br>
					<a href="sc1242@columbia.edu">sc1242@columbia.edu</a>
				</p>
				
				<p class="physician_02">	
  					Beena Jani</br>
					Farrell Clinic</br>
					212-544-1880</br>
					<a href="bj2183@columbia.edu">bj2183@columbia.edu</a>
				</p>	
  			
  			</div>
 
  			<div class="research_contact">
  				
  				<p class="research_team">Research Team: </p>
  				<p class="research_team_01">	
  					Carolyn Hernandez</br>
					Research Coordinator</br>
					212-342-5453</br>
					<a href="ch2827@columbia.edu">ch2827@columbia.edu</a>
				</p>
				
				<p class="research_team_02">	
  					Katherine Harripersaud</br>
					Research Coordinator</br>
					212-304-5541</br>
					<a href="kh2449@columbia.edu">kh2449@columbia.edu</a>
				</p>
				
				<p class="research_team_03">	
  					Univeral Contacts</br>
					Team Phone</br>
					646-548-7528
				</p>
  				
  			</div>
 			
  		</div>
  		
  	</div>	
  		
	
  </div>
  		
</div><!-- /.node -->   