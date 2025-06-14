<?php

namespace App\Traits;

use Throwable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Frontend\RaiseGrievence;
use Illuminate\Support\Facades\Validator;

trait GrievanceTrait {
    public function saveGrievance(Request $request, $grievenceId) {
        try {
            $raiseGrievence = RaiseGrievence::where('id', json_decode($grievenceId))->first();
            if(!$raiseGrievence) {
                return response()->json(['error' => 'Grievance not found'], 404);
            }

            $raiseGrievence->admin_id = null;
            $raiseGrievence->user_id = $request->user_id ?? null;
            $raiseGrievence->name = $request->name ?? null;
            $raiseGrievence->email = $request->email ?? null;
            $raiseGrievence->map = $request->map ?? null;
            $raiseGrievence->description = $request->description ?? null;
            $raiseGrievence->animal_count = $request->animal_count ?? null;
            $raiseGrievence->word_id = $request->word_id ?? null;
            $raiseGrievence->application_category_id = $request->application_category_id ?? null;
            $raiseGrievence->animal_type_id = $request->animal_type_id ?? null;
            $raiseGrievence->application_type_id = $request->application_type_id ?? null;
            $raiseGrievence->other_dog_reason = $request->other_dog_reason ?? null;
            $raiseGrievence->status = 0;
            $raiseGrievence->request_from = 0;
            $raiseGrievence->updated_at = Carbon::now();
            $this->handleFileUpload($request, $raiseGrievence, 'file_input', 'frontend/aadhar');
            $this->handleFileUpload($request, $raiseGrievence, 'application_images', 'frontend/application');
            if ($raiseGrievence->save()) {
                return redirect()->route('dashboard')->with([
                    'success' => true,
                    'message' => 'Grievance created successfully!',
                ], 201);
            }

            return response()->json([
                'error' => 'Failed to save grievance'
            ], HTTP_UNPROCESSABLE_ENTITY);

        } catch(Throwable $e) {
            errorLog($e->getMessage(), $e->getLine(), HTTP_UNPROCESSABLE_ENTITY);
            return app(\App\Exceptions\Handler::class)->render(request(), $e, HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    protected function handleFileUpload($request, $grievance, $fieldName, $path) {
        if ($request->file($fieldName)) {
            $file = $request->file($fieldName);
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs($path, $filename, 'public');
            $grievance->$fieldName = $filePath;
        } else {
            errorLog("image file not found!", HTTP_NOT_FOUND);
            return app(\App\Exceptions\Handler::class)->render(request(), "Image file not found!");
        }
    }

}