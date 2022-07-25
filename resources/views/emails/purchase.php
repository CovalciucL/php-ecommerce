<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="width:600px; padding:15px; margin:0 auto;">
        <div style="text-align: center;">
            <h3>Store</h3>
        </div>
        <h2 style="color: #d23600;">
            Hello <?= user()->fullname;?>,
        </h2>
        <p>
            Your order confirmation details: <span style="color: #0b97c4;">#<?= $data['order_no']?></span>
        </p>
        <table cellpadding="5" cellspacing="5" border="0" width="600" style="border:1px solid #0a0a0a;">
            <tr style="background-color: #000; color:#fff;">
                <th style="text-align:left;">
                    Product Name
                </th>
                <th>
                    Unit Price
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Total
                </th>
            </tr>
            <?php foreach($data['product'] as $item):?>
                <tr>
                    <td width="400"><?= $item['name']?></td>
                    <td width="100">$<?= $item['price']?></td>
                    <td width="50"><?= $item['quantity']?></td>
                    <td width="50">$<?= $item['total']?></td>
                </tr>
            <?php endforeach;?>
        </table>
        <h4>Total Amount: $<?= $data['total'] ?></h4>
        <p>
            We hope to see you again.
        </p>
    </div>
</body>
</html>