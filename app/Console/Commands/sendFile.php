<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class sendFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backupFile:backupCSV';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Admin';

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
        $id = 0;
        $limit = 3;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dem = 0;

        // Tạo thư mục lưu file backup, phân biệt theo năm-tháng-ngày giờ-phút-giây
        $pathBackup = 'backup/Products/' . date("y-m-d_H-i-s");
        Storage::makeDirectory($pathBackup);


        do {
            $products = Product::orderBy('id', 'asc')->where('id', '>', $id)->limit($limit)->get();
            $a = $products->count();
            $arr = $products->toArray();


            $filename = 'storage/app/' . $pathBackup . "/File_Backup_Products_" . ++$dem . ".csv";
            $handle = fopen($filename, 'w');
            fputcsv($handle, array_keys($arr[0]));
            for ($i = 0; $i < $a; $i++) {
                fputcsv($handle, $arr[$i]);
            }
            fclose($handle);
            $id = $arr[$a - 1]['id'];
        } while ($a == $limit);
    }
}
