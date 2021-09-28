<?php

namespace Jesse\Product\Api\Data;

interface JesseProductInterface
{
    /**
     * String constants for property names
     */
    const JESSE_PRODUCT_ID = "jesse_product_id";
    const NAME = "name";
    const WEIGHT = "weight";
    const QUANTITY = "quantity";
    const DESCRIPTION = "description";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    /**
     * Getter for JesseProductId.
     *
     * @return int|null
     */
    public function getJesseProductId(): ?int;

    /**
     * Setter for JesseProductId.
     *
     * @param int|null $jesseProductId
     *
     * @return void
     */
    public function setJesseProductId(?int $jesseProductId): void;

    /**
     * Getter for Name.
     *
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Setter for Name.
     *
     * @param string|null $name
     *
     * @return void
     */
    public function setName(?string $name): void;

    /**
     * Getter for Weight.
     *
     * @return float|null
     */
    public function getWeight(): ?float;

    /**
     * Setter for Weight.
     *
     * @param float|null $weight
     *
     * @return void
     */
    public function setWeight(?float $weight): void;

    /**
     * Getter for Quantity.
     *
     * @return int|null
     */
    public function getQuantity(): ?int;

    /**
     * Setter for Quantity.
     *
     * @param int|null $quantity
     *
     * @return void
     */
    public function setQuantity(?int $quantity): void;

    /**
     * Getter for Description.
     *
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * Setter for Description.
     *
     * @param string|null $description
     *
     * @return void
     */
    public function setDescription(?string $description): void;

    /**
     * Getter for CreatedAt.
     *
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * Setter for CreatedAt.
     *
     * @param string|null $createdAt
     *
     * @return void
     */
    public function setCreatedAt(?string $createdAt): void;

    /**
     * Getter for UpdatedAt.
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string;

    /**
     * Setter for UpdatedAt.
     *
     * @param string|null $updatedAt
     *
     * @return void
     */
    public function setUpdatedAt(?string $updatedAt): void;
}
