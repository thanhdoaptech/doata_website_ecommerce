<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class TestAnswer extends Model
{
    use SoftDeletes;

    public $table = 'test_answers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'test_result_id',
        'question_id',
        'option_id',
        'is_correct',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function test_result()
    {
        return $this->belongsTo(TestResult::class, 'test_result_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function option()
    {
        return $this->belongsTo(QuestionOption::class, 'option_id');
    }
}
