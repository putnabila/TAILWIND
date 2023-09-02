<div class="bg-slate-300">
    <?php if(isset($_COOKIE['message'])) : ?>
        <div class="p-3 bg-pink-200 m-3\ rounded-xl text-black">
            <?= $_COOKIE['message'] ?>
        </div>
        <?php endif?>
</div>