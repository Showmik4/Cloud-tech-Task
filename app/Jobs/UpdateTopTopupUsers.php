<?php

namespace App\Jobs;

use App\Console\Commands\TopTopUpUsers;
use App\TopUp;
use App\TopUpUser;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateTopTopupUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            
            TopUpUser::truncate();           
            $topUsers = TopUp::select('user_id', DB::raw('COUNT(*) as topup_count'))
                ->groupBy('user_id')
                ->orderBy('topup_count', 'desc')
                ->limit(10)
                ->get();

           
            foreach ($topUsers as $user) {
                TopUpUser::create([
                    'user_id' => $user->user_id,
                    'count' => $user->topup_count,
                ]);
            }

            Log::info('TopTopUpUsers process completed successfully.');
        } catch (\Exception $e) {
            Log::error('Error in TopTopUpUsers job: ' . $e->getMessage());
        }
    }

    
    }

