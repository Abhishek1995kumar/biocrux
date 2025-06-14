<div class="tab-pane" id="tab_2">
    <div class="card-toolbar">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="sub_botler_table">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubBotler">
                <i class="fa fa-plus"></i> Add Sub Bottler
            </button>
            <thead>
                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    @foreach($subBotlerHeader as $sub_botler)
                    <th class="min-w-125px">{{ $sub_botler }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                @foreach($subBotlerList as $sub_botler_data)
                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-125px">
                        <a href="{{ route('admin.user.sub-botler.user-list', $sub_botler_data->id) }}">{{ $sub_botler_data->sub_bottler_name }}</a>
                    </th>
                    <th class="min-w-125px">{{ $sub_botler_data->company_name }}</th>
                    <th class="min-w-125px">{{ $sub_botler_data->company_url }}</th>
                    <th class="min-w-125px">{{ \Carbon\Carbon::parse($sub_botler_data->created_at)->format('F d Y') }}</th>
                    <th class="min-w-125px">{{ $sub_botler_data->location }}</th>
                    <th class="min-w-125px">{{ $sub_botler_data->state }}</th>
                    <th class="min-w-125px">Sub Bottler</th>
                    <th class="min-w-125px">
                        <div class="d-flex flex-row">
                            <button class="btn btn-sm btn-warning action-select" data-bs-toggle="modal" data-bs-target="#editSubBotler" data-id="{{ $sub_botler_data->id }}">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger action-select" data-bs-toggle="modal" data-bs-target="#sub_botler_delete" data-id="{{ $sub_botler_data->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>