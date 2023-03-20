<?php


namespace App\Tests;

use App\Entity\Formation;
use DateTime;
use PHPUnit\Framework\TestCase;


/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of playlistTest
 *
 * @author hachm
 */
class playlistTest extends  TestCase  {
    public function testGetPublishedAtString(){
        $formation = new Formation();
        $formation ->setPublishedAt(new \DateTime ("2023-02-20"));
        $this->assertEquals("20/02/2023", $formation->getPublishedAtString());
    }
}
