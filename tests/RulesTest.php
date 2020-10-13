<?php

namespace Tests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Orchestra\Testbench\TestCase;
use Squire\Rules\AirlineRule;
use Squire\Rules\AirportRule;
use Squire\Rules\ContinentRule;
use Squire\Rules\CountryRule;
use Squire\Rules\CountyRule;
use Squire\Rules\CurrencyRule;
use Squire\Rules\RegionRule;

class RulesTest extends TestCase
{
    private function assertPasses(Rule $rule, $value)
    {
        $this->assertTrue(
            $rule->passes('attribute', $value)
        );
    }

    private function assertFails(Rule $rule, $value)
    {
        $this->assertFalse(
            $rule->passes('attribute', $value)
        );
    }

    /** @test */
    public function test_rules_are_passing()
    {
        $this->assertPasses(new AirlineRule(), '01');
        $this->assertPasses(new AirportRule(), '00a');
        $this->assertPasses(new ContinentRule(), 'af');
        $this->assertPasses(new CountryRule(), 'ad');
        $this->assertPasses(new CurrencyRule(), 'aed');
        $this->assertPasses(new RegionRule(), 'ad-02');
        $this->assertPasses(new CountyRule('gb'), 'gb-abd');
    }

    /** @test */
    public function test_rules_are_failing()
    {
        $this->assertFails(new AirlineRule(), 'unknown');
        $this->assertFails(new AirportRule(), 'unknown');
        $this->assertFails(new ContinentRule(), 'unknown');
        $this->assertFails(new CountryRule(), 'unknown');
        $this->assertFails(new CurrencyRule(), 'unknown');
        $this->assertFails(new RegionRule(), 'unknown');
        $this->assertFails(new CountyRule('gb'), 'unknown');
    }
}
