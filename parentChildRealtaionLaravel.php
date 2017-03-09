<?php 
	/*
		Author :- Ahmed Fekry
		Email :- ahmedfikry78@gmail.com
		GitHub Account :- github.com/ahmedfekry
		
		this functions is used to create parent child relationship in laravel 
		
	*/

		// add this to User Model
	public function parent()
    {
        return $this->belongsTo('App\Model', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Model', 'parent_id');
    }

    // add this to a migration file 
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->integer('parent_id')->unsigned()->nullable(); 
            $table->foreign('parent_id')->references('id')->on('users')->onDelete('cascade');
            //
        });
    }


 ?>