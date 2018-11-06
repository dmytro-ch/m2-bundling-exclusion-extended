<?php
/**
 * @author Atwix Team
 * @copyright Copyright (c) 2017 Atwix (https://www.atwix.com/)
 * @package Atwix_BundlingExclusionExtended
 */

namespace Atwix\BundlingExclusionExtended\Plugin;

use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Asset\Config as AssetConfig;

/**
 * Class AssetConfigPlugin
 */
class DisableBundlingForPageSamplePlugin
{
    /**
     * Sample Action Name
     */
    const ACTION_NAME = 'wishlist_index_index';

    /**
     * Request
     *
     * @var RequestInterface|HttpRequest
     */
    protected $request;

    /**
     * DisableCheckoutJsBundlingPlugin constructor
     *
     * @param RequestInterface $httpRequest
     */
    public function __construct(RequestInterface $httpRequest)
    {
        $this->request = $httpRequest;
    }

    /**
     * Plugin for isBundlingJsFiles method
     * Disable JS bundling for particular page
     *
     * @param AssetConfig $subject
     * @param boolean $result
     *
     * @return boolean
     */
    public function afterIsBundlingJsFiles(AssetConfig $subject, $result)
    {
        if ($this->request->getFullActionName() == self::ACTION_NAME) {

            return false;
        }

        return $result;
    }
}
