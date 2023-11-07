<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OffersController\StoreRequest;
use App\Models\File;
use App\Models\Offer;
use App\Models\Version;
use Closure;
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

    public function update(StoreRequest $request, int $id)
    {
        $request->validate([
            'advertiser_id' => function(string $attribute, mixed $value, Closure $fail):void
            {
                if(Auth()->id() != $value){
                    $fail('Произошла ошибка, попробуйте еще раз');
                }
            }
        ]);

        $offerData = $request->validated();
        $offerData['for_partner'] = json_encode($request->for_partner);
        $offerData['for_client'] = json_encode($request->for_client);
        $offerData['distinctive'] = json_encode($request->distinctive);
        $offer = Offer::findOrFail($id)->update(['approved' => false]);

        $data = [];
        $data['versionable_id'] = $id;
        $data['versionable_type'] = 'App\Models\Offer';
        $data['data'] = json_encode($offerData);

        Version::create($data);

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

        return back()->withSuccess('Оффер отправлен на рассмотрение');

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

    public function create()
    {
        return view('advertiser.offers.create');
    }

    public function store(\App\Http\Requests\Adv\OffersController\StoreRequest $request)
    {
        $data = $request->validated();
        $data['for_partner'] = json_encode($request->for_partner);
        $data['for_client'] = json_encode($request->for_client);
        $data['distinctive'] = json_encode($request->distinctive);
        $data['advertiser_id'] = Auth()->id();
        $data['approved_to_show'] = 0;

        $offer = Offer::create($data);

        if($request->file('files') != null) {
            foreach ($request->file('files') as $file) {
                File::create([
                    'category' => 'materials',
                    'src' => '/storage/'.$file->store('offers', 'public'),
                    'fileable_type' => 'App\Models\Offer',
                    'fileable_id' => $offer->id
                ]);
            }
        }
        return to_route('adv.offers')->withSuccess('Оффер успешно предложен!');
    }
}
