<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\BuildingService;
use App\Repositories\BuildingRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BuildingServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_new_building()
    {
        // モックを作成し、期待されるメソッド呼び出しをセットアップ
        $buildingRepositoryMock = $this->createMock(BuildingRepositoryInterface::class);
        $buildingRepositoryMock->expects($this->once())
            ->method('create')
            ->with($this->equalTo([
                'building_name' => 'Test Building',
                'floor' => 1
            ]))
            ->willReturn((object)[
                'building_name' => 'Test Building',
                'floor' => 1
            ]);

        $buildingService = new BuildingService($buildingRepositoryMock);

        $buildingData = [
            'building_name' => 'Test Building',
            'floor' => 1
        ];

        // サービスメソッドを実行
        $result = $buildingService->createBuilding($buildingData);

        // 結果を検証
        $this->assertEquals('Test Building', $result->building_name);
        $this->assertEquals(1, $result->floor);
    }
}
