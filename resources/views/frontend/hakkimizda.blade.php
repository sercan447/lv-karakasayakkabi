@extends("frontend.f_layout.f_layouts")

@section("script_files")
@endsection

@section("css_files")
@endsection

@section("icerik")
<div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="{{URL('/')}}">Anasayfa</a></li>
                            <li><a href="#">Hakkımızda</a></li>
                           
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 vertical-align">
                        <h2 class="title">Karakaş Ayakkabı</h2>
                        <p>Şirket Açıklama</p>
                    </div><!-- end col -->
                    <div class="col-sm-5 vertical-align">
                        <figure class="zoom-in">
                            <img src="img/coming-soon-bg.jpg" alt="">
                        </figure>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-100">
                
                <div class="row">
                    <div class="col-sm-5 vertical-align">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NrmMk1Myrxc"></iframe>
                        </div>
                    </div><!-- end col -->
                    <div class="col-sm-7 vertical-align">
                        <h2 class="title">Vizyon ve Misyonumuz</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit v
                        oluptatem accusantium doloremque laudantium, totam rem
                         aperiam, eaque ipsa quae ab illo inventore veritatis e
                         t quasi architecto beatae vitae dicta sunt explicabo. Ne
                         mo enim ipsam voluptatem quia voluptas sit aspernatur aut
                          odit aut fugit, sed quia consequuntur magni dolores eos 
                          qui ratione voluptatem sequi nesciunt.</p>
                        

                        <hr class="spacer-10 no-border">
                        
                   
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-100">
      
                
               
                
            </div><!-- end container -->
        </section>
        <!-- end section -->
@endsection