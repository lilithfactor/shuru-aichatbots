<!-- Define the function in a script tag -->
<script>
function removeModalDisplayed() {
  console.log("Removing 'isshow' value from local storage");
  localStorage.removeItem('isshow');
  window.location.href='../';
}
</script>

<!-- Call the function after it has been defined -->
<?php
session_start();
if(isset($_SESSION['username'])){
  session_destroy();
  echo "<script>removeModalDisplayed();</script>";
}
?>
