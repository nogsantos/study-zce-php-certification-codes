<?php
namespace Certificacao\B;

class B extends \Certificacao\A\myA {
    public function teste() {
        parent::teste();
    }
    public function teste2(){
        print 'teste2';
    }
}