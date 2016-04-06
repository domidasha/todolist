		
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
			});
			$('.backpopup,.close').click(function(){ //событие клик на тень и крестик - закрываем окно и тень:
				$('.popup-window').fadeOut();
				$('.backpopup').fadeOut();
			});
			
			
			$('form').on("submit", function() {
				
				
				
				var data = {
					action: "create",
					todo: {
						title: $(".title").val(),
						description: $(".description").val(),
						priority: $(".priority option:selected").text(),
						state: $(".state").is(':checked'),
					}
				};
				
				
				console.log(data);
				

				   $.ajax({
					   url: "/todoAjax.php",
					    type: 'post',
					    data: data,
					    dataType: 'json',
					    success: function(response){
					    	console.log(response);
					    }
					});	
				
				   return false;   
		
			});
		})