<section class="call-to-action">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="main-content">
          <div class="row">
            <div class="col-lg-8">
              <span>Stand Blog HTML5 Template</span>
              <h4>Creative HTML Template For Bloggers!</h4>
            </div>
            <div class="col-lg-4">
              <div class="main-button">
                <a rel="nofollow" href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="blog-posts">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">
            <?php
            foreach ($news as $post) { 
              $image = getImage('news', $post['id'], $post['image'])
              ?>

              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img style="width:730px; height:322px object-fir:cover;" src="<?=$image?>" alt="">
                  </div>
                  <div class="down-content">
                    <span><?=$post['category_name']?></span>
                    <a href="?controller=news_view&id=<?=$post['id']?>">
                      <h4><?=$post['title']?></h4>
                    </a>
                    <ul class="post-info">
                      <!-- <li><a href="#">Admin</a></li> -->
                      <li><a><?=date('d.m.Y | H:i', strtotime($post['created_at']))?></a></li>
                      <li><a></a><i class="fas fa-eye"></i><?=$post['seen_count']?></li>
                    </ul>
                    <p><?=$post['description']?></p>
                    <!-- <div class="post-options">
                      <div class="row">
                        <div class="col-6">
                          <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            <li><a href="#">Beauty</a>,</li>
                            <li><a href="#">Nature</a></li>
                          </ul>
                        </div>
                        <div class="col-6">
                          <ul class="post-share">
                            <li><i class="fa fa-share-alt"></i></li>
                            <li><a href="#">Facebook</a>,</li>
                            <li><a href="#"> Twitter</a></li>
                          </ul>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php
      require_once "sidebar.php";
      ?>
    </div>
  </div>
</section>