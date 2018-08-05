<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $guarded = ['translation_oxford'];
    protected $hidden = ['translation_oxford'];

    public function oxford_json(){
        return json_decode($this->translation_oxford);
    }
    public function oxfordData(){

        if($this->translation_oxford == 'empty'){
            return 0;
        };
        $data = $this->oxford_json()->results[0];
        $output = [];
        try{
//        dd($data);
        foreach ($data->lexicalEntries as $lexicalEntry){
            $output[] = $this->getEntity($lexicalEntry);
        }
        } catch (\Exception $e){
//            dd($data);
        }
        return $output;
    }

    protected function getEntity($lexicalEntry)
    {
        $output = [];
        $output['lexicalCategory'] = $lexicalEntry->lexicalCategory;
        $definitions = [];
        $examples = [];
        try{
            foreach ($lexicalEntry->entries as $entry) {

                foreach ($entry->senses as $sense) {
                    if (isset($sense->definitions)) {
                        foreach ($sense->definitions as $definition) {
                            $definitions[] = $definition;
                        }
                    }

                    if (isset($sense->examples)) {
                        foreach ($sense->examples as $example) {
                            $examples[] = $example->text;
                        }
                    }
                }
            }
        } catch (\Exception $e){
            dd($lexicalEntry);
        }


        $output['definitions'] = $definitions;
        $output['examples'] = $examples;
        return $output;
    }


}
