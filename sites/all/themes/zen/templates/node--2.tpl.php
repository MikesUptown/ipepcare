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
	.first_name{float:left;margin-left:5px;margin-top:-10px;}
	.last_name{float:left;margin-left:5px;margin-top:-10px;}
	.date_birth{float:left;margin-top:-5px;}
	.sex{float:left;margin-left:5px;margin-top:-5px;}
	.insurance{float:left;margin-left:5px;margin-top:-5px;}
	.type_medicaid{float:left;margin-top:-5px;}
	.pharmacist{float:left;margin-left:5px;margin-top:-5px;}

	/*Contact_Information*/
	#contact_info{float:left;width: 100%;margin-top:-2%;margin-left:2%;/*border-style: solid;*/}
	.contact{width:25%;padding-left:5px;color:#fff;background:#A1A1A1;}
	.phone_01{float:left;margin-left:5px;margin-top:-10px;}
	.street_address{float:left;margin-left:5px;margin-top:-10px;}
	.phone_02{float:left;margin-left:5px;margin-top:-10px;}
	.mailing_address{float:left;margin-left:5px;margin-top:-10px;}
	
	/*Follow_Up_Appointments*/
	#follow_up_appointments{float:left;width: 100%;margin-left:2%;}	
	.follow_up{width:25%;padding-left:5px;color:#fff;background:#A1A1A1;}
	.call_expected{float:left;margin-left:5px;margin-top:-10px;}
	.call_actual{float:left;margin-left:5px;margin-top:-10px;}
	.v3_expected{float:left;margin-left:5px;margin-top:-10px;}
	.v3_actual{float:left;margin-left:5px;margin-top:-10px;}
	.v3_expected_time{float:left;margin-left:5px;margin-top:-10px;}
	
	/*PEP_Requests*/
	#pep_requests{float:left;width:100%;margin-left:2%;}
	.pep_requests{width:25%;padding-left:5px;color:#fff;background:#A1A1A1;}
	.first_pep{margin-top:-10px;}
	.first_pep_request{float:left;margin-left:5px;}
  	.first_pep_eligibility{float:left;margin-left:5px;}
  	.first_pep_start_date{float:left;margin-left:5px;}
  	
	.second_pep{}
	.second_pep_request{float:left;margin-left:5px;margin-top:0px;}
  	.second_pep_eligibility{float:left;margin-left:5px;margin-top:0px;}
  	.second_pep_start_date{float:left;margin-left:5px;margin-top:0px;}
  	
	.third_pep{}
	.third_pep_request{float:left;margin-left:5px;margin-top:0px;}
  	.third_pep_eligibility{float:left;margin-left:5px;margin-top:0px;}
  	.third_pep_start_date{float:left;margin-left:5px;margin-top:0px;}
  	
	.fourth_pep{}
	.fourth_pep_request{float:left;margin-left:5px;margin-top:0px;}
  	.fourth_pep_eligibility{float:left;margin-left:5px;margin-top:0px;}
  	.fourth_pep_start_date{float:left;margin-left:5px;margin-top:0px;}
  	
	.fifth_pep{}
	.fifth_pep_request{float:left;margin-left:5px;margin-top:0px;}
  	.fifth_pep_eligibility{float:left;margin-left:5px;margin-top:0px;}
  	.fifth_pep_start_date{float:left;margin-left:5px;margin-top:0px;}
  	
	/*SAVE*/
  	.save{float:right;width:120px;height:30px;margin-right:10px;margin-top:0px;margin-bottom:20px;}
  
  </style>

  <div class="content"<?php print $content_attributes;?>>
  	* Study_ID should be chosen for each new participant by month(mm) | date(dd) | year(yy) and by the Participant signed up on that date and plus number. 
  	The following example participant was added on Aug. 29, 2012 and was the 3rd person added to the Study on that date (082912_003).</br></br>
  	<form action="ipep_form.php">
  		
  		<div id="patient_info"> 	
  			<p class="study_id">Study ID: <input type="text" name="study_id" size="14"> (new)</p>
  			<p class="first_name">First Name: <input type="text" name="first_name" size="14"></p>
  			<p class="last_name">Last Name: <input type="text" name="last_name" size="14"></p>
  			<p class="date_birth">Date of Birth: <input type="text" name="date_of_birth" size="14"></p>
  			<p class="sex">Sex: <input type="text" name="sex" size="14"></p>
  			<p class="insurance">Insurance: <input type="text" name="insurance" size="20"></p>
  			<p class="type_medicaid">Type of Medicaid: <input type="text" name="type_of_medicaid" size="20"></p>
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
  			
  		</div><!--patient_info-->
  		
  		<div id="contact_info">
  			<p class="contact">Contact Information</p>
  			<p class="phone_01">Phone Number (1): <input type="text" name="phone_number_one"></p>
  			<p class="street_address">Street address: <input type="text" name="street_address" size="40"></p>
  			<p class="phone_02">Phone Number (2): <input type="text" name="phone_number_two"></p>
  			<p class="mailing_address">Mailing address: <input type="text" name="mailing_address" size="40"></p>
  		</div><!--contact_info-->
  		
  		<div id="follow_up_appointments">
  			<p class="follow_up">Follow Up Appointments</p>
  			<p class="call_expected">Locator Call Expected: <input type="text" name="locator_call_expected" size="15"></p>
  			<p class="v3_expected">V03 Expected: <input type="text" name="v03_expected" size="15"></p>
  			<p class="v3_actual">V03 Actual: <input type="text" name="v03_actual" size="15"></p>
  			<p class="call_actual">Locator Call Actual: <input type="text" name="locator_call_actual" size="15"></p>
  			<p class="v3_expected_time">V03 Expected Time: <input type="text" name="v03_expected_time" size="15"></p>
  		</div><!--follow_up_appointments-->
  
  		<div id="pep_requests">
  			<p class="pep_requests">PEP Requests</p>
  			<div class="first_pep">
  				<p class="first_pep_request">First PEP Request: <input type="text" name="first_pep_request" size="15"></p>
  				<p class="first_pep_eligibility">First PEP Eligibility: <input type="text" name="first_pep_eligibility" size="15"></p>
  				<p class="first_pep_start_date">PEP Start Date: <input type="text" name="pep_start_date" size="15"></p>
  			</div>
  			<div class="second_pep">
  				<p class="second_pep_request">Second PEP Request: <input type="text" name="second_pep_request" size="10"></p>
  				<p class="second_pep_eligibility">Second PEP Eligibility: <input type="text" name="second_pep_eligibility" size="10"></p>
  				<p class="second_pep_start_date">Second PEP Start Date: <input type="text" name="second_pep_start_date" size="10"></p>
  			</div>
  			<div class="third_pep">
  				<p class="third_pep_request">Third PEP Request: <input type="text" name="third_pep_request" size="10"></p>
  				<p class="third_pep_eligibility">Third PEP Eligibility: <input type="text" name="third_pep_eligibility" size="10"></p>
  				<p class="third_pep_start_date">Third PEP Start Date: <input type="text" name="third_pep_start_date" size="10"></p>
  			</div>
  			<div class="fourth_pep">
  				<p class="fourth_pep_request">Fourth PEP Request: <input type="text" name="fourth_pep_request" size="10"></p>
  				<p class="fourth_pep_eligibility">Fourth PEP Eligibility: <input type="text" name="fourth_pep_eligibility" size="10"></p>
  				<p class="fourth_pep_start_date">Fourth PEP Start Date: <input type="text" name="fourth_pep_start_date" size="10"></p>
  			</div>
  			<div class="fifth_pep">
  				<p class="fifth_pep_request">Fifth PEP Request: <input type="text" name="fifth_pep_request" size="10"></p>
  				<p class="fifth_pep_eligibility">Fifth PEP Eligibility: <input type="text" name="fifth_pep_eligibility" size="10"></p>
  				<p class="fifth_pep_start_date">Fifth PEP Start Date: <input type="text" name="fifth_pep_start_date" size="10"></p>
  			</div>
  		
  		</div><!--pep_requests-->
  		
  		<input class="save" type="submit" onclick="myFunction()" value="Save">	
  		
  </div>
  		
</div><!-- /.node -->   