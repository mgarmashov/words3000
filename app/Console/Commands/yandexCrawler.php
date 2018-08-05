<?php

namespace App\Console\Commands;

use App\Models\Word;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class yandexCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yandex:get';

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
        foreach (config('words') as $word) {



            if( Word::where('word', $word['word'])->where('translation_yandex', '!=', null)->count() > 0 ){
                continue;
            }
            $client = new Client();
            $response = $client->request(
                'GET',
                config('yandex')['url'],
                [
                    'query' => [
                        'key' => config('yandex')['key'],
                        'text' => $word['word'],
                        'lang' => config('yandex')['lang'],
                        'format' => config('yandex')['format']
                    ]
                ]
            );
            $out = implode(', ', json_decode((string)$response->getBody())->text);
            $this->output->writeln($word['id'].' '.$word['word'] . ' - ' . $out);
//            echo($word['id'].' '.$word['word'] . ' - ' . $out.PHP_EOL);
            $wordModel = new Word;
            $wordModel->where('word', $word['word'])->first()->update(['translation_yandex' => $out]);
        }
    }
}
