<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class BasicTest extends TestCase
{
    #[Test]
    public function test_true_is_true()
    {
        $this->assertTrue(true);
    }
}
