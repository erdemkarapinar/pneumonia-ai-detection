<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Prediction;

class PredictionController extends Controller
{

    public function predict(Request $request)
    {

        $request->validate([
            'image'=>'required|image'
        ]);

        $file = $request->file('image');

        $path = $file->store('xrays','public');

        $response = Http::attach(
            'file',
            file_get_contents($file),
            $file->getClientOriginalName()
        )->post('http://ai-api:8000/predict');

        $data = $response->json();

        Prediction::create([
            'user_id'=>auth()->id(),
            'image_path'=>$path,
            'result'=>$data['prediction'],
            'confidence'=>$data['confidence']
        ]);

        return back()->with('result',$data);
    }


    public function history()
    {

        $predictions = Prediction::where('user_id',auth()->id())->latest()->get();

        return view('history',compact('predictions'));

    }

    public function dashboard()
    {
        $predictions = Prediction::where('user_id', auth()->id())
                        ->orderBy('created_at', 'asc')
                        ->get();

        // Tarihler ve sonuçları hazırlama
        $dates = $predictions->pluck('created_at')->map(fn($d) => $d->format('d M'))->toArray();
        $confidence = $predictions->pluck('confidence')->toArray();

        return view('dashboard', compact('dates', 'confidence'));
    }

}
