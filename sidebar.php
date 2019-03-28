                <!-- start sidebar -->
                <aside class="mu-sidebar">
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Categories</h3>
                    <ul class="mu-sidebar-catg">
                      <?php
                          $sub_categorys = get_categories( array(
                              'hide_empty'    => false,
                              'orderby'            => 'id',
                              'show_count'         => __( 'No categories' ),
                              'use_desc_for_title' => false,
                              'title_li'           => false,
                              'show_option_none'   => false,
                              'child_of'           => $id_term
                          ));

                          foreach ( $sub_categorys as $subcategory ) { ?>
                              <li>
                                  <a class="" href="<?php echo esc_url( get_category_link( $subcategory->term_id ) );?>" >
                                      <?php echo esc_html( $subcategory->name );?>
                                  </a>
                              </li>
                          <?php }
                      ?>
                    </ul>
                  </div>
                  <!-- end single sidebar -->
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Popular News</h3>
                    <div class="mu-sidebar-popular-courses">

                        <?php 
                        $popularpost = new WP_Query( array( 
                          'posts_per_page' => 10, 
                          'meta_key' => 'wpb_post_views_count', 
                          'orderby' => 'meta_value_num', 
                          'post_type' => array( 'post'),
                          'order' => 'DESC'  ) );

                        while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>

                          <div class="media">
                            <div class="media-left">
                              <?php if ( has_post_thumbnail() ) { ?>
                                <a href="<?php the_permalink(); ?>"><img class="media-object" src="<?php echo the_post_thumbnail_url('thumbnail'); ?>" alt="img"></a>
                              <?php } else { ?>
                                <a href="#"><img class="media-object" src="http://appunper.xyz/wp-content/uploads/2019/03/34b7bcf2f188d80bc2a547f2e2bc41e0.png" alt="img"></a>
                              <?php } ?>
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading" style="font-size: 14px; line-height: 1.5;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            </div>
                          </div>
                         
                       <?php endwhile; ?>
                    </div>
                  </div>
                  <!-- end single sidebar -->
                  
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Tags Cloud</h3>
                    <div class="tag-cloud">
                      <a href="#">Health</a>
                      <a href="#">Science</a>
                      <a href="#">Sports</a>
                      <a href="#">Mathematics</a>
                      <a href="#">Web Design</a>
                      <a href="#">Admission</a>
                      <a href="#">History</a>
                      <a href="#">Environment</a>
                    </div>
                  </div>
                  <!-- end single sidebar -->
                </aside>
                <!-- / end sidebar -->