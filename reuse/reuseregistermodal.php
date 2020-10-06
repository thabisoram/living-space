<div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Registration Form</h4>
                    </div>
                    <div class="modal-body">
                        <form id="registration_form">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Note:</strong> This is only needed for individuals or companies that want to place ads.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>

                        <div id="success_alert"  class="alert alert-success alert-dismissible" style="display:none;">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong> You are registered.
                            </div>

                            <div id="failure_alert"  class="alert alert-danger alert-dismissible" style="display:none;">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Sorry!</strong> Please review the form.
                            </div>
                       

                            <div class="form-group row">
                                <label for="user_email_txt" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="user_email_txt" placeholder="Enter your email address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="person_company_txt" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="person_company_txt" placeholder="Enter your name or company name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_phone_txt" class="col-sm-2 col-form-label">Cell/Tel</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="user_phone_txt" placeholder="Enter contact numbers">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="register_password_txt" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" id="register_password_txt" placeholder="Password" autocomplete="on">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="co_register_password_txt" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" id="co_register_password_txt" placeholder="Confirm Password" autocomplete="on">
                                </div>
                            </div>
                            <br>
                            <p><button  id="register_btn" type="button" onclick="regValidation()" class="btn btn-primary btn-block">Register</button></p>

                        </form>                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="reg_close_btn" class="btn btn-default"
                            data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>