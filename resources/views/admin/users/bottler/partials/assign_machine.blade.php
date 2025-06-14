 <div class="tab-pane" id="tab_3">
     <div class="card-toolbar">
         <div class="card-title">
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assign_machine_botler" class="btn btn-primary">
                 <i class="fa fa-plus"></i>Assign Machine to Bottler</button>
             </button>
         </div>
         <table class="table align-middle table-row-dashed fs-6 gy-5" id="assign_machine_botler_table">
             <thead>
                 <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                     <th class="min-w-125px">Sub Botler Name.</th>
                     <th class="min-w-125px">Location</th>
                     <th class="min-w-125px">Machine Number</th>
                     <th class="min-w-125px">City</th>
                     <th class="min-w-125px">State</th>
                     <th class="min-w-125px">Installed</th>
                     <th class="min-w-125px">Action</th>
                 </tr>
             </thead>
             <tbody class="fw-semibold text-gray-600">
                 <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                     <th class="min-w-125px">Aryan</th>
                     <th class="min-w-125px">Mahindra</th>
                     <th class="min-w-125px">Model</th>
                     <th class="min-w-125px">07 April 2025</th>
                     <th class="min-w-125px">Lucknow</th>
                     <th class="min-w-125px">Uttar Pradesh</th>
                     <th class="min-w-125px">
                         <?php $assignParentId = 1; ?>
                         <div class="d-flex flex-row">
                             <button class="btn btn-sm btn-warning action-select" data-bs-toggle="modal" data-bs-target="#assign_machine_botler_update" data-id="{{ $assignParentId }}">
                                 <i class="fa fa-pencil"></i>
                             </button>
                             <button class="btn btn-sm btn-secondary action-select" data-bs-toggle="modal" data-bs-target="#assign_machine_botler_view" data-id="{{ $assignParentId }}">
                                 <i class="fa fa-eye"></i>
                             </button>
                             <button class="btn btn-sm btn-danger action-select" data-bs-toggle="modal" data-bs-target="#delete_assign_machine_modal" data-id="{{ $assignParentId }}">
                                 <i class="fa fa-trash"></i>
                             </button>
                         </div>
                     </th>
                 </tr>
             </tbody>
         </table>
     </div>
 </div>