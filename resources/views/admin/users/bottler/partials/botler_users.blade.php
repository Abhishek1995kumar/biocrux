<div class="tab-pane active" id="tab_1">
    <div class="card-toolbar">
        <div class="card-title">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserBotler" class="btn btn-primary">
                <i class="fa fa-plus"></i>Add Sub Bottler User </button>
            </button>
        </div>
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="user_botler_table">
            <thead>
                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-125px">Sub Botler Name.</th>
                    <th class="min-w-125px">Company Name</th>
                    <th class="min-w-125px">Email</th>
                    <th class="min-w-125px">Added On</th>
                    <th class="min-w-125px">Status</th>
                    <th class="min-w-125px">Action</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <?php $userParentId = 1; ?>
                    <th class="min-w-125px">Coca Cola</th>
                    <th class="min-w-125px">CocaCola India</th>
                    <th class="min-w-125px">Model</th>
                    <th class="min-w-125px">21 June 2025</th>
                    <th class="min-w-125px">Active</th>
                    <th class="min-w-125px">
                        <div class="d-flex flex-row">
                            <button class="btn btn-sm btn-warning action-select" data-bs-toggle="modal" data-bs-target="#sub_bottler_user_edit_modal" data-id="{{ $userParentId }}">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger action-select" data-bs-toggle="modal" data-bs-target="#sub_bottler_user_delete_modal" data-id="{{ $userParentId }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>