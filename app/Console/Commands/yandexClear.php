<?php

namespace App\Console\Commands;

use App\Models\Word;
use Illuminate\Console\Command;

class yandexClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yandex:clear';

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
        $words = Word::all();
        foreach ($words as $word){
            if ($word->translation == $word->translation_yandex){
                $word->update(['translation_yandex' => null]);
            }
            $this->output->writeln($word['id'].' '.$word['word']);
        }
    }
}
