		
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
				$('form')[0].reset();					
			});
			
			$('.delete').click(function(){
				 var x;
				    if (confirm("Delete this task?") == true) {
				        //надо ли всегда var указывать?????????
				    	var dataId = $(this).parent().attr("data-id");	
				    	var data = {
								action: "delete",
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
							    	console.log('task is deleted!');							    		    	
							    }
							});
				    	
				    	
				    } else {
				        return false;
				    }
				    location.reload();
			})
			
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
					    									
					    	$(".id").val(currentTask.id);
					    	$(".title").val(currentTask.title) ;
					    	$(".description").val(currentTask.description);		
					    	
					    	$(".priority option[value=" + currentTask['priority'] +"]").attr("selected","selected");
					    	if (currentTask.state==1) {
					    		$(".state").prop("checked", true);
					    	} else {
					    		$(".state").prop("checked", false)
					    	} 						    		    	
						  }
						});
					   $('.popup-window').popup();						
				});
					
			

			$('.backpopup,.close').click(function(){ //событие клик на тень и крестик - закрываем окно и тень:
				$('.popup-window').fadeOut();
				$('.backpopup').fadeOut();
				location.reload();
				console.log("close");
			});
			
			
			$('form').on("submit", function() {				
				//не  знаю, правильно ли это, но оно работает
				var myState; 
				if ($(".state").prop("checked")) {
					myState = 1; 
				} else {
					myState = 0;
				}
				
				
					var data = {
						action: "save",
						todo: {
							id: $ (".id").val(),
							title: $ (".title").val(),
							description: $(".description").val(),
							priority: $(".priority option:selected").val(),
							state: myState
						}
					};
	
					   $.ajax({
						   	url: "/todoAjax.php",
						    type: 'post',
						    data: data,
						    dataType: 'json',
						    success: function(response){
						    	$('.message').text(response['success']);	
						    	
						    }
						});	
					
					   return false;			
				})
			
			})