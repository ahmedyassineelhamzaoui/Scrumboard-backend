<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();
    $toDo            = "SELECT * FROM tasks JOIN types ON tasks.type_id=types.idt JOIN priorities ON tasks.priority_id=priorities.idp WHERE status_id =1";
    $resultTodo      = mysqli_query($Connexion, $toDo);
    $inProgress      = "SELECT * FROM tasks JOIN types ON tasks.type_id=types.idt JOIN priorities ON tasks.priority_id=priorities.idp WHERE status_id =2";
    $resultInprogress=mysqli_query($Connexion, $inProgress);
    $done            = "SELECT * FROM tasks JOIN types ON tasks.type_id=types.idt JOIN priorities ON tasks.priority_id=priorities.idp WHERE status_id =3 ";
    $resultDone      =mysqli_query($Connexion, $done);
    //ROUTING
    // if(isset($_POST['save']))        saveTask();
    // if(isset($_POST['update']))      updateTask();
    // if(isset($_POST['delete']))      deleteTask();
    

    function getTasks($val,$ligne,$Shortdescription)
    {
        ?>
        <form  action="edit.php" method="post">
          <button type="submit" class="position-relative button w-100 py-2 d-flex border-0 border-top">
        <div class="mx-1 fs-3 ">
            <?php if ($val == 1) {
                echo '<i class="fa-solid fa-circle-question"></i>';
            }
            if ($val == 2) {
                echo  '<div class="spinner-border text-warning spinner-border-sm" role="status">
        <span class="visually-hidden">Loading...</span>
        </div>';
            }
            if ($val == 3) {
                echo '<i class="text-green fa-sharp fa-solid fa-circle-check"></i>';
            } ?>
        </div>
        <div class="card-text text-start">
            <div class="fw-bolder fs-7 mx-3"></div>
            <div id="title-btn"  class="fw-bolder fs-7 mx-3"><?php echo $ligne["title"]; ?></div>
            <div class="mx-3">
                <div class="fw-light">#<span id="id-btn"><?php echo $ligne["id"]; ?></span> created in<span id="date-btn"><?php echo $ligne["task_datetime"]; ?></span> </div>
                <div id="description-btn" class="fst-normal" title="<?php echo $ligne["description"]; ?>"><?php echo $Shortdescription; ?>...</div>
            </div>
            <div class="mx-3 mb-1 mt-1">
                <span id="priority-btn" class="btn-primary px-2 py-1 rounded-2"><?php echo $ligne["namep"]; ?></span>
                <span id="type-btn" class="btn-gray  px-2 py-1 rounded-2"><?php echo $ligne["namet"]; ?></span>
            </div>
        </div>
        
        <input type="hidden" name="id" value="<?php echo $ligne['id'];?>">
             
            
        </button>  
        </form> 
       <?php 
    }
    

    function saveTask()
    {
        //CODE HERE
        global $Connexion;
        $title=$_POST["title"];
        $type=$_POST["task-type"];
        if($type=="Feature"){
            $types=1;
        }else{
            $types=2;
        }
        $selectPriority=$_POST["select-priority"];
        $selectStatus=$_POST["select-status"];
        $date=$_POST["task-date"];
        $description=$_POST["task-description"];
        //SQL INSERT
        $insertRquest="INSERT INTO tasks VALUES(null,'$title','$types','$selectPriority','$selectStatus','$date','$description')"; 
        if (mysqli_query($Connexion,$insertRquest)) {
            $_SESSION['message'] = "Task has been added successfully !";
            header('location: index.php');
          } else {
            echo "Error: " . $insertRquest . "<br>" . mysqli_error($Connexion);
          }
    }

    function updateTask()
    {
        //CODE HERE
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

?>