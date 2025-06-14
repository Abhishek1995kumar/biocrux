<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include("head.php"); ?>
      <title>VHD Mumbai: The Best Companions for all Furry Friends</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvA5CLURtNmtNY68Jv8DLpCQxrjwI7vRQ&libraries=places&callback=initMap" async defer></script>
   </head>
   <body>
      <?php include("header.php"); ?>
      <section class="banner" id="grievance-banner">
         <div class="caption-box">
            <p class="text-center f-semibold dark-green">Raise a grievance</p>
            <h4 class="text-center">Navigate every situation with a touch of <br>care and understanding</h4>
         </div>         
         <span class="paw">
            <svg width="373" height="394" viewBox="0 0 373 394" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M243.122 145.485C228.898 130.856 218.674 113.374 220.348 91.2047C222.093 68.0258 235.323 46.799 238.014 23.6678C240.075 5.97399 235.86 -12.0198 239.885 -29.406C246.075 -56.17 272.146 -75.4074 297.515 -75.7985C322.874 -76.1833 346.212 -60.1773 360.017 -37.9836C369.248 -23.1327 374.929 -5.45495 386.632 7.16543C399.057 20.5557 416.954 26.7625 429.872 39.611C443.761 53.4225 450.825 74.7736 448.367 95.5456C445.915 116.327 434.012 136.02 417.177 147.162C399.492 158.858 378.081 160.87 357.807 160.127C337.533 159.384 317.295 156.223 297.006 158.87C286.896 160.188 276.762 162.944 266.711 162.078C256.645 161.21 249.25 153.318 243.122 145.485Z" fill="#F8CA85"></path>
               <path d="M90.9253 43.8088C92.8931 31.8809 99.2668 20.9333 107.439 12.3278C115.611 3.72233 125.511 -2.72976 135.688 -8.19793C150.185 -15.9879 166.064 -22.045 181.863 -20.7516C197.663 -19.4583 213.247 -9.31715 217.656 6.91103C222.097 23.2366 214.194 41.8999 201.733 53.3618C189.28 64.8174 173.12 70.2368 157.259 73.4349C145.03 75.9042 132.364 77.2234 120.483 74.1407C108.617 71.0611 94.4883 67.4868 90.9253 43.8088Z" fill="#F8CA85"></path>
               <path d="M93.4235 232.111C74.7809 222.023 71.3638 197.308 75.5699 179.857C79.7759 162.407 90.4586 147.24 102.536 134.419C111.696 124.699 121.872 115.948 133.303 109.761C144.734 103.573 157.493 100.031 169.979 100.966C178.229 101.585 186.568 104.352 192.246 110.596C201.279 120.541 201.466 136.65 198.603 150.686C193 178.114 177.482 203.535 156.109 220.281C146.958 227.454 136.66 233.126 125.726 235.617C114.791 238.108 103.176 237.277 93.4235 232.111Z" fill="#F8CA85"></path>
               <path d="M329.179 312.685C340.3 311.406 350.825 305.317 359.326 297.148C367.827 288.978 374.455 278.794 380.214 268.243C388.402 253.219 395.102 236.584 395.015 219.527C394.928 202.47 386.685 185.026 372.054 179.143C357.33 173.231 339.583 180.417 328.161 192.994C316.74 205.57 310.613 222.543 306.552 239.35C303.414 252.316 301.311 265.825 303.316 278.794C305.317 291.778 307.628 307.199 329.179 312.685Z" fill="#F8CA85"></path>
               <path d="M151.527 296.728C159.54 317.521 182.139 322.942 198.565 319.642C214.986 316.332 229.752 305.891 242.453 293.786C252.078 284.6 260.875 274.246 267.402 262.355C273.92 250.472 278.087 236.976 278.094 223.453C278.108 214.519 276.129 205.338 270.754 198.786C262.198 188.356 247.323 187.022 234.158 189.125C208.41 193.243 183.838 208.177 166.856 230.032C159.584 239.385 153.622 250.085 150.552 261.687C147.477 273.28 147.436 285.847 151.527 296.728Z" fill="#F8CA85"></path>
            </svg>
         </span>
      </section>


      <section class="announcements-main">
         <div class="container">
            <div class="register-section">
               <form class="form" action="" method="POST">
                  <p class="register-field-title-top">I want to register a</p>
                  <div class="d-flex" id="categories">
                     <div class="className checkedbtn active">
                        <input name="application_category_id" type="radio" id="grievance" value="2" checked="">
                        <label for="grievance">Grievance</label>
                     </div>
                     <div class="className checkedbtn">
                        <input name="application_category_id" type="radio" id="request" value="1">
                        <label for="request">Request</label>
                     </div>
                  </div>
                  <p class="register-field-title">Type of the animal</p>
                  <div class="d-flex type">
                     <div class="type-btn">
                        <input name="animal_type_id" type="radio" id="animal_type_radio_1" value="1" checked="">
                        <label for="animal_type_radio_1">Dog</label>
                     </div>
                     <div class="type-btn">
                        <input name="animal_type_id" type="radio" id="animal_type_radio_2" value="2">
                        <label for="animal_type_radio_2">Cat</label>
                     </div>
                  </div>
                  <p class="register-field-title" id="grievance-request">Why do you want to raise a grievance</p>
                  <div class="d-flex type flex-wrap" id="grievance-request-fields">
                     <div class="type-btn dog_grievance">
                        <input name="application_type_id" type="radio" id="suspected-rabid-dog" value="1">
                        <label for="suspected-rabid-dog">Suspected Rabid Dog</label>
                     </div>
                     <div class="type-btn dog_grievance">
                        <input name="application_type_id" type="radio" id="stray-dog" value="2">
                        <label for="stray-dog">Stray Dog</label>
                     </div>
                     <div class="type-btn dog_grievance">
                        <input name="application_type_id" type="radio" id="dog-bite" value="3">
                        <label for="dog-bite">Dog Bite</label>
                     </div>
                     <div class="type-btn dog_grievance">
                        <input name="application_type_id" type="radio" id="pet-dog" value="4">
                        <label for="pet-dog">Pet Dog</label>
                     </div>
                     <div class="type-btn dog_grievance">
                        <input name="application_type_id" type="radio" id="increased-population-of-dogs" value="7">
                        <label for="increased-population-of-dogs">Increased Population of Dogs</label>
                     </div>
                     <div class="type-btn dog_grievance text-field">
                        <input name="application_type_id" type="radio" id="other_dog" value="8">
                        <input name="other_dog_reason" type="text" placeholder="Enter reason" id="other_dog_reason">
                        <label for="other_dog">Dog related other grievances</label>
                     </div>

                     <div class="type-btn dog_request d-none">
                        <input name="application_type_id" type="radio" id="dog-vaccination" value="5">
                        <label for="dog-vaccination">Dog Vaccination</label>
                     </div>
                     <div class="type-btn dog_request d-none">
                        <input name="application_type_id" type="radio" id="dog-sterilization" value="6">
                        <label for="dog-sterilization">Dog Sterilization</label>
                     </div>

                     <div class="type-btn cat_grievance d-none">
                        <input name="application_type_id" type="radio" id="increased-population-of-cats" value="9">
                        <label for="increased-population-of-cats">Increased Population of Cats</label>
                     </div>
                     <div class="type-btn cat_grievance d-none">
                        <input name="application_type_id" type="radio" id="cat-nuisance" value="10">
                        <label for="cat-nuisance">Cat Nuisance</label>
                     </div>
                     <div class="type-btn cat_grievance text-field d-none">
                        <input name="application_type_id" type="radio" id="other_cat" value="13">
                        <input name="other_cat_reason" type="text" placeholder="Enter reason" id="other_cat_reason">
                        <label for="other_cat">Cat related other grievances</label>
                     </div>

                     <div class="type-btn cat_request d-none">
                        <input name="application_type_id" type="radio" id="cat-sterilization" value="11">
                        <label for="cat-sterilization">Cat Sterilization</label>
                     </div>
                     <div class="type-btn cat_request d-none">
                        <input name="application_type_id" type="radio" id="cat-vaccination" value="12">
                        <label for="cat-vaccination">Cat Vaccination</label>
                     </div>

                  </div>
                  <p class="register-field-title d-none" id="animal-info-title">Enter the Animals's Information</p>
                  <div class="row">
                     <div class="pt-4 col-md-6">
                        <div class="text-field">
                           <label for="animal_count">Count of animals<span>*</span></label>
                           <div class="logo-wrapper">
                              <input placeholder="Count of animals (Max 10)" type="number" name="animal_count" id="animal_count" min="1" max="10" minlength="1" maxlength="" autocomplete="off" value="" required>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row" id="describ-or-upload">
                     <div class="pt-5 col-md-12">
                        <div class="text-field">
                           <label for="input-type-textarea">Describe your Grievance in detail OR Upload a PDF/Image of the written grievance<span>*</span></label>
                           <div class="descrip-upload-wrapp">
                              <textarea name="description" placeholder="Describe your Grievance" id="input-type-textarea" class="w-100" rows="5"></textarea>
                              <div class="file-wrapp">
                                 <input name="file_input" id="text-area" type="file" accept=".png, .jpeg, .jpg, .pdf, .doc">
                                 <label for="text-area">
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
                                    </svg> Upload
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <p class="register-field-title pt-9">Enter the location where the Dog can be found</p>
                  <div class="row" id="location-wrapp">
                     <div class="input-wrapper text-field col-md-6">
                        <div>
                           <label for="">Location<span>*</span></label>
                           <div style="position: relative;">
                              <input id="location-input" class="map-search" type="text" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" placeholder="Enter Location" value="">
                              <button type="button" id="search-button">
                                 <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.2969 7.60601C14.2969 11.4438 11.2376 14.5365 7.4862 14.5365C3.73481 14.5365 0.675466 11.4438 0.675466 7.60601C0.675466 3.76822 3.73481 0.675466 7.4862 0.675466C11.2376 0.675466 14.2969 3.76822 14.2969 7.60601Z" stroke="#28241C" stroke-width="1.35093"></path>
                                    <path d="M12.6108 13.584L15.0014 16.0087" stroke="#28241C" stroke-width="1.35093"></path>
                                 </svg>
                              </button>
                           </div>
                        </div>
                        <div>
                           <label for="dropdown-input-id">Ward<span>*</span></label>
                           <div id="ward-select-container">
                              <select class="react-select__input" id="ward-select" autocapitalize="none" autocomplete="off" autocorrect="off" id="react-select-3-input" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" aria-expanded="false" aria-haspopup="true" role="combobox" value="">
                                 <option hidden value="">Select Ward</option>
                                 <option>Ward A</option>
                                 <option>Ward B</option>
                                 <option>Ward C</option>
                                 <option>Ward D</option>
                                 <option>Ward E</option>
                                 <option>Ward F North</option>
                                 <option>Ward F South</option>
                                 <option>Ward G North</option>
                                 <option>Ward G South</option>
                                 <option>Ward H East</option>
                                 <option>Ward H West</option>
                                 <option>Ward K East</option>
                                 <option>Ward K West</option>
                                 <option>Ward L</option>
                                 <option>Ward M East</option>
                                 <option>Ward M West</option>
                                 <option>Ward N</option>
                                 <option>Ward S</option>
                                 <option>Ward T</option>
                                 <option>Ward P North</option>
                                 <option>Ward P South</option>
                                 <option>Ward R North</option>
                                 <option>Ward R South</option>
                                 <option>Ward R Central</option>
                              </select>
                              <div id="clear-icon" class="clear-icon">&#10005;</div>
                           </div>
                        </div>
                     </div>
                     <div class="map-wrapper mt-3 col-md-6">
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15083.136041080013!2d72.87611082523723!3d19.073231764537116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1734351962906!5m2!1sen!2sin" width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                        <div id="map"></div>
                     </div>
                  </div>
                  <div id="upload-photo">
                     <p class="register-field-title pt-9">Add the pictures of the dog</p>
                     <div class="dog-picture">
                        <label class="col-md-3 input-logo-wrapper" for="application_images">
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
                        <input type="file" id="application_images" name="application_images" multiple="" accept=".png, .jpeg, .jpg">
                        <p class="upload-description">Supports up to 2 files, 5MB max each</p>
                     </div>
                  </div>
                  <p class="register-field-title pt-9">Enter your Personal Information</p>
                  <div class="row">
                     <div class="col-md-4 text-field">
                        <label for="name">Full name<span>*</span></label>
                        <input placeholder="Enter Full Name" type="text" name="name" id="name" min="0" minlength="1" maxlength="" autocomplete="on" value="" required>
                     </div>
                     <div class="col-md-4 text-field">
                        <label for="mobile">Mobile No.<span>*</span></label>
                        <input placeholder="Enter Mobile No." type="text" name="mobile" id="mobile" min="0" minlength="10" maxlength="10" autocomplete="on" value="" required>
                     </div>
                     <div class="col-md-4 text-field">
                        <label for="email">Email ID<span>*</span></label>
                        <input placeholder="Enter Email ID" type="email" name="email" id="email" min="0" minlength="1" maxlength="" autocomplete="on" value="" required>
                     </div>
                     <div class="pt-4 col-md-12 text-field">
                        <label for="address">Address<span>*</span></label>
                        <div class="descrip-upload-wrapp col-md-12">
                           <textarea name="address" class="w-100" placeholder="1234, Ocean View Apartments, Marine Drive, Mumbai, Maharashtra 400001" id="address" cols="25" rows="5"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="pt-4 pt-lg-5 row">
                     <p class="form-disclaimer"> Disclaimer - Your privacy is our top priority. Your information will be treated with the utmost confidentiality and kept strictly confidential.</p>
                  </div>
                  <div class="row">
                     <p class="form-recaptcha">This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank" rel="noopener noreferrer">Terms of Service</a> apply.</p>
                  </div>
                  <div class="pt-4 pt-lg-5 row">
                     <div class="col-lg-2 col-md-3 col-12">
                        <button class="submit-btn">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </section>
    
      <?php include("footer.php"); ?>
      <script>
         $(document).ready(function(){
            $('#clear-icon').hide();
            function changeFields() {
               var checkedCategory = $('input[name="application_category_id"]:checked').attr('id');
               var checkedType = $('input[name="animal_type_id"]:checked').val();
               if (checkedType == 1) { animalType = 'dog'; } else if (checkedType == 2) { animalType = 'cat'; }
               // console.log('category: '+checkedCategory+' animal: '+animalType);
               if (checkedCategory == 'grievance' && animalType == 'dog') {
                  $('#grievance-request-fields .type-btn').addClass('d-none');
                  $('#grievance-request-fields .type-btn.dog_grievance').removeClass('d-none');
               } else if (checkedCategory == 'grievance' && animalType == 'cat') {
                  $('#grievance-request-fields .type-btn').addClass('d-none');
                  $('#grievance-request-fields .type-btn.cat_grievance').removeClass('d-none');
               } else if (checkedCategory == 'request' && animalType == 'dog') {
                  $('#grievance-request-fields .type-btn').addClass('d-none');
                  $('#grievance-request-fields .type-btn.dog_request').removeClass('d-none');
               } else if (checkedCategory == 'request' && animalType == 'cat') {
                  $('#grievance-request-fields .type-btn').addClass('d-none');
                  $('#grievance-request-fields .type-btn.cat_request').removeClass('d-none');
               }
            }
            function triggerRequest() {
               $('#grievance-request').html('Do you want to request for');
               $('#animal-info-title').removeClass('d-none');
               $('#describ-or-upload, #upload-photo').hide();
            }
            function triggerGrievance() {
               $('#grievance-request').html('Why do you want to raise a grievance');
               $('#animal-info-title').addClass('d-none');
               $('#describ-or-upload, #upload-photo').show();
            }
            $('#categories label').on('click', function() {
               $('#categories .checkedbtn').removeClass('active');
               $(this).closest('div').addClass('active');
               $(this).prev('input[type="radio"]').prop('checked', true);
            });
            $('#request').on('click', function() {
               triggerRequest();
            });
            $('#grievance').on('click', function() {
               triggerGrievance();
            });
            $('input[name="application_category_id"], input[name="animal_type_id"]').on('click', function() {
               changeFields();
            });
            $('input[name="application_type_id"]').on('click', function(){
               if($(this).val() == 8) {
                  $(this).hide();
                  $('label[for="other_dog"]').hide();
                  $('#other_dog_reason').show();
               } else if($(this).val() == 13) {
                  $(this).hide();
                  $('label[for="other_cat"]').hide();
                  $('#other_cat_reason').show();
               } else {
                  $('label[for="other_dog"], label[for="other_cat"]').show();
                  $('#other_dog_reason, #other_cat_reason').hide();
               }
            });

            function getUrlParameter(name) {
               var url = window.location.href;
               var regex = new RegExp('[?&]' + name + '=([^&]*)');
               var results = regex.exec(url);
               if (results) { return decodeURIComponent(results[1]); }
               return null;
            }

            var categoryid = getUrlParameter('categoryid');
            var applicationid = getUrlParameter('applicationid');
            var animalTypeId = getUrlParameter('animal_type_id');

            if (categoryid !== null && applicationid !== null && animalTypeId !== null) {
               $('input[name="application_category_id"]').each(function () {
                  $(this).prop('checked', false);
                  if ($(this).val() == categoryid) {
                     $(this).prop('checked', true);
                     $(this).closest('div').addClass('active').siblings().removeClass('active');
                  }
               });
               $('input[name="animal_type_id"]').each(function () {
                  $(this).prop('checked', false);
                  if ($(this).val() == animalTypeId) {
                     $(this).prop('checked', true);
                  }
               });
               if (categoryid == 1) { triggerRequest(); } else if (categoryid == 2) { triggerGrievance(); }
               changeFields();
               $('input[name="application_type_id"]').each(function () {
                  $(this).prop('checked', false);
                  if ($(this).val() == applicationid) {
                     if($(this).val() == 8) {
                        $(this).hide();
                        $('label[for="other_dog"]').hide();
                        $('#other_dog_reason').show().focus();
                     } else if($(this).val() == 13) {
                        $(this).hide();
                        $('label[for="other_cat"]').hide();
                        $('#other_cat_reason').show().focus();
                     } else {
                        $(this).prop('checked', true);
                     }
                  }
               });
            }

            const $select = $('#ward-select');
            const $clearIcon = $('#clear-icon');

            $select.on('change', function () {
               if ($select.val()) {
                  $clearIcon.show();
               } else {
                  $clearIcon.hide();
               }
            });

            $clearIcon.on('click', function () {
               $select.val('');
               $clearIcon.hide();
            });
         });
      </script>
      <script>
         let map, marker, autocomplete;

         // Initialize the map and other components
         function initMap() {
            // Create a map centered on a default location (e.g., Mumbai)
            map = new google.maps.Map(document.getElementById("map"), {
               center: { lat: 19.073231764537116, lng: 72.87611082523723 }, // Default location
               zoom: 12,
               mapTypeControl: false, // Hide map/satellite type control
               streetViewControl: false, // Hide street view pegman
            });

            // Create a marker and place it on the map
            marker = new google.maps.Marker({
               map: map,
               position: { lat: 19.073231764537116, lng: 72.87611082523723 }, // Default marker position
            });

            // Initialize the autocomplete search box
            const input = document.getElementById("location-input");
            autocomplete = new google.maps.places.Autocomplete(input);

            // Bind the autocomplete object to the input field
            autocomplete.bindTo("bounds", map);

            // Add a listener to the autocomplete to handle when a place is selected
            autocomplete.addListener("place_changed", function () {
               const place = autocomplete.getPlace();
               if (!place.geometry) {
                  // If the place doesn't have geometry (i.e., a valid place is not selected)
                  return;
               }

               // Center the map on the selected location
               map.setCenter(place.geometry.location);
               map.setZoom(14);

               // Move the marker to the selected place
               marker.setPosition(place.geometry.location);

               // Optional: Add a popup with the name of the place
               // const infoWindow = new google.maps.InfoWindow({
               //   content: `<h4>${place.name}</h4>`,
               // });
               infoWindow.open(map, marker);
            });
         }

         // Optional: Handle button click event (same as input-based search)
         document.getElementById("search-button").addEventListener("click", function () {
            const query = document.getElementById("location-input").value;
            if (query) {
               const geocoder = new google.maps.Geocoder();
               geocoder.geocode({ address: query }, function (results, status) {
                  if (status === "OK" && results[0]) {
                     const location = results[0].geometry.location;
                     map.setCenter(location);
                     map.setZoom(14);
                     marker.setPosition(location);
                     // const infoWindow = new google.maps.InfoWindow({
                     //   content: `<h4>${results[0].formatted_address}</h4>`,
                     // });
                     infoWindow.open(map, marker);
                  } else {
                     alert("Location not found!");
                  }
               });
            }
         });
      </script>
   </body>
</html>