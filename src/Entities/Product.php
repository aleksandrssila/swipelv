<?php namespace SwipeLv\Entities;
use SwipeLv\Exceptions\InvalidFormatException;

/**
 * Class Product
 * @package SwipeLv\Entities
 */
class Product extends EntityAbstract
{
    /**
     * Price of each product should be specified
     * in € with 2 decimal signs.
     *
     * @var string
     */
    protected $price;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $quantity = 0;

    /**
     * @param integer $price
     * @return $this
     *
     * @throws InvalidFormatException
     */
    public function setPrice($price){

        if( ! (is_numeric( $price ) && floor( $price ) != $price) ){
            throw new InvalidFormatException('price','is not decimal');
        }

        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrice(){
        return $this->price;
    }

    /**
     * @return string
     */
    public function getDescription(){
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description){
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getQuantity(){
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }
} 