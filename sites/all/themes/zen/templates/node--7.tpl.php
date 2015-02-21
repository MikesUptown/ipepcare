<?php


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

	.content{width: 100%;/*background:#FF9900;border-style:solid;*/font-style:helvetica;font-size:11px;}
	
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
	.physician_03{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	
	
	/*Research Team*/
	.research_contact{width:30%;float:left;}
	.research_team{width:92%;height:50px;font-size:14px;padding-left:10px;color:#F4F4F4;background:#FE3D1C;}
	.research_checklist_01{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	.research_checklist_02{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	.research_checklist_03{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	.research_checklist_04{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	.research_checklist_05{width:87%;margin-top:-10px;padding:10px;background:#CECECE;}
	
	
	
  </style>

  <div class="content"<?php print $content_attributes;?>>
  	
  	<div class="contact_info"> 
  		<p class="contact_title">Study Checklists</p>
  		<div class="contact_background">
 
  			<div class="pharmacist_contact">
  				
  				<p class="pharmacist">Pharmacists Checklist: </p>	
  				<p class="pharmacist_01">	
  					<strong>Everyday Activities & Recruitment</strong></br>
  					Educate customers on HIV & safe injection practices</br>
  					Distribute materials (like SIPS, pamphlets, condoms)</br>
					Recruit ESAP customers to enroll in study</br>
					Make study appointments and give coupon with date and time</br>
					Advise customers to bring photo ID on day of interview</br>
				</p>
				
				<p class="pharmacist_02">	
  					<strong>When Enrolled Participants Visit Pharmacy</strong></br>
					Check VPCP to see if participant completed</br>
					Update VPCP with any new contact info</br>
					Write comment to notify research team of changes</br>
					Remind participant of any upcoming appointments</br>
				</p>
				
				<p class="pharmacist_03">	
  					<strong>During PEP Request Visit</strong></br>
					Call research team immediately</br>
					If given OK by physician, fill initial 10 day PEP prescription</br>
					Update VPCP when in contact with participant</br>
					Ask participant about adherence to PEP and any side effects</br>
					Update VPCP with date participants receive 2nd dosage of PEP</br>
					Update VPCP regularly; maintain open lines of communication with physician</br>
				</p>
  				
  			</div>
  			
  			
  			<div class="physician_contact">
  				
  				<p class="physician">Physicians Checklist: </p>
  				<p class="physician_01">	
  					<strong>Everyday Study Activities</strong></br>
					Be on call Mon. - Fri. 9am - 7pm</br>
					If there is a PEP-request:</br>
					-Verify HIV-negative status and pregnancy </br>
					exam results</br>
					-Speak with participant and conduct PEP</br> 
					eligibility survey in ACASI</br>
				</p>
				
				<p class="physician_02">	
  					<strong>If participant is eligible to receive PEP:</strong></br>
					-Speak with pharmacist to give OK on filling PEP medications</br>
					-Counsel participant on adherence to PEP</br>
					-Give participant an appointment for first clinic vising in 2-3 days</br>
					-Update VPCP with PEP eligibility status (eligible vs not eligible)</br>
					-Include date/time for first clinic visit</br>
				</p>
				
				 <p class="physician_03">	
  					<strong>During clinic visits:</strong></br>
					-Conduct clinic visit surveys</br>
					-Determine continuation/discontinuation of PEP and update VPCP with decision</br>
					-Schedule follow-up clinic visits for PEP monitoring</br>
					-Update VPCP with:</br>
					-second and third appointment dates and times</br>
					-completion of clinic visit surveys for pickup</br>
					-Update VPCP regularly; maintain open lines of communication with pharmacist and PEP patients</br>
				</p>
  			
  			</div>
 
  			<div class="research_contact">
  				
  				<p class="research_team">Researchers Checklist: </p>
  				<p class="research_checklist_01">	
  					Meet customers in pharmacy and follow study protocols at all times</br>
					Conduct interviews, complete records in database and VPCP</br>
					Conduct rapid HIV, HCV testing (only on ever IDUs)</br>
					Give appointments for follow up V03 survey and locator</br>
					Distribute educational materials, discuss PEP, adress health questions</br>
					Compensate the participant</br>
				</p>
				
				<p class="research_checklist_02">	
  					Update any changes to address and phone numbers of participant</br>
					Conduct 3 month follow up interview</br>
					Distribute educational materials, discuss PEP, address health questions</br>
					Compensate the participant</br>
				</p>
				
				<p class="research_checklist_03">	
  					PEP Request Visit:</br>
					Check record</br>
					Consent participant with iPEPcare PEP request consent form</b>
					Conduct behavioral assessment</b>
					Conduct rapid HIV</b>
					Conduct pregnancy testing</b>
					Call physician: give results of tests, connect physician with participant</b>
				</p>
  				
  				<p class="research_checklist_04">	
  					Blood draw for HBV, CBC, LFT, serum creatining testing</br>
					Speak with physican to make appointment cards for clinic visits</br>
					Schedule interviews for 3 and 6-month post-PEP follow-up</b>
				</p>
  				
  				  <p class="research_checklist_05">	
  					Refer participant to Callen-Lorde Community Center, St. Lukes Hospital</br>
					Harlem Hospital, or Bellevue EDs</br>
				</p>
  			</div>
 			
  		</div>


  	</div>	  		
	
  </div>
  		
</div><!-- /.node -->   