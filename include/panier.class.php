<?php
class panier{

    private $zxy ;

    public function __construct($zxy){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
        $this->zxy = $zxy;
    }

    public function total(){
        $total = 0;
        $poi=array_keys($_SESSION['panier']);

        if(empty($poi)){
            $qq = array();
        }else {
            $Req = $this->zxy->prepare('SELECT id_article, prix_article FROM evinp4y.article WHERE id_article IN ('.implode(',',$poi).')');
            $Req -> execute();
            $qq = $Req -> fetchAll(PDO::FETCH_OBJ);
        }

        foreach( $qq as $product){
            $total += $product->prix_article * $_SESSION['panier'][$product->id_article];
        }

        return $total;
    }

    public function add($product_id){
        
        if(isset($_SESSION['panier'][$product_id])){
            $_SESSION['panier'][$product_id]++ ;
        }else {
            $_SESSION['panier'][$product_id] = 1 ;
        }
    }

    public function del($product_id){
        unset($_SESSION['panier'][$product_id]);
    }
}
?>