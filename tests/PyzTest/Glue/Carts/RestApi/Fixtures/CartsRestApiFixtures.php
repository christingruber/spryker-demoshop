<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Glue\Carts\RestApi\Fixtures;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use PyzTest\Glue\Carts\CartsApiTester;
use Spryker\Glue\CartsRestApi\CartsRestApiConfig;
use SprykerTest\Shared\Testify\Fixtures\FixturesBuilderInterface;
use SprykerTest\Shared\Testify\Fixtures\FixturesContainerInterface;

/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Glue
 * @group Carts
 * @group RestApi
 * @group CartsRestApiFixtures
 * Add your own group annotations below this line
 * @group EndToEnd
 */
class CartsRestApiFixtures implements FixturesBuilderInterface, FixturesContainerInterface
{
    use CartsRestApiFixturesTrait;

    protected const TEST_USERNAME = 'UserCartsRestApiFixtures';
    protected const TEST_PASSWORD = 'password';

    public const QUANTITY_FOR_ITEM_UPDATE = 33;
    public const STORE_DE = 'DE';
    public const TEST_CART_NAME = 'Test cart name';
    public const CURRENCY_EUR = 'EUR';

    /**
     * @var \Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransfer;

    /**
     * @var \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    protected $productConcreteTransfer;

    /**
     * @var \Generated\Shared\Transfer\QuoteTransfer
     */
    protected $quoteTransfer;

    /**
     * @var \Generated\Shared\Transfer\QuoteTransfer
     */
    protected $emptyQuoteTransfer;

    /**
     * @var \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    protected $productConcreteTransfer1;

    /**
     * @var \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    protected $productConcreteTransfer2;

    /**
     * @var string
     */
    protected $cartResourceEntityTag;

    /**
     * @var string
     */
    protected $emptyCartResourceEntityTag;

    /**
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function getCustomerTransfer(): CustomerTransfer
    {
        return $this->customerTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    public function getProductConcreteTransfer(): ProductConcreteTransfer
    {
        return $this->productConcreteTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getQuoteTransfer(): QuoteTransfer
    {
        return $this->quoteTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getEmptyQuoteTransfer(): QuoteTransfer
    {
        return $this->emptyQuoteTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    public function getProductConcreteTransfer1(): ProductConcreteTransfer
    {
        return $this->productConcreteTransfer1;
    }

    /**
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    public function getProductConcreteTransfer2(): ProductConcreteTransfer
    {
        return $this->productConcreteTransfer2;
    }

    /**
     * @return string
     */
    public function getCartResourceEntityTag(): string
    {
        return $this->cartResourceEntityTag;
    }

    /**
     * @return string
     */
    public function getEmptyCartResourceEntityTag(): string
    {
        return $this->emptyCartResourceEntityTag;
    }

    /**
     * @param \PyzTest\Glue\Carts\CartsApiTester $I
     *
     * @return \SprykerTest\Shared\Testify\Fixtures\FixturesContainerInterface
     */
    public function buildFixtures(CartsApiTester $I): FixturesContainerInterface
    {
        $this->createCustomer($I);

        $this->productConcreteTransfer = $this->createProduct($I);
        $this->quoteTransfer = $this->createPersistentQuote($I, $this->customerTransfer, [$this->productConcreteTransfer]);
        $this->cartResourceEntityTag = $this->createCartResourceEntityTag(
            $I,
            $this->quoteTransfer->getUuid(),
            $this->quoteTransfer->toArray()
        );

        $this->emptyQuoteTransfer = $this->createEmptyQuote($I, $this->getCustomerTransfer()->getCustomerReference());
        $this->emptyCartResourceEntityTag = $this->createCartResourceEntityTag(
            $I,
            $this->emptyQuoteTransfer->getUuid(),
            $this->emptyQuoteTransfer->toArray()
        );

        $this->productConcreteTransfer1 = $this->createProduct($I);
        $this->productConcreteTransfer2 = $this->createProduct($I);

        return $this;
    }

    /**
     * @param \PyzTest\Glue\Carts\CartsApiTester $I
     *
     * @return void
     */
    protected function createCustomer(CartsApiTester $I): void
    {
        $customerTransfer = $I->haveCustomer([
            CustomerTransfer::USERNAME => static::TEST_USERNAME,
            CustomerTransfer::PASSWORD => static::TEST_PASSWORD,
            CustomerTransfer::NEW_PASSWORD => static::TEST_PASSWORD,
        ]);
        $this->customerTransfer = $customerTransfer;
    }

    /**
     * @param \PyzTest\Glue\Carts\CartsApiTester $I
     * @param string $cartUuid
     * @param array $attributes
     *
     * @return string
     */
    protected function createCartResourceEntityTag(
        CartsApiTester $I,
        string $cartUuid,
        array $attributes
    ): string {
        return $I->haveEntityTag(
            CartsRestApiConfig::RESOURCE_CARTS,
            $cartUuid,
            $attributes
        );
    }
}
