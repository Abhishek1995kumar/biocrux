<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include("head.php"); ?>
      <title>Register Your Ambulance - VHD Mumbai</title>
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
            <h4 class="text-center">Expand your reach and serve more animals by <br>registering your ambulance</h4>
         </div>
      </section>

      <section class="announcements-main">
         <div class="container">
            <div class="community-section">
               <form class="form" action="" method="POST">
                  <p class="register-field-title pt-0">Enter your organization's details</p>
                  <div class="row">
                     <div class="col-md-6 text-field pb-5">
                        <label for="organization_name">Organization Name<span>*</span></label>
                        <input placeholder="Enter organization name" type="text" name="organization_name" id="organization_name" min="0" minlength="1" maxlength="" autocomplete="on" value="" required>
                     </div>
                     <div class="col-md-6 text-field pb-5">
                        <label for="registeration_no">Registration No.</label>
                        <input placeholder="Enter registration no." type="text" name="registeration_no" id="registeration_no" min="0" minlength="1" autocomplete="on" value="">
                     </div>
                  </div>
                  <p class="register-field-title pt-0">Contact Details <span class="required-field text-black d-inline-flex fst-normal">(Max 3)</span></p>
                  <div class="row">
                     <div class="col-md-12 extra-fields" id="contact-wrapper">
                        <div class="accordion-wrapp mb-4" id="contact-wrapp-1">
                           <div href="#contact-1" class="accordion-single">
                              <p>Contact Detail - 1 </p>
                              <div class="icons">
                                 <span class="delete-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                       <path d="M19 7C18.7348 7 18.4804 7.10536 18.2929 7.29289C18.1054 7.48043 18 7.73478 18 8V19.191C17.9713 19.6967 17.744 20.1706 17.3675 20.5094C16.991 20.8482 16.4959 21.0246 15.99 21H8.01C7.5041 21.0246 7.00898 20.8482 6.63251 20.5094C6.25603 20.1706 6.02869 19.6967 6 19.191V8C6 7.73478 5.89464 7.48043 5.70711 7.29289C5.51957 7.10536 5.26522 7 5 7C4.73478 7 4.48043 7.10536 4.29289 7.29289C4.10536 7.48043 4 7.73478 4 8V19.191C4.02854 20.2272 4.46658 21.2099 5.21818 21.9238C5.96978 22.6378 6.97367 23.0247 8.01 23H15.99C17.0263 23.0247 18.0302 22.6378 18.7818 21.9238C19.5334 21.2099 19.9715 20.2272 20 19.191V8C20 7.73478 19.8946 7.48043 19.7071 7.29289C19.5196 7.10536 19.2652 7 19 7Z" fill="#F24242"></path>
                                       <path d="M20 4H16V2C16 1.73478 15.8946 1.48043 15.7071 1.29289C15.5196 1.10536 15.2652 1 15 1H9C8.73478 1 8.48043 1.10536 8.29289 1.29289C8.10536 1.48043 8 1.73478 8 2V4H4C3.73478 4 3.48043 4.10536 3.29289 4.29289C3.10536 4.48043 3 4.73478 3 5C3 5.26522 3.10536 5.51957 3.29289 5.70711C3.48043 5.89464 3.73478 6 4 6H20C20.2652 6 20.5196 5.89464 20.7071 5.70711C20.8946 5.51957 21 5.26522 21 5C21 4.73478 20.8946 4.48043 20.7071 4.29289C20.5196 4.10536 20.2652 4 20 4ZM10 4V3H14V4H10Z" fill="#F24242"></path>
                                       <path d="M11 17V10C11 9.73478 10.8946 9.48043 10.7071 9.29289C10.5196 9.10536 10.2652 9 10 9C9.73478 9 9.48043 9.10536 9.29289 9.29289C9.10536 9.48043 9 9.73478 9 10V17C9 17.2652 9.10536 17.5196 9.29289 17.7071C9.48043 17.8946 9.73478 18 10 18C10.2652 18 10.5196 17.8946 10.7071 17.7071C10.8946 17.5196 11 17.2652 11 17Z" fill="#F24242"></path>
                                       <path d="M15 17V10C15 9.73478 14.8946 9.48043 14.7071 9.29289C14.5196 9.10536 14.2652 9 14 9C13.7348 9 13.4804 9.10536 13.2929 9.29289C13.1054 9.48043 13 9.73478 13 10V17C13 17.2652 13.1054 17.5196 13.2929 17.7071C13.4804 17.8946 13.7348 18 14 18C14.2652 18 14.5196 17.8946 14.7071 17.7071C14.8946 17.5196 15 17.2652 15 17Z" fill="#F24242"></path>
                                    </svg>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                 </span>
                              </div>
                           </div>
                           <div id="contact-1" class="collapse">
                              <div class="row mt-5">
                                 <div class="col-md-4 text-field">
                                    <label for="full_name-1">Full Name<span>*</span></label>
                                    <input placeholder="Enter Full Name" type="text" name="full_name-1" id="full_name-1" min="0" minlength="1" maxlength="" autocomplete="on" value="" required class="bg-white">
                                 </div>
                                 <div class="col-md-4 text-field">
                                    <label for="email-1">Email ID<span>*</span></label>
                                    <input placeholder="Enter Email ID" type="email" name="email-1" id="email-1" min="0" minlength="1" maxlength="" autocomplete="on" value="" required class="bg-white">
                                 </div>
                                 <div class="col-md-4 text-field">
                                    <label for="mobile-1">Mobile No.<span>*</span></label>
                                    <input placeholder="Enter Mobile No." type="text" name="mobile-1" id="mobile-1" min="0" minlength="10" maxlength="10" autocomplete="on" value="" required class="bg-white" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="add-more-btn mb-5">
                           <span>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                 <g clip-path="url(#clip0_8785_48582)">
                                    <path d="M13 7H11V11H7V13H11V17H13V13H17V11H13V7ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" fill="#07775C"></path>
                                    <path d="M13 7H11V11H7V13H11V17H13V13H17V11H13V7ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" fill="black" fill-opacity="0.2"></path>
                                 </g>
                                 <defs>
                                    <clipPath id="clip0_8785_48582">
                                       <rect width="24" height="24" fill="white"></rect>
                                    </clipPath>
                                 </defs>
                              </svg>
                           </span>
                           <p>Add more Contact info</p>
                        </div>
                     </div>
                  </div>

                  <p class="register-field-title pt-0">Enter the details about your ambulance</p>
                  <div class="row">
                     <div class="col-md-6 text-field">
                        <label for="ambulance_count">Enter the count of ambulance<span>*</span></label>
                        <input placeholder="Enter ambulance count " type="number" name="ambulance_count" id="ambulance_count" min="1" minlength="1" maxlength="" autocomplete="off" value="" required>
                     </div>
                     <div class="col-md-12 extra-fields mt-5" id="ambulance-wrapper">
                        <div class="accordion-wrapp mb-4" id="ambulance-wrapp-1">
                           <div href="#ambulance-1" class="accordion-single">
                              <p>Ambulance Info - 1 </p>
                              <div class="icons">
                                 <span class="delete-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                       <path d="M19 7C18.7348 7 18.4804 7.10536 18.2929 7.29289C18.1054 7.48043 18 7.73478 18 8V19.191C17.9713 19.6967 17.744 20.1706 17.3675 20.5094C16.991 20.8482 16.4959 21.0246 15.99 21H8.01C7.5041 21.0246 7.00898 20.8482 6.63251 20.5094C6.25603 20.1706 6.02869 19.6967 6 19.191V8C6 7.73478 5.89464 7.48043 5.70711 7.29289C5.51957 7.10536 5.26522 7 5 7C4.73478 7 4.48043 7.10536 4.29289 7.29289C4.10536 7.48043 4 7.73478 4 8V19.191C4.02854 20.2272 4.46658 21.2099 5.21818 21.9238C5.96978 22.6378 6.97367 23.0247 8.01 23H15.99C17.0263 23.0247 18.0302 22.6378 18.7818 21.9238C19.5334 21.2099 19.9715 20.2272 20 19.191V8C20 7.73478 19.8946 7.48043 19.7071 7.29289C19.5196 7.10536 19.2652 7 19 7Z" fill="#F24242"></path>
                                       <path d="M20 4H16V2C16 1.73478 15.8946 1.48043 15.7071 1.29289C15.5196 1.10536 15.2652 1 15 1H9C8.73478 1 8.48043 1.10536 8.29289 1.29289C8.10536 1.48043 8 1.73478 8 2V4H4C3.73478 4 3.48043 4.10536 3.29289 4.29289C3.10536 4.48043 3 4.73478 3 5C3 5.26522 3.10536 5.51957 3.29289 5.70711C3.48043 5.89464 3.73478 6 4 6H20C20.2652 6 20.5196 5.89464 20.7071 5.70711C20.8946 5.51957 21 5.26522 21 5C21 4.73478 20.8946 4.48043 20.7071 4.29289C20.5196 4.10536 20.2652 4 20 4ZM10 4V3H14V4H10Z" fill="#F24242"></path>
                                       <path d="M11 17V10C11 9.73478 10.8946 9.48043 10.7071 9.29289C10.5196 9.10536 10.2652 9 10 9C9.73478 9 9.48043 9.10536 9.29289 9.29289C9.10536 9.48043 9 9.73478 9 10V17C9 17.2652 9.10536 17.5196 9.29289 17.7071C9.48043 17.8946 9.73478 18 10 18C10.2652 18 10.5196 17.8946 10.7071 17.7071C10.8946 17.5196 11 17.2652 11 17Z" fill="#F24242"></path>
                                       <path d="M15 17V10C15 9.73478 14.8946 9.48043 14.7071 9.29289C14.5196 9.10536 14.2652 9 14 9C13.7348 9 13.4804 9.10536 13.2929 9.29289C13.1054 9.48043 13 9.73478 13 10V17C13 17.2652 13.1054 17.5196 13.2929 17.7071C13.4804 17.8946 13.7348 18 14 18C14.2652 18 14.5196 17.8946 14.7071 17.7071C14.8946 17.5196 15 17.2652 15 17Z" fill="#F24242"></path>
                                    </svg>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                 </span>
                              </div>
                           </div>
                           <div id="ambulance-1" class="collapse">
                              <div class="row mt-5">
                                 <div class="col-md-4 text-field pb-4">
                                    <label for="ambulance_capacity-1">Ambulance Capacity<span>*</span></label>
                                    <select id="ambulance_capacity-1" autocapitalize="none" autocomplete="off" autocorrect="off" name="ambulance_capacity-1" spellcheck="false" tabindex="0" aria-autocomplete="list" aria-expanded="false" aria-haspopup="true" role="combobox" value="" required class="bg-white">
                                       <option hidden value="">Select capacity</option>
                                       <option>Small</option>
                                       <option>Large</option>
                                    </select>
                                 </div>
                                 <div class="col-md-4 text-field pb-4">
                                    <label for="ambulance_animal_type-1">Type of animals handled<span>*</span></label>
                                    <select id="ambulance_animal_type-1" autocapitalize="none" autocomplete="off" autocorrect="off" name="ambulance_animal_type-1" spellcheck="false" tabindex="0" aria-autocomplete="list" aria-expanded="false" aria-haspopup="true" role="combobox" value="" required class="bg-white">
                                       <option hidden value="">Select type of animals</option>
                                       <option>Small Animal</option>
                                       <option>Large Animal</option>
                                    </select>
                                 </div>
                                 <div class="custom-checklist text-field pb-4 col-md-4">
                                    <div>
                                       <label for="ambulance_zone_id-1">Areas of operation<span>*</span></label>
                                       <div class="dropdown ambulance_zone_id-1">
                                          <input type="text" class="dropdown-btn bg-white" placeholder="Select areas" autocomplete="off">
                                          <span class="icon_down_dir">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.653564 0.39359C1.01452 -0.0244185 1.64599 -0.0706713 2.064 0.290282L8.03925 5.44996C8.22591 5.61114 8.50222 5.61215 8.69005 5.45233L14.7624 0.285542C15.183 -0.0723571 15.8141 -0.0215063 16.172 0.39912C16.5299 0.819747 16.4791 1.45087 16.0585 1.80877L9.00687 7.80877C8.63121 8.1284 8.0786 8.12639 7.70527 7.80402L0.756871 1.80403C0.338863 1.44307 0.292611 0.811598 0.653564 0.39359Z" fill="#ABABAB"></path>
                                             </svg>
                                          </span>
                                          <span class="selectedcount"></span>
                                          <div class="dropdown-content">
                                             <label><input type="checkbox" class="checkbox" value="A I Staff Colony">A I Staff Colony</label>
                                             <label><input type="checkbox" class="checkbox" value="Aareymilk Colony">Aareymilk Colony</label>
                                             <label><input type="checkbox" class="checkbox" value="Aagripada">Aagripada</label>
                                             <label><input type="checkbox" class="checkbox" value="Airport">Airport</label>
                                             <label><input type="checkbox" class="checkbox" value="Ambewadi">Ambewadi</label>
                                             <label><input type="checkbox" class="checkbox" value="Andheri">Andheri</label>
                                             <label><input type="checkbox" class="checkbox" value="Andheri East">Andheri East</label>
                                             <label><input type="checkbox" class="checkbox" value="Andheri Railway Station">Andheri Railway Station</label>
                                             <label><input type="checkbox" class="checkbox" value="Antop Hill">Antop Hill</label>
                                             <label><input type="checkbox" class="checkbox" value="Asvini">Asvini</label>
                                             <label><input type="checkbox" class="checkbox" value="Azad Nagar">Azad Nagar</label>
                                             <label><input type="checkbox" class="checkbox" value="Asvini">Asvini</label>
                                             <label><input type="checkbox" class="checkbox" value="B P T Colony">B P T Colony</label>
                                             <label><input type="checkbox" class="checkbox" value="B.N. Bhavan">B.N. Bhavan</label>
                                             <label><input type="checkbox" class="checkbox" value="B.P. Lane">B.P. Lane</label>
                                             <label><input type="checkbox" class="checkbox" value="Bandra West">Bandra West</label>
                                             <label><input type="checkbox" class="checkbox" value="Bandra(east)">Bandra(east)</label>
                                             <label><input type="checkbox" class="checkbox" value="Bangur Nagar">Bangur Nagar</label>
                                             <label><input type="checkbox" class="checkbox" value="Bazargate">Bazargate</label>
                                             <label><input type="checkbox" class="checkbox" value="Best Staff Colony">Best Staff Colony</label>
                                             <label><input type="checkbox" class="checkbox" value="Bharat Nagar">Bharat Nagar</label>
                                             <label><input type="checkbox" class="checkbox" value="Bhawani Shankar">Bhawani Shankar</label>
                                             <label><input type="checkbox" class="checkbox" value="Bhawani Shankar rd">Bhawani Shankar rd</label>
                                             <label><input type="checkbox" class="checkbox" value="Borivali">Borivali</label>
                                             <label><input type="checkbox" class="checkbox" value="Borivali East">Borivali East</label>
                                             <label><input type="checkbox" class="checkbox" value="Borivali West">Borivali West</label>
                                             <label><input type="checkbox" class="checkbox" value="C G S Colony">C G S Colony</label>
                                             <label><input type="checkbox" class="checkbox" value="Central Building">Central Building</label>
                                             <label><input type="checkbox" class="checkbox" value="Century Mill">Century Mill</label>
                                             <label><input type="checkbox" class="checkbox" value="Chakala Midc">Chakala Midc</label>
                                             <label><input type="checkbox" class="checkbox" value="Chamarbaug">Chamarbaug</label>
                                             <label><input type="checkbox" class="checkbox" value="Charkop">Charkop</label>
                                             <label><input type="checkbox" class="checkbox" value="Charni Road">Charni Road</label>
                                             <label><input type="checkbox" class="checkbox" value="Chaupati">Chaupati</label>
                                             <label><input type="checkbox" class="checkbox" value="Chinchbunder">Chinchbunder</label>
                                             <label><input type="checkbox" class="checkbox" value="Chinchpokli">Chinchpokli</label>
                                             <label><input type="checkbox" class="checkbox" value="Churchgate">Churchgate</label>
                                             <label><input type="checkbox" class="checkbox" value="Colaba">Colaba</label>
                                             <label><input type="checkbox" class="checkbox" value="Cotton Exchange">Cotton Exchange</label>
                                             <label><input type="checkbox" class="checkbox" value="Cumballa Hill">Cumballa Hill</label>
                                             <label><input type="checkbox" class="checkbox" value="Cumballa sea face">Cumballa sea face</label>
                                             <label><input type="checkbox" class="checkbox" value="Dadar">Dadar</label>
                                             <label><input type="checkbox" class="checkbox" value="Dadar Colony">Dadar Colony</label>
                                             <label><input type="checkbox" class="checkbox" value="Dahisar">Dahisar</label>
                                             <label><input type="checkbox" class="checkbox" value="Dahisar Rs">Dahisar Rs</label>
                                             <label><input type="checkbox" class="checkbox" value="Danda">Danda</label>
                                             <label><input type="checkbox" class="checkbox" value="Daulat Nagar">Daulat Nagar</label>
                                             <label><input type="checkbox" class="checkbox" value="Delisle Road">Delisle Road</label>
                                             <label><input type="checkbox" class="checkbox" value="Dharavi">Dharavi</label>
                                             <label><input type="checkbox" class="checkbox" value="Dharavi Road">Dharavi Road</label>
                                             <label><input type="checkbox" class="checkbox" value="Dockyard Road">Dockyard Road</label>
                                             <label><input type="checkbox" class="checkbox" value="Dr Deshmukh marg">Dr Deshmukh marg</label>
                                             <label><input type="checkbox" class="checkbox" value="Falkland Road">Falkland Road</label>
                                             <label><input type="checkbox" class="checkbox" value="Girgaon">Girgaon</label>
                                             <label><input type="checkbox" class="checkbox" value="Gokhale Road">Gokhale Road</label>
                                             <label><input type="checkbox" class="checkbox" value="Goregaon">Goregaon</label>
                                             <label><input type="checkbox" class="checkbox" value="Goregaon East">Goregaon East</label>
                                             <label><input type="checkbox" class="checkbox" value="Goregaon Rs">Goregaon Rs</label>
                                             <label><input type="checkbox" class="checkbox" value="Government Colony">Government Colony</label>
                                             <label><input type="checkbox" class="checkbox" value="Gowalia Tank">Gowalia Tank</label>
                                             <label><input type="checkbox" class="checkbox" value="Grant Road">Grant Road</label>
                                             <label><input type="checkbox" class="checkbox" value="H.M.P. School">H.M.P. School</label>
                                             <label><input type="checkbox" class="checkbox" value="Haffkin Institute">Haffkin Institute</label>
                                             <label><input type="checkbox" class="checkbox" value="Haines Road">Haines Road</label>
                                             <label><input type="checkbox" class="checkbox" value="Hajiali">Hajiali</label>
                                             <label><input type="checkbox" class="checkbox" value="Hanuman Road">Hanuman Road</label>
                                             <label><input type="checkbox" class="checkbox" value="High Court Building">High Court Building</label>
                                             <label><input type="checkbox" class="checkbox" value="Hiliday Camp">Hiliday Camp</label>
                                             <label><input type="checkbox" class="checkbox" value="Irla">Irla</label>
                                             <label><input type="checkbox" class="checkbox" value="Ins Hamla">Ins Hamla</label>
                                             <label><input type="checkbox" class="checkbox" value="International Airport">International Airport</label>
                                             <label><input type="checkbox" class="checkbox" value="J.B. Nagar">J.B. Nagar</label>
                                             <label><input type="checkbox" class="checkbox" value="J.J. Hospital">J.J. Hospital</label>
                                             <label><input type="checkbox" class="checkbox" value="Jacob Circle">Jacob Circle</label>
                                             <label><input type="checkbox" class="checkbox" value="Jogeshwari East">Jogeshwari East</label>
                                             <label><input type="checkbox" class="checkbox" value="Jogeshwari West">Jogeshwari West</label>
                                             <label><input type="checkbox" class="checkbox" value="Juhu">Juhu</label>
                                             <label><input type="checkbox" class="checkbox" value="Kalachowki">Kalachowki</label>
                                             <label><input type="checkbox" class="checkbox" value="Kalbadevi">Kalbadevi</label>
                                             <label><input type="checkbox" class="checkbox" value="Kamathipura">Kamathipura</label>
                                             <label><input type="checkbox" class="checkbox" value="Kandavali East">Kandavali East</label>
                                             <label><input type="checkbox" class="checkbox" value="Kandavali West">Kandavali West</label>
                                             <label><input type="checkbox" class="checkbox" value="Kapda Bazar">Kapda Bazar</label>
                                             <label><input type="checkbox" class="checkbox" value="Ketkipada">Ketkipada</label>
                                             <label><input type="checkbox" class="checkbox" value="Khar Colony">Khar Colony</label>
                                             <label><input type="checkbox" class="checkbox" value="Khar Delivery">Khar Delivery</label>
                                             <label><input type="checkbox" class="checkbox" value="Kharodi">Kharodi</label>
                                             <label><input type="checkbox" class="checkbox" value="Kherwadi">Kherwadi</label>
                                             <label><input type="checkbox" class="checkbox" value="Kadwai Nagar">Kadwai Nagar</label>
                                             <label><input type="checkbox" class="checkbox" value="L B s n e collage">L B s n e collage</label>
                                             <label><input type="checkbox" class="checkbox" value="Lal Baug">Lal Baug</label>
                                             <label><input type="checkbox" class="checkbox" value="Liberty Garden">Liberty Garden</label>
                                             <label><input type="checkbox" class="checkbox" value="M A marg">M A marg</label>
                                             <label><input type="checkbox" class="checkbox" value="M.P.t.">M.P.t.</label>
                                             <label><input type="checkbox" class="checkbox" value="Madh">Charkop</label>
                                             <label><input type="checkbox" class="checkbox" value="Madhavbaug">Madhavbaug</label>
                                             <label><input type="checkbox" class="checkbox" value="Magthane">Magthane</label>
                                             <label><input type="checkbox" class="checkbox" value="Mahin">Mahin</label>
                                             <label><input type="checkbox" class="checkbox" value="Mahin Bazar">Mahin Bazar</label>
                                             <label><input type="checkbox" class="checkbox" value="Mahim East">Mahim East</label>
                                             <label><input type="checkbox" class="checkbox" value="Malabar Hill">Malabar Hill</label>
                                             <label><input type="checkbox" class="checkbox" value="Malad">Malad</label>
                                             <label><input type="checkbox" class="checkbox" value="Malad East">Malad East</label>
                                             <label><input type="checkbox" class="checkbox" value="Malad West dely">Malad West dely</label>
                                             <label><input type="checkbox" class="checkbox" value="Mandapeshwar">Mandapeshwar</label>
                                             <label><input type="checkbox" class="checkbox" value="Mandvi">Mandvi</label>
                                             <label><input type="checkbox" class="checkbox" value="Mantralaya">Mantralaya</label>
                                             <label><input type="checkbox" class="checkbox" value="Marine Lines">Marine Lines</label>
                                             <label><input type="checkbox" class="checkbox" value="Marol Bazar">Marol Bazar</label>
                                             <label><input type="checkbox" class="checkbox" value="Marol Naka">Marol Naka</label>
                                             <label><input type="checkbox" class="checkbox" value="Masjid">Masjid</label>
                                             <label><input type="checkbox" class="checkbox" value="Matunga Railway workshop">Matunga Railway workshop</label>
                                             <label><input type="checkbox" class="checkbox" value="Mazgaon">Mazgaon</label>
                                             <label><input type="checkbox" class="checkbox" value="Mazgaon Dock">Mazgaon Dock</label>
                                             <label><input type="checkbox" class="checkbox" value="Mazgaon Road">Mazgaon Road</label>
                                             <label><input type="checkbox" class="checkbox" value="Mori Road">Mori Road</label>
                                             <label><input type="checkbox" class="checkbox" value="Motilal Nagar">Motilal Nagar</label>
                                             <label><input type="checkbox" class="checkbox" value="Mumbai Central">Mumbai Central</label>
                                             <label><input type="checkbox" class="checkbox" value="Mumbai">Mumbai</label>
                                             <label><input type="checkbox" class="checkbox" value="N . s.patkar">N . s.patkar</label>
                                             <label><input type="checkbox" class="checkbox" value="Nagardas Road">Nagardas Road</label>
                                             <label><input type="checkbox" class="checkbox" value="Nagari Niwara">Nagari Niwara</label>
                                             <label><input type="checkbox" class="checkbox" value="Naigaon">Naigaon</label>
                                             <label><input type="checkbox" class="checkbox" value="Nariman Point">Nariman Point</label>
                                             <label><input type="checkbox" class="checkbox" value="New Prabhadevi road">New Prabhadevi road</label>
                                             <label><input type="checkbox" class="checkbox" value="New Yogakshema">New Yogakshema</label>
                                             <label><input type="checkbox" class="checkbox" value="Noor Baug">Noor Baug</label>
                                             <label><input type="checkbox" class="checkbox" value="Null Bazar">Null Bazar</label>
                                             <label><input type="checkbox" class="checkbox" value="Opera House">Opera House</label>
                                             <label><input type="checkbox" class="checkbox" value="Orlem">Orlem</label>
                                             <label><input type="checkbox" class="checkbox" value="Oshiwara">Oshiwara</label>
                                             <label><input type="checkbox" class="checkbox" value="Parel">Parel</label>
                                             <label><input type="checkbox" class="checkbox" value="Parel Naka">Parel Naka</label>
                                             <label><input type="checkbox" class="checkbox" value="Parel Rly work shop">Parel Rly work shop</label>
                                             <label><input type="checkbox" class="checkbox" value="Prabhadevi">Prabhadevi</label>
                                             <label><input type="checkbox" class="checkbox" value="Princess Dock">Princess Dock</label>
                                             <label><input type="checkbox" class="checkbox" value="Rajbhavan">Rajbhavan</label>
                                             <label><input type="checkbox" class="checkbox" value="Rajendra Nagar">Rajendra Nagar</label>
                                             <label><input type="checkbox" class="checkbox" value="Ramwadi">Ramwadi</label>
                                             <label><input type="checkbox" class="checkbox" value="Ranade Road">Ranade Road</label>
                                             <label><input type="checkbox" class="checkbox" value="Rani Sati marg">Rani Sati marg</label>
                                             <label><input type="checkbox" class="checkbox" value="Reay Road">Reay Road</label>
                                             <label><input type="checkbox" class="checkbox" value="S R p f camp">S R p f camp</label>
                                             <label><input type="checkbox" class="checkbox" value="S Savarkar marg">S Savarkar marg</label>
                                             <label><input type="checkbox" class="checkbox" value="S V marg">S V marg</label>
                                             <label><input type="checkbox" class="checkbox" value="S. c. court">S. c. court</label>
                                             <label><input type="checkbox" class="checkbox" value="S. k.nagar">S. k.nagar</label>
                                             <label><input type="checkbox" class="checkbox" value="Sahar P & t colony">Sahar P & t colony</label>
                                             <label><input type="checkbox" class="checkbox" value="Sahargaon">Sahargaon</label>
                                             <label><input type="checkbox" class="checkbox" value="Santacruz Central">Santacruz Central</label>
                                             <label><input type="checkbox" class="checkbox" value="Santacruz P&t colony">Santacruz P&t colony</label>
                                             <label><input type="checkbox" class="checkbox" value="Santacruz(east)">Santacruz(east)</label>
                                             <label><input type="checkbox" class="checkbox" value="Santacruz(west)">Santacruz(west)</label>
                                             <label><input type="checkbox" class="checkbox" value="Secretariate">Secretariate</label>
                                             <label><input type="checkbox" class="checkbox" value="Seepz">Seepz</label>
                                             <label><input type="checkbox" class="checkbox" value="Sewri">Sewri</label>
                                             <label><input type="checkbox" class="checkbox" value="Sharma Estate">Sharma Estate</label>
                                             <label><input type="checkbox" class="checkbox" value="Shivaji Park">Shivaji Park</label>
                                             <label><input type="checkbox" class="checkbox" value="Shroff Mahajan">Shroff Mahajan</label>
                                             <label><input type="checkbox" class="checkbox" value="Stock Exchange">Stock Exchange</label>
                                             <label><input type="checkbox" class="checkbox" value="Tajmahal">Tajmahal</label>
                                             <label><input type="checkbox" class="checkbox" value="Tank Road">Tank Road</label>
                                             <label><input type="checkbox" class="checkbox" value="Tardeo">Tardeo</label>
                                             <label><input type="checkbox" class="checkbox" value="Thakurdwar">Thakurdwar</label>
                                             <label><input type="checkbox" class="checkbox" value="Town Hall">Town Hall</label>
                                             <label><input type="checkbox" class="checkbox" value="Tulsiwadi">Tulsiwadi</label>
                                             <label><input type="checkbox" class="checkbox" value="V J b udyan">V J b udyan</label>
                                             <label><input type="checkbox" class="checkbox" value="V K bhavan">V K bhavan</label>
                                             <label><input type="checkbox" class="checkbox" value="V.P. road">V.P. road</label>
                                             <label><input type="checkbox" class="checkbox" value="V.W.t.c.">V.W.t.c.</label>
                                             <label><input type="checkbox" class="checkbox" value="Vakola">Vakola</label>
                                             <label><input type="checkbox" class="checkbox" value="Vesava">Vesava</label>
                                             <label><input type="checkbox" class="checkbox" value="Vidyanagari">Vidyanagari</label>
                                             <label><input type="checkbox" class="checkbox" value="Vileeparle (east)">Vileeparle (east)</label>
                                             <label><input type="checkbox" class="checkbox" value="Vileparle Railway Station">Vileparle Railway Station</label>
                                             <label><input type="checkbox" class="checkbox" value="Vileparle(west)">Vileparle(west)</label>
                                             <label><input type="checkbox" class="checkbox" value="Wadala">Wadala</label>
                                             <label><input type="checkbox" class="checkbox" value="Wadala Rs">Wadala Rs</label>
                                             <label><input type="checkbox" class="checkbox" value="Worli">Worli</label>
                                             <label><input type="checkbox" class="checkbox" value="Worli Colony">Worli Colony</label>
                                             <label><input type="checkbox" class="checkbox" value="Worli Naka">Worli Naka</label>
                                             <label><input type="checkbox" class="checkbox" value="Worli Police camp">Worli Police camp</label>
                                             <label><input type="checkbox" class="checkbox" value="Worli Sea face">Worli Sea face</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 text-field pb-4">
                                    <label for="ambulance_contact_no-1">Contact number<span>*</span></label>
                                    <input placeholder="Enter Contact No." type="text" name="ambulance_contact_no-1" id="ambulance_contact_no-1" min="0" minlength="1" maxlength autocomplete="on" value="" required class="bg-white">
                                 </div>
                                 <div class="col-md-4 text-field pb-4">
                                    <label for="ambulance_emergency_no-1">Emergency contact number<span>*</span></label>
                                    <input placeholder="Enter Emergency No." type="text" name="ambulance_emergency_no-1" id="ambulance_emergency_no-1" min="0" minlength="1" maxlength autocomplete="on" value="" required class="bg-white">
                                 </div>
                                 <div class="col-md-4 text-field pb-4">
                                    <label for="ambulance_cost-1">Ambulance cost<span>*</span></label>
                                    <select id="ambulance_cost-1" autocapitalize="none" autocomplete="off" autocorrect="off" name="ambulance_cost-1" spellcheck="false" tabindex="0" aria-autocomplete="list" aria-expanded="false" aria-haspopup="true" role="combobox" value="" required class="bg-white">
                                       <option hidden value="">Select ambulance cost</option>
                                       <option>Chargeable</option>
                                       <option>Free of cost</option>
                                    </select>
                                 </div>
                                 <div class="col-md-6 text-field pb-4">
                                    <label for="start-time-1">Operational hours for the ambulance<span>*</span></label>
                                    <input placeholder="Start Time" type="time" name="start-time-1" id="start-time-1" autocomplete="on" value="" required class="bg-white">
                                 </div>
                                 <div class="col-md-6 text-field pb-4">
                                    <label for="end-time-1">&nbsp;</label>
                                    <input placeholder="End Time" type="time" name="end-time-1" id="end-time-1" autocomplete="on" value="" required class="bg-white">
                                 </div>
                                 <div class="col-md-12 text-field">
                                    <label for="ambulance_equipment-1">Equipment that the ambulance carries<span>*</span></label>
                                    <div class="descrip-upload-wrapp bg-white col-md-12">
                                       <textarea name="ambulance_equipment-1" class="w-100" placeholder="Enter equipment names" id="ambulance_equipment-1" cols="25" rows="5"></textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="add-more-btn mb-5">
                           <span>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                 <g clip-path="url(#clip0_8785_48582)">
                                    <path d="M13 7H11V11H7V13H11V17H13V13H17V11H13V7ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" fill="#07775C"></path>
                                    <path d="M13 7H11V11H7V13H11V17H13V13H17V11H13V7ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" fill="black" fill-opacity="0.2"></path>
                                 </g>
                                 <defs>
                                    <clipPath id="clip0_8785_48582">
                                       <rect width="24" height="24" fill="white"></rect>
                                    </clipPath>
                                 </defs>
                              </svg>
                           </span>
                           <p>Add more Ambulance</p>
                        </div>
                     </div>
                  </div>

                  <p class="register-field-title pt-0">Enter applicant's information</p>
                  <div class="row">
                     <div class="col-md-4 text-field">
                        <label for="full_name">Full Name<span>*</span></label>
                        <input placeholder="Enter Full Name" type="text" name="full_name" id="full_name" min="0" minlength="1" maxlength="" autocomplete="on" value="" required>
                     </div>
                     <div class="col-md-4 text-field">
                        <label for="mobile">Mobile No.<span>*</span></label>
                        <input placeholder="Enter Mobile No." type="text" name="mobile" id="mobile" min="0" minlength="10" maxlength="10" autocomplete="on" value="" required onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57">
                     </div>
                     <div class="col-md-4 text-field">
                        <label for="email">Email ID<span>*</span></label>
                        <input placeholder="Enter Email ID" type="email" name="email" id="email" min="0" minlength="1" maxlength="" autocomplete="on" value="" required>
                     </div>
                  </div>
                  <p class="register-field-title pt-5 pb-3">Are you interested in volunteering?</p>
                  <div class="d-flex checkbox-wrapp flex-column">
                     <div class="checkbox-btn">
                        <input name="is_volunteering" type="checkbox" id="is_volunteering" value="Interested in volunteering for drives and initiatives by VHD Mumbai">
                        <label for="is_volunteering">Interested in volunteering for drives and initiatives by VHD Mumbai</label>
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
            $('.extra-fields').on('click', '.accordion-single', function(e) {
               e.preventDefault();
               $(this).parent().toggleClass('active');
               var accTab = $(this).attr('href');
               $(this).parent().find(accTab).toggleClass('show');
            });

            // Define the maximum number of accordion wrappers allowed
            const maxContactAccordion = 3;
            $('.add-more-btn').on('click', function() {
               // Find the parent container of the clicked button
               var parentWrapper = $(this).closest('.extra-fields');

               // Get the current number of accordion wrappers inside this parent
               var currentCount = parentWrapper.find('.accordion-wrapp').length;
               var wrapperId = parentWrapper.attr('id');

               if (wrapperId == 'contact-wrapper') {
                  // Check if we haven't exceeded the max limit for contact details
                  if (currentCount < maxContactAccordion) {
                     // Clone the last accordion wrapper in this parent container
                     var newAccordion = parentWrapper.find('.accordion-wrapp').last().clone();

                     // Find the next index for IDs (e.g., 'contact-wrapp-1' -> '2')
                     var newIndex = currentCount + 1;

                     // Update the IDs and names for the cloned elements
                     newAccordion.find('.accordion-single').attr('href', '#contact-' + newIndex)
                     .find('p').text('Contact Detail - ' + newIndex);
                     newAccordion.attr('id', 'contact-wrapp-' + newIndex);
                     newAccordion.find('.collapse').attr('id', 'contact-' + newIndex);
                     newAccordion.find('input').each(function() {
                        var name = $(this).attr('name');
                        var id = $(this).attr('id');
                        var labelFor = $('label[for="' + id + '"]'); // Find the label with the 'for' attribute matching the id
                        // Update 'name', 'id', and 'for' attributes for each input, select, or textarea
                        if (name) {
                           $(this).attr('name', name.replace(/-\d+/, '-' + newIndex)); // Update the name
                        }
                        if (id) {
                           $(this).attr('id', id.replace(/-\d+/, '-' + newIndex)); // Update the ID
                        }
                     });

                     // Append the cloned accordion wrapper to the parent container
                     newAccordion.insertBefore($(this)); // Insert before the "Add More" button
                  } else {
                     alert('Maximum of 3 contact details are allowed.');
                  }
               } else if (wrapperId == 'ambulance-wrapper') {
                  // No limit for adding new ambulances, clone the last accordion wrapper in this parent container
                  var newAccordion = parentWrapper.find('.accordion-wrapp').last().clone();

                  // Find the next index for IDs (e.g., 'ambulance-wrapp-1' -> '2')
                  var newIndex = currentCount + 1;

                  // Update the IDs and names for the cloned elements
                  newAccordion.find('.accordion-single').attr('href', '#ambulance-' + newIndex)
                  .find('p').text('Ambulance Info - ' + newIndex);
                  newAccordion.attr('id', 'ambulance-wrapp-' + newIndex);
                  newAccordion.find('.collapse').attr('id', 'ambulance-' + newIndex);
                  newAccordion.find('input, select, textarea').each(function() {
                     var name = $(this).attr('name');
                     var id = $(this).attr('id');
                     var labelFor = $('label[for="' + id + '"]'); // Find the label with the 'for' attribute matching the id
                     // Update 'name', 'id', and 'for' attributes for each input, select, or textarea
                     if (name) {
                        $(this).attr('name', name.replace(/-\d+/, '-' + newIndex)); // Update the name
                     }
                     if (id) {
                        $(this).attr('id', id.replace(/-\d+/, '-' + newIndex)); // Update the ID
                     }
                  });

                  // Append the cloned accordion wrapper to the parent container
                  newAccordion.insertBefore($(this)); // Insert before the "Add More" button
               }
               parentWrapper.find('.delete-icon svg').show();
            });

            // Bind delete action to each delete icon (SVG)
            $(document).on('click', '.accordion-wrapp .delete-icon svg', function() {
               var parentWrapper = $(this).closest('.extra-fields');
               var accordionWrapper = $(this).closest('.accordion-wrapp');
               accordionWrapper.remove();
               updateAccordionIndexes(parentWrapper);
            });

            // Function to update the IDs, href, and name attributes after deleting an accordion
            function updateAccordionIndexes(parentWrapper) {
               var remainingWrappers = parentWrapper.find('.accordion-wrapp');
               var lastIndex = 0;

               // Iterate over each remaining wrapper and update its attributes
               remainingWrappers.each(function(index) {
                  var newIndex = index + 1;

                  // Update ID
                  var currentId = $(this).attr('id');
                  $(this).attr('id', currentId.replace(/-\d+$/, '-' + newIndex));

                  // Update href
                  $(this).find('.accordion-single').each(function() {
                     var currentHref = $(this).attr('href');
                     $(this).attr('href', currentHref.replace(/-\d+$/, '-' + newIndex));
                  });

                  // Update text inside <p> tag (only the number part)
                  $(this).find('p').each(function() {
                     var currentText = $(this).text();
                     // Assuming the text follows the format 'Accordion X' where X is the number
                     $(this).text(currentText.replace(/\d+$/, newIndex));
                  });

                  // Update IDs, names, and labels for each input
                  $(this).find('input, select, textarea').each(function() {
                     var name = $(this).attr('name');
                     var id = $(this).attr('id');

                     if (name) {
                        $(this).attr('name', name.replace(/-\d+/, '-' + newIndex)); // Update the name
                     }
                     if (id) {
                        $(this).attr('id', id.replace(/-\d+/, '-' + newIndex)); // Update the ID
                     }
                  });

                  // Update the label "for" attribute
                  $(this).find('label').each(function() {
                     var labelFor = $(this).attr('for');
                     if (labelFor) {
                        $(this).attr('for', labelFor.replace(/-\d+/, '-' + newIndex));
                     }
                  });
                  lastIndex = newIndex;
               });
               if (lastIndex == 1) { parentWrapper.find('.delete-icon svg').hide(); }
            }

            $('.selectedcount').hide();
            // Toggle the dropdown content on button click
            $('.extra-fields').on('click', '.custom-checklist .dropdown-btn', function() {
               $(this).siblings('.dropdown-content').toggle();
            });

            // Update button text based on the selected checkboxes
            $('.extra-fields').on('change', '.custom-checklist .dropdown-content input[type="checkbox"]', function() {
               var selected = [];
               var selectedCount = 0;
               $(this).parent().removeClass('active');

               // Collect selected options
               $('.custom-checklist .dropdown-content input[type="checkbox"]:checked').each(function() {
                  selectedCount++;
                  $(this).parent().addClass('active');
                  selected.push($(this).val());
               });

               // Update the button text with selected options
               if (selectedCount > 0) {
                  $(this).parents('.dropdown').find('.selectedcount').show();
                  $(this).parents('.dropdown').find('.selectedcount').text(selectedCount);
               } else {
                  $(this).parents('.dropdown').find('.dropdown-btn').text('Select areas');
                  $(this).parents('.dropdown').find('.selectedcount').hide();
               }
            });
         });
      </script>
   </body>
</html>