<?php declare(strict_types = 1);

namespace MailPoet\Automation\Integrations\MailPoet\Templates;

if (!defined('ABSPATH')) exit;


use MailPoet\Automation\Engine\Data\Automation;
use MailPoet\Automation\Engine\Data\AutomationTemplate;
use MailPoet\Automation\Engine\Templates\AutomationBuilder;
use MailPoet\Automation\Integrations\WooCommerce\WooCommerce;

class TemplatesFactory {
  /** @var AutomationBuilder */
  private $builder;

  /** @var WooCommerce */
  private $woocommerce;

  public function __construct(
    AutomationBuilder $builder,
    WooCommerce $woocommerce
  ) {
    $this->builder = $builder;
    $this->woocommerce = $woocommerce;
  }

  public function createTemplates(): array {
    $templates = [
      $this->createSubscriberWelcomeEmailTemplate(),
      $this->createUserWelcomeEmailTemplate(),
      $this->createSubscriberWelcomeSeriesTemplate(),
      $this->createUserWelcomeSeriesTemplate(),
    ];

    if ($this->woocommerce->isWooCommerceActive()) {
      $templates[] = $this->createFirstPurchaseTemplate();
      $templates[] = $this->createLoyalCustomersTemplate();
      $templates[] = $this->createAbandonedCartTemplate();
      $templates[] = $this->createAbandonedCartCampaignTemplate();
    }

    return $templates;
  }

  private function createSubscriberWelcomeEmailTemplate(): AutomationTemplate {
    return new AutomationTemplate(
      'subscriber-welcome-email',
      'welcome',
      __('Welcome new subscribers', 'mailpoet'),
      __(
        "Send a welcome email when someone subscribes to your list. Optionally, you can choose to send this email after a specified period.",
        'mailpoet'
      ),
      function (): Automation {
        return $this->builder->createFromSequence(
          __('Welcome new subscribers', 'mailpoet'),
          [
            ['key' => 'mailpoet:someone-subscribes'],
            ['key' => 'core:delay', 'args' => ['delay' => 1, 'delay_type' => 'MINUTES']],
            ['key' => 'mailpoet:send-email'],
          ],
          [
            'mailpoet:run-once-per-subscriber' => true,
          ]
        );
      },
      AutomationTemplate::TYPE_FREE_ONLY
    );
  }

  private function createUserWelcomeEmailTemplate(): AutomationTemplate {
    return new AutomationTemplate(
      'user-welcome-email',
      'welcome',
      __('Welcome new WordPress users', 'mailpoet'),
      __(
        "Send a welcome email when a new WordPress user registers to your website. Optionally, you can choose to send this email after a specified period.",
        'mailpoet'
      ),
      function (): Automation {
        return $this->builder->createFromSequence(
          __('Welcome new WordPress users', 'mailpoet'),
          [
            ['key' => 'mailpoet:wp-user-registered'],
            ['key' => 'core:delay', 'args' => ['delay' => 1, 'delay_type' => 'MINUTES']],
            ['key' => 'mailpoet:send-email'],
          ],
          [
            'mailpoet:run-once-per-subscriber' => true,
          ]
        );
      },
      AutomationTemplate::TYPE_FREE_ONLY
    );
  }

  private function createSubscriberWelcomeSeriesTemplate(): AutomationTemplate {
    return new AutomationTemplate(
      'subscriber-welcome-series',
      'welcome',
      __('Welcome series for new subscribers', 'mailpoet'),
      __(
        "Welcome new subscribers and start building a relationship with them. Send an email immediately after someone subscribes to your list to introduce your brand and a follow-up two days later to keep the conversation going.",
        'mailpoet'
      ),
      function (): Automation {
        return $this->builder->createFromSequence(
          __('Welcome series for new subscribers', 'mailpoet'),
          []
        );
      },
      AutomationTemplate::TYPE_PREMIUM
    );
  }

  private function createUserWelcomeSeriesTemplate(): AutomationTemplate {
    return new AutomationTemplate(
      'user-welcome-series',
      'welcome',
      __('Welcome series for new WordPress users', 'mailpoet'),
      __(
        "Welcome new WordPress users to your site. Send an email immediately after a WordPress user registers. Send a follow-up email two days later with more in-depth information.",
        'mailpoet'
      ),
      function (): Automation {
        return $this->builder->createFromSequence(
          __('Welcome series for new WordPress users', 'mailpoet'),
          []
        );
      },
      AutomationTemplate::TYPE_PREMIUM
    );
  }

  private function createFirstPurchaseTemplate(): AutomationTemplate {
    return new AutomationTemplate(
      'first-purchase',
      'woocommerce',
      __('Celebrate first-time buyers', 'mailpoet'),
      __(
        "Welcome your first-time customers by sending an email with a special offer for their next purchase. Make them feel appreciated within your brand.",
        'mailpoet'
      ),
      function (): Automation {
        return $this->builder->createFromSequence(
          __('Celebrate first-time buyers', 'mailpoet'),
          [
            [
              'key' => 'woocommerce:order-status-changed',
              'args' => [
                'from' => 'any',
                'to' => 'wc-completed',
              ],
              'filters' => [
                'operator' => 'and',
                'groups' => [
                  [
                    'operator' => 'and',
                    'filters' => [
                      ['field' => 'woocommerce:order:is-first-order', 'condition' => 'is', 'value' => true],
                    ],
                  ],
                ],
              ],
            ],
            [
              'key' => 'mailpoet:send-email',
              'args' => [
                'name' => __('Thank you', 'mailpoet'),
                'subject' => __('Thank You for Choosing Us!', 'mailpoet'),
              ],
            ],
          ],
          [
            'mailpoet:run-once-per-subscriber' => true,
          ]
        );
      },
      AutomationTemplate::TYPE_DEFAULT
    );
  }

  private function createLoyalCustomersTemplate(): AutomationTemplate {
    return new AutomationTemplate(
      'loyal-customers',
      'woocommerce',
      __('Thank loyal customers', 'mailpoet'),
      __(
        "These are your most important customers. Make them feel special by sending a thank you note for supporting your brand.",
        'mailpoet'
      ),
      function (): Automation {
        return $this->builder->createFromSequence(
          __('Thank loyal customers', 'mailpoet'),
          []
        );
      },
      AutomationTemplate::TYPE_COMING_SOON
    );
  }

  private function createAbandonedCartTemplate(): AutomationTemplate {
    return new AutomationTemplate(
      'abandoned-cart',
      'abandoned-cart',
      __('Abandoned cart reminder', 'mailpoet'),
      __(
        "Nudge your shoppers to complete the purchase after they have added a product to the cart but haven't completed the order.",
        'mailpoet'
      ),
      function (): Automation {
        return $this->builder->createFromSequence(
          __('Abandoned cart reminder', 'mailpoet'),
          [
            ['key' => 'woocommerce:abandoned-cart'],
            [
              'key' => 'mailpoet:send-email',
              'args' => [
                'name' => 'Abandoned cart',
                'subject' => 'Looks like you forgot something',
              ],
            ],
          ]
        );
      },
      AutomationTemplate::TYPE_DEFAULT
    );
  }

  private function createAbandonedCartCampaignTemplate(): AutomationTemplate {
    return new AutomationTemplate(
      'abandoned-cart-campaign',
      'abandoned-cart',
      __('Abandoned cart campaign', 'mailpoet'),
      __(
        "Encourage your potential customers to finalize their purchase when they have added items to their cart but haven't finished the order yet. Offer a coupon code as a last resort to convert them to customers.",
        'mailpoet'
      ),
      function (): Automation {
        return $this->builder->createFromSequence(
          __('Abandoned cart campaign', 'mailpoet'),
          []
        );
      },
      AutomationTemplate::TYPE_COMING_SOON
    );
  }
}
