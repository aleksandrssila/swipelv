<?php namespace SwipeLv\Entities;


use SwipeLv\Exceptions\InvalidFormatException;

class Payment extends EntityAbstract
{
    /**
     * Required, a reference for this order in your system, up to 32 symbol long.
     * Use only lower-and uppercase Latin letters, digits and dash (-) in this field.
     *
     * @var string
     */
    protected $referenceId;

    /**
     * Optional, client will have to fill it in if you don't specify it yourself.
     *
     * @var string
     */
    protected $clientEmail;

    /**
     * Required, keep it true.
     *
     * @var bool
     */
    protected $formPayment = true;

    /**
     * Required, array of product-describing objects. Please note that numeric
     * fields are transferred as strings. Price of each product should be specified
     * in € with 2 decimal signs.
     *
     * @var Product[]
     */
    protected $products = [];

    /**
     * URL to redirect the client's browser to after payment is
     * successfully performed. You could, e.g., clear the customer's cart
     * here.
     *
     * @var string
     */
    protected $successRedirect;

    /**
     * URL to send a server-side POST request to once the payment is
     * complete. It will have some parameters to help you identify the
     * order. You should use it to improve the security of
     * your payment-related functionality. It's best to, for instance, only
     * mark orders as paid once you receive this server-side callback. It
     * will be executed before your client is redirected to
     * success_redirect.
     *
     * @var string
     */
    protected $successCallback;

    /**
     * URL to redirect the client's browser to if payment fails.
     *
     * @var string
     */
    protected $failureRedirect;

    /**
     * URL to redirect the client's browser to if your customer uses
     * Receive invoice" option in the Swipe payment form.
     *
     * @var string
     */
    protected $invoiceSuccessRedirect;

    /**
     * @param Product $product
     */
    public function addProduct(Product $product){
        $this->products[] = $product;
    }

    /**
     * @return string
     */
    public function getClientEmail(){
        return $this->clientEmail;
    }

    /**
     * @param string $clientEmail
     * @return $this
     */
    public function setClientEmail($clientEmail){
        $this->clientEmail = $clientEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getFailureRedirect(){
        return $this->failureRedirect;
    }

    /**
     * @param string $failureRedirect
     * @return $this
     */
    public function setFailureRedirect($failureRedirect){
        $this->failureRedirect = $failureRedirect;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFormPayment(){
        return $this->formPayment;
    }

    /**
     * @param boolean $formPayment
     * @return $this
     */
    public function setFormPayment($formPayment){
        $this->formPayment = $formPayment;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceSuccessRedirect(){
        return $this->invoiceSuccessRedirect;
    }

    /**
     * @param string $invoiceSuccessRedirect
     * @return $this
     */
    public function setInvoiceSuccessRedirect($invoiceSuccessRedirect){
        $this->invoiceSuccessRedirect = $invoiceSuccessRedirect;
        return $this;
    }

    /**
     * @return Product[]
     */
    public function getProducts(){
        return $this->products;
    }

    /**
     * @param Product[] $products
     * @return $this
     */
    public function setProducts($products){
        $this->products = $products;
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceId(){
        return $this->referenceId;
    }

    /**
     * @param string $referenceId
     *
     * @throws InvalidFormatException
     * @return $this
     */
    public function setReferenceId($referenceId){

        if( strlen($referenceId) > 32 ){
            throw new InvalidFormatException('reference_id','can be 32 symbol long');
        }

        if( preg_match('/[^a-zA-Z0-9\-]/',$referenceId) === 0){
            throw new InvalidFormatException('reference_id','can hold lower and uppercase Latin letters, digits and dash (-) only');
        }

        $this->referenceId = $referenceId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSuccessCallback(){
        return $this->successCallback;
    }

    /**
     * @param string $successCallback
     * @return $this
     */
    public function setSuccessCallback($successCallback){
        $this->successCallback = $successCallback;
        return $this;
    }

    /**
     * @return string
     */
    public function getSuccessRedirect(){
        return $this->successRedirect;
    }

    /**
     * @param string $successRedirect
     * @return $this
     */
    public function setSuccessRedirect($successRedirect){
        $this->successRedirect = $successRedirect;
        return $this;
    }
} 