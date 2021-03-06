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
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Faq</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Sizden Gelen Sorular </h2>
                        <p>Aliquam posuere erat et orci eleifend cursus. Nullam tempus odio sem, lacinia pellentesque neque mollis a. In ut tempor ligula. Vestibulum ultricies bibendum lorem, a sollicitudin tellus euismod vel. Nam suscipit, diam ut volutpat lobortis, nibh ipsum tempor nibh, a vehicula tellus justo id nibh. Nulla pretium mollis convallis. Phasellus a nibh aliquet, ullamcorper quam aliquam, faucibus nulla. Phasellus mollis tristique vehicula. Vivamus sagittis, sem sed posuere aliquet, massa odio lobortis.</p>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-20 no-border">
                
                <div class="row">
                    <div class="col-sm-9">
                        <div class="panel-group accordion style1" id="question" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="questionOne">
                                    <h4 class="panel-title">
                                        <a class="" data-toggle="collapse" data-parent="#question" href="#collapseQuestionOne" aria-expanded="true" aria-controls="collapseOne">
                                            I have forgotten my password, now what?
                                        </a>
                                    </h4>
                                </div><!-- end panel-heading -->
                                <div id="collapseQuestionOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="questionOne">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                    </div><!-- end panel-body -->
                                </div><!-- end collapse -->
                            </div><!-- end panel -->

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="questionTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            I have forgotten my username, now what?
                                        </a>
                                    </h4>
                                </div><!-- end panel-heading -->
                                <div id="collapseQuestionTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                    </div><!-- end panel-body -->
                                </div><!-- end collapse -->
                            </div><!-- end panel -->

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="questionThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionThree" aria-expanded="false" aria-controls="collapseThree">
                                            What methods of payment are accepted?
                                        </a>
                                    </h4>
                                </div><!-- end panel-heading -->
                                <div id="collapseQuestionThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionThree">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                    </div><!-- end panel-body -->
                                </div><!-- end collapse -->
                            </div><!-- end panel -->
                            
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="questionFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionFour" aria-expanded="false" aria-controls="collapseThree">
                                            Why don't you ship to my country?
                                        </a>
                                    </h4>
                                </div><!-- end panel-heading -->
                                <div id="collapseQuestionFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionFour">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                    </div><!-- end panel-body -->
                                </div><!-- end collapse -->
                            </div><!-- end panel -->
                            
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="questionFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionFive" aria-expanded="false" aria-controls="collapseThree">
                                            How long will it take for my items to arrive?
                                        </a>
                                    </h4>
                                </div><!-- end panel-heading -->
                                <div id="collapseQuestionFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionFive">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                    </div><!-- end panel-body -->
                                </div><!-- end collapse -->
                            </div><!-- end panel -->
                            
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="questionSix">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionSix" aria-expanded="false" aria-controls="collapseThree">
                                            The product I received does not match the description. What can I do?
                                        </a>
                                    </h4>
                                </div><!-- end panel-heading -->
                                <div id="collapseQuestionSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionSix">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                    </div><!-- end panel-body -->
                                </div><!-- end collapse -->
                            </div><!-- end panel -->
                        </div><!-- end panel-group -->    
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <div class="widget">
                            <h6 class="subtitle">Search</h6>
                            <form>
                                <input type="text" id="lastname" class="form-control input-sm" placeholder="Search">
                            </form>
                        </div><!-- end widget -->
                        
                        <div class="widget">
                            <h6 class="subtitle">If you have Questions please contact us</h6>
                            <ul class="list list-unstyled">
                                <li><b>Phone Number:</b> +123 456 789</li>
                                <li><b>Email Us:</b> contact@domain.com</li>
                                <li><b>Skype ID:</b> <a href="javascript:void(0);">@skype_id</a></li>
                            </ul>
                        </div><!-- end widget -->
                        
                        <div class="widget">
                            <h6 class="subtitle">New Collection</h6>
                            
                            <figure>
                                <a href="javascript:void(0);">
                                    <img src="{{asset('frontend/img/products/men_06.jpg') }}" alt="collection">
                                </a>
                            </figure>
                        </div><!-- end widget -->
                        
                        <div class="widget">
                            <h6 class="subtitle">My Cart</h6>
                            
                            <p>There is 1 item in your cart.</p>
                            <hr class="spacer-10">
                            <ul class="items">
                                <li> 
                                    <a href="javascript:void(0);" class="product-image">
                                        <img src="{{asset('frontend/img/products/men_06.jpg') }}" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <div class="close-icon"> 
                                            <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                        </div>
                                        <p class="product-name"> 
                                            <a href="javascript:void(0);">Lorem ipsum dolor sit amet Consectetur</a> 
                                        </p>
                                        <strong class="text-dark">1</strong> x <span class="price text-primary">$19.99</span>
                                    </div>
                                </li><!-- end item -->
                            </ul>

                            <hr class="spacer-10">
                            <strong class="text-dark">Cart Subtotal:<span class="pull-right text-primary">$19.99</span></strong>
                            <hr class="spacer-10">
                            <a href="checkout.html" class="btn btn-default semi-circle btn-block btn-md"><i class="fa fa-shopping-basket mr-10"></i>Checkout</a>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
@endsection