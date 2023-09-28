<table>
    <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Image</td>
            <td>Description</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $product) : ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['image'] ?></td>
                <td><?= $product['description'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>