<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<?php
 include('database.php');
 @$id=$_POST["id"];
 $sql="SELECT * FROM tasks WHERE id='$id'";
 $result=mysqli_query($Connexion,$sql);
 while($ligne = mysqli_fetch_assoc($result)){
?>
               <div id="form-task" >
				<form  action=""  method="POST" >
					
							<!-- This Input Allows Storing Task Index  -->
							<div class="row">
								<div class="col">
							<input name="id" type="hidden" id="task-id" value="<?php echo $ligne["id"];?>">
							<div class="mb-3">
								<label class="form-label">Title</label>
								<input name="title" value="<?php echo $ligne["title"];?>" type="text" class="x form-control" id="task-title"/>
							</div>
							<div class="mb-3">
								<label class="form-label">Type</label>
								<div class="ms-3">
									<div class="form-check mb-1">
										<input class="form-check-input" <?php echo $ligne["type_id"] == 1 ? 'checked':''?> name="task-type" type="radio" value="Feature" id="task-type-feature"/>
										<label class="form-check-label" for="task-type-feature">Feature</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" <?php echo $ligne["type_id"] == 2 ? 'checked':''?> name="task-type" type="radio" value="Bug" id="task-type-bug"/>
										<label class="form-check-label" for="task-type-bug">Bug</label>
									</div>
								</div>
								
							</div>
							<div class="mb-3">
								<label class="form-label">Priority</label>
								<select  name="select-priority" class="x form-select" id="task-priority">
									<option selected disabled  value="">Please select</option>
									<option   <?php echo $ligne["priority_id"] == 1 ? 'selected':''?> value="1">High</option>
									<option   <?php echo $ligne["priority_id"] == 2 ? 'selected':''?> value="2">Low</option>
									<option   <?php echo $ligne["priority_id"] == 3 ? 'selected':''?> value="3" >Medium</option>
									<option   <?php echo $ligne["priority_id"] == 4 ? 'selected':''?> value="4" >Critical</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Status</label>
								<select  name="select-status" class="x form-select" id="task-status">
									<option selected disabled value="">Please select</option>
									<option <?php echo $ligne["status_id"] == 1 ? 'selected':''?> value="1">To Do</option>
									<option <?php echo $ligne["status_id"] == 2 ? 'selected':''?> value="2">In Progress</option>
									<option <?php echo $ligne["status_id"] == 3 ? 'selected':''?> value="3">Done</option>
								</select>
							</div>
							</div>
							<div class="col">
							<div class="mb-3">
								<label class="form-label">Date</label>
								<input value="<?php echo $ligne["task_datetime"];?>" name="task-date" type="date" class="x form-control" id="task-date"/>
							</div>
							<div class="mb-0">
								<label class="form-label">Description</label>
								<textarea  name="task-description" class="x form-control" rows="10" id="task-description"><?php echo $ligne["description"];?></textarea>
							</div>
						    </div>
							</div>
					<div class="my-2 row ms-0">
						<a href="index.php" class="col-lg-1 mx-1 btn btn-dark">Cancel</a>
						<button type="submit" name="delete" class="col-lg-1 mx-1 btn btn-danger task-action-btn" id="task-delete-btn"><a onclick="return confirm('Are you sure you want to delte this task?');">delete</a></button>
						<button type="submit" name="update" class="col-lg-1 mx-1 btn btn-warning task-action-btn" id="task-update-btn"><a onclick="return confirm('Are you sure you want to edit this task?');">Update</a></button>
					</div>
					
				</form>
		
                </div>
				<?php }?>

                  <?php
        
                          
               
				@$id=$_POST["id"];
				@$title=$_POST["title"];
				@$type=$_POST["task-type"];
				if($type=="Feature"){
					$types=1;
				}else{
					$types=2;
				}
				@$select1=$_POST["select-priority"];
				@$select2=$_POST["select-status"];
				@$date=$_POST["task-date"];
				@$description=$_POST["task-description"];
				if(isset($_POST["delete"])){
										
					$val="DELETE FROM  tasks  WHERE id='$id' ";
					if (mysqli_query($Connexion,$val)) {
						echo "task deleted successfully";
					  } else {
						echo "Error deleting task: " . mysqli_error($Connexion);
					  }
					$_SESSION['message'] = "Task has been deleted successfully !";
					header('location: index.php');
				}

				if(isset($_POST['update'])){
                    $val="UPDATE tasks SET title='$title',type_id='$types' ,priority_id='$select1',status_id='$select2',task_datetime='$date',description='$description' WHERE id='$id'";
					if (mysqli_query($Connexion,$val)) {
						echo "task updated successfully";
					  } else {
						echo "Error updating task: " . mysqli_error($Connexion);
					  }
					$_SESSION['message'] = "Task has been updated successfully !";
					header('location: index.php');
                    
                }
                  ?>

</body>
</html>