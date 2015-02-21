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
	
	/*Patient_Information*/
	#patient_info{ float:left;width: 100%;margin-top:2%;margin-left:2%; /*border-style: solid;*/}
	.study_id{float:left;margin-top:-10px;}
	.date_birth{float:left;margin-top:-10px;padding-left:5px;}
	.phone_01{float:left;margin-top:-5px;}
	.phone_02{float:left;margin-top:-5px;padding-left:5px;}
	.pep_request_date{width:100%;float:left;margin-top:-5px;}
	.pharmacist{width:100%;float:left;margin-top:-5px;}
	.physician{width:100%;float:left;margin-top:-5px;}
	
	/*Bendiner_Lab_Result*/
	#bendiner_lab{float:left;width: 100%;margin-top:-2%;margin-left:2%;/*border-style: solid;*/}
	.bendiner_title{width:45%;padding-left:5px;color:#fff;background:#A1A1A1;}
	.specimen{float:left;margin-top:-10px;}
		
	/*Clinic Visit*/
	#clinic_vist{float:left;width:100%;margin-top:-20px;margin-left:2%;}
	
	/*First Clinic Visit*/
	.first_pep{width:30%;float:left;}
	.first_clinic{width:90%;padding-left:5px;background:#A1A1A1; color:#fff;}
  	.expected_first_clinic_date{margin-top:-10px;padding-left:5px;}
  	.expected_first_clinic_time{margin-top:-15px;padding-left:5px;}
  	.first_clinic_actual_date{margin-top:-15px;padding-left:5px;}
  	.contitune_discountinue_01{margin-top:-15px;padding-left:5px;}
  	
 	
  	/*Second Clinic Visit*/
	.second_pep{width:30%;float:left;}
	.second_clinic{width:90%;padding-left:5px;background:#A1A1A1; color:#fff;}
  	.expected_second_clinic_date{margin-top:-10px;padding-left:5px;}
  	.expected_second_clinic_time{margin-top:-15px;padding-left:5px;}
  	.second_clinic_actual_date{margin-top:-15px;padding-left:5px;}
  	.contitune_discountinue_02{margin-top:-15px;padding-left:5px;}
  	
  	/*Third Clinic Visit*/
	.third_pep{width:30%;float:left;}
	.third_clinic{width:90%;padding-left:5px;background:#A1A1A1; color:#fff;}
  	.expected_third_clinic_date{margin-top:-10px;padding-left:5px;}
  	.expected_third_clinic_time{margin-top:-15px;padding-left:5px;}
  	.third_clinic_actual_date{margin-top:-15px;padding-left:5px;}
  	
  	/*PEP Refill*/
	#pep_refill{float:left;width: 100%;margin-left:2%;}	
	.pep_refill{width:25%;padding-left:5px;color:#fff;background:#A1A1A1;}
	.refill_before{width:100%;float:left;margin-left:5px;margin-top:-10px;}
	.actual_return{float:left;margin-left:5px;margin-top:-10px;}
		
  	/*SAVE*/
  	.save{float:right;width:120px;height:30px;margin-right:10px;margin-top:0px;margin-bottom:20px;}
  </style>

  <div class="content"<?php print $content_attributes;?>>
  	* Study_ID should be chosen for each new participant by month(mm) | date(dd) | year(yy) and by the Participant signed up on that date and plus number. 
  	The following example participant was added on Aug. 29, 2012 and was the 3rd person added to the Study on that date (082912_003).</br></br>
  	<form action="ipep_form.php">
  		
  		<div id="patient_info"> 	
  			<p class="study_id">Study ID: <input type="text" name="study_id" size="20"></p>
  			<p class="date_birth">Date of Birth: <input type="text" name="date_of_birth" size="20"></p>
  			<p class="phone_01">Phone Number (1): <input type="text" name="phone_number_one" size="20"></p>
  			<p class="phone_02">Phone Number (2): <input type="text" name="phone_number_two" size="20"></p>
  			<p class="pep_request_date">PEP Request Date: <input type="text" name="type_of_medicaid" size="20"></p>
  			<p class="pharmacist">Pharmacist: 
  				<select>
  					<option value="select_pharmacist">select pharmacist</option>
  					<option value="none">none</option>
  					<option value="pharmacist_01">pharmacist_01</option>
  					<option value="pharmacist_02">pharmacist_02</option>
  					<option value="pharmacist_03">pharmacist_03</option>
  					<option value="pharmacist_04">pharmacist_04</option>
				</select>
			</p>
			
			<p class="physician">Physician: 
  				<select>
  					<option value="select_physician">select physician</option>
  					<option value="none">none</option>
  					<option value="physician_01">physician_01</option>
  					<option value="physician_02">physician_02</option>
  					<option value="physician_03">physician_03</option>
  					<option value="physician_04">physician_04</option>
				</select>
			</p>
  			
  		</div><!--patient_info-->
  		
  		<div id="bendiner_lab">
  			<p class="bendiner_title">Bendiner Lab Result:https://bendinerweb.com</p>
  			<p class="specimen">Specimen #: <input type="text" name="phone_number_one"></p>
  		</div><!--bendiner_lab-->
  		
  		
  		<div id="clinic_vist">
  			
  			<div class="first_pep">
  				<p class="first_clinic">First Clinic Visit</p>
  				<p class="expected_first_clinic_date">Expected first clinic visit date: <input type="text" name="first_pep_request" size="25"></p>
  				<p class="expected_first_clinic_time">Expected first clinic visit time: <input type="text" name="first_pep_eligibility" size="25"></p>
  				<p class="first_clinic_actual_date">First clinic visit actual date: <input type="text" name="pep_start_date" size="25"></p>
  				<p class="contitune_discountinue_01">Continue PEP: 
  					<select>
  						<option value="select_pep_01">Select</option>
  						<option value="yes">Yes</option>
  						<option value="no">No</option>
					</select>
				</p>
  			</div>
  			
  			<div class="second_pep">
  				<p class="second_clinic">Second Clinic Visit</p>
  				<p class="expected_second_clinic_date">Expected second clinic visit date: <input type="text" name="first_pep_request" size="25"></p>
  				<p class="expected_second_clinic_time">Expected second clinic visit time: <input type="text" name="first_pep_eligibility" size="25"></p>
  				<p class="second_clinic_actual_date">Second clinic visit actual date: <input type="text" name="pep_start_date" size="25"></p>
  				<p class="contitune_discountinue_02">Continue PEP(2): 
  					<select>
  						<option value="select_pep_02">Select</option>
  						<option value="yes">Yes</option>
  						<option value="no">No</option>
					</select>
				</p>
  			</div>
  			
  			<div class="third_pep">
  				<p class="third_clinic">Third Clinic Visit</p>
  				<p class="expected_third_clinic_date">Expected third clinic visit date: <input type="text" name="first_pep_request" size="25"></p>
  				<p class="expected_third_clinic_time">Expected third clinic visit time: <input type="text" name="first_pep_eligibility" size="25"></p>
  				<p class="third_clinic_actual_date">Third clinic visit actual date: <input type="text" name="pep_start_date" size="25"></p>
  			</div>
  		</div><!--clinic_visit-->
  			
  		<div id="pep_refill">
  			<p class="pep_refill">PEP Refill</p>
  			<p class="refill_before">Refill before this date: <input type="text" name="locator_call_expected" size="15"></p>
  			<p class="actual_return">Actual return date for refill: <input type="text" name="v03_expected" size="15"></p>

  		</div><!--pep_refill-->
  				
  		<input class="save" type="submit" onclick="myFunction()" value="Save" size="20">
  		
  </div>
  		
</div><!-- /.node -->   