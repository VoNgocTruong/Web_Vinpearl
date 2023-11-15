    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thanh toán VNPAY</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f8f9fa;
                margin: 0;
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }

            .payment-container {
                background-color: #fff;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 400px;
                text-align: center;
            }

            h1 {
                color: #343a40;
            }

            label {
                display: block;
                margin-top: 20px;
                margin-bottom: 8px;
                font-weight: bold;
                color: #495057;
            }

            input {
                width: 100%;
                padding: 10px;
                box-sizing: border-box;
                border: 1px solid #ced4da;
                border-radius: 4px;
                margin-bottom: 20px;
                font-size: 16px;
            }

            button {
                background-color: #007bff;
                color: #fff;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 18px;
            }

            button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="payment-container">
            <h1>Thanh toán VNPAY</h1>
            <form action="{{ url('/payment/vnpay') }}" method="post">
                @csrf
                <label for="amount">Số tiền thanh toán:</label>
                <input type="text" name="amount" id="amount" value="20000" readonly>

                <!-- Thêm các trường dữ liệu khác nếu cần -->

                <button type="submit">Thanh toán</button>
            </form>
        </div>
    </body>
</html>