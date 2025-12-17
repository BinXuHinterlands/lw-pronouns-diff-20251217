<?php 
$user_id = 0;
if(isset($user->ID)){
	$user_id = $user->ID;	
}

$lw_area_code = get_user_meta( $user_id, 'lw_area_code', true);
$lw_emergency_area_code = get_user_meta( $user_id, 'lw_emergency_area_code', true);

$lw_mobilephone = get_user_meta( $user_id, 'lw_mobilephone', true);
$lw_registration_birthday = get_user_meta( $user_id, 'lw_registration_birthday', true);
$lw_registration_guardian_first_name = get_user_meta( $user_id, 'lw_registration_guardian_first_name', true);
$lw_registration_guardian_last_name = get_user_meta( $user_id, 'lw_registration_guardian_last_name', true);
$lw_registration_guardian_email = get_user_meta( $user_id, 'lw_registration_guardian_email', true);

$lw_registration_guardian_mobile_phone = get_user_meta( $user_id, 'lw_registration_guardian_mobile_phone', true);
$lw_contact_you = get_user_meta( $user_id, 'lw_contact_you', true);
$lw_registration_pronouns = get_user_meta( $user_id, 'lw_registration_pronouns', true);
$lw_registration_pronouns_ci = strtolower($lw_registration_pronouns);
$__lw_allowed_pronouns = array('she','her','he','him','they','them');
$lw_registration_pronouns_tokens = array_values(array_unique(array_filter(preg_split('/[\s,;\/]+/', $lw_registration_pronouns_ci), function($t) use ($__lw_allowed_pronouns){
    return in_array($t, $__lw_allowed_pronouns, true);
})));
$lw_pronouns_order_initial = implode('/', $lw_registration_pronouns_tokens);
$lw_sibling_spent_time = get_user_meta( $user_id, 'lw_sibling_spent_time', true);
$lw_form_type= get_user_meta( $user_id, 'lw_form_type', true);
$lw_registration_guardian_email= get_user_meta( $user_id, 'lw_registration_guardian_email', true);
$lw_referral_source = get_user_meta( $user_id, 'lw_referral_source', true);
$lw_state = get_user_meta( $user_id, 'lw_state', true);


 ?>
            <?php if ($lw_form_type=="form_a_direct"): ?>
            <h2>Registration Info: Known to STL (Direct) Field</h2>
            <table class="form-table">
                <tr>
                    <th>Who connected you to Livewire</th>
                    <td>
                        <input type="text" name="lw_referral_source" value="<?php echo $lw_referral_source; ?>" class="form-control" />
                    </td>
                </tr>
            </table>
            <?php endif; ?>
        	<h3>Registration Info: most data is deleted once sent to CRM</h3>
             <table class="form-table">
            <tr>
            	<th>Registration Form</th>
                <td>
                   <select name="lw_form_type" id="lw_form_type">
                   	<option value="">None</option>
                   	<option value="form_a" <?php echo (isset($lw_form_type) && $lw_form_type=="form_a")?"selected":""?>>Known to STL</option>
                    <option value="form_a_direct" <?php echo (isset($lw_form_type) && $lw_form_type=="form_a_direct")?"selected":""?>>Known to STL (Direct)</option>
                   	<option value="form_b"  <?php echo (isset($lw_form_type) && $lw_form_type=="form_b")?"selected":""?>>Known to WG</option>
                   	<option value="form_c"  <?php echo (isset($lw_form_type) && $lw_form_type=="form_c")?"selected":""?>>Public</option>
                   </select> 
                </td>
            </tr>
            </table>
           	<div class="form_a">
           		 <table class="form-table">
            
             <tr>
            	<th>Birthday</th>
                <td>
                    <input type="date" name="form_a_lw_registration_birthday" value="<?php echo $lw_registration_birthday; ?>" class="form-control" />
                    
                </td>
            </tr>
            
            <tr>
            	<th>Pronouns</th>
                <td>
                    <select name="form_a_lw_registration_pronouns[]" id="form_a_lw_registration_pronouns" class="form-control lw-pronouns-select" multiple data-placeholder="">
                        <option value="she" <?php echo in_array('she', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>She</option>
                        <option value="her" <?php echo in_array('her', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>Her</option>
                        <option value="he" <?php echo in_array('he', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>He</option>
                        <option value="him" <?php echo in_array('him', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>Him</option>
                        <option value="they" <?php echo in_array('they', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>They</option>
                        <option value="them" <?php echo in_array('them', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>Them</option>
                    </select>
                    <input type="hidden" name="form_a_lw_registration_pronouns_order" value="<?php echo esc_attr(get_user_meta($user_id,'form_a_lw_registration_pronouns_order',true) ?: $lw_pronouns_order_initial); ?>" />
                </td>
            </tr>
           
           <tr>
            	<th>Area Code</th>
                <td>
                     <select name="form_a_lw_area_code" id="form_a_lw_area_code">
                    	<option value="+61" <?php echo ($lw_area_code=="+61")?"selected":""; ?>>+61</option>
                        <option value="+64" <?php echo ($lw_area_code=="+64")?"selected":""; ?>>+64</option>
                     </select>
                    
                </td>
            </tr>
            
            <tr>
            	<th>Phone Number</th>
                <td>
                    <input type="text" name="form_a_lw_mobilephone" value="<?php echo $lw_mobilephone; ?>" class="form-control" />
                    
                </td>
            </tr>
            
            
            <tr>
                <th>State / Location</th>
                <td>
                    <select name="lw_state" class="required">
                        <option value="">Select State / Location</option>
                        <option value="NSW" <?php echo ($lw_state=="NSW")?"selected":""; ?>>NSW - New South Wales</option>
                        <option value="VIC" <?php echo ($lw_state=="VIC")?"selected":""; ?>>VIC - Victoria</option>
                        <option value="QLD" <?php echo ($lw_state=="QLD")?"selected":""; ?>>QLD - Queensland</option>
                        <option value="WA" <?php echo ($lw_state=="WA")?"selected":""; ?>>WA - Western Australia</option>
                        <option value="SA" <?php echo ($lw_state=="SA")?"selected":""; ?>>SA - South Australia</option>
                        <option value="TAS" <?php echo ($lw_state=="TAS")?"selected":""; ?>>TAS - Tasmania</option>
                        <option value="ACT" <?php echo ($lw_state=="ACT")?"selected":""; ?>>ACT - Australian Capital Territory</option>
                        <option value="NT" <?php echo ($lw_state=="NT")?"selected":""; ?>>NT - Northern Territory</option>
                        <option value="NZ" <?php echo ($lw_state=="NZ")?"selected":""; ?>>New Zealand</option>
                    </select>
                </td>
            </tr>
           
            <tr>
            	<th>Emergency Contact's First Name</th>
                <td>
                    <input type="text" name="form_a_lw_registration_guardian_first_name" value="<?php echo $lw_registration_guardian_first_name; ?>" class="form-control" />
                    
                </td>
            </tr>
            
              <tr>
            	<th>Emergency Contact's Last Name</th>
                <td>
                    <input type="text" name="form_a_lw_registration_guardian_last_name" value="<?php echo $lw_registration_guardian_last_name; ?>" class="form-control" />
                    
                </td>
            </tr>
            
            
              <tr>
            	<th>Emergency Contact's Email</th>
                <td>
                    <input type="text" name="form_a_lw_registration_guardian_email" value="<?php echo $lw_registration_guardian_email; ?>" class="form-control" />
                    
                </td>
            </tr>
            
            <tr>
            	<th>Emergency Contact Area Code</th>
                <td>
                     <select name="form_a_lw_emergency_area_code" id="form_a_lw_emergency_area_code">
                    	<option value="+61" <?php echo ($lw_emergency_area_code=="+61")?"selected":""; ?>>+61</option>
                        <option value="+64" <?php echo ($lw_emergency_area_code=="+64")?"selected":""; ?>>+64</option>
                     </select>
                    
                </td>
            </tr>
            
              <tr>
            	<th>Emergency Contact's Phone Number</th>
                <td>
                    <input type="text" name="form_a_lw_registration_guardian_mobile_phone" value="<?php echo $lw_registration_guardian_mobile_phone; ?>" class="form-control" />
                    
                </td>
            </tr>
           
            <tr>
            	<th>Anything we need to know before we contact your emergency contact?</th>
                <td>
                   <textarea placeholder="Tell us a good time to call, or any other communication preferences " name="form_a_lw_contact_you"><?php echo $lw_contact_you; ?></textarea>
                    
                </td>
            </tr>
            
           
            
        </table>
       		 </div>

                <div class="form_a_direct">
           		 <table class="form-table">
            
             <tr>
            	<th>Birthday</th>
                <td>
                    <input type="date" name="form_a_lw_registration_birthday" value="<?php echo $lw_registration_birthday; ?>" class="form-control" />
                    
                </td>
            </tr>
            
            <tr>
            <th>Pronouns</th>
            <td>
                <select name="form_a_lw_registration_pronouns[]" id="form_a_direct_lw_registration_pronouns" class="form-control lw-pronouns-select" multiple data-placeholder="Your Pronouns">
                    <option value="she" <?php echo in_array('she', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>She</option>
                    <option value="her" <?php echo in_array('her', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>Her</option>
                    <option value="he" <?php echo in_array('he', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>He</option>
                    <option value="him" <?php echo in_array('him', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>Him</option>
                    <option value="they" <?php echo in_array('they', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>They</option>
                    <option value="them" <?php echo in_array('them', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>Them</option>
                </select>
                <input type="hidden" name="form_a_lw_registration_pronouns_order" value="<?php echo esc_attr(get_user_meta($user_id,'form_a_lw_registration_pronouns_order',true) ?: $lw_pronouns_order_initial); ?>" />
            </td>
        </tr>
           
           <tr>
            	<th>Area Code</th>
                <td>
                     <select name="form_a_lw_area_code" id="form_a_lw_area_code">
                    	<option value="+61" <?php echo ($lw_area_code=="+61")?"selected":""; ?>>+61</option>
                        <option value="+64" <?php echo ($lw_area_code=="+64")?"selected":""; ?>>+64</option>
                     </select>
                    
                </td>
            </tr>
            
            <tr>
            	<th>Phone Number</th>
                <td>
                    <input type="text" name="form_a_lw_mobilephone" value="<?php echo $lw_mobilephone; ?>" class="form-control" />
                    
                </td>
            </tr>
            
            <tr>
                <th>State / Location</th>
                <td>
                    <select name="lw_state" class="required">
                        <option value="">Select State / Location</option>
                        <option value="NSW" <?php echo ($lw_state=="NSW")?"selected":""; ?>>NSW - New South Wales</option>
                        <option value="VIC" <?php echo ($lw_state=="VIC")?"selected":""; ?>>VIC - Victoria</option>
                        <option value="QLD" <?php echo ($lw_state=="QLD")?"selected":""; ?>>QLD - Queensland</option>
                        <option value="WA" <?php echo ($lw_state=="WA")?"selected":""; ?>>WA - Western Australia</option>
                        <option value="SA" <?php echo ($lw_state=="SA")?"selected":""; ?>>SA - South Australia</option>
                        <option value="TAS" <?php echo ($lw_state=="TAS")?"selected":""; ?>>TAS - Tasmania</option>
                        <option value="ACT" <?php echo ($lw_state=="ACT")?"selected":""; ?>>ACT - Australian Capital Territory</option>
                        <option value="NT" <?php echo ($lw_state=="NT")?"selected":""; ?>>NT - Northern Territory</option>
                        <option value="NZ" <?php echo ($lw_state=="NZ")?"selected":""; ?>>New Zealand</option>
                    </select>
                </td>
            </tr>
           
            <tr>
            	<th>Emergency Contact's First Name</th>
                <td>
                    <input type="text" name="form_a_lw_registration_guardian_first_name" value="<?php echo $lw_registration_guardian_first_name; ?>" class="form-control" />
                    
                </td>
            </tr>
            
              <tr>
            	<th>Emergency Contact's Last Name</th>
                <td>
                    <input type="text" name="form_a_lw_registration_guardian_last_name" value="<?php echo $lw_registration_guardian_last_name; ?>" class="form-control" />
                    
                </td>
            </tr>
            
            
              <tr>
            	<th>Emergency Contact's Email</th>
                <td>
                    <input type="text" name="form_a_lw_registration_guardian_email" value="<?php echo $lw_registration_guardian_email; ?>" class="form-control" />
                    
                </td>
            </tr>
            
            <tr>
            	<th>Emergency Contact Area Code</th>
                <td>
                     <select name="form_a_lw_emergency_area_code" id="form_a_lw_emergency_area_code">
                    	<option value="+61" <?php echo ($lw_emergency_area_code=="+61")?"selected":""; ?>>+61</option>
                        <option value="+64" <?php echo ($lw_emergency_area_code=="+64")?"selected":""; ?>>+64</option>
                     </select>
                    
                </td>
            </tr>
            
              <tr>
            	<th>Emergency Contact's Phone Number</th>
                <td>
                    <input type="text" name="form_a_lw_registration_guardian_mobile_phone" value="<?php echo $lw_registration_guardian_mobile_phone; ?>" class="form-control" />
                    
                </td>
            </tr>
           
            <tr>
            	<th>Anything we need to know before we contact your emergency contact?</th>
                <td>
                   <textarea placeholder="Tell us a good time to call, or any other communication preferences " name="form_a_lw_contact_you"><?php echo $lw_contact_you; ?></textarea>
                    
                </td>
            </tr>
            
           
            
        </table>
       		 </div>
             
             
             <div class="form_b">
           		 <table class="form-table">
          	 <tr>
            	<th>Pronouns</th>
                <td>
                    <select name="form_b_lw_registration_pronouns[]" id="form_b_lw_registration_pronouns" class="form-control lw-pronouns-select" multiple data-placeholder="Your Pronouns">
                        <option value="she" <?php echo in_array('she', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>She</option>
                        <option value="her" <?php echo in_array('her', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>Her</option>
                        <option value="he" <?php echo in_array('he', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>He</option>
                        <option value="him" <?php echo in_array('him', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>Him</option>
                        <option value="they" <?php echo in_array('they', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>They</option>
                        <option value="them" <?php echo in_array('them', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>Them</option>
                    </select>
                    <input type="hidden" name="form_b_lw_registration_pronouns_order" value="<?php echo esc_attr(get_user_meta($user_id,'form_b_lw_registration_pronouns_order',true)); ?>" />
                </td>
            </tr>
          
            <tr>
            	<th>Birthday</th>
                <td>
                    <input type="date" name="form_b_lw_registration_birthday" value="<?php echo $lw_registration_birthday; ?>" class="form-control" />
                    
                </td>
            </tr>

            <tr>
                <th>State / Location</th>
                <td>
                    <select name="lw_state" class="required">
                        <option value="">Select State / Location</option>
                        <option value="NSW" <?php echo ($lw_state=="NSW")?"selected":""; ?>>NSW - New South Wales</option>
                        <option value="VIC" <?php echo ($lw_state=="VIC")?"selected":""; ?>>VIC - Victoria</option>
                        <option value="QLD" <?php echo ($lw_state=="QLD")?"selected":""; ?>>QLD - Queensland</option>
                        <option value="WA" <?php echo ($lw_state=="WA")?"selected":""; ?>>WA - Western Australia</option>
                        <option value="SA" <?php echo ($lw_state=="SA")?"selected":""; ?>>SA - South Australia</option>
                        <option value="TAS" <?php echo ($lw_state=="TAS")?"selected":""; ?>>TAS - Tasmania</option>
                        <option value="ACT" <?php echo ($lw_state=="ACT")?"selected":""; ?>>ACT - Australian Capital Territory</option>
                        <option value="NT" <?php echo ($lw_state=="NT")?"selected":""; ?>>NT - Northern Territory</option>
                        <option value="NZ" <?php echo ($lw_state=="NZ")?"selected":""; ?>>New Zealand</option>
                    </select>
                </td>
            </tr>
            
           </table>
       		 </div>
        		<div class="form_c">
           		 <table class="form-table">
           <tr>
            <th>Pronouns</th>
            <td>
                <select name="form_c_lw_registration_pronouns[]" id="form_c_lw_registration_pronouns" class="form-control lw-pronouns-select" multiple data-placeholder="Your Pronouns">
                    <option value="she" <?php echo in_array('she', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>She</option>
                    <option value="her" <?php echo in_array('her', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>Her</option>
                    <option value="he" <?php echo in_array('he', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>He</option>
                    <option value="him" <?php echo in_array('him', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>Him</option>
                    <option value="they" <?php echo in_array('they', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>They</option>
                    <option value="them" <?php echo in_array('them', $lw_registration_pronouns_tokens, true)?'selected':''; ?>>Them</option>
                </select>
                <input type="hidden" name="form_c_lw_registration_pronouns_order" value="<?php echo esc_attr(get_user_meta($user_id,'form_c_lw_registration_pronouns_order',true)); ?>" />
            </td>
            </tr>
          
            
            <tr>
            	<th>Birthday</th>
                <td>
                    <input type="date" name="form_c_lw_registration_birthday" value="<?php echo $lw_registration_birthday; ?>" class="form-control" />
                    
                </td>
            </tr>
            
              <tr>
            	<th>Have you or your sibling spent time in hospital and/or have a chronic or serious health condition or disability?</th>
                <td>
                    <input type="radio" name="form_c_lw_sibling_spent_time" <?php echo ($lw_sibling_spent_time=="yes")?"checked":""; ?> value="yes" class="form-control " />Yes<br>
                    <input type="radio" name="form_c_lw_sibling_spent_time" value="no"  <?php echo ($lw_sibling_spent_time=="" || $lw_sibling_spent_time=="no")?"checked":""; ?> class="form-control " />No
                    
                </td>
            </tr>
            
             <tr>
            	<th>Area Code</th>
                <td>
                     <select name="form_c_lw_area_code" id="form_c_lw_area_code">
                    	<option value="+61" <?php echo ($lw_area_code=="+61")?"selected":""; ?>>+61</option>
                        <option value="+64" <?php echo ($lw_area_code=="+64")?"selected":""; ?>>+64</option>
                     </select>
                    
                </td>
            </tr>
            
              <tr>
            	<th>Phone Number</th>
                <td>
                    <input type="text" name="form_c_lw_mobilephone" value="<?php echo $lw_mobilephone; ?>" class="form-control" />
                    
                </td>
            </tr>
            
              <tr>
            	<th>State / Location</th>
                <td>
                    <select name="lw_state" class="required">
                        <option value="">Select State / Location</option>
                        <option value="NSW" <?php echo ($lw_state=="NSW")?"selected":""; ?>>NSW - New South Wales</option>
                        <option value="VIC" <?php echo ($lw_state=="VIC")?"selected":""; ?>>VIC - Victoria</option>
                        <option value="QLD" <?php echo ($lw_state=="QLD")?"selected":""; ?>>QLD - Queensland</option>
                        <option value="WA" <?php echo ($lw_state=="WA")?"selected":""; ?>>WA - Western Australia</option>
                        <option value="SA" <?php echo ($lw_state=="SA")?"selected":""; ?>>SA - South Australia</option>
                        <option value="TAS" <?php echo ($lw_state=="TAS")?"selected":""; ?>>TAS - Tasmania</option>
                        <option value="ACT" <?php echo ($lw_state=="ACT")?"selected":""; ?>>ACT - Australian Capital Territory</option>
                        <option value="NT" <?php echo ($lw_state=="NT")?"selected":""; ?>>NT - Northern Territory</option>
                        <option value="NZ" <?php echo ($lw_state=="NZ")?"selected":""; ?>>New Zealand</option>
                    </select>
                </td>
            </tr>
            
              <tr>
            	<th>Emergency Contact's First Name</th>
                <td>
                    <input type="text" name="form_c_lw_registration_guardian_first_name" value="<?php echo $lw_registration_guardian_first_name; ?>" class="form-control" />
                    
                </td>
            </tr>
            
              <tr>
            	<th>Emergency Contact's Last Name</th>
                <td>
                    <input type="text" name="form_c_lw_registration_guardian_last_name" value="<?php echo $lw_registration_guardian_last_name; ?>" class="form-control" />
                    
                </td>
            </tr>
            
              <tr>
            	<th>Emergency Contact's Email</th>
                <td>
                    <input type="text" name="form_c_lw_registration_guardian_email" value="<?php echo $lw_registration_guardian_email; ?>" class="form-control" />
                    
                </td>
            </tr>
            
              <tr>
            	<th>Emergency Contact Area Code</th>
                <td>
                     <select name="form_c_lw_emergency_area_code" id="form_c_lw_emergency_area_code">
                    	<option value="+61" <?php echo ($lw_emergency_area_code=="+61")?"selected":""; ?>>+61</option>
                        <option value="+64" <?php echo ($lw_emergency_area_code=="+64")?"selected":""; ?>>+64</option>
                     </select>
                    
                </td>
            </tr>
            
              <tr>
            	<th>Emergency Contact's Phone Number</th>
                <td>
                    <input type="text" name="form_c_lw_registration_guardian_mobile_phone" value="<?php echo $lw_registration_guardian_mobile_phone; ?>" class="form-control" />
                    
                </td>
            </tr>
            
             <tr>
            	<th>Anything we need to know before we contact your emergency contact?</th>
                <td>
                    <textarea placeholder="Tell us a good time to call, or any other communication preferences " name="form_c_lw_contact_you"><?php echo $lw_contact_you; ?></textarea>
                    
                </td>
            </tr>
            
           
            
        </table>
       		 </div>

        <script>
        function showLWRegistrationFields(){
            var lw_form_type = jQuery("#lw_form_type").val();
            var $sections = jQuery(".form_a,.form_a_direct,.form_b,.form_c");
            $sections.hide().find('input,select,textarea').prop('disabled', true);
            var selector = null;
            if(lw_form_type==="form_a"){ selector = ".form_a"; }
            else if(lw_form_type==="form_a_direct"){ selector = ".form_a_direct"; }
            else if(lw_form_type==="form_b"){ selector = ".form_b"; }
            else if(lw_form_type==="form_c"){ selector = ".form_c"; }
            if(selector){
                var $visible = jQuery(selector);
                $visible.show().find('input,select,textarea').prop('disabled', false);
            }
            console.log('lw_form_type', lw_form_type);
            initPronounsOrderForVisible();
        }
        
    
        function initPronounsOrderForVisible(){
            var allowed = ['she','her','he','him','they','them'];
            jQuery('select.lw-pronouns-select:visible').each(function(){
                var $sel = jQuery(this);
                var hiddenName = ($sel.attr('name')||'').replace('[]','_order');
                var orderStr = jQuery('input[name="'+hiddenName+'"]').val() || '';
                var order = (orderStr ? orderStr.split('/') : ($sel.val()||[]))
                    .map(function(s){ return String(s||'').trim().toLowerCase(); })
                    .filter(function(v){ return allowed.indexOf(v) > -1; });
                console.log('initPronouns hidden', hiddenName, orderStr);
                $sel.val(order).trigger('change');
                $sel.data('lwPronounOrder', order.slice());
                console.log('initPronouns order', $sel.attr('id'), order);
            });
        }
        
    
        function setPronounsOrder(){
            initPronounsOrderForVisible();
        }
        
    
        function updateHiddenPronounsOrder(){
            var allowed = ['she','her','he','him','they','them'];
            jQuery('select.lw-pronouns-select:visible').each(function(){
                var $sel = jQuery(this);
                var order = $sel.data('lwPronounOrder') || ($sel.val()||[]);
                order = order.filter(function(v){ return allowed.indexOf(v) > -1; });
                var hiddenName = ($sel.attr('name')||'').replace('[]','_order');
                jQuery('input[name="'+hiddenName+'"]').val(order.join('/'));
                console.log('updateHidden', hiddenName, order.join('/'));
            });
        }
        
    
        function setPronounsOrderWhenReady(){
            var attempts = (setPronounsOrderWhenReady._attempts||0);
            setPronounsOrder();
            var anyMissing = false;
            jQuery('select.lw-pronouns-select').each(function(){ if(!jQuery(this).data('select2')){ anyMissing = true; } });
            if(anyMissing && attempts < 10){
                setPronounsOrderWhenReady._attempts = attempts + 1;
                setTimeout(setPronounsOrderWhenReady, 200);
            }
            console.log('setPronouns attempt', attempts, anyMissing);
        }
        
        jQuery(document).ready(function(){
            console.log('ready');
            showLWRegistrationFields();
            setTimeout(setPronounsOrderWhenReady, 0);
        });
        jQuery(document).on("change","#lw_form_type",function(){
            showLWRegistrationFields();
            setTimeout(setPronounsOrderWhenReady, 0);
        });
        
        jQuery(document).on('select2:select','select.lw-pronouns-select',function(e){
            var allowed = ['she','her','he','him','they','them'];
            var id = String((e.params && e.params.data && e.params.data.id) || '').toLowerCase();
            if(allowed.indexOf(id) === -1){ return; }
            var $sel = jQuery(this);
            var order = $sel.data('lwPronounOrder') || [];
            if(order.indexOf(id) === -1){ order.push(id); }
            $sel.data('lwPronounOrder', order);
            $sel.val(order).trigger('change');
            updateHiddenPronounsOrder();
            console.log('select', $sel.attr('id'), order);
        });
        jQuery(document).on('select2:unselect','select.lw-pronouns-select',function(e){
            var id = String((e.params && e.params.data && e.params.data.id) || '').toLowerCase();
            var $sel = jQuery(this);
            var order = $sel.data('lwPronounOrder') || [];
            $sel.data('lwPronounOrder', order.filter(function(v){ return v !== id; }));
            updateHiddenPronounsOrder();
            console.log('unselect', $sel.attr('id'), $sel.data('lwPronounOrder'));
        });
        jQuery(document).on('change','select.lw-pronouns-select',function(){
            updateHiddenPronounsOrder();
        });
        </script>
        <script>
        jQuery(function($){
            function normalizeOrder(raw) {
                if (!raw) return [];
                return String(raw).split(/[,\s\/;]+/).map(function(s){return s.trim();}).filter(Boolean);
            }
            function reorderOptions($sel, order) {
                var map = {};
                for (var i=0;i<order.length;i++) map[order[i]] = true;
                for (var j=0;j<order.length;j++) {
                    var val = order[j];
                    var $opt = $sel.find('option[value="'+val+'"]');
                    if ($opt.length) {
                        $opt.detach();
                        $sel.append($opt);
                    }
                }
            }
            function applyOrder($sel, order) {
                var selected = $sel.val() || [];
                var desired = [];
                for (var i=0;i<order.length;i++) if (selected.indexOf(order[i]) !== -1) desired.push(order[i]);
                for (var j=0;j<selected.length;j++) if (desired.indexOf(selected[j]) === -1) desired.push(selected[j]);
                reorderOptions($sel, desired);
                $sel.val(desired).trigger('change.select2');
                $sel.data('lwPronounOrder', desired.slice());
                var $hidden = $sel.closest('td').find('input[name$="_lw_registration_pronouns_order"]');
                if ($hidden.length) $hidden.val(desired.join('/'));
            }
            function initPronounsOrderForVisible() {
                var $sel = $('select.lw-pronouns-select:visible');
                if (!$sel.length) return;
                var $hidden = $sel.closest('td').find('input[name$="_lw_registration_pronouns_order"]');
                var hiddenOrder = normalizeOrder($hidden.length ? $hidden.val() : '');
                var cacheOrder = $sel.data('lwPronounOrder') || [];
                var useOrder = hiddenOrder.length ? hiddenOrder : cacheOrder;
                applyOrder($sel, useOrder);
            }
            $(document).on('select2:select', 'select.lw-pronouns-select', function(e){
                var $sel = $(this);
                var order = $sel.data('lwPronounOrder') || [];
                var val = e.params && e.params.data ? e.params.data.id : null;
                if (val) {
                    order = order.filter(function(x){return x !== val;});
                    order.push(val);
                    applyOrder($sel, order);
                }
            });
            $(document).on('select2:unselect', 'select.lw-pronouns-select', function(e){
                var $sel = $(this);
                var order = $sel.data('lwPronounOrder') || [];
                var val = e.params && e.params.data ? e.params.data.id : null;
                if (val) {
                    order = order.filter(function(x){return x !== val;});
                    applyOrder($sel, order);
                }
            });
            $(document).on('change', 'select.lw-pronouns-select', function(){
                var $sel = $(this);
                var selected = $sel.val() || [];
                var order = $sel.data('lwPronounOrder') || [];
                var merged = [];
                for (var i=0;i<order.length;i++) if (selected.indexOf(order[i]) !== -1) merged.push(order[i]);
                for (var j=0;j<selected.length;j++) if (merged.indexOf(selected[j]) === -1) merged.push(selected[j]);
                applyOrder($sel, merged);
            });
            $(document).ready(function(){
                initPronounsOrderForVisible();
            });
            $('#lw_form_type').on('change', function(){
                setTimeout(initPronounsOrderForVisible, 0);
            });
        });
        </script>