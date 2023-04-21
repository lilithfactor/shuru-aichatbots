<?php
include('./nav.php');
include './db/connect.php';
include('./modal.php');

$uid =$_SESSION['uid']; 
$modals = "SELECT c.char_name,c.charid,c.char_image FROM char_model as c,models as m WHERE c.charid = m.charid and c.uid ='".$uid."' group by c.charid;";
$result = mysqli_query($conn, $modals);

$draft = "SELECT c.char_name,c.char_image,c.charid FROM `pr_and_co` as p,char_model as c WHERE p.charid = c.charid and c.uid ='".$uid."' group by c.charid;";
$resultd = mysqli_query($conn, $draft);
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style>
    /* Set the width of the scrollbar */
    ::-webkit-scrollbar {
    width: 5px;
    }

    /* Set the color of the scrollbar */
    ::-webkit-scrollbar-thumb {
    background-color: #555;
    }

    /* Set the color of the scrollbar track */
    ::-webkit-scrollbar-track {
    background-color: #f1f1f1;
    }
    .active{
    background-color:black;color:white;
  }
</style>
<div class="container" style="margin-top:40px">
    <nav class="navbar navbar-expand-sm bg-secondary justify-content-center">
    <ul class="navbar-nav" id="navitem">
        <li class="nav-item active">
            <button class="nav-link text-white bg-transparent border-0" onclick="openDraft();">Drafts</button>
        </li>
        <li class="nav-item">
            <button class="nav-link text-white bg-transparent border-0" onclick="openModels();">Trained Models</button>
        </li>
        <li class="nav-item">
            <button class="nav-link text-white bg-transparent border-0" type="button" data-bs-toggle="modal" data-bs-target="#charactername">Create New Model</button>
        </li>
    </ul>
    </nav>
</div>
<div class="container text-center">
    <div id="modeltrained" class="container mt-4 px-5 overflow-auto" style="height:600px;display:none">   
        <?php if (mysqli_num_rows($result) > 0) { ?>    
        <div class="table-responsive">
            <?php while($rowmod = mysqli_fetch_assoc($result)){
            $mod_data = "SELECT p.prompts, p.completions,m.created_at FROM models as m,pr_and_co as p,char_model as c WHERE p.charid = '".$rowmod['charid']."' group by p.id;";
            $resultm = mysqli_query($conn, $mod_data);
            ?>
            <div class="p-1 d-flex justify-content-between" style="cursor:pointer">
                <div>
                    <img style="float:left" src="./images/character_images/<?php echo $rowmod['char_image']?>" class="rounded-circle" alt="Cinque Terre" width="40" height="40">
                    <h5 style="float:right;" class="p-1"><?php echo $rowmod['char_name'] ?></h5>
                </div>
            </div>
            <table class="table bg-light table-responsive table-borderless">    
                <thead>
                    <tr class="bg-info bg-gradient">
                        <!-- <th scope="col" width="5%">id</th> -->
                        <th scope="col" width="20%">Prompts</th>
                        <th scope="col" width="20%">Completions</th>
                        <th scope="col" width="10%">Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($rowm = mysqli_fetch_assoc($resultm)){  ?>
                    <tr>
                        <!-- <td><?php echo $rowm['mid'];?></td> -->
                        <td><?php echo $rowm['prompts'];?></td>
                        <td><?php echo $rowm['completions'];?></td>
                        <td><?php echo $rowm['created_at'];?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table><br/>
            <?php } ?>
        </div>   
        <?php }else{ ?>No Models Trained - <b>Create a Model</b>
            <?php } ?>
    </div>  
    <div id="draft" class="container mt-4 px-5 overflow-auto" style="height:600px;display:block">
        <?php if (mysqli_num_rows($resultd) > 0){?>
        <div class="table-responsive">
            <?php while($row = mysqli_fetch_assoc($resultd)){
            $d = "SELECT * FROM `pr_and_co` WHERE `charid` = '".$row['charid']."'";
            $resultr = mysqli_query($conn, $d);
            ?>
            <div class="d-flex justify-content-between p-1" style="cursor:pointer" onclick="showHideRow('<?php echo $row['charid'] ?>');">
                <div>
                    <img style="float:left" src="./images/character_images/<?php echo $row['char_image']?>" class="rounded-circle" alt="Cinque Terre" width="40" height="40">
                    <h5 style="float:right;" class="p-1"><?php echo $row['char_name'] ?></h5>
                </div>
                <a id="changemodel" class="btn btn-outline-success" href="./pr_and_co.php?id=<?php echo $row['charid'] ?>">Retrain Model</a>
            </div>
            <!-- <a id="trainmodel" class="btn btn-outline-success" href="train.php?tid=<?php echo $row['charid'] ?>">Train Model</a> -->
            <table id="<?php echo $row['charid'] ?>" class="table bg-light table-responsive table-borderless" style="display:none">   
                <thead>
                    <tr class="bg-info bg-gradient">
                        <th scope="col" width="5%">id</th>
                        <th scope="col" width="20%">Prompts</th>
                        <th scope="col" width="20%">Completions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; while($rowd = mysqli_fetch_assoc($resultr)){  ?>
                    <tr>     
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $rowd['prompts'] ?></td>
                        <td><?php echo $rowd['completions'] ?></td>
                    </tr>
                    <?php $counter++; } ?>
                </tbody>
            </table><br/>
            <?php } ?>
        </div>
        <?php }else{?>
            No Drafts Created. Click on <b>Create New Model</b> to create one.
            <?php }?>
    </div> 
</div>
<script>
    // Add active class to the current button (highlight it)
  var btnContainer = document.getElementById("navitem");
  var btns = btnContainer.getElementsByClassName("nav-item");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function(){
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
        });
    }

    function openDraft() {
        document.getElementById('modeltrained').style.display = 'none';   
        document.getElementById('draft').style.display = 'block';     
    }
    function openModels() {
        document.getElementById('draft').style.display = 'none';   
        document.getElementById('modeltrained').style.display = 'block';     
    }
    function showHideRow(row) {
            $("#" + row).toggle();
        }
</script>