<div class="col-md-6 col-sm-6">
                      <article class="mu-blog-single-item">

                        <?php if ( has_post_thumbnail() ) { ?>
                          <figure class="mu-blog-single-img">
                            <a href="#"><img src="<?php echo the_post_thumbnail_url(); ?>" alt="img"></a>
                            <figcaption class="mu-blog-caption">
                              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </figcaption>                      
                          </figure>

                        <?php } else { ?>
                        
                          <figure class="mu-blog-single-img">
                            <a href="#"><img src="http://appunper.xyz/wp-content/uploads/2019/03/34b7bcf2f188d80bc2a547f2e2bc41e0.png" alt="img"></a>
                            <figcaption class="mu-blog-caption">
                              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </figcaption>                      
                          </figure>

                        <?php } ?>

                       
                        <div class="mu-blog-meta">
                          <a href="#">By Admin</a>
                          <a href="#"><?php echo get_the_date('j F Y', '', ''); ?></a>
                          <span><i class="fa fa-comments-o"></i>87</span>
                        </div>
                        <div class="mu-blog-description">
                          <p><?php echo excerpt(10); ?></p>
                          <a class="mu-read-more-btn" href="<?php the_permalink();?>">Read More</a>
                        </div>
                      </article> 
</div> 