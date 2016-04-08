		
	$.fn.popup = function() { 	//функция для открытия всплывающего окна:
			this.css('position', 'absolute').fadeIn();	//задаем абсолютное позиционирование и эффект открытия
			//махинации с положением сверху:учитывается высота самого блока, экрана и позиции на странице:
			this.css('top', ($(window).height() - this.height()) / 2 + $(window).scrollTop() + 'px');
			//слева задается отступ, учитывается ширина самого блока и половина ширины экрана
			this.css('left', ($(window).width() - this.width()) / 2  + 'px');
			//открываем тень с эффектом:
			$('.backpopup').fadeIn();
		}



		$(document).ready(function(){	//при загрузке страницы:
			$('.open').click(function(){	//событие клик на нашу ссылку
				$('.popup-window').popup();	//запускаем функцию на наш блок с формой
				$('.mode').text("create");
				$('form')[0].reset();
					console.log($('.mode').text());
			});
			
			//update 1 item
			$('.singleItem').click(function(){					
				var dataId = $(this).parent().attr("data-id");				
				var data = {
						action: "get",
						todo: {
							id: dataId
						}
					};	
				
				   $.ajax({
					   	url: "/todoAjax.php",
					    type: 'post',
					    data: data,
					    dataType: 'json',
					    success: function(response){
					    	
					    	var currentTask = response['todo'];
					    	console.log(currentTask.description);
								    		
					    	$(".title").val(currentTask.title) ;
					    	$(".description").val(currentTask.description);		
					    	
					    	$(".priority option[value=" + currentTask['priority'] +"]").attr("selected","selected");
					    	if (currentTask.state==1) {
					    		$(".state").prop('checked', 1);
					    	} else {$(".state").prop('checked', 0);}  				    	
					    		    	
					    }
					});
				   $('.mode').text("edit");
				   $('.popup-window').popup();						
			});
			
			$('.delete').click(function(){
				//var id = $(this).closest("td").attr('data-id');
				console.log($(this).closest().parent().attr("data-id"));
			})		
			

			$('.backpopup,.close').click(function(){ //событие клик на тень и крестик - закрываем окно и тень:
				$('.popup-window').fadeOut();
				$('.backpopup').fadeOut();
				location.reload();
			});
			
			
			$('form').on("submit", function() {	
				($('.mode').text());
				
					var data = {
						action: "",
						todo: {
							title: $ (".title").val(),
							description: $(".description").val(),
							priority: $(".priority option:selected").val(),
							state: $(".state").is(':checked'),
						}
					};
					
					if ($('.mode').text()=='create') {
						data['action'] = "create";
					} 
					else if (($('.mode').text()=='edit')) {
						data['action'] = "update";
					}
					
					console.log(data);	
					//console.log($(".state").is(':checked'));
	
					   $.ajax({
						   	url: "/todoAjax.php",
						    type: 'post',
						    data: data,
						    dataType: 'json',
						    success: function(response){
						    	$('.message').text(response['success']);	
						    	//console.log(response);
						    }
						});	
					
					   return false;   

				
			});
			
		})