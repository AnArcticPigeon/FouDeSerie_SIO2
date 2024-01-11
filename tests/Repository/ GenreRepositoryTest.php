<?php
namespace app\Tests\Repository;

use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GenreRepositoryTest extends KernelTestCase {

    public function testCountGenre() {
        self::bootKernel();
        $nb = self::getContainer()->get(GenreRepository::class)->count([]);
        $this->assertEquals(5, $nb);
    }
}
?>