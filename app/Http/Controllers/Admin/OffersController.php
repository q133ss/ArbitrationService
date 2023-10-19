<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OffersController\StoreRequest;
use App\Models\File;
use App\Models\Notification;
use App\Models\Offer;
use App\Models\User;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::orderBy('created_at', 'DESC')->get();
        return view('admin.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $advertisers = User::where('role_id', function ($query){
            $query->select('id')
                ->from('roles')
                ->where('tech_name', 'advertiser')
                ->first();
        })->get();
        return view('admin.offers.create', compact('advertisers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['for_partner'] = json_encode($request->for_partner);
        $data['for_client'] = json_encode($request->for_client);
        $data['distinctive'] = json_encode($request->distinctive);

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
        return to_route('admin.offers.index')->withSuccess('Офер успешно добавлен!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $offer = Offer::findOrFail($id);
        $advertisers = User::where('role_id', function ($query){
            $query->select('id')
                ->from('roles')
                ->where('tech_name', 'advertiser')
                ->first();
        })->get();

        return view('admin.offers.edit', compact('offer', 'advertisers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $data = $request->validated();
        $data['for_partner'] = json_encode($request->for_partner);
        $data['for_client'] = json_encode($request->for_client);
        $data['distinctive'] = json_encode($request->distinctive);
        $offer = Offer::findOrFail($id)->update($data);

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
        return to_route('admin.offers.index')->withSuccess('Офер успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Offer::findOrFail($id)->delete();
        return to_route('admin.offers.index')->withSuccess('Офер успешно удален!');
    }

    public function deleteFile(Request $request)
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

    public function approved(StoreRequest $request, int $id)
    {
        $offer = Offer::findOrFail($id);
        $offer->update(['approved' => true]);
        Version::where('versionable_type', 'App\Models\Offer')->where('versionable_id', $id)->delete();

        if($request->approved == true) {
            $data = $request->validated();
            $data['for_partner'] = json_encode($request->for_partner);
            $data['for_client'] = json_encode($request->for_client);
            $data['distinctive'] = json_encode($request->distinctive);
            $offer->update($data);

            if ($request->file('files') != null) {
                foreach ($request->file('files') as $file) {
                    File::create([
                        'category' => 'materials',
                        'src' => '/storage/' . $file->store('offers', 'public'),
                        'fileable_type' => 'App\Models\Offer',
                        'fileable_id' => $id
                    ]);
                }
            }
            Notification::create([
                'title' => 'Изменения вашего офера '. $id .' одобрены!',
                'user_id' => $data['advertiser_id']
            ]);
            return to_route('admin.offers.index')->withSuccess('Изменения одобрены!');
        }
        Notification::create([
            'title' => 'Изменения вашего офера '. $id .' отклонены!',
            'user_id' => $request->advertiser_id
        ]);

        return to_route('admin.offers.index')->withSuccess('Изменения отклонены!');
    }
}
