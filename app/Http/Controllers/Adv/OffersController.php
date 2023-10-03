<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OffersController extends Controller
{
    public function index()
    {
        $offers = Offer::where('advertiser_id', Auth()->id())->orderBy('created_at', 'DESC')->get();
        return view('advertiser.offers.index', compact('offers'));
    }

    public function show($id)
    {
        $offer = Offer::findOrFail($id);
        return view('advertiser.offers.show', compact('offer'));
    }

    public function addFile(Request $request, $id)
    {
        Offer::findOrFail($id);

        if($request->file('files') != null) {
            foreach ($request->file('files') as $file) {
                File::create([
                    'category' => 'materials',
                    'src' => '/storage/'.$file->store('offers', 'public'),
                    'fileable_type' => 'App\Models\Offer',
                    'fileable_id' => $id
                ]);
            }
        }
        return back()->withSuccess('Файлы успешно добавлены');
    }

    public function removeFile(Request $request)
    {
        $file = str_replace('/storage/', '', $request->img);
        if(Storage::disk('public')->exists($file)) {
            Storage::disk('public')->delete($file);
            File::where('src',$request->img)->delete();
        }else{
            return Response()->json('Not Founded', 404);
        }

        return true;
    }
}
