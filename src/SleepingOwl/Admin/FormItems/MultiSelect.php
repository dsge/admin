<?php namespace SleepingOwl\Admin\FormItems;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

class MultiSelect extends Select
{

	protected $view = 'multiselect';

	public function value()
	{
		$value = parent::value();
		if ($value instanceof EloquentCollection && $value->count() > 0)
		{
			$value = $value->lists($value->first()->getKeyName());
		}
		if ($value instanceof Collection)
		{
			$value = $value->toArray();
		}
		return $value;
	}

}
