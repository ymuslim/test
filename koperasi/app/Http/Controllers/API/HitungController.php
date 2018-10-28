<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hitung;
use Illuminate\Support\Facades\Auth;
use Validator;


class HitungController extends Controller
{
  public function create(Request $request)
    {
        $request->validate([
            'nilai' => 'required|integer',
            'bunga' => 'required|integer',
            'angsuran' => 'required|integer',
        ]);

        $hitung = Hitung::where('id', $request->id)->first();

        if ($hitung->fails()) {
            return response()->json(['error'=>$hitung->errors()], 401);            
        }
        $input = $request->all();
        $user = Hitung::create($input);
        $success['nilai'] =  $hitung->nilai;
        $success['bunga'] =  $hitung->bunga;
        $success['angsuran'] =  $hitung->angsuran;

        $nilai=$success['nilai'];
        $bunga=$success['bunga'];
        $angsuran=$success['angsuran'];
        $totbung=$nilai/$angsuran*$bunga;
        $angpo=$nilai/$angsuran;
        $totang=$totbung+$angpo;
        
        return response()->json(['Angsuran ke-'=>$success],['Angsuran pokok'=>$angpo],['Bunga'=>$totbung],['Total angsuran'=>$totang],$this->successStatus);

    }
}
