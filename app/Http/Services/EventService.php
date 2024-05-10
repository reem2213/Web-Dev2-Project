<?php
namespace App\Http\Services;
use App\Models\Group;

class EventService{


    protected $user;
    public function __construct($user){
        $this->user=$user;


    }

    public function create($data){
        $event= new Group($data);
        $event->save();

        return $event;

    }














}