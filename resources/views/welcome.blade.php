@extends('layouts.app')
@section('content')
                <form class="d-flex justify-content-center align-items-center mb-4" id="createTask"  >
                  @csrf
                  <div class="form-outline flex-fill">
                    <input type="text" class="form-control form-control-md" id="name" name="name">
                  </div>
                  <button type="submit" class="btn btn-primary btn-md ms-2">Add New Task</button>
                </form>


                <form class="d-flex justify-content-center align-items-center mb-4" id="showAllTask" method="get" action="{{url('show')}}">
                  @csrf
                  <button type="submit"  class="btn btn-outline-info btn-md ms-2"  id="showAll">Show All Task</button>
                </form>
                <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col-md-12 col-xl-10">
                    <div class="card mask-custom">
                      <div class="card-body p-4 text-white">
                        <table class="table text-white mb-0" id="table">
                          <thead>
                            <tr>
                              <th scope="col">Task</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody >
                        
                           @foreach ($tasks as $task)
                           @if(!$task->isComplete)
                           <tr class="dataTask{{$task->id}}" id="datanew">
                            <td> 
                              <!-- <input type="hidden" value="{{$task->id}}" class="task_id"> -->
                              {{$task->name}}
                            </td>
                            <td>                           
                            <button class="btn btn-warning btn-sm text-white font-weight-bold">Pending...<i class="fa fa-exclamation"></i></button>
                            <td>
                            <a class="updateTask btn" data-id="{{ $task->id }}" ><i class="fa fa-check" style="color:green;"></i></a>
                              <a class="deletebtn btn" data-id="{{ $task->id }}" ><i class="fa fa-trash" style="color:red;"></i></a>
                            </td>

                           </tr>
                           @endif
                           @endforeach
                           
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>



<!--DELETE Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Task</h5>
       
      </div>
      <div class="modal-body">
        <input type="hidden" name="" id="delete_task_id">
       Are You Sure ? want to delete the task ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"onclick="CloseModal('deleteModal')" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary confirmDelete">Yes</button>
      </div>
    </div>
  </div>
</div>    
        
@endsection           