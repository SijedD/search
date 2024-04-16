<?php

namespace SubscriberSearch;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class SubscriberSearch
{
    public static function search(EloquentBuilder $query, $searchQuery)
    {
        return $query->where(function ($query) use ($searchQuery) {
            $query->whereRaw("LOWER(name) LIKE '%".strtolower($searchQuery)."%'")
                ->orWhereRaw("LOWER(surname) LIKE '%".strtolower($searchQuery)."%'")
                ->orWhereRaw("LOWER(patronymic) LIKE '%".strtolower($searchQuery)."%'");
        })->get();
    }
}