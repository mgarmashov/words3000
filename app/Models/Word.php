<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

            foreach ($data->lexicalEntries as $lexicalEntry){
                $output[] = $this->getEntity($lexicalEntry);
            }
        } catch (\Exception $e){

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

        }


        $output['definitions'] = $definitions;
        $output['examples'] = $examples;
        return $output;
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'users_words');
    }

    public function scopeFavorite($query)
    {
        if (Auth::check()){
            return $query->whereHas('users', function($q) {
                $q->where('users.id', Auth::user()->id);
            });
        }

    }
}
