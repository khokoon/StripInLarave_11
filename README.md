# StripInLaravel_11

A simple Laravel 11 integration with Stripe for handling payments using Stripe Elements and the Stripe PHP SDK.

## 📦 Features

- Stripe payment form with card input
- Token generation via Stripe.js (client-side)
- Charge creation using Stripe PHP SDK (server-side)
- Laravel 11 compatible and extendable

---

##🧠 How It Works
- StripeController@index returns the Stripe form view.
- StripeController@charge receives the Stripe token and charges the card.
- Blade view contains Stripe Elements and JavaScript to handle token creation.



## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/khokoon/StripInLarave_11.git
   cd StripInLarave_11
   ```
2. **Install dependencies**
    ```bash
    composer install
    npm install && npm run dev
    ```
3. **Copy and configure .env**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
**Add your Stripe credentials in the .env file:**
    ```bash
    STRIPE_SECRET=sk_test_your_secret_key
    STRIPE_KEY=pk_test_your_publishable_key
    ```
4. **Run the Laravel server**
   ```bash
   php artisan serve
   ```
