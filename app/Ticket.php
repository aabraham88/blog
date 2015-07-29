<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	//Campos permitidos de actualizar en la base via Mass Assignment
	protected $fillable = ['title', 'content', 'slug', 'status', 'user_id'];
	
    //Tickets pertenecen a usuarios
    public function user()
    {
    	return $this->belongsTo('App/User');
    }

    public function getTitle()
	{
    	return $this->title;
	}

	public function getContent()
	{
    	return $this->content;
	}

	public function getSlug()
	{
    	return $this->slug;
	}

	public function getStatus()
	{
    	return $this->status;
	}

	public function getUserId()
	{
    	return $this->user_id;
	}

	public function comments()
	{
		return $this->hasMany('App\Comment', 'post_id');
	}
}
