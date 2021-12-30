<section class="sub2-numbers<?php print sub2Modifiers('sub2-numbers'); ?>">
    <div class="sub2-numbers__inner">
        <?php foreach(get_sub_field('sub2_numbers') as $number): ?>
            <div class="sub2-numbers__block" title="<?php print $number['citation']; ?>">
                <strong class="sub2-numbers__number"><?php print $number['number']; ?></strong>
                <?php print $number['description']; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
