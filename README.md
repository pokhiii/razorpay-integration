# Razorpay PHP Integration

This is a minimal PHP project to demonstrate Razorpay integration for creating orders and accepting payments. This project is ideal for small applications like donation systems.

## Prerequisites

- PHP >= 8.3
- Composer
- Razorpay Account ([Sign up here](https://razorpay.com/))
- Razorpay API Key and Secret ([Get API keys here](https://dashboard.razorpay.com/app/keys))

## Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/razorpay-integration.git
cd razorpay-integration
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Configure Environment Variables

```bash
cp .env.sample. .env
```

Then add your razorpay key and secret.
```
RAZORPAY_KEY=your_razorpay_key
RAZORPAY_SECRET=your_razorpay_secret
```


###  Start the PHP Server

You can use the built-in PHP server to run the project locally. Run the following command from the project’s root directory:

```bash
php -S localhost:8000
```
