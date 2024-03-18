<?php

namespace Tests\Browser\Pages;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BuildingDetailTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/building/detail')
                ->type('#name', '') // 物件名を空にする
                ->select('#floor', '') // 間取りを未選択にする
                ->press('登録') // 登録ボタンをクリック
                ->acceptDialog()
                ->waitForText('物件名は必須です', 5)
                ->waitForText('間取りは必須です', 5) // 物件名または間取りのエラーメッセージを検証
                ->screenshot('error-messages');
        });
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function testSuccessRegisterBuilding(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/building/detail')
                ->type('#name', 'test')
                ->select('#floor', '1')
                ->press('登録') // 登録ボタンをクリック
                ->acceptDialog()
                ->pause(2000)
                ->assertQueryStringHas('id')
                ->assertInputValueIsNot('#id', '')
                ->assertInputValueIsNot('#name', '')
                ->assertInputValueIsNot('#floor', '')
                ->screenshot('success-register2');;
        });
    }
}
