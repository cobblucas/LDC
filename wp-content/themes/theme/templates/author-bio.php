<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
<div class="bb-author">
    <h2>About <?php echo $curauth->nickname; ?></h2>
    <div class="bb-author__wrap">
        <div class="bb-author__img-wrap">
            <img class="bb-author__img" alt="<?php echo $image['alt']; ?>" src="<?php the_field('profile_picture', $curauth); ?>" />
        </div>
        <div class="bb-author__info">
            <dl>
                <dt>Website</dt>
                <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
                <dt>Profile</dt>
                <dd><?php echo $curauth->user_description; ?></dd>
            </dl>
        </div>
    </div>
</div>