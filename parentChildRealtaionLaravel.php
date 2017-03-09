<?php 
	/*
		Author :- Ahmed Fekry
		Email :- ahmedfikry78@gmail.com
		GitHub Account :- github.com/ahmedfekry
		
		this two functions is used to create parent child relationship in laravel 
		
	*/
	public function parent()
    {
        return $this->belongsTo('App\Model', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Model', 'parent_id');
    }



 ?>