 <div class="modal-dialog">

 <!-- Modal content-->
     <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Property Details</h4>
        </div>
        <div class="modal-body">
            <form id="advertisment_form">
                <div id="ad_success_alert"  class="alert alert-success alert-dismissible" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Your ad has been posted.
                </div>

                <div id="ad_failure_alert"  class="alert alert-danger alert-dismissible" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Sorry!</strong> Please check the red highlighted field(s)
                </div>

                <fieldset>
                    <legend>Address</legend>
                    <div id="address_city_div" class="form-group row">
                        <label for="address_city_txt" class="col-sm-2 col-form-label">City/Town</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="address_city_txt" placeholder="Enter city or town name">
                            </div>
                    </div>  
                    
                    <div id="address_area_div" class="form-group row">
                        <label for="address_area_txt" class="col-sm-2 col-form-label">Area</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="address_area_txt" placeholder="Enter area name/code">
                            </div>
                    </div>
                    
                    <div id="address_street_div" class="form-group row">
                        <label for="address_street_txt" class="col-sm-2 col-form-label">Street</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="address_street_txt" placeholder="Enter street name">
                            </div>
                    </div>

                    <div id="address_house_no_div" class="form-group row">
                        <label for="address_house_no_txt" class="col-sm-2 col-form-label">Building No.</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="address_house_no_txt" placeholder="Enter building/house number">
                            </div>
                    </div>

                        </fieldset>
                            <fieldset>
                                <legend>Accomodation</legend>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Tenant</label>
                                    <select id="tenant_type_cb" class="custom-select form-control" >
                                    <option disabled selected>Select Preffered Tenant</option>
                                    <option value="student">Student</option>
                                    <option value="professionals">Professionals/Workers</option>
                                    <option value="guest">Guest</option>                                    
                                    </select>
                                </div>                          
                                <br>
                                <!-- Single Student Avial Units -->

                                <div class="combo-box-result" id="student_option">

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                    <label for="no_single_student_room">Single Room(s)</label>
                                    <input type="number" class="form-control" id="no_single_student_room" pattern="[0-9]*" placeholder="Enter Available Units">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="no_single_student_room_rent">Rent P/M (R)</label>
                                    <input type="number" class="form-control" id="no_single_student_room_rent" placeholder="Enter Monthly Rent" pattern="[0-9]*" placeholder="Enter Rent Amount">
                                    </div>
                                </div>
                                <!-- Sharing Student Avial Units -->
                                
                                <div class="form-row">
                                        <div  class="form-group col-md-6">
                                        <label for="no_sharing_student_room">Sharing Room(s)</label>
                                        <input type="number" class="form-control" id="no_sharing_student_room" pattern="[0-9]*" placeholder="Enter Available Units">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="no_sharing_student_room_rent">Rent P/M (R)</label>
                                        <input type="number" class="form-control" id="no_sharing_student_room_rent" placeholder="Enter Monthly Rent" pattern="[0-9]*" placeholder="Enter Rent Amount">
                                        </div>
                                </div>
                                <p class="h5">Select features</p>
                                <div class="custom-control custom-checkbox">
                                <input id="wifi_check" class="custom-control-input" type="checkbox" value="1"> 
                                <label class="custom-control-label" for="wifi_check">
                                    Wi-Fi
                                </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input id="transport_check" class="custom-control-input" type="checkbox" value="1" >
                                <label class="custom-control-label" for="transport_check">
                                    School transport 
                                </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input id="laundry_check" class="custom-control-input" type="checkbox" value="">
                                <label class="custom-control-label" for="laundry_check">
                                    Laundry appliances
                                </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="1" id="car_check">
                                <label class="custom-control-label" for="car_check">
                                    Student car parking
                                </label>
                                </div>
                                
                                <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="1" id="pool_check">
                                <label class="custom-control-label" for="pool_check">
                                    Swimming pool
                                </label>
                                </div>

                                </div>

                                <!-- Profesionals Avial Units -->

                                <div class="combo-box-result" id="professionals_option">
                                <div class="form-row">
                                        <div  class="form-group col-md-6">
                                        <label for="no_professional_room">Unit(s)</label>
                                        <input type="number" class="form-control" id="no_professional_room" pattern="[0-9]*" placeholder="Enter Available Units">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="no_professional_room_price">Rent P/M (R)</label>
                                        <input type="number" class="form-control" id="no_professional_room_price" placeholder="Enter Monthly Rent" pattern="[0-9]*" placeholder="Enter Rent Amount">
                                        </div>
                                </div>

                                <p class="h5">Highlight features</p>
                                <small class="text-muted">* This is per unit</small>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="bedroom_num_select">Bedroom</label>
                                    </div>
                                    <select class="custom-select" id="bedroom_num_select">
                                        <option selected>Choose...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="bathrooms_num_select">Bathroom</label>
                                    </div>
                                    <select class="custom-select" id="bathrooms_num_select">
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
                                        <label class="input-group-text" for="garage_num_select">Car Storage</label>
                                    </div>
                                    <select class="custom-select" id="garage_num_select">
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
                                        <label class="input-group-text" for="pet_select">Pets? </label>
                                    </div>
                                    <select class="custom-select" id="pet_select">
                                        <option selected>Choose...</option>
                                        <option value="0" >No</option>
                                        <option value="1" >Yes</option>
                                    </select>
                                </div>
   
                                </div>

                                <!-- Family Avail  Bedrooms -->

                                <div class="combo-box-result" id="family_option">
                                    <div class="form-row">
                                        <div  class="form-group col-md-6">
                                        <label for="family_bed_room">Bedroom(s)</label>
                                        <input type="number" class="form-control" id="family_bed_room" pattern="[0-9]*" placeholder="Enter No. of Bedroom">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="family_bed_room_rent">Rent P/M (R)</label>
                                        <input type="number" class="form-control" id="family_bed_room_rent" placeholder="Enter Monthly Rent" pattern="[0-9]*" placeholder="Enter Rent Amount">
                                        </div>
                                    </div>
                                </div>

                                <!-- Anyone Avail  Bedrooms -->
                                <div class="combo-box-result" id="anyone_option">

                                <div class="form-row">
                                        <div  class="form-group col-md-6">
                                        <label for="any_room">Unit(s)</label>
                                        <input type="number" class="form-control" id="any_room" pattern="[0-9]*" placeholder="Enter Available Units">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="any_room_rent">Rent P/M (R)</label>
                                        <input type="number" class="form-control" id="any_room_rent" placeholder="Enter Monthly Rent" pattern="[0-9]*" placeholder="Enter Rent Amount">
                                        </div>
                                </div>

                                </div>

                                <!-- Guest house Units -->

                                <div class="combo-box-result" id="guest_option">

                                <div class="form-group row">
                                <label for="address_area_txt" class="col-sm-2 col-form-label">Name: </label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="guesthouse_name_txt" placeholder="Guest House Name">
                                </div>
                                </div>

                                <div class="form-row">
                                <div  class="form-group col-md-6">
                                        <label for="no_guest_day_room">Day Rest:</label>
                                        <input type="number" class="form-control" id="no_guest_day_room" pattern="[0-9]*" placeholder="Available Rooms">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="no_guest_day_room_price">Price from (R):</label>
                                        <input type="number" class="form-control" id="no_guest_day_room_price" pattern="[0-9]*" placeholder="Enter Price">
                                        </div>
                                </div>
                                <div class="form-row">
                                    <div  class="form-group col-md-6">
                                        <label for="no_guest_over_room">Over Night:</label>
                                        <input type="number" class="form-control" id="no_guest_over_room" pattern="[0-9]*" placeholder="Available Rooms">
                                        </div>
                                    <div class="form-group col-md-6">
                                        <label for="no_guest_over_room_price">Price from (R):</label>
                                        <input type="number" class="form-control" id="no_guest_over_room_price" placeholder="Enter Price Per Night" pattern="[0-9]*" placeholder="Enter Rent Amount">
                                        </div>
                                </div>
                                <p class="h5">Select Features & Facilities</p>

                                <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="" id="guest_wifi_check">
                                <label class="custom-control-label" for="guest_wifi_check">
                                 Wi-Fi
                                </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="" id="guest_tv_check">
                                <label class="custom-control-label" for="guest_tv_check">
                                DSTV 
                                </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="" id="netflix_check">
                                <label class="custom-control-label" for="netflix_check">
                                Netflix 
                                </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="" id="lounge_check">
                                <label class="custom-control-label" for="lounge_check">
                                Lounge
                                </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="" id="breakfast_check">
                                <label class="custom-control-label" for="breakfast_check">
                                Breakfast
                                </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="" id="parking_check">
                                <label class="custom-control-label" for="parking_check">
                                Parking
                                </label>
                                </div>
                                
                                <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="" id="guest_pool_check">
                                <label class="custom-control-label" for="guest_pool_check">
                                    Swimming pool
                                </label>
                                </div>
                                
                                </div>

                            </fieldset>
                            <fieldset>
                                <legend>Description</legend>
                                <div class="form-group">
                                    <textarea class="form-control" rows="10"
                                        id="description"></textarea>
                                </div>
                            </fieldset>
                            

                            <fieldset>
                           <legend>Upload Image(s)</legend>
                           <div class="custom-file">
                            <input type="file" class="custom-file-input" id="ad_img_select" accept=".jpg, .jpeg, .png" multiple>
                            <label class="custom-file-label" for="ad_img_select">Select Photo(s):</label>
                            </div>
                            
                        <div id="preview"  class="scrolling-wrapper">
                          
                        </div>
                            </fieldset>

                            <fieldset>
                                <legend>Contact</legend>

                                <div class="form-group row">
                                 <label for="contact_person_txt" class="col-sm-3 col-form-label">Contact person</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="contact_person_txt" placeholder="Enter Name">
                             </div>
                            </div>
                                
                            <div class="form-group row">
                                 <label for="contact_person_tel_txt" class="col-sm-3 col-form-label">Contact numbers</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="contact_person_tel_txt" name="tel" placeholder="Enter contact numbers">
                             </div>
                            </div>
               
                            <div class="form-group row">
                                 <label for="contact_person_email_txt" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-8">
                                <input type="email" class="form-control" id="contact_person_email_txt" name="email" placeholder="Enter email address">
                             </div>
                            </div>
                                
                            </fieldset>
                            <button id="ad_post_btn" type="button"
                            class="btn btn-primary btn-block">Post</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="clear_ad_btn">Clear </button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </div>
</div>