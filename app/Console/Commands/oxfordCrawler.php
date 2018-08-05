<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\Models\Word;

class oxfordCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oxford:get';

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



            if( Word::where('word', $word['word'])->where('translation_oxford', '!=', null)->count() > 0 ){
                continue;
            }
            $client = new Client();

            $url = config('oxford')['url'].$word['word'];
//            $this->output->writeln($word['id'].' '.$word['word']);
            try {
                $response = $client->get($url, ['headers' => [
                    'app_id' => config('oxford')['app_id'],
                    'app_key' => config('oxford')['app_key']
                ]]);
            } catch (ClientException $e){
                $out = 'empty';
                $wordModel = new Word;
                $wordModel->where('word', $word['word'])->first()->update(['translation_oxford' => $out]);
                $this->output->writeln('EMPTY EMPTY EMPTY EMPTY EMPTY EMPTY '.$word['id'].' '.$word['word']);
                continue;
//                echo Psr7\str($e->getRequest());
//                echo Psr7\str($e->getResponse());

            }

//            if ($response->getStatusCode() == '404'){
//                $out = 'empty';
//            } else {
                $out = ((string)$response->getBody());
//            };
            $this->output->writeln($word['id'].' '.$word['word']);
            $wordModel = new Word;
            $wordModel->where('word', $word['word'])->first()->update(['translation_oxford' => $out]);

            sleep(1);
        }
    }
}
