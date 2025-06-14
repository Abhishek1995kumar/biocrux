<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include("head.php"); ?>
      <title>Register Your Pet Shop - VHD Mumbai</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
   </head>
   <body>
      <?php include("header.php"); ?>
      <section class="banner" id="community-inner-banner">
         <img src="./images/register-flag-mobile.png" class="flag-image" alt="Register and be a part" id="community-flag">
         <img src="./images/register-hands-mobile.png" class="hands-image" alt="Register and be a part" id="community-hand">
         <div class="caption-box">
            <p class="text-center f-semibold">Join Community</p>
            <h4 class="text-center">Register your pet shop and give our furry friends a <br>better life</h4>
         </div>
      </section>

      <section class="announcements-main">
         <div class="container">
            <div class="community-section">
               <form class="form" action="" method="POST">
                  <p class="register-field-title pt-0">Enter your pet shop’s details</p>
                  <div class="row">
                     <div class="col-md-6 text-field pb-5">
                        <label for="shop_name">Shop Name<span>*</span></label>
                        <input placeholder="Enter shop name" type="text" name="shop_name" id="shop_name" min="0" minlength="1" maxlength="" autocomplete="on" value="" required>
                     </div>
                     <div class="col-md-6 text-field pb-5">
                        <label for="owner_name">Owner’s Name<span>*</span></label>
                        <input placeholder="Enter owner’s name" type="text" name="owner_name" id="owner_name" min="0" minlength="1" maxlength="" autocomplete="on" value="" required>
                     </div>
                     <div class="col-md-6 text-field">
                        <label for="email">Email ID<span>*</span></label>
                        <input placeholder="Enter Email ID" type="email" name="email" id="email" min="0" minlength="1" maxlength="" autocomplete="on" value="" required>
                     </div>
                     <div class="col-md-6 text-field">
                        <label for="mobile">Mobile No.<span>*</span></label>
                        <input placeholder="Enter Mobile No." type="text" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" name="mobile" id="mobile" min="0" minlength="10" maxlength="10" autocomplete="on" value="" required>
                     </div>
                  </div>
                  <p class="register-field-title pt-5">Enter your business information</p>
                  <div class="row">
                     <div class="col-md-6 text-field pb-5">
                        <label for="registeration_no">State registration number</label>
                        <input placeholder="Enter your State registration number" type="text" name="registeration_no" id="registeration_no" min="0" minlength="1" maxlength="" autocomplete="on" value="">
                     </div>
                     <div class="col-md-6 text-field pb-5">
                        <label for="experience">Years of Experience<span>*</span></label>
                        <input placeholder="Enter years of experience" type="number" name="experience" id="experience" min="0" minlength="1" autocomplete="on" value="" required>
                     </div>
                     <div class="col-md-12 text-field">
                        <label for="address">Address<span>*</span></label>
                        <div class="descrip-upload-wrapp col-md-12">
                           <textarea name="address" class="w-100" placeholder="Enter address" id="address" cols="25" rows="5"></textarea>
                        </div>
                     </div>
                  </div>
                  <p class="register-field-title pt-5">Enter the types of pet animals being sold at your shop</p>
                  <div class="row vr-location-wrapp pb-3">
                     <div class="input-wrapper custom-checklist text-field col-md-6" id="type-animal">
                        <div>
                           <label for="breeder_animals">Type of animal<span>*</span></label>
                           <div class="dropdown breeder_animals">
                              <input type="text" class="dropdown-btn" placeholder="Select animal that you breed">
                              <span class="icon_down_dir">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.653564 0.39359C1.01452 -0.0244185 1.64599 -0.0706713 2.064 0.290282L8.03925 5.44996C8.22591 5.61114 8.50222 5.61215 8.69005 5.45233L14.7624 0.285542C15.183 -0.0723571 15.8141 -0.0215063 16.172 0.39912C16.5299 0.819747 16.4791 1.45087 16.0585 1.80877L9.00687 7.80877C8.63121 8.1284 8.0786 8.12639 7.70527 7.80402L0.756871 1.80403C0.338863 1.44307 0.292611 0.811598 0.653564 0.39359Z" fill="#ABABAB"></path>
                                 </svg>
                              </span>
                              <span class="selectedcount"></span>
                              <div class="dropdown-content">
                                 <label><input type="checkbox" class="checkbox" value="dogs">Dogs</label>
                                 <label><input type="checkbox" class="checkbox" value="cats">Cats</label>
                                 <label><input type="checkbox" class="checkbox" value="birds">Birds</label>
                                 <label><input type="checkbox" class="checkbox" value="small-mammals">Small Mammals</label>
                                 <label><input type="checkbox" class="checkbox" value="reptiles">Reptiles</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <p class="register-field-title pt-5 pb-3">Are you totally committed to ethical practices in your shop</p>
                  <div class="d-flex checkbox-wrapp flex-column">
                     <div class="checkbox-btn">
                        <input name="ensuring_health" type="checkbox" id="ensuring_health" value="I ensure the well-being and health of animals in my shop">
                        <label for="ensuring_health">I ensure the well-being and health of animals in my shop</label>
                     </div>
                     <div class="checkbox-btn">
                        <input name="provide_true_info" type="checkbox" id="provide_true_info" value="I provide accurate information about the care and needs of each animal">
                        <label for="provide_true_info">I provide accurate information about the care and needs of each animal</label>
                     </div>
                     <div class="checkbox-btn position-relative">
                        <input name="sourced_from_reg_breeder" type="checkbox" id="sourced_from_reg_breeder" value="I sourced animals for selling from a registered breeder">
                        <label for="sourced_from_reg_breeder">I sourced animals for selling from a registered breeder</label>
                     </div>
                     <div class="checkbox-btn">
                        <input name="support_ownership" type="checkbox" id="support_ownership" value="I support and promote responsible pet ownership">
                        <label for="support_ownership">I support and promote responsible pet ownership</label>
                     </div>
                     <div class="checkbox-btn">
                        <input name="ensure_documentation" type="checkbox" id="ensure_documentation" value="I do not sell animals to individuals without proper documentation">
                        <label for="ensure_documentation">I do not sell animals to individuals without proper documentation</label>
                     </div>
                     <div class="checkbox-btn position-relative">
                        <input name="encourage_adoption" type="checkbox" id="encourage_adoption" value="I encourage customers to consider adoption from shelters">
                        <label for="encourage_adoption">I encourage customers to consider adoption from shelters</label>
                     </div>
                  </div>
                  <p class="register-field-title pt-5">Are you interested in participating in Sterilization and Vaccination drives?</p>
                  <div class="d-flex checkbox-wrapp flex-column pb-3">
                     <div class="checkbox-btn">
                        <input name="sterilization_drive" type="checkbox" id="sterilization_drive" value="Interested in participating in sterilization drives">
                        <label for="sterilization_drive">Interested in participating in sterilization drives</label>
                     </div>
                     <div class="checkbox-btn">
                        <input name="vaccination_drive" type="checkbox" id="vaccination_drive" value="Interested in participating in vaccination drives">
                        <label for="vaccination_drive">Interested in participating in vaccination drives</label>
                     </div>
                     <div class="checkbox-btn position-relative">
                        <input name="field_vaccination_drive" type="checkbox" id="field_vaccination_drive" value="Interested in participating in field vaccination drives">
                        <label for="field_vaccination_drive">Interested in participating in field vaccination drives</label>
                     </div>
                     <div class="checkbox-btn position-relative">
                        <input name="rescue_drive" type="checkbox" id="rescue_drive" value="Interested in participating in rescue and release programs">
                        <label for="rescue_drive">Interested in participating in rescue and release programs</label>
                     </div>
                  </div>                  
                  <div id="upload-certificate" class="pt-5 pb-5">
                     <p class="register-field-title pt-2 pb-4">Certificate & License Owned <span class="required-field text-black d-inline-flex fst-normal">(Max 3)</span></p>
                     <div class="dog-picture">
                        <label class="col-md-3 input-logo-wrapper" for="license_documents">
                           <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_1957_29898)">
                                 <path d="M12.832 7.58398C12.6773 7.58398 12.5289 7.64544 12.4196 7.75484C12.3102 7.86424 12.2487 8.01261 12.2487 8.16732V10.6249C12.2482 11.0559 12.0768 11.4692 11.772 11.774C11.4672 12.0788 11.054 12.2502 10.6229 12.2507H3.37445C2.94341 12.2502 2.53017 12.0788 2.22538 11.774C1.92059 11.4692 1.74916 11.0559 1.7487 10.6249V8.16732C1.7487 8.01261 1.68724 7.86424 1.57784 7.75484C1.46845 7.64544 1.32007 7.58398 1.16536 7.58398C1.01065 7.58398 0.862282 7.64544 0.752886 7.75484C0.643489 7.86424 0.582031 8.01261 0.582031 8.16732V10.6249C0.582803 11.3653 0.877252 12.0751 1.40076 12.5986C1.92428 13.1221 2.63409 13.4165 3.37445 13.4173H10.6229C11.3633 13.4165 12.0731 13.1221 12.5966 12.5986C13.1201 12.0751 13.4146 11.3653 13.4154 10.6249V8.16732C13.4154 8.01261 13.3539 7.86424 13.2445 7.75484C13.1351 7.64544 12.9867 7.58398 12.832 7.58398Z" fill="#01523F"></path>
                                 <path d="M3.91436 5.07961L6.41861 2.57536V9.91719C6.41861 10.0719 6.48007 10.2203 6.58947 10.3297C6.69886 10.4391 6.84724 10.5005 7.00195 10.5005C7.15666 10.5005 7.30503 10.4391 7.41443 10.3297C7.52382 10.2203 7.58528 10.0719 7.58528 9.91719V2.57536L10.0895 5.07961C10.1995 5.18587 10.3469 5.24467 10.4998 5.24334C10.6528 5.24201 10.7991 5.18066 10.9073 5.0725C11.0154 4.96435 11.0768 4.81804 11.0781 4.66509C11.0794 4.51215 11.0206 4.36479 10.9144 4.25478L7.41436 0.754776C7.30497 0.645418 7.15663 0.583984 7.00195 0.583984C6.84727 0.583984 6.69892 0.645418 6.58953 0.754776L3.08953 4.25478C2.98327 4.36479 2.92447 4.51215 2.9258 4.66509C2.92713 4.81804 2.98848 4.96435 3.09664 5.0725C3.20479 5.18066 3.3511 5.24201 3.50405 5.24334C3.65699 5.24467 3.80435 5.18587 3.91436 5.07961Z" fill="#01523F"></path>
                              </g>
                              <defs>
                                 <clipPath id="clip0_1957_29898">
                                    <rect width="14" height="14" fill="white"></rect>
                                 </clipPath>
                              </defs>
                           </svg>Upload
                        </label>
                        <input type="file" id="license_documents" name="license_documents" multiple="" accept=".png, .jpeg, .jpg, application/pdf" required>
                        <p class="upload-description">Max File Size : less than 5 mb</p>
                     </div>
                  </div>
                  <div id="upload-aadhar-card">
                     <p class="register-field-title pt-2 pb-0 mb-0">Upload your Aadhaar card</p>
                     <p class="required-field pb-4">(This field is mandatory)</p>
                     <div class="dog-picture">
                        <label class="col-md-3 input-logo-wrapper" for="aadhar_documents">
                           <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_1957_29898)">
                                 <path d="M12.832 7.58398C12.6773 7.58398 12.5289 7.64544 12.4196 7.75484C12.3102 7.86424 12.2487 8.01261 12.2487 8.16732V10.6249C12.2482 11.0559 12.0768 11.4692 11.772 11.774C11.4672 12.0788 11.054 12.2502 10.6229 12.2507H3.37445C2.94341 12.2502 2.53017 12.0788 2.22538 11.774C1.92059 11.4692 1.74916 11.0559 1.7487 10.6249V8.16732C1.7487 8.01261 1.68724 7.86424 1.57784 7.75484C1.46845 7.64544 1.32007 7.58398 1.16536 7.58398C1.01065 7.58398 0.862282 7.64544 0.752886 7.75484C0.643489 7.86424 0.582031 8.01261 0.582031 8.16732V10.6249C0.582803 11.3653 0.877252 12.0751 1.40076 12.5986C1.92428 13.1221 2.63409 13.4165 3.37445 13.4173H10.6229C11.3633 13.4165 12.0731 13.1221 12.5966 12.5986C13.1201 12.0751 13.4146 11.3653 13.4154 10.6249V8.16732C13.4154 8.01261 13.3539 7.86424 13.2445 7.75484C13.1351 7.64544 12.9867 7.58398 12.832 7.58398Z" fill="#01523F"></path>
                                 <path d="M3.91436 5.07961L6.41861 2.57536V9.91719C6.41861 10.0719 6.48007 10.2203 6.58947 10.3297C6.69886 10.4391 6.84724 10.5005 7.00195 10.5005C7.15666 10.5005 7.30503 10.4391 7.41443 10.3297C7.52382 10.2203 7.58528 10.0719 7.58528 9.91719V2.57536L10.0895 5.07961C10.1995 5.18587 10.3469 5.24467 10.4998 5.24334C10.6528 5.24201 10.7991 5.18066 10.9073 5.0725C11.0154 4.96435 11.0768 4.81804 11.0781 4.66509C11.0794 4.51215 11.0206 4.36479 10.9144 4.25478L7.41436 0.754776C7.30497 0.645418 7.15663 0.583984 7.00195 0.583984C6.84727 0.583984 6.69892 0.645418 6.58953 0.754776L3.08953 4.25478C2.98327 4.36479 2.92447 4.51215 2.9258 4.66509C2.92713 4.81804 2.98848 4.96435 3.09664 5.0725C3.20479 5.18066 3.3511 5.24201 3.50405 5.24334C3.65699 5.24467 3.80435 5.18587 3.91436 5.07961Z" fill="#01523F"></path>
                              </g>
                              <defs>
                                 <clipPath id="clip0_1957_29898">
                                    <rect width="14" height="14" fill="white"></rect>
                                 </clipPath>
                              </defs>
                           </svg>Upload
                        </label>
                        <input type="file" id="aadhar_documents" name="aadhar_documents" multiple="" accept=".png, .jpeg, .jpg, application/pdf" required>
                        <p class="upload-description">Max File Size : less than 5 mb</p>
                     </div>
                  </div>
                  <div class="pt-4 pt-lg-5 row">
                     <div class="terms-agreement">
                        <div class="declaration-wrapp">
                           <div class="declaration">
                              <input type="checkbox" id="is_agreed" name="is_agreed" value="0">
                              <label for="is_agreed">I agree to share my details with the BMC</label>
                           </div>
                           <div class="declaration">
                              <input type="checkbox" id="disclaimer" name="disclaimer" value="0">
                              <label for="disclaimer">Registration provides the BMC acknowledgement but does not imply licensing. Users are responsible for obtaining necessary licenses from the concerned issuing authority independently.</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <p class="form-recaptcha">This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank" rel="noopener noreferrer">Terms of Service</a> apply.</p>
                  </div>
                  <div class="pt-4 pt-lg-5 row">
                     <div class="col-lg-2 col-md-3 col-12">
                        <button type="submit" class="submit-btn">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </section>
    
      <?php include("footer.php"); ?>
      <script type="text/javascript">
         $(document).ready(function(){
            $('.selectedcount').hide();
            $('.checkbox-btn label').on('click', function(){
               $(this).parent().toggleClass('active');
            });

            // Toggle the dropdown content on button click
            $('.custom-checklist .dropdown-btn').click(function() {
               $(this).siblings('.dropdown-content').toggle();
            });

            // Update button text based on the selected checkboxes
            $('#type-animal.custom-checklist .dropdown-content input[type="checkbox"]').change(function() {
               var selected = [];
               var selectedCount = 0;
               $(this).parent().removeClass('active');

               // Collect selected options
               $('#type-animal.custom-checklist .dropdown-content input[type="checkbox"]:checked').each(function() {
                  selectedCount++;
                  $(this).parent().addClass('active');
                  selected.push($(this).val());
               });

               // Update the button text with selected options
               if (selectedCount > 0) {
                  $(this).parents('.dropdown').find('.selectedcount').show();
                  $(this).parents('.dropdown').find('.selectedcount').text(selectedCount);
               } else {
                  $(this).parents('.dropdown').find('.dropdown-btn').text('Select the type of animal');
                  $(this).parents('.dropdown').find('.selectedcount').hide();
               }
            });
         });
      </script>
   </body>
</html>