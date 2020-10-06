<!--Login Modal -->

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
            <div id="error_message" class="alert alert-danger" role="alert" style="display:none">
                A simple danger alert—check it out!
                </div>
                <form id="login_form" class="form-horizontal">
                <div id="login_failure_alert" class="alert alert-danger alert-dismissible" style="display: none">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Sorry!</strong> Please review the form.
                </div>


            <div class="form-label-group">
            <input type="email" id="login_email_txt" class="form-control" placeholder="Email address" required autofocus>
            <label for="login_email_txt">Email address</label>
            </div>

                    <br>
            <div class="form-label-group">
            <input type="password" id="login_password_txt" class="form-control" placeholder="Password" autocomplete required autofocus>
            <label for="login_password_txt">Password</label>
            </div>

                    <div class="btn-group">
                        <a href="passwordreset.php" class="btn btn-link">Forgot password?
                        </a>
                    </div>
                    <br>
                    <p></p>
                    <p><button id="user_login_btn" type="button" onclick="loginValidation()"
                            class="btn btn-primary btn-block">Login</button></p>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>

