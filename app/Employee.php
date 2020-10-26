<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Employee extends Model implements Searchable
{
    protected $fillable = ['name', 'company_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('employee.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
