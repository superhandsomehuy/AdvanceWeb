        $(document).ready(function (e)
		{
            $("#search").keyup(function()
			{
                $("#search_result").show();
                var x = $(this).val();
                $.ajax(
                    {
                    type:'post',
                    url:'live_search_backend.php',
                    data:'i='+x,
                    success:function(data)
                    {
                        $("#search_result").html(data);
                        
                    }
                       
                    });
            });
        });
        
		$(function() 
		{
			$('*').click(function(e) {
				if(e.target.id != 'search_result' || e.target.id != 'search') {
					$('#search_result').hide();
				}
			});
		});