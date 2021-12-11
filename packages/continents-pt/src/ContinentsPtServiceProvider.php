<?php
namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Continent;

class ContinentsPtServiceProvider extends ServiceProvider
{
	public function boot(): void
	{
		Repository::registerSource(Continent::class, 'pt', __DIR__ . '/../resources/data.csv');
	}
}
