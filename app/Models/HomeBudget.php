<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\BudgetCategory;

class HomeBudget extends Model
{
protected $table = 'home_budgets';

protected $fillable = [
'date',
'category_id',
'price'
];

protected $casts = [
 'created_at' => 'datetime:Y-m-d',
 'updated_at' => 'datetime:Y-m-d',
];

public function category(): Relation{
    return $this -> belongsTo(BudgetCategory::class);
}

}
