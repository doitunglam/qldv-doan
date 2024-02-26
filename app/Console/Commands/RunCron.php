<?php

namespace App\Console\Commands;

use App\Models\Lich;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\BaseMail;

class RunCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run cron job';

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
     * @return int
     */
    public function handle()
    {
        // show something haha
        $dateNow = Carbon::now()->format('Y-m-d');

        $target = DB::table('lich')->
            join('doanvien', 'doanvien.MaCD', '=', 'lich.MaCD')->
            leftJoin('doanphi', 'doanphi.MaDV', '=', 'doanvien.MaDV')->
            where('ThoiDiem', '=', $dateNow)->
            get();
        foreach ($target as $doanvien) {
            if ($doanvien->{$doanvien->HocKy} != 1) {
                print_r($doanvien->Email);
                print_r("\n");
                Mail::to($doanvien->Email)->send(new BaseMail("Nhắc việc: Nộp đoàn phí " . $doanvien->HocKy . ".", "Bạn chưa nộp đoàn phí " . $doanvien->HocKy . ". Hãy thực hiện đóng đoàn phí. \nAdmin"));
            }
        }
        // Mail::to("doitunglam1@gmail.com")->send(new BaseMail("Title", "Cronjob test"));
        $this->info("Cron Run");
        return 0;
    }
}
