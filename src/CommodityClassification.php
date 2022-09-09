<?php

namespace NumNum\UBL;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use InvalidArgumentException;

class CommodityClassification implements XmlSerializable
{
    private ?string $listId = null;
    private ?string $code = null;

    /**
     * The validate function that is called during xml writing to valid the data of the object.
     *
     * @throws InvalidArgumentException An error with information about required data that is missing to write the XML
     * @return void
     */
    public function validate(): void
    {
        if ($this->listId === null) {
            throw new InvalidArgumentException('Missing CommodityClassification ItemClassificationCode.listID');
        }

        if ($this->code === null) {
            throw new InvalidArgumentException('Missing CommodityClassification ItemClassificationCode value');
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer): void
    {
        $this->validate();

        $writer->write([
            [
                'name' => Schema::CBC . 'ItemClassificationCode',
                'value' => $this->code,
                'attributes' => [
                    'listID' => $this->listId
                ]
            ]
        ]);
    }


    public function getListId(): ?string
    {
        return $this->listId;
    }

    public function setListId(?string $listId): static
    {
        $this->listId = $listId;
        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): static
    {
        $this->code = $code;
        return $this;
    }
}
