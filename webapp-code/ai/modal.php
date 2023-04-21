<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

 <!-- Signup modal -->
<div id="signup" class="modal fade" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign Up!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="signupForm">
                    <input type="hidden" name="signupBtn"/>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Username</label>
                        <input id="susername" type="text" class="form-control" id="formGroupExampleInput" placeholder="eg: SilverSurfer" name="susername">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Password</label>
                        <input id="spassword" type="password" class="form-control" id="formGroupExampleInput2" placeholder="eg: surf#-19silver" name="spassword">
                    </div>
                    <button class="btn btn-warning" id="submitSignup" type="submit">Signup</button>
                </form>

                <button class="btn btn-outline-info p-2" data-bs-toggle="modal" data-bs-target="#login" data-bs-dismiss="modal" type="submit">Already Registered ? Login !</button>
                <span id="mess" style="display:none">ENTER FIELD VALUE</span>
            </div>
        </div>
    </div>
</div>

<script>
    $('#submitSignup').on('click', function(event) {
        // Prevent the default form submission
        event.preventDefault();

        if ($('#susername').val() === '' || $('#spassword').val() === '') {
            console.log('Validation failed');
            
            document.getElementById('mess').style.display="block";
            return false; // prevent form submission
        }
        
        // Submit the form using AJAX
        $.ajax({
            url: './db/login.php',
            method: 'POST',
            data: $('#signupForm').serialize(),
            success: function(response) {
                if(response === 'exist'){
                    document.getElementById('mess').style.display="none";
                    alert('Already registered, Please Login');
                }
                else if(response === 'success'){
                    alert('Please Login Now !');
                    // Hide the first modal
                    $('#signup').modal('hide');
                    
                    // Display the second modal
                    $('#login').modal('show');
                }
            }
        });
    });
</script>

<!-- Login Modal -->
<div class="modal fade" id="login" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <input type="hidden" name="loginBtn"/>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Username</label>
                        <input id="lusername" type="text" class="form-control" id="formGroupExampleInput" placeholder="eg: SilverSurfer" name="lusername">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Password</label>
                        <input id="ipassword" type="password" class="form-control" id="formGroupExampleInput2" placeholder="eg: surf#-19silver" name="lpassword">
                    </div>
                    <button class="btn btn-danger" id="submitLogin" type="submit">Login</button>
                </form>
                <button class="p-2 bg-primary text-white" data-bs-target="#signup" data-bs-toggle="modal" data-bs-dismiss="modal">Not Registered ? Register !</button>
                <span id="mess_" style="display:none">ENTER FIELD VALUE</span>
            </div>
        </div>
    </div>
</div>
<script>
    $('#submitLogin').on('click', function(event) {
        // Prevent the default form submission
        event.preventDefault();

        if ($('#lusername').val() === '' || $('#lpassword').val() === '') {
            console.log('Validation failed');
            
            document.getElementById('mess_').style.display="block";
            return false; // prevent form submission
        }
        
        // Submit the form using AJAX
        $.ajax({
            url: './db/login.php',
            method: 'POST',
            data: $('#loginForm').serialize(),
            success: function(response) {
                if (response === 'success') {
                    // $('#login').modal('hide');
                    window.location.href = './profile.php';
                } else {
                    alert('Invalid login credentials');
                }
            }
        });
    });
</script>
<!-- Modal -->
<div class="modal fade" id="charactername" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Give Name to the Model</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="./db/pc_insert.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <input type="hidden" value="<?php echo $uid; ?>" name="uid" />
            <div class="row g-3">
                <div class="col">
                    <input type="text" class="form-control" id="charname" name="charname" placeholder="Character Name"/>
                </div>
            </div><br/>
            <div class="row g-3">
                <div class="col">
                    <input class="form-control" type="file" id="charimage" name="file"/>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="charsubmit" id="charsubmit">SUBMIT</button>
        </div>
      </form>
    </div>
  </div>
</div>