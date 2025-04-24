<?php

namespace Ocean\Tracking\Controllers;
use Illuminate\Support\Facades\Log;
use Ocean\Tracking\Traits\HasTrackingFiller;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class OceanTrackingController extends Controller {
    use HasTrackingFiller;
    public function update(Request $request){
        $data = $request -> validate([
            'keyid'=>'required',
            'referenceno' => 'required'
        ]);
        try {
            $this -> updateOrCreate($data);
            return response()->json([
                'code' => 0,
                'message' => 'Success'
            ]);
        } catch (\Throwable $th) {
            Log::error("OceanTracking update failed", [
                'message' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ]);
            return response()->json([
                'code' => 500,
                'message' => 'Update failed',
                'error' => $th->getMessage()
            ], 500);
        }
        
    }
}