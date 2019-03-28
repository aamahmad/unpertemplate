<!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Blog</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active"><?php the_title(); ?></li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
                    <div class="col-md-12">
                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img">
                          <?php if ( has_post_thumbnail() ) { ?>
                            <a href="#"><img alt="img" src="<?php echo the_post_thumbnail_url(); ?>"></a>
                          <?php } else { ?>
                            <a href="#"><img alt="img" src="http://localhost/aam.web.id/wp-content/uploads/2019/03/post.jpg"></a>
                          <?php } ?>

                          
                          <figcaption class="mu-blog-caption">
                            <h3><a href="#"><?php the_title(); ?></a></h3>
                          </figcaption>                      
                        </figure>
                        <div class="mu-blog-meta">
                          <a href="#">By <?php the_author(); ?></a>
                          <a href="#"><?php echo get_the_date('j F Y', '', ''); ?></a>
                          <span><i class="fa fa-comments-o"></i>0</span>
                        </div>
                        <div class="mu-blog-description">
                          <p><?php the_content(); ?></p>
                          
                        </div>
                        <!-- start blog post tags -->
                        <div class="mu-blog-tags">
                          <ul class="mu-news-single-tagnav">
                            <li>TAGS :</li>
                            <?php
                              $posttags = get_the_tags();
                              if ($posttags) {
                                foreach($posttags as $tag) {
                                  echo '<li><a href="'. get_tag_link($tag->term_id) .'">' .$tag->name . '</a></li>  '; 
                                }
                              }
                            ?>
                          </ul>
                        </div>
                        <!-- End blog post tags -->
                        <!-- start blog social share -->
                        <div class="mu-blog-social">
                          <ul class="mu-news-social-nav">
                            <li>SOCIAL SHARE :</li>
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                          </ul>
                        </div>
                        <!-- End blog social share -->
                      </article>
                    </div>                                   
                  </div>
                </div>
                <!-- end course content container -->
                <!-- start blog navigation 
                <div class="row">
                  <div class="col-md-12">
                    <div class="mu-blog-single-navigation">
                      <a class="mu-blog-prev" href="#"><span class="fa fa-angle-left"></span>Prev</a>
                      <a class="mu-blog-next" href="#">Next<span class="fa fa-angle-right"></span></a>
                    </div>
                  </div>
                </div>-->
                <!-- end blog navigation -->
                <!-- start related course item -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="mu-related-item">
                      <h3>Related News</h3>
                      <div class="mu-related-item-area">
                        <div id="mu-related-item-slide">

                          <?php
                          // Default arguments
                          $args = array(
                            'posts_per_page' => 15, // How many items to display
                            'post__not_in'   => array( get_the_ID() ), // Exclude current post
                            'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
                            'orderby' => 'DESC',
                          );

                          // Check for current post category and add tax_query to the query arguments
                          $cats = wp_get_post_terms( get_the_ID(), 'category' );
                          $cats_ids = array();
                          foreach( $cats as $wpex_related_cat ) {
                            $cats_ids[] = $wpex_related_cat->term_id;
                          }
                          if ( ! empty( $cats_ids ) ) {
                            $args['category__in'] = $cats_ids;
                          }

                          // Query posts
                          $wpex_query = new wp_query( $args );


                          // Loop through posts
                          foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>

                          <div class="col-md-6">
                            <article class="mu-blog-single-item">

                               <?php if ( has_post_thumbnail() ) { ?>

                                <figure class="mu-blog-single-img">
                                  <a href="<?php the_permalink(); ?>"><img alt="img" src="<?php echo the_post_thumbnail_url(); ?>"></a>
                                  <figcaption class="mu-blog-caption">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                  </figcaption>                      
                                </figure>

                              <?php } else { ?>
                                <figure class="mu-blog-single-img">
                                  <a href="<?php the_permalink(); ?>"><img alt="img" src="http://localhost/aam.web.id/wp-content/uploads/2019/03/34b7bcf2f188d80bc2a547f2e2bc41e0.png"></a>
                                  <figcaption class="mu-blog-caption">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                  </figcaption>                      
                                </figure>
                              <?php } ?>

                              <div class="mu-blog-meta">
                                <a href="#">By <?php the_author(); ?></a>
                                <a href="#"><?php echo get_the_date('j F Y', '', ''); ?></a>
                                <span><i class="fa fa-comments-o"></i>0</span>
                              </div>
                              <div class="mu-blog-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae ipsum non voluptatum eum repellendus quod aliquid. Vitae, dolorum voluptate quis repudiandae eos molestiae dolores enim.</p>
                                <a href="<?php the_permalink(); ?>" class="mu-read-more-btn">Read More</a>
                              </div>
                            </article>
                          </div>

                          <?php
                          // End loop
                          endforeach;

                          // Reset post data
                          wp_reset_postdata(); ?>

                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end start related course item -->
                <!-- start blog comment -->
                <!--
                <div class="row">
                  <div class="col-md-12">
                    <div class="mu-comments-area">
                      <h3>5 Comments</h3>
                      <div class="comments">
                        <ul class="commentlist">
                          <li>
                            <div class="media">
                              <div class="media-left">    
                                <img alt="img" src="assets/img/testimonial-1.png" class="media-object news-img">
                              </div>
                              <div class="media-body">
                               <h4 class="author-name">David Muller</h4>
                               <span class="comments-date"> Posted on 12th June, 2016</span>
                               <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English</p>
                               <a class="reply-btn" href="#">Reply <span class="fa fa-long-arrow-right"></span></a>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="media">
                              <div class="media-left">    
                                <img alt="img" src="assets/img/testimonial-2.png" class="media-object news-img">
                              </div>
                              <div class="media-body">
                               <h4 class="author-name">John Doe</h4>
                               <span class="comments-date"> Posted on 12th June, 2016</span>
                               <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English</p>
                               <a class="reply-btn" href="#">Reply <span class="fa fa-long-arrow-right"></span></a>
                              </div>
                            </div>
                          </li>
                          <ul class="children">
                            <li class="author-comments">
                              <div class="media">
                                <div class="media-left">    
                                  <img alt="img" src="assets/img/testimonial-3.png" class="media-object news-img">
                                </div>
                                <div class="media-body">
                                 <h4 class="author-name">Admin</h4>
                                 <span class="comments-date"> Posted on 12th June, 2016</span>
                                 <span class="author-tag">Author</span>
                                 <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English</p>
                                 <a class="reply-btn" href="#">Reply <span class="fa fa-long-arrow-right"></span></a>
                                </div>
                              </div>
                            </li>
                            <ul class="children">
                              <li>
                                <div class="media">
                                  <div class="media-left">    
                                    <img alt="img" src="assets/img/testimonial-1.png" class="media-object news-img">
                                  </div>
                                  <div class="media-body">
                                   <h4 class="author-name">David Muller</h4>
                                   <span class="comments-date"> Posted on 12th June, 2016</span>
                                   <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English</p>
                                   <a class="reply-btn" href="#">Reply <span class="fa fa-long-arrow-right"></span></a>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </ul>
                          <li>
                            <div class="media">
                              <div class="media-left">    
                                <img alt="img" src="assets/img/testimonial-2.png" class="media-object news-img">
                              </div>
                              <div class="media-body">
                               <h4 class="author-name">Jhon Doe</h4>
                               <span class="comments-date"> Posted on 12th June, 2016</span>
                               <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English</p>
                               <a class="reply-btn" href="#">Reply <span class="fa fa-long-arrow-right"></span></a>
                              </div>
                            </div>
                          </li>
                        </ul>

                        <nav>
                          <ul class="pagination comments-pagination">
                            <li>
                              <a aria-label="Previous" href="#">
                                <span class="fa fa-long-arrow-left"></span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a aria-label="Next" href="#">
                                <span class="fa fa-long-arrow-right"></span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                  </div>
                </div>
              -->
                <!-- end blog comment -->
                <!-- start respond form -->
              <!--
                <div class="row">
                  <div class="col-md-12">
                    <div id="respond">
                      <h3 class="reply-title">Leave a Comment</h3>
                      <form id="commentform">
                        <p class="comment-notes">
                          Your email address will not be published. Required fields are marked <span class="required">*</span>
                        </p>
                        <p class="comment-form-author">
                          <label for="author">Name <span class="required">*</span></label>
                          <input type="text" required="required" size="30" value="" name="author">
                        </p>
                        <p class="comment-form-email">
                          <label for="email">Email <span class="required">*</span></label>
                          <input type="email" required="required" aria-required="true" value="" name="email">
                        </p>
                        <p class="comment-form-url">
                          <label for="url">Website</label>
                          <input type="url" value="" name="url">
                        </p>
                        <p class="comment-form-comment">
                          <label for="comment">Comment</label>
                          <textarea required="required" aria-required="true" rows="8" cols="45" name="comment"></textarea>
                        </p>
                        <p class="form-allowed-tags">
                          You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:  <code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;s&gt; &lt;strike&gt; &lt;strong&gt; </code>
                        </p>
                        <p class="form-submit">
                          <input type="submit" value="Post Comment" class="mu-post-btn" name="submit">
                        </p>        
                      </form>
                    </div>
                  </div>
                </div>
              -->
                <!-- end respond form -->
              </div>
              <div class="col-md-3">
                <?php get_sidebar(); ?>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
