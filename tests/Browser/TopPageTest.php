<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TopPageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testBuildingDetailLink(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink("物件詳細へ")
                ->assertPathIs('/building/detail')
                ->screenshot("success-building-detail");
        });
    }

    public function testBuildingListLink(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink("物件一覧へ")
                ->assertPathIs('/building/list')
                ->screenshot("success-building-list");
        });
    }
}
