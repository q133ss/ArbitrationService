<?php

namespace App\Console\Commands;

use App\Models\Lead;
use App\Models\Number;
use App\Models\Offer;
use App\Services\TelphinService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetCalls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calls:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $numbers = Number::get();
        foreach ($numbers as $number) {
            $params = [
                'start_datetime' => now()->subWeek()->format('Y-m-d H:m:s'),
                'end_datetime' => now()->format('Y-m-d H:m:s'),
                'flow' => 'in',
                'page' => 1,
                'per_page' => 100000,
                'did_number' => $number->number
            ];
            $calls = (new TelphinService())->getCalls($params);

            foreach ($calls as $call) {
                $exists = DB::table('numbers_calls')
                    ->where('duration', $call->duration)
                    ->where('number_from', $call->from_username)
                    ->where('created_at', '>', now()->subWeek())->exists();
                if(!$exists) {
                    DB::table('numbers_calls')->insert([
                        'duration' => $call->duration,
                        'number_from' => $call->from_username,
                        'number_id' => $number->id,
                        'created_at' => now()
                    ]);

//                    if($number->offer_id != null) {
//                        Lead::create([
//                            'phone' => $call->from_username,
//                            'offer_id' => $number->offer_id,
//                            'master_id' => $number->user_id
//                        ]);
//                    }
                }
            }
        }
    }
}
