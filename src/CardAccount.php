<?php

namespace NumNum\UBL;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class CardAccount implements XmlSerializable
{
    private $primaryAccountNumberId;
    private $networkId;
    private $holderName;

    /**
     * @return string|null
     */
    public function getPrimaryAccountNumberId(): ?string
    {
        return $this->primaryAccountNumberId;
    }

    /**
     * @param  string|null  $primaryAccountNumberId
     * @return CardAccount
     */
    public function setPrimaryAccountNumberId(?string $primaryAccountNumberId): CardAccount
    {
        $this->primaryAccountNumberId = $primaryAccountNumberId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNetworkId(): ?string
    {
        return $this->networkId;
    }

    /**
     * @param  string|null  $networkId
     * @return CardAccount
     */
    public function setNetworkId(?string $networkId): CardAccount
    {
        $this->networkId = $networkId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHolderName(): ?string
    {
        return $this->holderName;
    }

    /**
     * @param  string|null  $holderName
     * @return CardAccount
     */
    public function setHolderName(?string $holderName): CardAccount
    {
        $this->holderName = $holderName;
        return $this;
    }

    public function xmlSerialize(Writer $writer)
    {
        if ($this->getPrimaryAccountNumberId() !== null) {
            $writer->write([
                Schema::CBC . 'PrimaryAccountNumberID' => $this->getPrimaryAccountNumberId()
            ]);
        }

        if ($this->getNetworkId() !== null) {
            $writer->write([
                Schema::CBC . 'NetworkID' => $this->getNetworkId()
            ]);
        }

        if ($this->getHolderName() !== null) {
            $writer->write([
                Schema::CBC . 'HolderName' => $this->getHolderName()
            ]);
        }
    }
}
