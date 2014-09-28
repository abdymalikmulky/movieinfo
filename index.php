<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<meta name="description" content="Your Movie Info">
	<meta name="keywords" content="Movie,Film,movie,film,web,search,info,information,Web,Search,Info,Information">
	<meta name="author" content="Abdy Malik Mulky">
    <title>Movie Info</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootflat.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    </head>
	<body>
		<div id="header" >
			<nav class="navbar" role="navigation">
                  <div class="container-fluid container navigasi">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand pahlawan-head-title" href="#">
						<!--
						<img src="frontend/img/logo/garuda-logo.png"/>
						-->
						<span class="glyphicon glyphicon-film"></span> MovieInfo
					  </a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <!--
                      <form class="navbar-form navbar-right" role="search">
                        <div class="form-search search-only">
                          <i class="search-icon glyphicon glyphicon-search"></i>
                          <input type="text" class="form-control search-query" placeholder="Cari Pahlawan">
                        </div>
                      </form>
					  -->
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
		</div>
		<div class="content container">
			<div class="row">
              <div class="col-md-6">
                <input type="text" id="location" class="form-control" placeholder="Folder Location">
				<!--
				<div class="checkbox">
                  <input type="checkbox" id="flat-checkbox-1">
                  <label for="flat-checkbox-1">Folder Name With Year</label>
                </div>
				-->
              </div>
			  <div class="col-md-12" style="margin-top:15px">
                <input type="button" class="btn btn-primary" id="getget" value="Get Movie">	
              </div>
			  
            </div>
			<div id="loading">
				Loading....
			</div>
			
			<div id="countFilm" style="
				display:none;float:left;
				margin: 10px 4px;
				">
				You Have : <b><span id="cfilm">0</span> Movie Folder</b>
			</div>
			<div class="menucol">
				<a href="#" id="collapse">Collapse All</a>
				<a href="#" id="expand">Expand All</a>
			</div>
			
			
			<div class="col-md-8">
			</div>
			<div class="col-md-4 search-box">
                <div class="input-group form-search">
                  <input type="text" class="form-control search-query" placeholder="Search Movie">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary" data-type="last">Search</button>
                  </span>
                </div>
              </div>	
			
			
			
			
			
			
			
			 <div class="row">
			<div class="col-md-12">
            <div class="list-group listfilm">
			
		   </div>
          </div>
        </div>
		</div>
		<div class="footer">
		  <div class="container">
			<p class="text-muted">{ <a href="http://abdymalikmulky">abdymalikmulky</a> }</p>
			<p style="float:right;margin-top:-2.5%">
				API : <a href="http://imdbapi.com/">imdbapi.com</a>
			</p>
		  </div>
		</div>
	</body>
	<script src="js/site.min.js" type="text/javascript"></script>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script type="text/javascript">
	$('document').ready(function(){
		var fail = 0;
		var success = 0;
		var no = 1;
		$('#getget').click(function(){
			$('#loading').show();
			$('.listfilm').html('');
			$.ajax({
				url : 'datafilm.php?location='+$('#location').val(),
				dataType : 'json',
				success : function(data){
					$.each(data, function(index, element) {	
						var titles = element.title;
						
						
						console.log(no+". "+element.title);
						
						
						
						
						
						
						titles = titles.substring(0,titles.indexOf("(20")-1);
						if(titles==""){
							titles = titles.substring(0,titles.indexOf("(19")-1);
							if(titles==""){
								titles = titles;
							}
						}
					
						$('#loading').show();
						$.getJSON('http://www.omdbapi.com/?t='+titles, function(datas,index,haha) {
							if(datas.Response=="True"){
								console.log("SUCCESS : "+titles+" - COUNT : "+success);
								var title = datas.Title;
								var year = datas.Year;
								var rated = datas.Rated;
								var release = datas.Released;
								var time = datas.Runtime;
								var genre = datas.Genre;
								var director = datas.Director;
								var writer = datas.Writer;
								var actors = datas.Actors;
								var plot = datas.Plot;
								var lang = datas.Language;
								var country = datas.Country;
								var award = datas.Awards;
								var photo = datas.Poster;
								if(photo=='N/A'){
									photo = 'img/notfound.png';
								}
								var score = datas.Metascore;
								var imdbRating = datas.imdbRating;
								var votes = datas.imdbVotes;
								var id = datas.imdbID;
								$('.listfilm').fadeIn();
								$('.listfilm').append('<a id="'+id+'" status="close" href="#" class="list-group-item listfilms"><span class="badge badge-primary"><span class="glyphicon glyphicon-chevron-down"></span></span>'+title+'</a><div class="info"><div class="row"><div class="col-sm-2 img-box"><img class="img-round" src="'+photo+'"/></div><div class="text col-sm-10"><p style="font-weight:bold;font-size:16px" class="rating">Rating : '+imdbRating+'</p><p>Score : '+score+'</p><p>Year : '+year+'</p><p>Actors : '+actors+'</p><p>Director : '+director+'</p><p>Time : '+time+'</p><p>Writer : '+writer+'</p></div></div></div>');		
								success++;
							
							}else{
								// console.log("FAIL : "+titles+" - COUNT : "+fail);
								$('.listfilm').append('<a style="color:white;background:#ED5565" href="#" class="listfilms list-group-item"></span>'+titles+'</a><div class="info">NOT FOUND</div></div></div>');	
								fail++;
							}
							$('.menucol').fadeIn();
							$('#loading').hide();
							$('#countFilm').fadeIn();
							$('.search-box').fadeIn();
							
							setTimeout(function() {
								no++;
								$('#cfilm').html(no)
							} , 3000);
							
							
						});
						console.log("SUCCESS : "+success);
						console.log("FAIL : "+fail);
					});
				},
				error : function(xhr, status){
					console.log(status);
				}
			});
			return false;
		});
		
		
		
		
		
		
		
		$('.body').click(function(){
			$('.listfilms').removeClass('active');
			
		});
		
		$('#collapse').fadeIn();
		
		$('#expand').click(function(){
			$(this).hide();
			$('#collapse').fadeIn();
			$('.listfilms').next().slideUp();
			return false;
		});
		$('#collapse').click(function(){
			$(this).hide();
			$('#expand').fadeIn();
			$('.listfilms').next().slideDown();
			return false;
		});
		
		
		$(document).on('click', '.listfilms', function () {
			
			// alert($(this).attr('status'));
			if($(this).attr('status')=='close'){
				$('.listfilms').next().slideUp();
				$('.listfilms').removeClass('active');
				$('.listfilms').children().children().removeClass('glyphicon-chevron-up');
				$('.listfilms').children().children().addClass('glyphicon-chevron-down');
				$('.listfilms').attr('status','close');
				
				
				$(this).attr('status','open');
				$(this).next().slideDown();
				$(this).addClass('active');
				
				$(this).children().children().removeClass('glyphicon-chevron-down');
				$(this).children().children().addClass('glyphicon-chevron-up');	
				
			}else{
				$(this).removeClass('active');
				$(this).attr('status','close');
				$(this).children().children().removeClass('glyphicon-chevron-up');
				$(this).children().children().addClass('glyphicon-chevron-down');
				$(this).next().slideUp();
			}
			return false;
		});
		
		$('.search-query').keyup(function(){
			// $('.listfilms').css('font-weight','normal');
			if($(this).val()!=''){
				// $('#expand').hide();
				// $('#collapse').hide();
			}else{
				// $('#expand').show();
				// $('#collapse').show();
			}
			$('.listfilms').hide();
			$('.listfilms').next().hide();
			$( ".listfilms:contains('"+$(this).val()+"')" ).show();
		
		});
		
		
	});
	</script>
  </body>
</html>
