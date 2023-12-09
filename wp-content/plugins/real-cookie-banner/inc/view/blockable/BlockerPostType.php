<?php

namespace DevOwl\RealCookieBanner\view\blockable;

use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\AbstractBlockable;
use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\HeadlessContentBlocker;
use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\plugins\imagePreview\ImagePreviewBlockable;
use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration;
use DevOwl\RealCookieBanner\lite\view\blocker\ImagePreviewBlockableTrait;
use DevOwl\RealCookieBanner\settings\Blocker;
use WP_Post;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Describe a blockable item by `WP_Post` custom post type.
 */
class BlockerPostType extends AbstractBlockable implements ImagePreviewBlockable
{
    use UtilsProvider;
    use ImagePreviewBlockableTrait;
    private $post;
    /**
     * C'tor.
     *
     * @param HeadlessContentBlocker $headlessContentBlocker
     * @param WP_Post $post
     * @codeCoverageIgnore
     */
    public function __construct($headlessContentBlocker, $post)
    {
        parent::__construct($headlessContentBlocker);
        $this->post = $post;
        $this->appendFromStringArray($post->metas[Blocker::META_NAME_RULES]);
    }
    // Documented in Blockable
    public function getBlockerId()
    {
        return $this->getPost()->ID;
    }
    // Documented in Blockable
    public function getRequiredIds()
    {
        $metas = $this->getPost()->metas;
        $criteria = $metas[Blocker::META_NAME_CRITERIA];
        $cookieIds = [];
        switch ($criteria) {
            case Blocker::CRITERIA_TCF_VENDORS:
                // Map Custom Post Type Post ID to vendor ID
                $tcfVendorConfigurations = TcfVendorConfiguration::getInstance()->getOrdered();
                $cookieIds = \array_map(function ($postId) use($tcfVendorConfigurations) {
                    foreach ($tcfVendorConfigurations as $tcfVendorConfiguration) {
                        if ($tcfVendorConfiguration->ID === $postId) {
                            return $tcfVendorConfiguration->metas[TcfVendorConfiguration::META_NAME_VENDOR_ID];
                        }
                    }
                    return 0;
                }, $metas[Blocker::META_NAME_TCF_VENDORS]);
                break;
            default:
                $cookieIds = $metas[Blocker::META_NAME_SERVICES];
                break;
        }
        return $cookieIds;
    }
    // Documented in Blockable
    public function getCriteria()
    {
        return $this->getPost()->metas[Blocker::META_NAME_CRITERIA];
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getPost()
    {
        return $this->post;
    }
}
