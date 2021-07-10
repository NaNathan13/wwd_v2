<?php $columns = get_sub_field('columns'); ?>

<section class="dynamic_columns_section">
    <div class="dynamic_columns_container">
        <?php foreach ($columns as $column) : ?>
            <div class="dynamic_columns_column">
                <img src="<?php echo $column['icon']['url'] ?>" alt="">
                <h3><?php echo $column['headline'] ?></h3>
                <h4><?php echo $column['subheadline'] ?></h4>
                <p><?php echo $column['headline'] ?></p>
                <a href="<?php echo $column['link']['url'] ?>"><?php echo $column['link']['text'] ?></a>
            </div>
        <?php endforeach; ?>
    </div>
</section>