<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Tests\Repository;
use App\Entity\Playlist;
use App\Repository\PlaylistRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Constraints\DateTime;
/**
 * Description of playlistTest
 *
 * @author hachm
 */
class playlistTest extends KernelTestCase{
  
    //recuperer le repository
    public function recupRepository(): PlaylistRepository{
        self::bootKernel();
        $repository = self::getContainer()->get(PlaylistRepository::class);
        return $repository;
        
    }
    public function newplaylist (): Playlist{
        $playlist = (new Playlist ())
                ->setName("playliststest");
                
        return $playlist;
    }
    
    // Tester la methode add 
    
     public function testadd(){
        $repository = $this->recupRepository();
        $playlists =$this->newplaylist();
        $nbplaylists = $repository->count([]);
        $repository ->add($playlists, true);
        $this->assertEquals($nbplaylists +1 , $repository->count([]), "erreur lors de l'ajout ");
    }
    
    //Tester la methode remove 
    public function testremove (){
        $repository= $this->recupRepository();
        $playlists=$this->newplaylist();
        $repository->add($playlists,true);
        $nbplaylists = $repository->count([]);
        $repository->remove($playlists, true);
        $this->assertEquals($nbplaylists -1, $repository->count([]), "erreur lors de la suppression");
        
        
    }
    //Tester la methode findbyContainValue
    
    public function testfindByContainValue(){
        $repository= $this->recupRepository();
        $playlists=$this->newplaylist();
        $repository->add($playlists,true);
        $playlists =$repository->findByContainValue("title", "formationtest");
        $nbplaylists =count($playlists);
        $this->assertEquals(1,$nbplaylists);
    }
}
