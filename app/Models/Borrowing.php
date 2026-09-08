<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrow_code', 'user_id', 'tool_id', 'quantity',
        'borrow_date', 'planned_return_date', 'actual_return_date',
        'status', 'fine', 'notes', 'rejection_reason',
        'approved_by', 'approved_at',
    ];

    protected $casts = [
        'borrow_date' => 'date',
        'planned_return_date' => 'date',
        'actual_return_date' => 'date',
        'approved_at' => 'datetime',
        'fine' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function calculateFine()
    {
        if (!$this->actual_return_date) return 0;

        $planned = Carbon::parse($this->planned_return_date);
        $actual = Carbon::parse($this->actual_return_date);

        if ($actual->lte($planned)) return 0;

        $daysLate = $planned->diffInDays($actual);
        $dailyFine = $this->tool->daily_fine ?? 0;

        return $daysLate * $dailyFine * $this->quantity;
    }
}