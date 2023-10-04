<?php

namespace App\Console\Commands;

use App\TopUp;
use App\TopUpUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TopTopUpUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'topupusers:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
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
