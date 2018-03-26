@extends('layouts.app')
<style type="text/css">
        .to-top{
            position: fixed;
            bottom: 50px;
            right: 20px;
        }

        .figma {
            color:white;
        }
    </style>
@section('content')
<div style="position: fixed; top: 250px; left: -1.1%;">
      <div class="col-xl">
          <a href="https://www.facebook.com/rama7adit" target='_blank'>   
              <i class="fab fa-facebook-f fa-3x btn-primary" style="width: 50px; padding: 4px; height: 45px; margin-bottom: -1px;"></i>
          </a>
      </div>

      <div class="col-xl">
          <a href="https://www.instagram.com/adtyakun/" target='_blank'> 
              <i class="fab fa-instagram fa-3x btn-success" style="width: 50px; padding: 4px; height: 45px; margin-bottom: -1px;"></i>
          </a>
      </div>

      <div class="col-xl">
          <a href="https://plus.google.com/u/0/112169880319100121140" target='_blank'> 
              <i class="fab fa-google-plus fa-3x btn-danger" style="width: 50px; padding: 4px; height: 45px; margin-bottom: -1px;"></i>
          </a>
      </div>
</div>

<!-- <div class="container">
    <div class="row">
    @foreach ($product as $products)
        <div class="col-sm-3 col-md-3">
            <div class="thumbnail">
                <a href="{{ route('product.show', $products) }}" style="text-decoration: none; color: gray">
              <img src="{{ asset('storage/'.$products->imagePath) }}" alt="Product" style=" width:260px; height:370px;"  class="img-rounded">
                <div class="caption">
                    <h4>{{ $products->title }}</h4>

                </a>
                    <label style="color: red;">Rp {{ number_format($products->price) }}</label>
                    <span><a href="" class="label label-warning"><i class="fas fa-tag"></i> {{ $products->category->name }}</a></span>
                <hr>
                <div class="col-md-3">
                        <p><a href="{{ route('product.edit', $products) }}" class="btn btn-default btn-primary pull-left" role="button"><i class="fa fa-edit"></i></a></p>
                    </div>
                    <div class="col-xs-4">
                    <form action="{{ route('product.destroy', $products) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-default btn-danger pull-left" onclick="return confirm('Yakin Mau Hapus ?')"><i class="fa fa-trash-alt"></i></button>
                    </form>
                    </div>
                <div class="clearfix">
                    <a href="{{ route('product.addToCart', $products) }}" class="btn btn-default btn-success pull-right" role="button"><i class="fas fa-shopping-cart"></i></a>
                </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>   -->


<div class="container">
    <center>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 55%;">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="{{ asset('storage/slide/slide-1.jpg') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="{{ asset('storage/slide/slide-2.jpg') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="{{ asset('storage/slide/slide-3.jpg') }}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </center>
<hr>
      
      <div class="row">
      @foreach ($product as $products)
          <div class="col-sm-3 col-md-3">
          
            <div class="thumbnail">
            <a href="{{ route('product.show', $products->slug) }}" style="text-decoration: none; color: gray">
              <img src="{{ asset('storage/'.$products->imagePath) }}" alt="Product" style="width: 260px; height: 370px;" class="img-rounded">
              <div class="panel-body">
              <div class="caption">
                <p><b>{{$products->title}}</b></p>
            </a>
                <label style="color: red;">Rp {{number_format($products->price)}}</label>
                <div class="row">
                <div class="col-sm-4">
                <a href="{{ route('product.show-by-kategori',$products->category->id) }}" class="btn btn-success btn-xs"><i class="fas fa-tag"></i> {{$products->category->name}}</a>
                </div>
                </div>
                <hr>


                @if( $products->user_id == auth()->user()->id )
                  <div class="col-md-4">
                    <p><a href="{{ Route('product.edit',$products) }}" class="btn btn-default btn-primary pull-left" role="button"><i class="fa fa-edit"></i></a></p>
                  </div>
                    <form action="{{route('product.destroy',$products)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-default btn-default pull-left" onclick="return confirm('Apakah anda yakin ???')"><i class="fa fa-trash"></i></button>
                    </form>
                  @endif
                <p><a href="{{ route('product.addToCart', $products) }}" class="btn btn-default btn-danger pull-right" role="button"><i class="fas fa-shopping-cart"></i></a></p>
              </div>
            </div>
            </div>
          
          </div>
@endforeach
          <div class="col">
            
        <a href="#top" class="to-top pull-right" id="scrollTop">
          <i class="fas fa-arrow-alt-circle-up fa-3x" style="width: 50px;  height: 40px; border-radius: 50%;"></i>
        </a>
        </div>
        <script type="text/javascript">
        // function untuk menghilangkan back to top
            $(document).ready(function(){
                var offset = 250;
                var duration = 500;

                $(window).scroll(function(){
                    if ($(this).scrollTop() > offset){
                        $('.to-top').fadeIn(duration);
                    }
                    else{
                        $('.to-top').fadeOut(duration);
                    }
                });
                // function untuk animasi back to to-top
                $('.to-top').click(function(){
                    $('body').animate({scrollTop: 0}, duration);
                });
            });
        </script>

            </div>
            <center>{!! $product->appends(['search' => $search])->links() !!}</center>
          </div>


@endsection
