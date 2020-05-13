<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function scopeSubCourses($query, $course)
    {
        return $query->where('parent_id', $course);
    }
}
