<?php if(isset($detail['product'])): ?>
    <tr>
        <td>
            <img src="/<?php echo e($detail['product']['image_path']); ?>"
                 alt="<?php echo e($detail['product']['name']); ?>" height="40" width="40" >
        </td>
        <td><?php echo e($detail['product']['name']); ?></td>
        <td><?php echo e($detail['quantity']); ?></td>
        <td><?php echo e($detail['unit_price']); ?></td>
        <td><?php echo e($detail['total']); ?></td>
        <td><?php echo e($detail['status']); ?></td>
    </tr>
<?php endif; ?><?php /**PATH /var/www/html/resources/views/admin/details/items.blade.php ENDPATH**/ ?>