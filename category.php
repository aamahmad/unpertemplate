<?php get_header(); ?>

<!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Kategori </h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">Blog Archive</li>
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
                <div class="mu-course-container mu-blog-archive">
                  <div class="row">
                      <?php
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                          
                          if ( have_posts() ) : while ( have_posts() ) : the_post();
                                                
                           get_template_part( 'template-parts/content-category', get_post_format() );
                                                      
                          endwhile; endif; 
                                   
                        }
                      ?>
                                     
                    
                   
                  </div>
                </div>
                <!-- end course content container -->
                <!-- start course pagination -->
                <div class="mu-pagination">
                  <nav>
                    <ul class="pagination">
                      <li>
                        <a href="#" aria-label="Previous">
                          <span class="fa fa-angle-left"></span> Prev 
                        </a>
                      </li>
                      <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li>
                        <a href="#" aria-label="Next">
                         Next <span class="fa fa-angle-right"></span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
                <!-- end course pagination -->
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


<?php get_footer(); ?>