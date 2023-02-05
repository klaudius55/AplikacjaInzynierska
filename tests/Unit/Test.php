<?php
use App\Models\Unit;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function unit_created()
    {
        $this->unit('/units', [
            'name' => 'mb',
        ]);

        $this->assertDatabaseHas('units', [
            'name' => 'mb',
        ]);
    }
}
