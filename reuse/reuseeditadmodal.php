<div class="modal-dialog">

<!-- Modal content-->
    <div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Edit Details</h4>
       </div>
       <div class="modal-body">
           <form id="edit_advertisment_form">
               <div id="edit_ad_success_alert"  class="alert alert-success alert-dismissible" style="display: none;">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                   <strong>Success!</strong> Your ad has been posted.
               </div>

               <div id="edit_ad_failure_alert"  class="alert alert-danger alert-dismissible" style="display:none;">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                   <strong>Sorry!</strong> Please check the red highlighted field
               </div>

               <fieldset>
               <p class="h4">Address</p>
                   <div class="form-group row">
                       <label for="edit_address_city_txt" class="col-sm-2 col-form-label">City/Town</label>
                           <div class="col-sm-10">
                           <input type="text" class="form-control" id="edit_address_city_txt" placeholder="Enter city or town name">
                           </div>
                   </div>  
                   
                   <div class="form-group row">
                       <label for="edit_address_area_txt" class="col-sm-2 col-form-label">Area</label>
                           <div class="col-sm-10">
                           <input type="text" class="form-control" id="edit_address_area_txt" placeholder="Enter area name/code">
                           </div>
                   </div>
                   
                   <div class="form-group row">
                       <label for="edit_address_street_txt" class="col-sm-2 col-form-label">Street</label>
                           <div class="col-sm-10">
                           <input type="text" class="form-control" id="edit_address_street_txt" placeholder="Enter street name">
                           </div>
                   </div>

                   <div class="form-group row">
                       <label for="edit_address_house_no_txt" class="col-sm-2 col-form-label">Building No.</label>
                           <div class="col-sm-10">
                           <input type="text" class="form-control" id="edit_address_house_no_txt" placeholder="Enter building/house number">
                           </div>
                   </div>

                       </fieldset>
                           <fieldset>
                           <p class="h5">Accomodation</p>
                               <p id="edit_tenant_error" style="color:red; text-align:left;font-weight: bold; display: none">Select your preffered tenant!</p>
                               <div class="form-group">
                                   <label for="edit_tenant_type_cb">Select Tenant</label>
                                   <select class="form-control" id="edit_tenant_type_cb">
                                   <option disabled selected>Select Preffered Tenant</option>
                                   <option value="student">Student</option>
                                   <option value="professionals">Professionals</option>
                                   <option value="family">Family</option>
                                   <option value="guest">Guest</option>
                                   <option value="hmo">Anyone</option>
                                   </select>
                               </div>
                               
                                                              
                               <br>


                               <!-- Single Student Avial Units -->

                               <div class="combo-box-result" id="edit_student_option">
                               <div class="form-row">
                                   <div class="form-group col-md-6">
                                   <label for="edit_no_single_student_room">Single Room</label>
                                   <input type="number" class="form-control" id="edit_no_single_student_room" pattern="[0-9]*" placeholder="Enter Available Units">
                                   </div>
                                   <div class="form-group col-md-6">
                                   <label for="edit_no_single_student_room_rent">Rent P/M (R)</label>
                                   <input type="number" class="form-control" id="edit_no_single_student_room_rent" placeholder="Enter Monthly Rent" pattern="[0-9]*" placeholder="Enter Rent Amount">
                                   </div>
                               </div>
                               <!-- Sharing Student Avial Units -->
                               
                               <div class="form-row">
                                       <div  class="form-group col-md-6">
                                       <label for="edit_no_sharing_student_room">Sharing Room</label>
                                       <input type="number" class="form-control" id="edit_no_sharing_student_room" pattern="[0-9]*" placeholder="Enter Available Units">
                                       </div>
                                       <div class="form-group col-md-6">
                                       <label for="edit_no_sharing_student_room_rent">Rent P/M (R)</label>
                                       <input type="number" class="form-control" id="edit_no_sharing_student_room_rent" placeholder="Enter Monthly Rent" pattern="[0-9]*" placeholder="Enter Rent Amount">
                                       </div>
                                   </div>

                                   <p class="h5">Select features</p>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="edit_wifi_check">
                                <label class="form-check-label" for="edit_wifi_check">
                                    Wi-Fi
                                </label>
                                </div>

                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="edit_transport_check">
                                <label class="form-check-label" for="edit_transport_check">
                                    School transport 
                                </label>
                                </div>

                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="edit_laundry_check">
                                <label class="form-check-label" for="edit_laundry_check">
                                    Laundry appliances
                                </label>
                                </div>

                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="edit_car_check">
                                <label class="form-check-label" for="edit_car_check">
                                    Student car parking
                                </label>
                                </div>
                                
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="edit_pool_check">
                                <label class="form-check-label" for="edit_pool_check">
                                    Swimming pool
                                </label>
                                </div>
                               </div>

                               <!-- Profesionals Avial Units -->

                               <div class="combo-box-result" id="edit_professionals_option">
                               <div class="form-row">
                                       <div  class="form-group col-md-6">
                                       <label for="edit_no_professional_room">Unit(s)</label>
                                       <input type="number" class="form-control" id="edit_no_professional_room" pattern="[0-9]*" placeholder="Enter Available Units">
                                       </div>
                                       <div class="form-group col-md-6">
                                       <label for="edit_no_professional_room_price">Rent P/M (R)</label>
                                       <input type="number" class="form-control" id="edit_no_professional_room_price" placeholder="Enter Monthly Rent" pattern="[0-9]*" placeholder="Enter Rent Amount">
                                       </div>
                               </div>
                               <p class="h5">Highlight features</p>
                                <small class="text-muted">* This is per unit</small>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="edit_bedroom_num_select">Bedrooms</label>
                                    </div>
                                    <select class="custom-select" id="edit_bedroom_num_select">
                                        <option selected>Choose...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">5</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="edit_bathrooms_num_select">Bathrooms</label>
                                    </div>
                                    <select class="custom-select" id="edit_bathrooms_num_select">
                                        <option selected>Choose...</option>
                                        <option value="1" >1</option>
                                        <option value="2">2 </option>
                                        <option value="3">3 </option>
                                        <option value="4">4 </option>
                                        <option value="5">5 </option>
                                    </select>
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="edit_garage_num_select">Car Storage</label>
                                    </div>
                                    <select class="custom-select" id="edit_garage_num_select">
                                        <option selected>Choose...</option>
                                        <option value="0" >None</option>
                                        <option value="1" >1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="edit_pet_select">Pets? </label>
                                    </div>
                                    <select class="custom-select" id="edit_pet_select">
                                        <option selected>Choose...</option>
                                        <option value="0" >No</option>
                                        <option value="1" >Yes</option>
                                    </select>
                                </div>
                               </div>

                               <!-- Family Avail  Bedrooms -->

                               <div class="combo-box-result" id="edit_family_option_room">
                                   <div class="form-row">
                                       <div  class="form-group col-md-6">
                                       <label for="edit_family_bed_room">Bedroom</label>
                                       <input type="number" class="form-control" id="edit_family_bed_room" pattern="[0-9]*" placeholder="Enter No. of Bedroom">
                                       </div>
                                       <div class="form-group col-md-6">
                                       <label for="edit_family_bed_room_rent">Rent P/M (R)</label>
                                       <input type="number" class="form-control" id="edit_family_bed_room_rent" placeholder="Enter Monthly Rent" pattern="[0-9]*" placeholder="Enter Rent Amount">
                                       </div>
                                   </div>
                               </div>

                               <!-- Anyone Avail  Bedrooms -->
                               <div class="combo-box-result" id="edit_anyone_option_room">

                               <div class="form-row">
                                       <div  class="form-group col-md-6">
                                       <label for="edit_any_room">Unit(s)</label>
                                       <input type="number" class="form-control" id="edit_any_room" pattern="[0-9]*" placeholder="Enter Available Units">
                                       </div>
                                       <div class="form-group col-md-6">
                                       <label for="edit_any_room_rent">Rent P/M (R)</label>
                                       <input type="number" class="form-control" id="edit_any_room_rent" placeholder="Enter Monthly Rent" pattern="[0-9]*" placeholder="Enter Rent Amount">
                                       </div>
                               </div>

                               </div>

                               <!-- Guest house Units -->

                               <div class="combo-box-result" id="edit_guest_house">

                               <div class="form-group row">
                                <label for="address_area_txt" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="edit_guesthouse_name_txt" placeholder="Enter Guest House name">
                                </div>
                                </div>

                               <div class="form-row">
                               <div  class="form-group col-md-6">
                                       <label for="edit_no_guest_day_room">Day Rest:</label>
                                       <input type="number" class="form-control" id="edit_no_guest_day_room" pattern="[0-9]*" placeholder="Available Rooms">
                                       </div>
                                       <div class="form-group col-md-6">
                                       <label for="edit_no_guest_day_room_price">Price (R):</label>
                                       <input type="number" class="form-control" id="edit_no_guest_day_room_price" placeholder="Enter Price" pattern="[0-9]*" placeholder="Enter Rent Amount">
                                       </div>
                               </div>
                               <div class="form-row">
                                   <div  class="form-group col-md-6">
                                       <label for="edit_no_guest_over_room">Over Night:</label>
                                       <input type="number" class="form-control" id="edit_no_guest_over_room" pattern="[0-9]*" placeholder="Available Rooms">
                                       </div>
                                   <div class="form-group col-md-6">
                                       <label for="edit_no_guest_over_room_price">Price (R):</label>
                                       <input type="number" class="form-control" id="edit_no_guest_over_room_price" placeholder="Enter Price" pattern="[0-9]*" placeholder="Enter Rent Amount">
                                       </div>
                               </div>
                               <p class="h5">Select Features & Facilities</p>
                                
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="edit_guest_wifi_check">
                                <label class="form-check-label" for="edit_guest_wifi_check">
                                 Wi-Fi
                                </label>
                                </div>

                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="edit_guest_tv_check">
                                <label class="form-check-label" for="edit_guest_tv_check">
                                DSTV 
                                </label>
                                </div>

                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="edit_netflix_check">
                                <label class="form-check-label" for="edit_netflix_check">
                                Netflix 
                                </label>
                                </div>

                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="edit_lounge_check">
                                <label class="form-check-label" for="edit_lounge_check">
                                Lounge
                                </label>
                                </div>

                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="edit_breakfast_check">
                                <label class="form-check-label" for="edit_breakfast_check">
                                Breakfast
                                </label>
                                </div>

                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="edit_parking_check">
                                <label class="form-check-label" for="edit_parking_check">
                                Parking
                                </label>
                                </div>
                                
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="edit_guest_pool_check">
                                <label class="form-check-label" for="edit_guest_pool_check">
                                Swimming pool
                                </label>
                                </div>
                               </div>

                           </fieldset>
                           <fieldset>
                                <p class="h5">Description</p>
                               <div class="form-group">
                                   <textarea class="form-control" rows="10"
                                       id="edit_description"></textarea>
                               </div>
                           </fieldset>
                           

                           <fieldset>
                           <p class="h5">Upload Image</p>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="edit_ad_img_select" accept=".jpg, .jpeg, .png" multiple>
                            <label class="custom-file-label" for="edit_ad_img_select">Select Photo(s):</label>
                            </div>
                           
                       <div id="edit_preview" class="preview scrolling-wrapper">
                           
                         
                       </div>
                           </fieldset>

                           <fieldset>
                           <p class="h5">Contact</p>
                               <div class="form-group row">
                                <label for="edit_contact_person_txt" class="col-sm-3 col-form-label">Contact person</label>
                               <div class="col-sm-8">
                               <input type="text" class="form-control" id="edit_contact_person_txt" placeholder="Enter Name">
                            </div>
                           </div>
                               
                           <div class="form-group row">
                                <label for="edit_contact_person_tel_txt" class="col-sm-3 col-form-label">Contact numbers</label>
                               <div class="col-sm-8">
                               <input type="text" class="form-control" id="edit_contact_person_tel_txt" name="tel" placeholder="Enter contact numbers">
                            </div>
                           </div>
              
                           <div class="form-group row">
                                <label for="edit_contact_person_email_txt" class="col-sm-3 col-form-label">Email</label>
                               <div class="col-sm-8">
                               <input type="email" class="form-control" id="edit_contact_person_email_txt" name="email" placeholder="Enter email address">
                            </div>
                           </div>
                               
                           </fieldset>
                           <button id="update_post_btn" type="button"
                           class="btn btn-primary btn-block">Save Changes</button>
                           <button id="delete_post_btn" type="button" class="btn btn-danger btn-block">Delete Ad</button>
                       </form>
                   </div>
                   <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                   </div>
               </div>
</div>