<table>
    <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Last name</td>
            <td>Address</td>
            <td>City</td>
            <td>Country</td>
            <td>Post Code</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order) : ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= $order['name'] ?></td>
                <td><?= $order['last_name'] ?></td>
                <td><?= $order['address'] ?></td>
                <td><?= $order['city'] ?></td>
                <td><?= $order['country'] ?></td>
                <td><?= $order['post_code'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>