<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include("head.php"); ?>
      <title>Register as a Volunteer - VHD Mumbai</title>
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
            <h4 class="text-center">Register as a Feeder/Animal rescuer/Volunteer <br>registration</h4>
         </div>
      </section>

      <section class="announcements-main">
         <div class="container">
            <div class="community-section">
               <form class="form" action="" method="POST">
                  <p class="register-field-title pt-0">Enter your Personal Information</p>
                  <div class="row">
                     <div class="col-md-4 text-field">
                        <label for="name">Full name<span>*</span></label>
                        <input placeholder="Enter Full Name" type="text" name="name" id="name" min="0" minlength="1" maxlength="" autocomplete="on" value="" required>
                     </div>
                     <div class="col-md-4 text-field">
                        <label for="mobile">Mobile No.<span>*</span></label>
                        <input placeholder="Enter Mobile No." type="text" name="mobile" id="mobile" min="0" minlength="10" maxlength="10" autocomplete="on" value="" required onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57">
                     </div>
                     <div class="col-md-4 text-field">
                        <label for="email">Email ID<span>*</span></label>
                        <input placeholder="Enter Email ID" type="email" name="email" id="email" min="0" minlength="1" maxlength="" autocomplete="on" value="" required>
                     </div>
                     <!-- <div class="pt-4 col-md-12 text-field">
                        <label for="address">Address<span>*</span></label>
                        <div class="descrip-upload-wrapp col-md-12">
                           <textarea name="address" class="w-100" placeholder="1234, Ocean View Apartments, Marine Drive, Mumbai, Maharashtra 400001" id="address" cols="25" rows="5"></textarea>
                        </div>
                     </div> -->
                     <div class="col-md-12 declaration-wrapp my-5">
                        <div class="declaration">
                           <input type="checkbox" id="termsConditionCheck" name="share_contact_info" value="0">
                           <label for="termsConditionCheck" class="css-ra90a7">I agree to share my contact details with the Community</label>
                        </div>
                     </div>
                  </div>
                  <div id="upload-photo">
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
                  <p class="register-field-title pt-9">Enter the details of the animals you've taken care of</p>
                  <div class="d-flex checkbox-wrapp">
                     <div class="checkbox-btn">
                        <input name="animal_id" type="checkbox" id="animal_type-1" value="1">
                        <label for="animal_type-1">Dog</label>
                     </div>
                     <div class="checkbox-btn">
                        <input name="animal_id" type="checkbox" id="animal_type-2" value="2">
                        <label for="animal_type-2">Cat</label>
                     </div>
                     <div class="checkbox-btn position-relative">
                        <input name="animal_id" type="checkbox" id="animal_type-3" value="3">
                        <input name="other_animals" type="text" placeholder="Enter other animals" id="other_animals">
                        <span>
                           <svg height="20" width="20" viewBox="0 0 20 20">
                              <path d="M14.348 14.849c-0.469 0.469-1.229 0.469-1.697 0l-2.651-3.030-2.651 3.029c-0.469 0.469-1.229 0.469-1.697 0-0.469-0.469-0.469-1.229 0-1.697l2.758-3.15-2.759-3.152c-0.469-0.469-0.469-1.228 0-1.697s1.228-0.469 1.697 0l2.652 3.031 2.651-3.031c0.469-0.469 1.228-0.469 1.697 0s0.469 1.229 0 1.697l-2.758 3.152 2.758 3.15c0.469 0.469 0.469 1.229 0 1.698z"></path>
                           </svg>
                        </span>
                        <label for="animal_type-3">Other</label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="pt-5 pb-3 col-md-6">
                        <div class="text-field">
                           <label for="animal_count">Count of animals<span>*</span></label>
                           <div class="logo-wrapper">
                              <input placeholder="0" type="number" name="count" id="count" min="1" minlength="1" maxlength autocomplete="off" value="" required>
                           </div>
                        </div>
                     </div>
                  </div>

                  <p class="register-field-title pt-5">Enter the Locality/Area you cover for feeding/rescuing</p>
                  <div class="row vr-location-wrapp" id="location-wrapp">
                     <div class="input-wrapper text-field col-md-6">
                        <div>
                           <label for="dropdown-input-id">Location<span>*</span></label>
                           <div class="dropdown">
                              <input type="text" class="dropdown-btn" placeholder="Select Location/Area">
                              <span class="icon_down_dir">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.653564 0.39359C1.01452 -0.0244185 1.64599 -0.0706713 2.064 0.290282L8.03925 5.44996C8.22591 5.61114 8.50222 5.61215 8.69005 5.45233L14.7624 0.285542C15.183 -0.0723571 15.8141 -0.0215063 16.172 0.39912C16.5299 0.819747 16.4791 1.45087 16.0585 1.80877L9.00687 7.80877C8.63121 8.1284 8.0786 8.12639 7.70527 7.80402L0.756871 1.80403C0.338863 1.44307 0.292611 0.811598 0.653564 0.39359Z" fill="#ABABAB"></path>
                                 </svg>
                              </span>
                              <span id="selectedcount"></span>
                              <div class="dropdown-content">
                                 <label><input type="checkbox" class="checkbox">A I staff colony</label>
                                 <label><input type="checkbox" class="checkbox">Aareymilk Colony</label>
                                 <label><input type="checkbox" class="checkbox">Agripada</label>
                                 <label><input type="checkbox" class="checkbox">Airport</label>
                                 <label><input type="checkbox" class="checkbox">Ambewadi</label>
                                 <label><input type="checkbox" class="checkbox">Andheri</label>
                                 <label><input type="checkbox" class="checkbox">Andheri East</label>
                                 <label><input type="checkbox" class="checkbox">Andheri Railway station</label>
                                 <label><input type="checkbox" class="checkbox">Antop Hill</label>
                                 <label><input type="checkbox" class="checkbox">Asvini</label>
                                 <label><input type="checkbox" class="checkbox">Azad Nagar</label>
                                 <label><input type="checkbox" class="checkbox">B P t colony</label>
                                 <label><input type="checkbox" class="checkbox">B.N. bhavan</label>
                                 <label><input type="checkbox" class="checkbox">B.P.lane</label>
                                 <label><input type="checkbox" class="checkbox">Bandra West</label>
                                 <label><input type="checkbox" class="checkbox">Bandra(east)</label>
                                 <label><input type="checkbox" class="checkbox">Bangur Nagar</label>
                                 <label><input type="checkbox" class="checkbox">Bazargate</label>
                                 <label><input type="checkbox" class="checkbox">Best Staff colony</label>
                                 <label><input type="checkbox" class="checkbox">Bharat Nagar</label>
                                 <label><input type="checkbox" class="checkbox">Bhawani Shankar</label>
                                 <label><input type="checkbox" class="checkbox">Bhawani Shankar rd</label>
                                 <label><input type="checkbox" class="checkbox">Borivali</label>
                                 <label><input type="checkbox" class="checkbox">Borivali East</label>
                                 <label><input type="checkbox" class="checkbox">Borvali West</label>
                                 <label><input type="checkbox" class="checkbox">C G s colony</label>
                                 <label><input type="checkbox" class="checkbox">Central Building</label>
                                 <label><input type="checkbox" class="checkbox">Century Mill</label>
                                 <label><input type="checkbox" class="checkbox">Chakala Midc</label>
                                 <label><input type="checkbox" class="checkbox">Chamarbaug</label>
                                 <label><input type="checkbox" class="checkbox">Charkop</label>
                                 <label><input type="checkbox" class="checkbox">Charni Road</label>
                                 <label><input type="checkbox" class="checkbox">Chaupati</label>
                                 <label><input type="checkbox" class="checkbox">Chinchbunder</label>
                                 <label><input type="checkbox" class="checkbox">Chinchpokli</label>
                                 <label><input type="checkbox" class="checkbox">Churchgate</label>
                                 <label><input type="checkbox" class="checkbox">Colaba</label>
                                 <label><input type="checkbox" class="checkbox">Cotton Exchange</label>
                                 <label><input type="checkbox" class="checkbox">Cumballa Hill</label>
                                 <label><input type="checkbox" class="checkbox">Cumballa Sea face</label>
                                 <label><input type="checkbox" class="checkbox">Dadar</label>
                                 <label><input type="checkbox" class="checkbox">Dadar Colony</label>
                                 <label><input type="checkbox" class="checkbox">Dahisar</label>
                                 <label><input type="checkbox" class="checkbox">Dahisar Rs</label>
                                 <label><input type="checkbox" class="checkbox">Danda</label>
                                 <label><input type="checkbox" class="checkbox">Daulat Nagar</label>
                                 <label><input type="checkbox" class="checkbox">Delisle Road</label>
                                 <label><input type="checkbox" class="checkbox">Dharavi</label>
                                 <label><input type="checkbox" class="checkbox">Dharavi Road</label>
                                 <label><input type="checkbox" class="checkbox">Dockyard Road</label>
                                 <label><input type="checkbox" class="checkbox">Dr Deshmukh marg</label>
                                 <label><input type="checkbox" class="checkbox">Falkland Road</label>
                                 <label><input type="checkbox" class="checkbox">Girgaon</label>
                                 <label><input type="checkbox" class="checkbox">Gokhale Road</label>
                                 <label><input type="checkbox" class="checkbox">Goregaon</label>
                                 <label><input type="checkbox" class="checkbox">Goregaon East</label>
                                 <label><input type="checkbox" class="checkbox">Goregaon Rs</label>
                                 <label><input type="checkbox" class="checkbox">Government Colony</label>
                                 <label><input type="checkbox" class="checkbox">Gowalia Tank</label>
                                 <label><input type="checkbox" class="checkbox">Grant Road</label>
                                 <label><input type="checkbox" class="checkbox">H.M.p. school</label>
                                 <label><input type="checkbox" class="checkbox">Haffkin Institute</label>
                                 <label><input type="checkbox" class="checkbox">Haines Road</label>
                                 <label><input type="checkbox" class="checkbox">Hajiali</label>
                                 <label><input type="checkbox" class="checkbox">Hanuman Road</label>
                                 <label><input type="checkbox" class="checkbox">High Court building</label>
                                 <label><input type="checkbox" class="checkbox">Holiday Camp</label>
                                 <label><input type="checkbox" class="checkbox">Irla</label>
                                 <label><input type="checkbox" class="checkbox">Ins Hamla</label>
                                 <label><input type="checkbox" class="checkbox">International Airport</label>
                                 <label><input type="checkbox" class="checkbox">J.B. nagar</label>
                                 <label><input type="checkbox" class="checkbox">J.J. hospital</label>
                                 <label><input type="checkbox" class="checkbox">Jacob Circle</label>
                                 <label><input type="checkbox" class="checkbox">Jogeshwari East</label>
                                 <label><input type="checkbox" class="checkbox">Jogeshwari West</label>
                                 <label><input type="checkbox" class="checkbox">Juhu</label>
                                 <label><input type="checkbox" class="checkbox">Kalachowki</label>
                                 <label><input type="checkbox" class="checkbox">Kalbadevi</label>
                                 <label><input type="checkbox" class="checkbox">Kamathipura</label>
                                 <label><input type="checkbox" class="checkbox">Kandivali East</label>
                                 <label><input type="checkbox" class="checkbox">Kandivali West</label>
                                 <label><input type="checkbox" class="checkbox">Kapad Bazar</label>
                                 <label><input type="checkbox" class="checkbox">Ketkipada</label>
                                 <label><input type="checkbox" class="checkbox">Khar Colony</label>
                                 <label><input type="checkbox" class="checkbox">Khar Delivery</label>
                                 <label><input type="checkbox" class="checkbox">Kharodi</label>
                                 <label><input type="checkbox" class="checkbox">Kherwadi</label>
                                 <label><input type="checkbox" class="checkbox">Kidwai Nagar</label>
                                 <label><input type="checkbox" class="checkbox">L B s n e collage</label>
                                 <label><input type="checkbox" class="checkbox">Lal Baug</label>
                                 <label><input type="checkbox" class="checkbox">Liberty Garden</label>
                                 <label><input type="checkbox" class="checkbox">M A marg</label>
                                 <label><input type="checkbox" class="checkbox">M.P.t.</label>
                                 <label><input type="checkbox" class="checkbox">Madh</label>
                                 <label><input type="checkbox" class="checkbox">Madhavbaug</label>
                                 <label><input type="checkbox" class="checkbox">Magthane</label>
                                 <label><input type="checkbox" class="checkbox">Mahim</label>
                                 <label><input type="checkbox" class="checkbox">Mahim Bazar</label>
                                 <label><input type="checkbox" class="checkbox">Mahim East</label>
                                 <label><input type="checkbox" class="checkbox">Malabar Hill</label>
                                 <label><input type="checkbox" class="checkbox">Malad</label>
                                 <label><input type="checkbox" class="checkbox">Malad East</label>
                                 <label><input type="checkbox" class="checkbox">Malad West dely</label>
                                 <label><input type="checkbox" class="checkbox">Mandapeshwar</label>
                                 <label><input type="checkbox" class="checkbox">Mandvi</label>
                                 <label><input type="checkbox" class="checkbox">Mantralaya</label>
                                 <label><input type="checkbox" class="checkbox">Marine Lines</label>
                                 <label><input type="checkbox" class="checkbox">Marol Bazar</label>
                                 <label><input type="checkbox" class="checkbox">Marol Naka</label>
                                 <label><input type="checkbox" class="checkbox">Masjid</label>
                                 <label><input type="checkbox" class="checkbox">Matunga Railway workshop</label>
                                 <label><input type="checkbox" class="checkbox">Mazgaon</label>
                                 <label><input type="checkbox" class="checkbox">Mazgaon Dock</label>
                                 <label><input type="checkbox" class="checkbox">Mazgaon Road</label>
                                 <label><input type="checkbox" class="checkbox">Mori Road</label>
                                 <label><input type="checkbox" class="checkbox">Motilal Nagar</label>
                                 <label><input type="checkbox" class="checkbox">Mumbai Central</label>
                                 <label><input type="checkbox" class="checkbox">Mumbai</label>
                                 <label><input type="checkbox" class="checkbox">N . s.patkar</label>
                                 <label><input type="checkbox" class="checkbox">Nagardas Road</label>
                                 <label><input type="checkbox" class="checkbox">Nagari Niwara</label>
                                 <label><input type="checkbox" class="checkbox">Naigaon</label>
                                 <label><input type="checkbox" class="checkbox">Nariman Point</label>
                                 <label><input type="checkbox" class="checkbox">New Prabhadevi road</label>
                                 <label><input type="checkbox" class="checkbox">New Yogakshema</label>
                                 <label><input type="checkbox" class="checkbox">Noor Baug</label>
                                 <label><input type="checkbox" class="checkbox">Null Bazar</label>
                                 <label><input type="checkbox" class="checkbox">Opera House</label>
                                 <label><input type="checkbox" class="checkbox">Orlem</label>
                                 <label><input type="checkbox" class="checkbox">Oshiwara</label>
                                 <label><input type="checkbox" class="checkbox">Parel</label>
                                 <label><input type="checkbox" class="checkbox">Parel Naka</label>
                                 <label><input type="checkbox" class="checkbox">Parel Rly work shop</label>
                                 <label><input type="checkbox" class="checkbox">Prabhadevi</label>
                                 <label><input type="checkbox" class="checkbox">Princess Dock</label>
                                 <label><input type="checkbox" class="checkbox">Rajbhavan</label>
                                 <label><input type="checkbox" class="checkbox">Rajendra Nagar</label>
                                 <label><input type="checkbox" class="checkbox">Ramwadi</label>
                                 <label><input type="checkbox" class="checkbox">Ranade Road</label>
                                 <label><input type="checkbox" class="checkbox">Rani Sati marg</label>
                                 <label><input type="checkbox" class="checkbox">Reay Road</label>
                                 <label><input type="checkbox" class="checkbox">S R p f camp</label>
                                 <label><input type="checkbox" class="checkbox">S Savarkar marg</label>
                                 <label><input type="checkbox" class="checkbox">S V marg</label>
                                 <label><input type="checkbox" class="checkbox">S. c. court</label>
                                 <label><input type="checkbox" class="checkbox">S. k.nagar</label>
                                 <label><input type="checkbox" class="checkbox">Sahar P & T colony</label>
                                 <label><input type="checkbox" class="checkbox">Sahargaon</label>
                                 <label><input type="checkbox" class="checkbox">Santacruz Central</label>
                                 <label><input type="checkbox" class="checkbox">Santacruz P&T colony</label>
                                 <label><input type="checkbox" class="checkbox">Santacruz (east)</label>
                                 <label><input type="checkbox" class="checkbox">Santacruz (west)</label>
                                 <label><input type="checkbox" class="checkbox">Secretariate</label>
                                 <label><input type="checkbox" class="checkbox">Seepz</label>
                                 <label><input type="checkbox" class="checkbox">Sewri</label>
                                 <label><input type="checkbox" class="checkbox">Sharma Estate</label>
                                 <label><input type="checkbox" class="checkbox">Shivaji Park</label>
                                 <label><input type="checkbox" class="checkbox">Shroff Mahajan</label>
                                 <label><input type="checkbox" class="checkbox">Stock Exchange</label>
                                 <label><input type="checkbox" class="checkbox">Tajmahal</label>
                                 <label><input type="checkbox" class="checkbox">Tank Road</label>
                                 <label><input type="checkbox" class="checkbox">Tardeo</label>
                                 <label><input type="checkbox" class="checkbox">Thakurdwar</label>
                                 <label><input type="checkbox" class="checkbox">Town Hall</label>
                                 <label><input type="checkbox" class="checkbox">Tulsiwadi</label>
                                 <label><input type="checkbox" class="checkbox">V J b udyan</label>
                                 <label><input type="checkbox" class="checkbox">V K bhavan</label>
                                 <label><input type="checkbox" class="checkbox">V.P. road</label>
                                 <label><input type="checkbox" class="checkbox">V.W.t.c.</label>
                                 <label><input type="checkbox" class="checkbox">Vakola</label>
                                 <label><input type="checkbox" class="checkbox">Vesava</label>
                                 <label><input type="checkbox" class="checkbox">Vidyanagari</label>
                                 <label><input type="checkbox" class="checkbox">Vileeparle (east)</label>
                                 <label><input type="checkbox" class="checkbox">Vileparle Railway station</label>
                                 <label><input type="checkbox" class="checkbox">Vileparle (west)</label>
                                 <label><input type="checkbox" class="checkbox">Wadala</label>
                                 <label><input type="checkbox" class="checkbox">Wadala Rs</label>
                                 <label><input type="checkbox" class="checkbox">Worli</label>
                                 <label><input type="checkbox" class="checkbox">Worli Colony</label>
                                 <label><input type="checkbox" class="checkbox">Worli Naka</label>
                                 <label><input type="checkbox" class="checkbox">Worli Police camp</label>
                                 <label><input type="checkbox" class="checkbox">Worli Sea face</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="row pt-3" id="describ-or-upload">
                     <div class="col-md-12">
                        <p class="register-field-title">Enter a brief description about your work</p>
                        <div class="text-field">
                           <label for="work_description">Describe your work</label>
                           <div class="descrip-upload-wrapp">
                              <textarea name="work_description" placeholder="Describe your work in about 100 words or more" id="work_description" class="w-100" rows="5"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <p class="register-field-title pt-9">Are you interested in participating in Sterilization and Vaccination drives?</p>
                  <div class="d-flex checkbox-wrapp flex-column">
                     <div class="checkbox-btn">
                        <input name="sterilization_drive" type="checkbox" id="sterilization_drive" value="1">
                        <label for="sterilization_drive">Interested in participating in sterilization drives</label>
                     </div>
                     <div class="checkbox-btn">
                        <input name="vaccination_drive" type="checkbox" id="vaccination_drive" value="2">
                        <label for="vaccination_drive">Interested in participating in vaccination drives</label>
                     </div>
                     <div class="checkbox-btn position-relative">
                        <input name="rescue_drive" type="checkbox" id="rescue_drive" value="3">
                        <label for="rescue_drive">Interested in participating in rescue and release programs</label>
                     </div>
                  </div>
                  <p class="register-field-title pt-9 pb-0 mb-0">How manageable are the animals you feed?</p>
                  <p class="required-field pb-4">(This field is mandatory)</p>
                  <div class="d-flex type flex-wrap">
                     <div class="type-btn">
                        <input name="animal_manageable" type="radio" id="animal_manageable_1" value="1">
                        <label for="animal_manageable_1">Easily Manageable</label>
                     </div>
                     <div class="type-btn">
                        <input name="animal_manageable" type="radio" id="animal_manageable_2" value="2">
                        <label for="animal_manageable_2">Somewhat Manageable</label>
                     </div>
                     <div class="type-btn">
                        <input name="animal_manageable" type="radio" id="animal_manageable_3" value="3">
                        <label for="animal_manageable_3">Difficult to Manage</label>
                     </div>
                  </div>
                  <p class="register-field-title pt-5 pb-0 mb-0">Are you interested in volunteering for Drives and Initiatives conducted by VHD?</p>
                  <p class="required-field pb-4">(This field is mandatory)</p>
                  <div class="d-flex type flex-wrap">
                     <div class="type-btn">
                        <input name="is_volunteering" type="radio" id="is_volunteering_yes" value="1">
                        <label for="is_volunteering_yes">Yes</label>
                     </div>
                     <div class="type-btn">
                        <input name="is_volunteering" type="radio" id="is_volunteering_no" value="2">
                        <label for="is_volunteering_no">No</label>
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
            $('#selectedcount').hide();
            $('.checkbox-btn label').on('click', function(){
               $(this).parent().toggleClass('active');
            });
            $('input[name="animal_id"]').on('click', function(){
               if($(this).val() == 3) {
                  $(this).hide();
                  $('label[for="animal_type-3"]').hide();
                  $('#other_animals').show().focus();
               } else {
                  $('label[for="animal_type-3"]').show();
                  $('#other_animals').hide();
               }
            });
            $('.checkbox-btn span').on('click', function(){
               var checkedVal = $(this).parent().find('#animal_type-3').val();
               if(checkedVal == 3) {
                  $(this).parent().toggleClass('active');
                  $('label[for="animal_type-3"]').show();
                  $('#other_animals').hide();
               }
            });
            // Toggle the dropdown content on button click
            $('#location-wrapp .dropdown-btn').click(function() {
               $('#location-wrapp .dropdown-content').toggle();
            });

            // Update button text based on the selected checkboxes
            $('#location-wrapp .dropdown-content input[type="checkbox"]').change(function() {
               var selected = [];
               var selectedCount = 0;

               // Collect selected options
               $('#location-wrapp .dropdown-content input[type="checkbox"]:checked').each(function() {
                  selectedCount++;
                  $(this).parent().addClass('active');
               });

               // Update the button text with selected options
               if (selectedCount > 0) {
                  $('#selectedcount').show();
                  $('#location-wrapp #selectedcount').text(selectedCount);
               } else {
                  $('#location-wrapp .dropdown-btn').text('Select Locations');
                  $('#selectedcount').hide();
               }
            });
         });
      </script>
   </body>
</html>