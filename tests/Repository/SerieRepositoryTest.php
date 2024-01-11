<?php
namespace app\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Repository\SerieRepository;

class SerieRepositoryTest extends KernelTestCase {

    public function testCountSerie() {
        self::bootKernel();
        $nb = self::getContainer()->get(SerieRepository::class)->count([]);
        $this->assertEquals(10, $nb);
    }
}
?>