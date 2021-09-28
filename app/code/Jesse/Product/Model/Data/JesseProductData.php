<?php

namespace Jesse\Product\Model\Data;

use Jesse\Product\Api\Data\JesseProductInterface;
use Magento\Framework\DataObject;

class JesseProductData extends DataObject implements JesseProductInterface
{
    /**
     * @inheritDoc
     */
    public function getJesseProductId(): ?int
    {
        return $this->getData(self::JESSE_PRODUCT_ID) === null ? null
            : (int)$this->getData(self::JESSE_PRODUCT_ID);
    }

    /**
     * @inheritDoc
     */
    public function setJesseProductId(?int $jesseProductId): void
    {
        $this->setData(self::JESSE_PRODUCT_ID, $jesseProductId);
    }

    /**
     * @inheritDoc
     */
    public function getName(): ?string
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName(?string $name): void
    {
        $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getWeight(): ?float
    {
        return $this->getData(self::WEIGHT) === null ? null
            : (float)$this->getData(self::WEIGHT);
    }

    /**
     * @inheritDoc
     */
    public function setWeight(?float $weight): void
    {
        $this->setData(self::WEIGHT, $weight);
    }

    /**
     * @inheritDoc
     */
    public function getQuantity(): ?int
    {
        return $this->getData(self::QUANTITY) === null ? null
            : (int)$this->getData(self::QUANTITY);
    }

    /**
     * @inheritDoc
     */
    public function setQuantity(?int $quantity): void
    {
        $this->setData(self::QUANTITY, $quantity);
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setDescription(?string $description): void
    {
        $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
    }
}
