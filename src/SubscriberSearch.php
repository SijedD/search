<?php

namespace search;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class SearchService
{
    public static function search(Builder $query, $searchQuery, array $searchableFields)
    {
        return $query->where(function ($query) use ($searchQuery, $searchableFields) {
            foreach ($searchableFields as $field) {
                $query->orWhereRaw("LOWER($field) LIKE '%".strtolower($searchQuery)."%'");
            }
        })->get();
    }
}
