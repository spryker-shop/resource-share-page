<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ResourceSharePage;

use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Yves\Kernel\Application;
use SprykerShop\Yves\ResourceSharePage\Dependency\Client\ResourceSharePageToCustomerClientInterface;
use SprykerShop\Yves\ResourceSharePage\Dependency\Client\ResourceSharePageToResourceShareClientInterface;
use SprykerShop\Yves\ResourceSharePage\RouteResolver\RouteResolver;

class ResourceSharePageFactory extends AbstractFactory
{
    /**
     * @return \SprykerShop\Yves\ResourceSharePageExtension\Dependency\Plugin\ResourceShareRouterStrategyPluginInterface[]
     */
    public function getResourceShareRouterStrategyPlugins(): array
    {
        return $this->getProvidedDependency(ResourceSharePageDependencyProvider::PLUGINS_RESOURCE_SHARE_ROUTER_STRATEGY);
    }

    /**
     * @return \SprykerShop\Yves\ResourceSharePage\Dependency\Client\ResourceSharePageToResourceShareClientInterface
     */
    public function getResourceShareClient(): ResourceSharePageToResourceShareClientInterface
    {
        return $this->getProvidedDependency(ResourceSharePageDependencyProvider::CLIENT_RESOURCE_SHARE);
    }

    /**
     * @return \Spryker\Yves\Kernel\Application
     */
    public function getApplication(): Application
    {
        return $this->getProvidedDependency(ResourceSharePageDependencyProvider::PLUGIN_APPLICATION);
    }

    /**
     * @return \SprykerShop\Yves\ResourceSharePage\Dependency\Client\ResourceSharePageToCustomerClientInterface
     */
    public function getCustomerClient(): ResourceSharePageToCustomerClientInterface
    {
        return $this->getProvidedDependency(ResourceSharePageDependencyProvider::CLIENT_CUSTOMER);
    }

    /**
     * @return \SprykerShop\Yves\ResourceSharePage\RouteResolver\RouteResolver
     */
    public function getRouteResolver(): RouteResolver
    {
        return new RouteResolver(
            $this->getResourceShareRouterStrategyPlugins()
        );
    }
}
