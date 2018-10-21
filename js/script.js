
			function startTime(){
				var today = new Date();
				var h = today.getHours();
				var m = today.getMinutes();
				var s = today.getSeconds();
				m = checkTime(m);
				s = checkTime(s);
				document.getElementById('timmer').innerHTML = h + ":" + m + ":"+ s;
				var t = setTimeout(startTime, 500);
			}

			function checkTime(i){
				if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    			return i;
			}

			function my(){
				var today = new Date();
				var h = today.getHours();
				if(h>=19){
					var x = "Good Night!";
				}
				else if(h>=17){
					x = "Good Evening!";
				}
				else if(h>=12){
					x = "Good Afternoon!";
				}
				else if(h>=0){
					x = "Good Morning!";
				}
				document.getElementById('greeting').innerHTML = x;
			}
		

	 

  // src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  //   <script>
  //   $(document).ready(function(){
        
  //       $('#d ul li a').click(function(){
  //           var page = $(this).attr('href');
                    
  //           $('#content').load('indirect/' + page + '.php');
                    
  //           return false;

  //       });
  //   });
        

