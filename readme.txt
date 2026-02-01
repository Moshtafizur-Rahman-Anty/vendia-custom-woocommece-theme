=== Vendia ===
Contributors: moshtafizur
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 7.4
Version: 1.0.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: vendia
Tags: e-commerce, woocommerce, custom-background, custom-logo, custom-menu, featured-images

== Description ==

Vendia is a modern, performance-focused WooCommerce WordPress theme designed for clean product presentation, flexibility, and long-term maintainability.

The theme is built strictly following WordPress.org Theme Review guidelines, with a strong separation between **presentation (theme)** and **data/functionality (WooCommerce & WordPress core)**. Vendia does not introduce custom post types, shortcodes, or data-locking features — ensuring full data portability if users switch themes.

Vendia is ideal for:
• WooCommerce stores  
• Minimal eCommerce sites  
• Developers who want a clean, extensible base  
• Store owners who want homepage customization without page builders  

The homepage layout is fully configurable through the native WordPress Customizer, allowing users to control text, imagery, and product sections without touching code.

== Key Features ==

• Premium homepage hero section with background image
• Customizer-controlled homepage sections
• WooCommerce-first architecture (no data duplication)
• Product of the Week highlight
• Featured products section
• Customer review showcase
• Fully responsive layout
• Clean, modern typography
• Gutenberg editor styling support
• Accessibility-ready markup
• Translation-ready
• GPL-compliant and WordPress.org-ready

== Homepage Architecture ==

Vendia’s homepage is built using a **static layout + dynamic data approach**, ensuring compliance with WordPress.org rules.

The homepage includes:

1. Hero Section  
   • Editable title  
   • Editable subtitle  
   • Editable button text & link  
   • Editable background image  

2. Products Section  
   • Section title via Customizer  
   • Product count control  
   • Uses WooCommerce queries only  

3. Product of the Week  
   • Selects an existing WooCommerce product by ID  
   • No custom post types created  
   • Displays image, price, rating, and link  

4. Featured Products  
   • Customizable title  
   • Adjustable product count  
   • Uses WooCommerce featured flag  

5. Customer Reviews  
   • Display-only presentation  
   • Reviews remain owned by WooCommerce  
   • Theme does not create or store review content  

All homepage options are presentation-level only and stored as theme mods.

== Customizer Options ==

Vendia uses the native WordPress Customizer exclusively.

Available Customizer sections:

• Hero Section
  – Title
  – Subtitle
  – Button Text
  – Button URL
  – Background Image

• Homepage Products
  – Section Title
  – Number of Products

• Product of the Week
  – Product ID selector

• Featured Products
  – Section Title
  – Product Count

• Customer Reviews
  – Enable / Disable
  – Section Title
  – Number of Reviews

No custom admin panels are added.

== WooCommerce Integration ==

Vendia integrates cleanly with WooCommerce and does not override WooCommerce functionality.

• Uses WooCommerce templates responsibly
• Supports shop, product, cart, checkout, and account pages
• Uses wc_get_product() and standard WooCommerce hooks
• No forced layouts or plugin replacement logic

WooCommerce remains fully responsible for:
• Products
• Reviews
• Ratings
• Cart & checkout
• Orders & accounts

== Editor Support ==

Vendia includes editor styling to match frontend typography:

• Editor styles enabled
• Typography aligned with frontend
• Content width matches theme layout
• Proper padding and readability

No block locking or restrictions are applied.

== Accessibility ==

Vendia follows accessibility best practices:

• Semantic HTML5 markup
• Proper heading hierarchy
• Screen-reader text support
• Keyboard-accessible navigation
• ARIA labels where appropriate

== Performance ==

• No external frameworks required
• Minimal CSS footprint
• No JavaScript dependencies for layout
• Optimized image handling
• Clean enqueue structure

== Installation ==

1. Upload the Vendia theme folder to `/wp-content/themes/`
2. Activate the theme via Appearance → Themes
3. Install and activate WooCommerce
4. Visit Appearance → Customize to configure homepage sections

== Recommended Setup ==

• Assign a static page as homepage
• Assign WooCommerce Shop page
• Set menu locations for Header and Footer
• Configure homepage sections via Customizer

== Developer Notes ==

Vendia is intentionally built as a **classic theme**, not a block theme.

Reasons:
• Maximum compatibility
• Clear separation of concerns
• Easier customization for developers
• Stable long-term maintenance

The codebase is structured for readability and extensibility.

== Credits ==

• WordPress
• WooCommerce
• Theme developed by Moshtafizur

== License ==

Vendia is licensed under the GPL v2 or later.
You are free to modify, distribute, and use this theme under the same license.
