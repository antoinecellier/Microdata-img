<?php

class BaseModel extends Eloquent
{

	public function validate($data, $rules = array())
    {
    	$rules = array_merge($this->rules, $rules);

    	$v = Validator::make($data, $rules);

    	if($v->fails())
    	{
    		$this->errors = $v->messages();
    		return false;
    	}

    	return $v->passes();
    }

    public function errors()
    {
    	return $this->errors;
    }

    public function rules()
    {
        return $this->rules;
    }
}