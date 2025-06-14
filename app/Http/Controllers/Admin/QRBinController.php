<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\BinQR;
use App\Models\Botler;
use App\Models\Machine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRBinController extends Controller {
    public function qrBinIndex(Request $request) {
        $botlerNames = Botler::where('deleted_at', NULL)->get();
        $machineNames = Machine::where('deleted_at', NULL)->get();
        $binQRS = BinQR::where('deleted_at', NULL)->where('id', $request->id)->first();
        return view('admin.masters.qr_bin.index', [
            'page' => 'Master SMS Machine List',
            'botlerNames' => $botlerNames,
            'machineNames' => $machineNames,
            'binQRS' => $binQRS
        ]);
    }

    public function qrBinSave(Request $request) {
        try{
            $request->validate([
                'bottler_id' => 'required|numeric',
                'machine_id' => 'required|numeric',
                'bin_name' => 'required|string',
                'bin_mobile' => 'required|string',
                'other_mobile' => 'nullable|string',
                'bin_otp' => 'nullable|string',
                'store_code' => 'required|string',
                'store_manager' => 'required|string',
                'format' => 'nullable|string',
                'bin_status' => 'nullable|string',
            ]);

            // Update or create BinQR
            $binQr = isset($request->id) ? BinQR::where('id', $request->id)->first() : new BinQR();
            $binQr->bottler_id = json_decode($request->bottler_id);
            $binQr->machine_id = json_decode($request->machine_id);
            $binQr->bin_name = strtolower($request->bin_name);
            $binQr->bin_mobile = preg_replace('/\D/', '', $request->bin_mobile);
            $binQr->bin_otp = $request->bin_otp;
            $binQr->store_code = strtolower($request->store_code);
            $binQr->store_manager = ucwords(strtolower($request->store_manager));
            $binQr->format = $request->format;
            $binQr->bin_status = json_decode($request->bin_status);
            $binQr->other_mobile = preg_replace('/\D/', '', $request->other_mobile);
            $binQr->save();

            if ($binQr->machine_id) {
                $qrCodeImage = QrCode::format('png')->size(300)->generate($binQr->machine_id);
                $fileName = 'binqr_' . $binQr->id . '_' . time() . '.png';
                $publicPath = public_path('uploads/' . $fileName);
                if (!file_exists(public_path('uploads'))) {
                    mkdir(public_path('uploads'), 0777, true);
                }

                file_put_contents($publicPath, $qrCodeImage);

                $binQr->qr_images = 'uploads/' . $fileName;
                $binQr->uniq_id = pathinfo($fileName, PATHINFO_FILENAME);
                $binQr->bin_qr_url = asset('uploads/qrcode/' . $fileName);
                $binQr->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'QR Bin saved successfully.',
                'data' => $binQr
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->validator->errors()->first()
            ], 422);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error assigning machine: ' . $e->getMessage()
            ], 500);
        }
    }

    public function qrBinShow(Request $request, $id) {
        try{

        } catch(Throwable $e) {

        }
    }

    public function qrBinEdit(Request $request, $id) {
        try{

        } catch(Throwable $e) {

        }
    }

    public function qrBinDelete(Request $request, $id) {
        try{

        } catch(Throwable $e) {

        }
    }
}
