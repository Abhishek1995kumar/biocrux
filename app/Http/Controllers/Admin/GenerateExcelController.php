<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Botler;
use Illuminate\Support\Facades\Auth;

class GenerateExcelController extends Controller {
    public function generateExcel(Request $request) {
        try {
            if($request->type == 'botler') {
                $botlers = Botler::where('status', 1)
                    ->whereNull('deleted_by')
                    ->get();
                $createdBy = $botlers->pluck('created_by')->filter()->unique();
                if(!empty($sql)) {
                    $fileName = 'botler_list.xlsx';
                    $headers = [
                        'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
                    ];
                    
                    $excelData = [];
                    foreach ($sql as $row) {
                        $excelData[] = (array) $row;
                    }
                    
                    return response()->json(['data' => $excelData], 200, $headers);
                } else {
                    return response()->json(['error' => 'No data found'], 404);

                }
                
            } elseif($request->type == 'sub-botler') {
                $subBotlerId = $request->id;
            } else {
                return response()->json(['error' => 'Invalid type specified'], 400);

            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to generate Excel file: ' . $e->getMessage()], 500);
        }
    }
}
