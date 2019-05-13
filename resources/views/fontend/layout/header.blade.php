
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 d-inline-block">
                    @foreach ($setting as $st)
                        <img src="{{url($st->logo)}}">
                    @endforeach
                </div>
                <div class="col-md-7 d-inline-block">
                   <div class="input-group mb-3">
                      <div class="input-group-prepend">

                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search"></i> Tìm kiếm</button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Tên sản phẩm</a>
                          <a class="dropdown-item" href="#">Mã sản phẩm</a>
                          
                        </div>
                      </div>
                      <input type="text" class="form-control" aria-label="Text input with dropdown button">
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 d-inline-block">
                    <span class="social facebook">
                        <a href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </span>
                    <span class="social youtube">
                        <a href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </span>
                    <span class="social twitter">
                        <a href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </span>
                    <span class="social twitter">
                         <a href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </span>
                </div>
                <div class="col-md-7 d-inline-block">
                    
                     <table style="height: 100px;">
                        <tbody>
                            
                           <div class="menu active">
                                <a href="" >Trang chủ</a>
                            </div>
                            <div class="menu">
                                <a href="">Giới Thiệu</a>
                            </div>
                            <div class="dropdown">
                                <div class="dropbtn">
                                    <a href="">Sản Phẩm</a>
                                </div>
                                <div class="dropdown-content">
                                    @foreach ($categogy as $ct)
                                        <a href="{{url('product-category/'.$ct->id)}}">{{$ct->name}}</a>
                                    @endforeach

                                    
                                   
                                </div>
                            </div>

                        </tbody>
                    </table>
                </div>

              
              
            </div>
        </div>
            
    </div>

