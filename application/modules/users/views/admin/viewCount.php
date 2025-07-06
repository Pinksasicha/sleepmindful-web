<section class="content-header">
    <h1>
        <?php foreach ($counts as $co):?>
            <?php if ($co): ?>
                ทำQuestionnaireนี้ไปแล้ว <?php echo $co->count;?> ครั้ง
                <?php else: ?>
                    ทำQuestionnaireนี้ไปแล้ว 0 ครั้ง
                <?php endif; ?>
        <?php endforeach;?>
        </div>
    </h1>
</section>