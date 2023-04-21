<?php
include('./nav.php');
include './db/connect.php';

if(isset($_GET['id'])){
    $charid = $_GET['id'];
    $pc = "SELECT * FROM `pr_and_co` WHERE `charid` = '".$charid."'";
    $res = mysqli_query($conn, $pc);
}
if(isset($_SESSION['charname'])){
$charname = $_SESSION['charname'];
$ch="SELECT charid FROM `char_model` WHERE `char_name`='$charname'";
$result = mysqli_query($conn, $ch);
while($row = mysqli_fetch_assoc($result)){
    $id = $row['charid'];
}
}

// if (isset($_SESSION['notification'])) {
// 	$message = $_SESSION['notification'];
// 	$type = $_SESSION['notification_type'];
// 	// display notification using the appropriate CSS class
// 	echo '<div class="p-3 fst-italic notification ' . $type . '">' . $message . '</div>';
// 	// unset session variables to prevent displaying the notification multiple times
// 	unset($_SESSION['notification']);
// 	unset($_SESSION['notification_type']);
// }
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
        /* .notification {
            position: fixed;
            width:350px;
            top: 40px;
            border-radius: 5px;
            right: 500px;
            background-color: #333;
            color: #fff;
            text-align: center;
            opacity: 0;
            transition: opacity 5.0s ease-in-out;
            z-index: 9999;
        }

        .notification.success {
            background-color: #4CAF50;
        }

        .notification.error {
            background-color: #f44336;
        } */
    </style>
	<body style="background: #DEF5E5;">
        <!-- main container -->
		<div class="container shadow rounded-5 mt-5 p-3 mb-5" style="background: #BCEAD5;">
            <form class="justify-content-center align-content-center text-center" action="./train.php" method="post">
                <input type="hidden" value="<?php echo $id; ?>" name="charid" />
                <input type="hidden" value="<?php echo $charname; ?>" name="charname" />
			    <!-- buttons -->
				<div class="container justify-content-center align-content-center text-center">
					<!-- <a
                    type="button"
					href="submitData.php"
						class="btn btn-outline-primary form-submit m-3">
						Submit and Train
					</a> -->
					<button
                        type="submit"
                        name="pr_co_submit"
						class="btn btn-outline-success m-3"
						id="push-to-db">
						Train Model
                    </button>
				</div>
				<!-- prompt-completion container -->
                <div class="container form-container justify-content-center rounded-5 bg-light">
					<div class="container">
						<!-- headings -->
						<div class="container align-items-center text-center row p-2">
							<div class="col-6 prompts">
								<h2>Prompts</h2>
							</div>
							<div class="col-6 completions">
								<h2>Completions</h2>
							</div>
                            <div class="col-2">
							</div>
						</div>
						<!-- Form for entering prompt completions pairs -->
                        <div class="d-flex flex-row-reverse">
                            <button type="button" class="addmore btn btn-outline-success m-2">+ Add Row</button>
                        </div>
                        
						<div class="container" style="height: 350px; overflow-y: auto" id="sigma-id">
                            <?php if(isset($_GET['id'])){if(mysqli_num_rows($res) > 0) { while($row = mysqli_fetch_assoc($res)){ ?>
                            <div class="input-group col-12">
                                <input type="text" class="form-control form-input prompt col-6" name="prompt[]" value="<?php echo $row['prompts']?>" />
                                <textarea type="text" class="form-control form-input completion col-6" name="completion[]" rows="2"><?php echo $row['completions']?></textarea>
                            </div>
                            <?php } } }else{ ?>
                            <div class="input-group col-12">
                                <input type="text" aria-label="First name" class="form-control form-input prompt col-6" name="prompt[]" placeholder="some prompt"/>
                                <textarea type="text" class="form-control form-input completion col-6" name="completion[]" rows="2" placeholder="some completion"></textarea>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </form>
		</div>

        <!-- temp -->
        <div id="output"></div>
        <py-script src="./access-elements.py"></py-script>
        <script>
            $(".addmore").on('click', function() {
                // var count = $('$sigma-id div').length - 1;
                var data = "<div class='input-group col-12'><input type='text' class='form-control form-input prompt col-6' name='prompt[]' placeholder='some prompt'/>";
                data += "<textarea type='text' class='form-control form-input completion col-6' name='completion[]' rows='2' placeholder='some completion'></textarea><button class='remCF btn btn-outline-danger m-3'>Remove</button></div>";
                $('#sigma-id').append(data);
                // count++;
            });
            // $(".addmore").click(function(){
            //     $("#sigma-id").append("<div class='input-group col-12'><input type='text' class='form-control form-input prompt col-6' name='prompt[]' placeholder='some prompt'/><textarea type='text' class='form-control form-input completion col-6' name='completion[]' rows='2' placeholder='some completion'></textarea><a href='javascript:void(0);' class='remCF'>Remove</a></div>");
            // });
            $("#sigma-id").on("click",'.remCF',function(){                
                $(this).closest('div').remove(); 
            });
            // $("#sigma-id").on('click', '.deletemore', function () {
            //     $(this).closest('div').remove();
            // });
        </script>
	</body>
</html>
