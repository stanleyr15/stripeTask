<?php

namespace Laravel\Cashier\Concerns;

trait HandlesTaxes
{
    /**
     * Indicates if Cashier should automatically calculate tax for the new subscription.
     *
     * @var bool
     */
    protected $automaticTax = false;

    /**
     * The IP address of the customer used to determine tax location.
     *
     * @var string|null
     */
    protected $customerIpAddress;

    /**
     * The pre-collected billing address used to estimate tax rates when performing "one-off" charges.
     *
     * @var array
     */
    protected $estimationBillingAddress = [];

    /**
     * Indicates if Tax IDs should be collected during a Stripe Checkout session.
     *
     * @var bool
     */
    protected $collectTaxIds = false;

    /**
     * Allow taxes to be automatically calculated by Stripe.
     *
     * @return $this
     */
    public function withTax()
    {
        $this->automaticTax = true;

        return $this;
    }

    /**
     * Set the The IP address of the customer used to determine tax location.
     *
     * @return $this
     */
    public function withTaxIpAddress($ipAddress)
    {
        $this->customerIpAddress = $ipAddress;

        return $this;
    }

    /**
     * Set a pre-collected billing address used to estimate tax rates when performing "one-off" charges.
     *
     * @param  string  $country
     * @param  string|null  $postalCode
     * @param  string|null  $state
     * @return $this
     */
    public function withTaxAddress($country, $postalCode = null, $state = null)
    {
        $this->estimationBillingAddress = array_filter([
            'country' => $country,
            'postal_code' => $postalCode,
            'state' => $state,
        ]);

        return $this;
    }

    /**
     * Get the payload for Stripe automatic tax calculation.
     *
     * @return array|null
     */
    protected function automaticTaxPayload()
    {
        return array_filter([
            'customer_ip_address' => $this->customerIpAddress,
            'enabled' => $this->automaticTax,
            'estimation_billing_address' => $this->estimationBillingAddress,
        ]);
    }

    /**
     * Indicate that Tax IDs should be collected during a Stripe Checkout session.
     *
     * @return $this
     */
    public function collectTaxIds()
    {
        $this->collectTaxIds = true;

        return $this;
    }
}
