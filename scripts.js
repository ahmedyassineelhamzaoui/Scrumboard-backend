    formData=document.getElementById("form-task");
    title=document.getElementById("task_title");
    dateTask=document.getElementById("task-date");
    errurtitleMessage=document.querySelector("#title-erreur");
    erreudescriptionMessage=document.querySelector("#description-erreur");
    erreurdateMessage=document.querySelector("#date-erreur");
    descriptionTask=document.getElementById("task-description");
    // let letters=/^[a-zA-Z]$/;


      formData.addEventListener('submit',(e)=>{
        console.log(title.value.length);
        console.log(title.value.trim() ==0);
        if(title.value=="" || title.value.trim().length ===0 || title.value.length>40){
            formData.title.classList.add("border-danger");
            formData.title.classList.add("border-2");
            errurtitleMessage.classList.remove("d-none");
            e.preventDefault();
        }
        else if(title.value!="" && title.value.length<=40 ){
            formData.title.classList.remove("border-danger");
            formData.title.classList.remove("border-2");
            errurtitleMessage.classList.add("d-none");
            // e.preventDefault();
        }
        if(dateTask.value==""){
            formData.task_date.classList.add("border-danger");
            formData.task_date.classList.add("border-2");
            erreurdateMessage.classList.remove("d-none");
            e.preventDefault();
        }
        else if(dateTask.value!=""){
            formData.task_date.classList.remove("border-danger");
            formData.task_date.classList.remove("border-2");
            erreurdateMessage.classList.add("d-none");
            // e.preventDefault();
        }
        if(descriptionTask.value=="" || descriptionTask.value.trim().length ===0){
            formData.task_description.classList.add("border-danger");
            formData.task_description.classList.add("border-2");
            erreudescriptionMessage.classList.remove("d-none");
            e.preventDefault();
        }
        else if(descriptionTask.value!="" ){
            formData.task_description.classList.remove("border-danger");
            formData.task_description.classList.remove("border-2");
            erreudescriptionMessage.classList.add("d-none");
            // e.preventDefault();
        }
       
        else{
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
        }
        
      })



   
       
    
 






// let deleteButton=document.querySelector('#task-delete-btn');
// let saveButton=document.querySelector("#task-save-btn");
// let updateButton=document.querySelector("#task-update-btn");
// let buttons=document.querySelectorAll(".button");
// let modalTask=document.querySelector("#modal-task");
// let typBtn=document.querySelector('#type-btn');
// add.onclick=()=>{
//     deleteButton.style.display="none";
//     updateButton.style.display="none";
//     saveButton.style.display="block";
// }
// buttons.forEach((button) => {
//    button.onclick=()=>{
//     deleteButton.style.display="block";
//     updateButton.style.display="block";
//     saveButton.style.display="none";
//    }
// })

// formDatainsert.addEventListener('submit',(e)=>{
//   if(!formDatainsert.select_priority.value){
//     formDatainsert.select_priority.classList.add("border-danger");
//     formDatainsert.select_priority.classList.add("border-2");
//     e.preventDefault();

//   }
//   if(formDatainsert.select_priority.value){
//     formDatainsert.select_priority.classList.remove("border-danger");
//     formDatainsert.select_priority.classList.remove("border-2");
//     e.preventDefault();
//   }
//   if(!formDatainsert.select_status.value){
//     formDatainsert.select_status.classList.add("border-danger");
//     formDatainsert.select_status.classList.add("border-2");
//     e.preventDefault();

//   }
//   if(formDatainsert.select_status.value){
//     formDatainsert.select_status.classList.remove("border-danger");
//     formDatainsert.select_status.classList.remove("border-2");
//     e.preventDefault();
//   }
  
// })