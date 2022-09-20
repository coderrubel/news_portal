
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">About Us</h2>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Useful Links</h2>
                            <ul class="useful-links">
                                <li><a href="{{ url('/'); }}">Home</a></li>
                                <li><a href="terms.html">Terms and Conditions</a></li>
                                <li><a href="privacy.html">Privacy Policy</a></li>
                                <li><a href="disclaimer.html">Disclaimer</a></li>
                                <li><a href="{{url('/contact');}}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Contact</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="right">
                                    {{$contact->address}}
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="right">
                                    {{$contact->email}}
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="right">
                                    {{$contact->phone}}
                                </div>
                            </div>
                            <ul class="social">
                                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a href=""><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Newsletter</h2>
                            <p>
                                In order to get the latest news and other great items, please subscribe us here: 
                            </p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Subscribe Now">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="copyright">
            Copyright 2022, ArefinDev. All Rights Reserved.
        </div>
     
        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>
		
        <script src="{{asset ('fontend/js/custom.js')}}"></script>        
		
   </body>
</html>