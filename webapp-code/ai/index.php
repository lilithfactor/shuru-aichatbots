<?php
include('./nav.php');
include('./modal.php');

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
	<head>
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
        } */

        /* .notification.success {
            background-color: #4CAF50;
        }

        .notification.error {
            background-color: #f44336;
        } */
    </style>
	</head>
	<body style="background: white;">
	<div class="d-flex align-items-center justify-content-center">
		<div class="p-5">
			<img src="images/chatbot.gif" width="900px"/><br/><br/><br/><br/>
			<div class="d-flex align-items-center justify-content-center">
                <?php if(isset($_SESSION['username'])){ ?>
				<a class="btn btn-primary" data-bs-toggle="modal" href="#charactername" role="button">Create Your Chatbot</a>
                <?php }else{?>
                    <a class="btn btn-primary" data-bs-toggle="modal" href="#signup" role="button">Create Your Chatbot</a>
                    <?php } ?>
			</div>
		</div>
		
	</div>
	</body>
</html>
