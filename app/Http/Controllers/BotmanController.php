<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\BotMan;


class BotmanController extends Controller
{
    public function handle(){
        $botman=app('botman');
        $botman->hears("{message}", function($botman,$message){
            if($message=='hi'){
                $this->askName($botman);

            }
            else{
                $botman->reply('kindly write hi to start');
            }

            
            
        });
        $botman->listen();
    }


    public function askName($botman){
        $botman->ask('hello what is ur name',function (Answer $answer){
            $name=$answer->getText();
            $this->say('nice  to meet you'.$name);
        });

        $botman->ask('do u need help?',function (Answer $answer){
            $name=$answer->getText();
            $this->say('okay deal'.$name);
        });
    }
}
