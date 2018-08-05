<?php

use Illuminate\Database\Seeder;
use App\Models\Word;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('words') as $word){
            factory(Word::class)->create([
                'word' => $word['word'],
                'transcription' => $word['transcription'],
                'translation' => $word['translation']
            ]);
        }
    }
}
