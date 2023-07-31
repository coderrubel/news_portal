
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="item">
                            <h2 class="heading">About Us</h2>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                    
                    <div class="col-md-4">
                        <div class="item">
                            <h2 class="heading">Contact</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="right">
                                    {{$contact->address??''}}
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="right">
                                    {{$contact->email??''}}
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="right">
                                    {{$contact->phone??''}}
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
                <!--
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
                -->
                </div>
            </div>
        </div>

        <div class="copyright">
            Copyright 2023, <a href="https://github.com/coderrubel" target="_blank">CoderRubel</a>. All Rights Reserved.
        </div>
     
        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>
		
        <!-- All Javascripts -->
        <script src="{{asset ('fontend/js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset ('fontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset ('fontend/js/jquery-ui.js')}}"></script>
        <script src="{{asset ('fontend/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset ('fontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset ('fontend/js/wow.min.js')}}"></script>
        <script src="{{asset ('fontend/js/select2.full.js')}}"></script>
        <script src="{{asset ('fontend/js/sweetalert2.min.js')}}"></script>
        <script src="{{asset ('fontend/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset ('fontend/js/acmeticker.js')}}"></script>
        <!-- Text Eidtor -->
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <!-- DataTable -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="{{asset ('fontend/js/custom.js')}}"></script>   
        <script>
            $('#example').DataTable({
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
            });
        </script>
 

        <!-- docotor filter by division -->
        <script>
            function getdDoctor(){
                var division = $("#division").val();
              var district = $("#district").val();
              var specialist = $("#specialist").val();
                $.ajax({
                type: "GET",
                url: "{{url('get-ddistrict-doctor')}}",
                data: {district:district,specialist:specialist,division:division},
                cache: false,
                success: function(data){
                    console.log(data);
                $("#newDoctor").html(data);
                }
                });
            }
        </script>
        <!-- docotor filter by district -->
        <script>
            function getDoctor(){
                var division = $("#division").val();
              var district = $("#district").val();
              var specialist = $("#specialist").val();
                $.ajax({
                type: "GET",
                url: "{{url('get-district-doctor')}}",
                data: {district:district,specialist:specialist,division:division},
                cache: false,
                success: function(data){
                    console.log(data);
                $("#newDoctor").html(data);
                }
                });
            }
        </script>
        <!-- docotor filter by specialist -->
        <script>
            function getSdoctor(){
              var division = $("#division").val();
              var district = $("#district").val();
              var specialist = $("#specialist").val();
                $.ajax({
                type: "GET",
                url: "{{url('get-specialist-doctor')}}",
                data: {district:district,specialist:specialist,division:division},
                cache: false,
                success: function(data){
                    console.log(data);
                $("#newDoctor").html(data);
                }
                });
            }
        </script>
        <script>
            function getDistrict(){
              var division = $("#division").val();
                $.ajax({
                type: "GET",
                url: "{{url('get-district')}}",
                data: {division:division},
                cache: false,
                success: function(data){
                $("#district").html(data);
                }
                });
            }
        </script>
		
   </body>
</html>