<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Tests\Repository;
use App\Entity\Formation;
use App\Repository\FormationRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


/**
 * Description of formationTest
 *
 * @author hachm
 */
class formationTest extends KernelTestCase{
     /**
     * Recupère le repository de Formation 
     * @return FormationRepository
     */
    public function recupRepository():FormationRepository{
        self::bootKernel();
        $repository = self::getContainer()->get(FormationRepository::class);
        return $repository;
        
    }
    
    //teste sur le nombre de formations
    public function testnbformations(){
        $repository = $this->recupRepository();
        $nbformations = $repository->count([]);
        $this->assertEquals(10,$nbformations);//le test  a echoué
    }
    //teste d'ajout d'une formation
    public function newformation ():Formation{
        $formation = (new Formation ())
                ->setTitle("formationtest")
                ->setPublishedAt(new DateTime("now"));
        return $formation;
    }
    
    //tester la methode add 
    
    
    public function testadd(){
        $repository = $this->recupRepository();
        $formation =$this->newformation();
        $nbFormation = $repository->count([]);
        $repository ->add($formation, true);
        $this->assertEquals($nbFormation +1 , $repository->count([]), "erreur lors de l'ajout ");
    }
    
    //tester la methode remove 
    
    public function testremove (){
        $repository= $this->recupRepository();
        $formation=$this->newformation();
        $repository->add($formation,true);
        $nbFormation = $repository->count([]);
        $repository->remove($formatio, true);
        $this->assertEquals($nbFormation -1, $repository->count([]), "erreur lors de la suppression");
        
        
    }
     //Tester la methode findbyContainValue
    
    public function testfindByContainValue(){
        $repository= $this->recupRepository();
        $formation=$this->newformation();
        $repository->add($formation,true);
        $formation =$repository->findByContainValue("title", "formationtest");
        $nbFormation =count($formation);
        $this->assertEquals(1,$nbFormation);
    }
    }
