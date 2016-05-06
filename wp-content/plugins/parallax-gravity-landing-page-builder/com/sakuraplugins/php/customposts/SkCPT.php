<?php
require_once(GRP_CLASS_PATH.'/com/sakuraplugins/php/customposts/GenericPostType.php');
require_once(GRP_CLASS_PATH.'/com/sakuraplugins/php/libs/rx__resizer.php');
require_once(GRP_CLASS_PATH.'/com/sakuraplugins/php/libs/sk-qr-util.php');
/**
 * Rx CPT
 */
class GrpCPT extends GRPGenericPostType {	

	public function meta_box_sections(){
		global $post;
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return $post_id;
															
		?>	

		<p class="sk_notice"><strong>NOTE!</strong> Parallax Gravity allows you to build multiple sections inside a landing pages. Start creating sections below.</p>
		<div id="sk_sectionsUI" class="optionBox" data-postmeta="<?php echo $this->getPostCustomMeta();?>">
			
			<input id="addSectionBTN" type='submit' value='Add section' class='button-primary pxFloatRight' />
			<input id="removeAllSectionBTN" style="margin-right: 5px;" type='submit' value='Remove all sections' class='button-secondary pxFloatRight' />
			<div class="clear-fx"></div>
			<div class="spacer10"></div>			

			<?php
				$customPostOptions = get_post_meta($post->ID, $this->getPostCustomMeta(), false);
				$post_custom_meta_data = $this->getPostCustomMeta();				

				$pTitles = (isset($customPostOptions[0]['pTitles']))?$customPostOptions[0]['pTitles']:false;				

				$isAddToMenuInput = (isset($customPostOptions[0]['isAddToMenuInput']))?$customPostOptions[0]['isAddToMenuInput']:false;
				$isFullContentInput = (isset($customPostOptions[0]['isFullContentInput']))?$customPostOptions[0]['isFullContentInput']:false;

				$pTop = (isset($customPostOptions[0]['pTop']))?$customPostOptions[0]['pTop']:false;
				$pBottom = (isset($customPostOptions[0]['pBottom']))?$customPostOptions[0]['pBottom']:false;
				$section_background_color = (isset($customPostOptions[0]['section_background_color']))?$customPostOptions[0]['section_background_color']:false;
				$section_text_color = (isset($customPostOptions[0]['section_text_color']))?$customPostOptions[0]['section_text_color']:false;

				$section_scroll_duration = (isset($customPostOptions[0]['section_scroll_duration']))?$customPostOptions[0]['section_scroll_duration']:false;
									
				
				$sectionBackAttachemetID = (isset($customPostOptions[0]['sectionBackAttachemetID']))?$customPostOptions[0]['sectionBackAttachemetID']:false;			
				
				$isSectionBackInput = (isset($customPostOptions[0]['isSectionBackInput']))?$customPostOptions[0]['isSectionBackInput']:false;
				$isSectionBackFixedInput = (isset($customPostOptions[0]['isSectionBackFixedInput']))?$customPostOptions[0]['isSectionBackFixedInput']:false;						
				$isSectionBackRepeatInput = (isset($customPostOptions[0]['isSectionBackRepeatInput']))?$customPostOptions[0]['isSectionBackRepeatInput']:false;											
				$isSectionArrowDownInput = (isset($customPostOptions[0]['isSectionArrowDownInput']))?$customPostOptions[0]['isSectionArrowDownInput']:false;			
				$isSectionArrowUpInput = (isset($customPostOptions[0]['isSectionArrowUpInput']))?$customPostOptions[0]['isSectionArrowUpInput']:false;			
										

				$editor_contents = (isset($customPostOptions[0]['sectionContent']))?$customPostOptions[0]['sectionContent']:'';	

				//static ids
				$static_ids = (isset($customPostOptions[0]['static_ids']))?$customPostOptions[0]['static_ids']:false;				
			?>			
			<!--parallax container-->			
			<div id="parallax_accordion">

				<!--if data-->
				<?php if(is_array($pTitles)):?>
					<?php for ($i=0; $i < sizeof($pTitles); $i++):?>
					<?php
						$currentTitle = $pTitles[$i];

						$isAddToMenuInputVal = (isset($isAddToMenuInput[$i]))?$isAddToMenuInput[$i]:'';							
						$isAddToMenuInputValChecked = ($isAddToMenuInputVal!="false")?' checked':'';

						$isFullContentInputVal = (isset($isFullContentInput[$i]))?$isFullContentInput[$i]:'';							
						$isFullContentInputValChecked = ($isFullContentInputVal!="false")?' checked':'';								

						$padding_top = (isset($pTop[$i]))?$pTop[$i]:'80';
						$padding_bottom = (isset($pBottom[$i]))?$pBottom[$i]:'80';
						$sectionBackground = (isset($section_background_color[$i]))?$section_background_color[$i]:'FFFFFF';
						$sectionTextCol = (isset($section_text_color[$i]))?$section_text_color[$i]:'666563';
												

						$sectionBAttachement = (isset($sectionBackAttachemetID[$i]))?$sectionBackAttachemetID[$i]:'';
						$sectionBackgroundImage = "";
						if($sectionBAttachement!=''){
							$hBackRes = wp_get_attachment_image_src($sectionBAttachement, 'thumbnail');
							$sectionBackgroundImage = ($hBackRes)?$hBackRes[0]:$sectionBackgroundImage;
						}
						$isSectionBackInputVal = (isset($isSectionBackInput[$i]))?$isSectionBackInput[$i]:'';							
						$isSectionBackInputValChecked = ($isSectionBackInputVal!="false")?' checked':'';

						$isSectionBackFixedInputVal = (isset($isSectionBackFixedInput[$i]))?$isSectionBackFixedInput[$i]:'';							
						$isSectionBackFixedInputValChecked = ($isSectionBackFixedInputVal!="false")?' checked':'';	

						$isSectionBackRepeatInputVal = (isset($isSectionBackRepeatInput[$i]))?$isSectionBackRepeatInput[$i]:'';							
						$isSectionBackRepeatInputValChecked = ($isSectionBackRepeatInputVal!="false")?' checked':'';

						$isSectionArrowDownInputVal = (isset($isSectionArrowDownInput[$i]))?$isSectionArrowDownInput[$i]:'';							
						$isSectionArrowDownInputValChecked = ($isSectionArrowDownInputVal!="false")?' checked':'';	

						$isSectionArrowUpInputVal = (isset($isSectionArrowUpInput[$i]))?$isSectionArrowUpInput[$i]:'';							
						$isSectionArrowUpInputValChecked = ($isSectionArrowUpInputVal!="false")?' checked':'';						
									

						$sectionScrollDuration = (isset($section_scroll_duration[$i]))?$section_scroll_duration[$i]:'1000';																								

						//startic ID
						$static_ID = (isset($static_ids[$i]))?$static_ids[$i]:uniqid('gravityslide');						
																
					?>
						<!--section group-->
						<div class="px_group">
							 <h3 class="pxSectionTitle"><span class="hTitle"><?php echo $currentTitle;?></span></h3>
							 <div>
							 	<input style="margin-right: 5px;" type='submit' value='Remove section' class='button-secondary pxFloatRight removeSectionBTN' />
							 	
							 	<!--static ID-->
							 	<input style="height: 30px;" class="smallInputText" type="hidden" name="<?php echo $post_custom_meta_data;?>[static_ids][]" value="<?php echo $static_ID;?>" />							 	

							 	<!--section title-->
							 	<div class="sk_admin_row">
							 		<div class="sk_admin_span3">
							 			<p class="pTitle sectionTitleLabel"><strong>Section title</strong></p>							 	
							 			<input style="height: 30px;" class="smallInputText sectionTitleInput" type="text" name="<?php echo $post_custom_meta_data;?>[pTitles][]" value="<?php echo $currentTitle;?>" />
							 		</div>

							 		<div class="sk_admin_span3">
							 				<div class="addToMenuSpace"></div>
											<label class="checkbox">
											  <input class="isAddToMenuCB" type="checkbox"<?php echo $isAddToMenuInputValChecked;?>> Link section to menu
											</label>
											<input class="isAddToMenuInput" type="hidden" name="<?php echo $post_custom_meta_data;?>[isAddToMenuInput][]" value="<?php echo $isAddToMenuInputVal; ?>" />
							 		</div>		

							 		<div class="clear-fx"></div>
							 	</div>
							 	<!--/section title-->
							 	
							 	<div class="phline"></div>

							 	<!--section padding-->
							 	<div class="sk_admin_row">
							 		<div class="sk_admin_span5">
							 			<p class="pTitle"><strong>Padding top</strong></p>
							 			<input style="height: 30px;" class="smallInputText" type="text" name="<?php echo $post_custom_meta_data;?>[pTop][]" value="<?php echo $padding_top;?>" />
							 		</div>

							 		<div class="sk_admin_span5">
							 			<p class="pTitle"><strong>Padding bottom</strong></p>
							 			<input style="height: 30px;" class="smallInputText" type="text" name="<?php echo $post_custom_meta_data;?>[pBottom][]" value="<?php echo $padding_bottom;?>" />
							 		</div>							 		

							 		<div class="clear-fx"></div>
							 	</div>
							 	<!--/section padding-->


							 	<div class="phline"></div>

							 	<!--section background-->
								<div class="sk_admin_row">
									<div class="sk_admin_span3">
											<p class="pTitle"><strong>Section background color</strong></p>
											<input style="height: 30px;" class="smallInputText section_background_color" type="text" name="<?php echo $post_custom_meta_data;?>[section_background_color][]" value="<?php echo $sectionBackground;?>" />
											<p class="pTitle"><strong>Section text color</strong></p>
											<input style="height: 30px;" class="smallInputText section_text_color" type="text" name="<?php echo $post_custom_meta_data;?>[section_text_color][]" value="<?php echo $sectionTextCol;?>" />											
											<div class="spacer10"></div>											
									</div>	

									<div class="sk_admin_span3">
											<p class="pTitle"><strong>Background image</strong></p>	
											<a class="skButton skActionButton" href="#">Upload image</a>						    
										    
										    <p>
										    	<img class="sectionBackgroundImage" src="<?php echo $sectionBackgroundImage;?>" />
										    </p>										    
											<input class="sectionBackAttachemetUI inputText" type="hidden" name="<?php echo $post_custom_meta_data;?>[sectionBackAttachemetID][]" value="<?php echo $sectionBAttachement;?>" />											
									</div>

									<div class="sk_admin_span3">
											<p class="pTitle"><strong>Background settings</strong></p>
											<label class="checkbox">
											  <input class="isSectionBack" type="checkbox"<?php echo $isSectionBackInputValChecked;?>> Use background image
											</label>
											<input class="isSectionBackInput" type="hidden" name="<?php echo $post_custom_meta_data;?>[isSectionBackInput][]" value="<?php echo $isSectionBackInputVal;?>" />
											<div class="spacer10"></div>
											<label class="checkbox">
											  <input class="isSectionBackFixed" type="checkbox"<?php echo $isSectionBackFixedInputValChecked;?>> Is background fixed position
											</label>
											<input class="isSectionBackFixedInput" type="hidden" name="<?php echo $post_custom_meta_data;?>[isSectionBackFixedInput][]" value="<?php echo $isSectionBackFixedInputVal;?>" />
											<div class="spacer10"></div>										
											<label class="checkbox">
											  <input class="isSectionBackRepeat" type="checkbox"<?php echo $isSectionBackRepeatInputValChecked;?>> Repeat image (only if pattern)
											</label>	
											<input class="isSectionBackRepeatInput" type="hidden" name="<?php echo $post_custom_meta_data;?>[isSectionBackRepeatInput][]" value="<?php echo $isSectionBackRepeatInputVal;?>" />																																																					
											
											<div class="spacer10"></div>
											<label class="checkbox checkboxGravity">
											  <input class="isSectionArrowDown" type="checkbox"<?php echo $isSectionArrowDownInputValChecked;?>> Activate section arrow down (only if is background color)
											</label>	
											<input class="isSectionArrowDownInput" type="hidden" name="<?php echo $post_custom_meta_data;?>[isSectionArrowDownInput][]" value="<?php echo $isSectionArrowDownInputVal;?>" />												

											<div class="spacer10"></div>
											<label class="checkbox checkboxGravity">
											  <input class="isSectionArrowUp" type="checkbox"<?php echo $isSectionArrowUpInputValChecked;?>> Activate section arrow up (only if is background color)
											</label>	
											<input class="isSectionArrowUpInput" type="hidden" name="<?php echo $post_custom_meta_data;?>[isSectionArrowUpInput][]" value="<?php echo $isSectionArrowUpInputVal;?>" />											
									</div>									

									<div class="sk_clear_fx"></div>							
								</div>
								<!--section background-->


							 	<div class="phline"></div>
							 	<!--scroll duration-->
							 	<div class="sk_admin_row">
							 		<div class="sk_admin_span5">
											<p class="pTitle"><strong>Section scroll duration (pixels)</strong></p>
											<input style="height: 30px;" class="smallInputText section_scroll_duration" type="text" name="<?php echo $post_custom_meta_data;?>[section_scroll_duration][]" value="<?php echo $sectionScrollDuration;?>" />											
											<div class="spacer10"></div>
									</div>	


							 		<div class="sk_admin_span5">
										<p class="pTitle"><strong>Full width content</strong></p>							 				
											<label class="checkbox">												
												<input class="isFullContentCB" type="checkbox"<?php echo $isFullContentInputValChecked;?>> Is full width content
											</label>			
											<input class="isFullContentInput" type="hidden" name="<?php echo $post_custom_meta_data;?>[isFullContentInput][]" value="<?php echo $isFullContentInputVal; ?>" />							
										<div class="spacer10"></div>
									</div>

									<div class="sk_clear_fx"></div>																		 	
								</div>
								<!--/scroll duration-->								
								<div class="spacer10"></div>


								<!--editor-->
								<div class="custom_editors">									
									<?php
										$editor_content = (isset($editor_contents[$i]))?$editor_contents[$i]:'';
										wp_editor( $editor_content, uniqid('custom_editor'), array("textarea_name"=>$post_custom_meta_data.'[sectionContent][]', "wpautop"=>true));
									?>
								</div>
								<!--/editor-->


							 </div>							 
						</div>
						<!--/section group-->
					<?php endfor;?>
				
				<?php endif;?>
				<!--/if data-->	

			</div>	
			<!--/parallax container-->	
			<input class="dummy" type="hidden" name="<?php echo $post_custom_meta_data;?>[dummy][]" value="" />

		</div>		
		
		<?php
	}
		
		
}


?>