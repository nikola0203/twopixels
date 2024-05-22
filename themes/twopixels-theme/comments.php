<div class="comments-area">
  <?php 
      function custom_comment_callback($comment, $args, $depth) {
    // Retrieve important data
    $comment_author  = get_comment_author($comment);
    $comment_content = get_comment_text($comment);
    $comment_date    = get_comment_date('j F, Y', $comment);
    $comment_avatar  = get_avatar( $comment, 120, 'monsterid');
    

    // Customize the comment output
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
      <article id="div-comment-<?php comment_ID(); ?>" class="comment-body d-lg-flex  p-10 p-lg-18 bg-white">
        <div class="avatar-wrapper rounded-circle me-lg-8 text-center mb-8 mb-lg-0">
          <?php echo $comment_avatar ?>
        </div>
        <div class="comment-wrapper">
          <footer class="comment-meta mb-8 mb-lg-4 text-center text-lg-start">
              <div class="comment-author vcard text-black fw-bold">
                  <?php echo $comment_author; ?>
              </div>
              <div class="comment-metadata">
                  <a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>">
                      <time datetime="<?php comment_time('c'); ?>" class="text-info fw-500">
                          <?php echo $comment_date; ?>
                      </time>
                  </a>
              </div>
          </footer>
          <div class="comment-content text-primary fw-400 mb-6">
              <?php echo $comment_content; ?>
          </div>
          <div class="reply">
             <?php 
                // Define custom reply link arguments
                $reply_link_args = array(
                    'add_below' => 'div-comment',
                    'depth' => 1,
                    'max_depth' => $args['max_depth'],
                    'reply_text' => 'Odgovori',
                    'before' => '<span class="reply btn btn-primary">',
                    'after' => '</span>',
                    'class' => 'custom-reply-link' // Add your custom class here
                );
                // Output the reply link with custom arguments
                comment_reply_link($reply_link_args, $comment);
                ?>
          </div>
        </div>
      </article>
    <?php
}
      if ( comments_open() ): 
        $comments_number = get_comments_number();
        if( $comments_number > 0 ):
          ?>
          <h3 class="comments-title">Komentari (<?php echo $comments_number; ?>)</h3>
          <?php 
          else:
            ?>
            <h3 class="comments-title">Trenutno nema komentara.</h3>
            <?php
        endif;
        ?>
        <ol class="comment-list pb-10 mb-10 mb-lg-18 pb-lg-18 border-bottom border-gray">
          <?php
            $args = [
              'walker' => null,
              'max_depth' => 2,
              'style' => 'ol',
              'avatar_size' => 120,
              'callback' => 'custom_comment_callback'
            ];
            wp_list_comments($args);
          ?>
        </ol>
        <?php
        $fields = [
        
          'author' =>
          '<div class="form-group mb-6 row justify-content-between text-primary fw-bold"><div class="col-6"><label class="mb-4" for="author">' . __( 'Ime i Prezime', 'domainreference' ) . '</label> <span class="required">*</span> <input id="author" name="author" type="text" class="form-control rounded-0" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /> </div>
          <div class="col-6"><label class="mb-4" for="email">' . __( 'Email', 'domainreference' ) . '</label> <span class="required">*</span><br><input id="email" name="email" class="form-control rounded-0" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div></div>',
        
          'comment_field' =>
          '<div class="form-group position-relative text-primary fw-bold"><label class="mb-4" for="comment">' . _x( 'Ostavi komentar', 'noun' ) . '</label> <span class="required">*</span><textarea id="comment" class="form-control rounded-0" name="comment" rows="15" required="required" placeholder="Ovde unesi komentar..."></textarea></p>',
          
        ];
        $args = [
          'class_submit' => 'btn-comment btn btn-primary w-auto py-6 px-8 rounded-0 position-absolute',
          'label_submit' => 'Postavi komentar',
          'logged_in_as' => '',
          'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        ];
        comment_form($args);
      endif;

      if( !comments_open() ):
        ?>
        <h3 class="no-comments"><?php esc_html_e( 'Komentari su zatvoreni.' ) ?></h3>
        <?php
      endif;
  ?>
</div>