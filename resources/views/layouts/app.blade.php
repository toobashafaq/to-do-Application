<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  <section class="" style="background-color: #e2d5de;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h6 class="mb-3">Todo List</h6>
              @yield('content')

              </div>
          </div>
        </div>
      </div>
    </div>
  </section>





    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <!-- CUSTOM JS -->
   
    <script>

       
        $(document).ready(function(){
            $('#createTask').submit(function(e){
                e.preventDefault();
                var form= $('#createTask') [0];
                var data= new FormData(form);
                $.ajax({
                   type:'POST',
                   url:'{{route("inserttask")}}',
                   data:data,
                   processData:false,
                   contentType:false,
                   success:function(data){
                    toastr.success(data.msg);
                    location.reload(); 
                   },
                   error:function(e){
                    toastr.error('Some thing went wrong');
                   }
                });
            });
            
    });
    
    // DELETE TASK
    $(document).on('click','.deletebtn',function(e){
      e.preventDefault();
      var id = $(this).data("id");
      $('#delete_task_id').val(id);
      $('#deleteModal').modal('show');
    });

    $(document).on('click','.confirmDelete',function(e){
      e.preventDefault();

      var task_id=$('#delete_task_id').val();
      var obj=$('.deletebtn');     
      $.ajax({
        type:'GET',
        url:'/deleteTask/'+task_id,
          success:function(data){
            $('#deleteModal').modal('hide');             
            toastr.error(data.msg);
            $('.dataTask'+task_id).remove();
        }
      })
    })
     // UPDATE COMPLETED TASK
     $(document).on('click','.updateTask',function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var obj=$('.updateTask'); 
      // alert(id)
      $.ajax({
        type:'GET',
        url:'/updateTask',
        data:{id:id},
        success:function(data){
            toastr.info(data.msg);
            $('.dataTask'+id).remove();
        }
      })
    
    });

  

    // CLOSE MODAL
      function CloseModal(modal){
      $('#'+modal).modal('hide');
   }
        
 
    </script>
  </body>
</html>