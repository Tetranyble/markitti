<?php
namespace App\Services;

use App\Models\Store;

class StoreManager {
    /*
     * @var null|App\Tenant
     */
    private $store;

    public function setStore(?Store $store) {
        $this->store = $store;
        return $this;
    }

    public function getStore(): ?Store {
        return $this->store;
    }

    public function loadStore(string $identifier, bool $subdomain): bool {
        // Identify the tenant here
        $store = Store::where($subdomain ? 'subdomain' : 'domain', '=', $identifier)->first();

        if ($store) {
//
            $this->setStore($store);
            return true;
        }

        return false;
    }
}
